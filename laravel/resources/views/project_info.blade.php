
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
@extends('layouts.app')
@section('content')
<div  ng-app="projectApp" ng-controller="projectInfoCtrl">
	<div class="container">
	<div class="row">
            <nav class="breadcrumb-nav">
                <div class="nav-wrapper">
                    <div class="col s12">
                    <a href="{{URL::asset('/home')}}" class="breadcrumb">Home</a>       
						<a href="#!" class="breadcrumb">Project Details</a>                
                    </div>
                </div>
            </nav>
        </div>
		<div class="row">
			<div class="col s12">
				<h5 style="text-align: center;">{{$project->project->name}}</h5>
				<div>					
					<?= $project->project->description ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Payment Info Model -->
  <div id="disclosure" class="modal modal-fixed-footer" style="height: 55%;" data-backdrop="static" data-keyboard="false" >
    <div class="modal-content" id="modal-content">
    	 <h5 style="color:red;">Non-Disclosure Guidelines</h5>
              <div class="row">
              	<ul>
              		<li>Teams participating in IndNX4.0 should not disclose or divulge the use cases directly or indirectly to any person, firm or company whatsoever without the written consent of CII.</li>
              		<li>Teams should strictly use the use cases information only for the purpose of creating a solution prototype for the IndNX4.0 event.</li>
              		<li>Teams should also not make copies of the use cases and share it with any person, firm or company whatsoever without the written consent of CII.</li>
              		<li>Failing to comply with any of the above guidelines may result in strict action including disqualification from the event.</li>
              	</ul>
              </div>
    </div>
    <div class="modal-footer">
      <button class="modal-close waves-effect waves-green btn-flat btn-primary">I Agree</button>
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
</style>

<script>
var app = angular.module('projectApp', []);
app.controller('projectInfoCtrl', function($scope) {
	$scope.load = function() {
		console.log("$scope.teamData");
		$('#disclosure').modal()[0].M_Modal.options.dismissible = false;
	    $('#disclosure').modal('open');
	}

	setTimeout(function(){$scope.load();},200);
});
</script>