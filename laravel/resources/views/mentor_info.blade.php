
<!-- Included Angular js -->
<script type="text/javascript" src="{{URL::asset('assets/plugin/angular/angular.min.js')}}"></script>

@extends('layouts.app')
@section('content')
<div  ng-app="mentorApp" ng-controller="mentorInfoCtrl">
	<div class="container">
		<div class="row">
			<div class="col s12">
				<div class="row">
		            <nav class="breadcrumb-nav">
		                <div class="nav-wrapper">
		                    <div class="col s12">
		                    <a href="{{URL::asset('/home')}}" class="breadcrumb">Home</a>       
								<a href="#!" class="breadcrumb">Mentor Details</a>                
		                    </div>
		                </div>
		            </nav>
        		</div>
        		<div class="table-responsive">
        			<table class=" table table-color table-striped highlight centered table-bordered">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th>Project Name</th>
								<th>Guidance on Embedded & Other Technical Parameters</th>
								<th>Guidance on Android App</th>
								<th>Guidance on Web App</th>					
							</tr>
						</thead>
						<tbody>
							<?php 
							for ($i = 0; $i < count($mentors); $i++){
								?>
							<tr>
								<td>{{$startIndex + $i}}</td>
								<td>{{$mentors[$i]->project_name}}</td>
								<td><?= nl2br($mentors[$i]->embedded) ?></td>
								<td><?= nl2br($mentors[$i]->android) ?></td>
								<td><?= nl2br($mentors[$i]->web) ?></td>
							</tr>
								
							<?php } ?>
						</tbody>
					</table>
					
        		</div>
				{{ $mentors->links() }}
			</div>
		</div>
	</div>

	<!-- Payment Info Model -->
	<div id="guidelines" class="modal modal-fixed-footer" style="height: 55%;" data-backdrop="static" data-keyboard="false" >
	    <div class="modal-content" id="modal-content">
	    	<h5 style="color:red;">GUIDELINES FOR CONTACTING MENTORS</h5>
	       	<div class="row">
	          	<ul>
	          		<li>For any technical query regarding project, only one team member (i.e. team leader) will contact the respective mentor.</li>
	          		<li>Team leads can contact the mentors at any time between <b>11:00Hrs to 13:00Hrs</b> and <b>14:00Hrs to 17:00Hrs</b> only on weekdays i.e. <b>Monday to Friday</b>.</li>
	          		<li>If the team lead needs to send an email regarding the query, it should be addressed TO the respective mentor and mark CC to following IDs,
	          			<ul>
							<li>Mr. Abhaya Singh – abhaya.singh@cii.in</li>
							<li>Mr. Vaibhav Deshpande – vaibhav@syslogyx.com</li>
						</ul>
					</li>
	          		<li>Team leads should contact to only those mentors who are allotted to their project. Disturbing other mentors may result in demerit points.</li>
	          		<li>For any non-technical query related to IndNX 4.0 event, please contact,
	          			<ul>
							<li>Mr. Abhaya Singh – abhaya.singh@cii.in +91 95587 91575</li>
						</ul>
					</li>
	          	</ul>
	          	<ul>
  <li>Coffee</li>
  <li>Tea
    <ul>
    <li>Black tea</li>
    <li>Green tea</li>
    </ul>
  </li>
  <li>Milk</li>
</ul>
	        </div>
		</div>
		<div class="modal-footer">
				<button class="modal-close waves-effect waves-green btn-flat btn-primary">Ok</button>
		</div>
	</div>

</div>
@endsection
<style type="text/css">
	.modal-content>h5{
		text-align: center;
	}
	div#modal-content ul, div#modal-content li{
		list-style-type: disc!important;
	}
	.modal .modal-content{
		/*margin: 15px;*/
		/* max-height: 700px; */
	}
	.modal-overlay{
		opacity: 0.8!important;
	}
	.modal.modal-fixed-footer{
		height:60%!important;
	}

	h2{
		text-align: center;
	    font-size: 24px;
	    font-weight: bold;
	}
	strong{font-size: 18px;    font-weight: bold !important;}

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
	@media screen and (max-width: 767px){
		.table-responsive>.table>tbody>tr>td, .table-responsive>.table>tbody>tr>th, .table-responsive>.table>tfoot>tr>td, .table-responsive>.table>tfoot>tr>th, .table-responsive>.table>thead>tr>td, .table-responsive>.table>thead>tr>th {
		    white-space: unset !important;
		}
	}
	ul:not(.browser-default) {
	    list-style-type: disc!important;
	}
</style>

<script>
var app = angular.module('mentorApp', []);
app.controller('mentorInfoCtrl', function($scope) {
	$scope.load = function() {
		$('#guidelines').modal()[0].M_Modal.options.dismissible = false;
	    $('#guidelines').modal('open');
	}

	setTimeout(function(){$scope.load();},200);
});
</script>