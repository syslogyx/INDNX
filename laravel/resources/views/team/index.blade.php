
<!-- Included Angular js -->
<script type="text/javascript" src="{{URL::asset('assets/plugin/angular/angular.min.js')}}"></script>
@extends('layouts.app')
@section('content')
<div  ng-app="teamApp" ng-controller="teamDetailsCtrl">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="row">
		            <nav class="breadcrumb-nav">
		                <div class="nav-wrapper">
		                    <div class="col s12">                         
								<a href="#!" class="breadcrumb">Team Details</a>                
		                    </div>
		                </div>
		            </nav>
		        </div>
				<table class="table-color table-striped highlight centered responsive-table table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Name</th>
							<th>Institute Name</th>
							<th>Email</th>
							<th>Team Size</th>
							<th>Payment Status</th>
							<th>View Details</th>
							<th>Payment Info</th>
							
						</tr>
					</thead>
					<tbody>
						<!-- {{$teamList[0]}} -->
						@for ($i = 0; $i < count($teamList); $i++)
						<tr>
							<td>{{$startIndex + $i}}</td>
							<td>{{$teamList[$i]->name}}</td>
							<td>{{$teamList[$i]->institute_name}}</td>
							<td>{{$teamList[$i]->email}}</td>
							<td>{{$teamList[$i]->team_size}}</td>
							@if($teamList[$i]->payment_verified == 1)
							<td><i class="material-icons circle green" style="color: white;">check</i></td>
							@else
							<td><i class="material-icons circle red" style="color: white;">close</i></td>
							@endif
							<td><a class="waves-effect waves-light btn btn-sm" ng-click="viewTeamDetails({{$teamList[$i]}})">View</a></td>
							<td><a class="waves-effect waves-light btn btn-sm" ng-click="viewPaymentInfo({{$teamList[$i]}})">View</a></td>
							
						@endfor
					</tbody>
				</table>
				{{ $teamList->links() }}
			</div>
		</div>
	</div>

<!-- Team Details Modal Structure -->
	<div id="team-Details" class="modal modal-fixed-footer">
	<!-- <div class="modal-header">
	  <h5>Team Details</h5>
	</div> -->
	<div class="modal-content"> 
	<h5>Team Details</h5>    
      <div class="row main-row">
        <div class="input-field col s6">
          <span class="label-name">Team Name :</span> <span ng-bind="teamData.name"></span>
        </div>
        <div class="input-field col s6">
          <span class="label-name">Institute Name :</span> <span ng-bind="teamData.institute_name"></span>
        </div>
      </div> 

      <div class="row main-row">
        <div class="input-field col s6">
          <span class="label-name">Email Address :</span> <span ng-bind="teamData.email"></span>
        </div>
        <div class="input-field col s6">
          <span class="label-name">Project Name :</span> <span ng-bind="teamData.project.name"></span>
        </div>
      </div>  

      <div class="row">
      	<h6><b>Team Member Details</b></h6>			
	  </div>

      <div class="row team-member-div" ng-repeat="member in teamData.team_member">
      	<div class="row main-row">
        	<span class="label-name">Member <span ng-bind="$index+1"></span></span>     
      	</div>
        <div class="input-field col s6">
          <span class="label-name">Name :</span> <span ng-bind="member.member_name"></span>
        </div>
        <div class="input-field col s6">
          <span class="label-name">Department :</span> <span ng-bind="member.department"></span>
        </div>

        <div class="input-field col s6">
          <span class="label-name">Mobile No. :</span> <span ng-bind="member.mobile"></span>
        </div>
        <div class="input-field col s6">
          <span class="label-name">Email id :</span> <span ng-bind="member.email"></span>
        </div>
      </div>     

	</div>
	<div class="modal-footer">
	  <button class="modal-close waves-effect waves-green btn-flat btn-primary" data-dismiss="modal">Close</a>
	</div>
	</div>

	<!-- Payment Info Model -->
  <div id="payment-info" class="modal modal-fixed-footer">
    <!-- <div class="modal-header">
      <h5>Payment Info</h5>
    </div> -->
    <div class="modal-content" style="margin-right:15px;">
    	<h5>Payment Info</h5>
      <div class="row">
          <div class="input-field col s4">
            <span class="label-name">Payment Type :</span> <span ng-bind="paymentData.payment_type"></span>
          </div>
          <div class="input-field col s4">
            <span class="label-name">Transaction ID :</span> <span ng-bind="paymentData.transaction_id"></span>
          </div>
		  <div class="input-field col s4">
            <span class="label-name">Amount :</span> <span ng-bind="paymentData.amount"></span>
          </div>
      </div>
    </div>
    <div class="modal-footer">
      <button ng-click="updateApproval()"  class="modal-close waves-effect waves-green btn-flat btn-primary" ng-disabled="paymentData.payment_verified == 1">Approve</button>
      <button class="modal-close waves-effect waves-green btn-flat btn-primary" data-dismiss="modal">Cancel</button>
    </div>
  </div>

</div>
@endsection
<style type="text/css">
	.pagination{
		float: right !important;
	}
	.table-color{
		background-color: #FFFFFF
	}
	.label-name{
		font-size: larger;
		font-weight: 800;
	}
	.modal .modal-content{
		/*margin-left: 15px;*/
		max-height: 700px;
	}
	.team-member-div {
		border: 1px solid #e0d3d3;
    	border-radius: 5px;
   	    padding-left: 10px;
	}
	#payment-info {
		max-height: 300px;
	}
	.main-row{
		margin-top: 0px;
		margin-bottom: 0px;
	}

	.main-row .input-field{
		margin-top: 0px;
		margin-bottom: 0px;
	}
	.modal-content>h5{
		text-align: center;
	}
</style>

<script>
var app = angular.module('teamApp', []);
app.controller('teamDetailsCtrl', function($scope) {
	
	$scope.init = function(){
		$scope.teamData = null;
		$scope.paymentData = null;
	}

	//method for viewing team details 
    $scope.viewTeamDetails = function(eachTeamData){
    	$scope.teamData = eachTeamData;
    	console.log($scope.teamData);
	    $('#team-Details').modal('open');
    }

    //method for viewing team info
    $scope.viewPaymentInfo = function(eachTeamData){
    	$scope.paymentData = eachTeamData;
    	console.log($scope.paymentData);
    	if($scope.paymentData.payment_type != null || $scope.paymentData.transaction_id != null || $scope.paymentData.amount != null ){
	    	$('#payment-info').modal('open');

    	}else{
    		swal("Payment info unavailable!", "", "error");
    	}
    }

    //method for updating payment approval
    $scope.updateApproval = function(){
    	// location.href = "/update-payment-approval/"+$scope.paymentData.id;
	    	//hitting ajax request for updating approval
	    	 $.ajax({
	            url : baseUrl+"/update-payment-approval/"+$scope.paymentData.id,
	            type: 'GET',
	            success : function(response){
	              console.log(response);
	              if(response.hasOwnProperty("payment_verified") && response.payment_verified == true){
									swal("Payment approved successfully!", "", "success");
									window.location.reload();
	              }
	            }
	        });

    }

    $scope.init();
});
</script>