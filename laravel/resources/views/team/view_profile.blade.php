@extends('layouts.app')
@section('content')

<div class="container">	
	<div class="row">
	<div class="col s12 m8 offset-m2">
	<div class="row">
            <nav class="breadcrumb-nav">
                <div class="nav-wrapper">
                    <div class="col s12">
						<a href="{{URL::asset('/home')}}" class="breadcrumb">Home</a>       
						<a href="#!" class="breadcrumb">Team Details</a>        
                    </div>
                </div>
            </nav>
        </div>
			<div class="panel panel-default">
				<div class="panel-heading">Team Details</div>				
				<div class="panel-body">
					<div class="row">
						<div class="col s6">
							<span class="label-name"><b>Email Address :</b></span> <span>{{$team['email']}}</span>
						</div>
						<div class="col s6">
							<span class="label-name"><b>Institute's Name :</b></span> <span>{{$team['institute_name']}}</span>
						</div>
					</div>
					<div class="row">
						<div class="col s6">
							<span class="label-name"><b>Team Name :</b></span> <span>{{$team['name']}}</span>
						</div>
						<div class="col s6">
							<span class="label-name"><b>Project Name :</b></span> 
							<span>{{$team['project']['name']}}</span>
						</div>
						<div class="col s6">
							<span class="label-name"><b>Team Size :</b></span> <span>{{$team['team_size']}}</span>
						</div>
					</div>
					<div class="row">
						<ul class="collapsible">
							@for ($i = 0; $i < count($team['team_member']); $i++)
						    <li id="{{$i}}">

						      <div class="collapsible-header" ><i class="material-icons">person</i> Team Member {{$i+1}}</div>
						      <div class="collapsible-body">
								<div class="row">
									<div class="col s6">
										<span class="label-name"><b>Name :</b></span> <span>{{$team['team_member'][$i]['member_name']}}</span>
									</div>
									<div class="col s6">
										<span class="label-name"><b>Department :</b></span> <span>{{$team['team_member'][$i]['department']}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col s6">
										<span class="label-name"><b>Mobile No. :</b></span> <span>{{$team['team_member'][$i]['mobile']}}</span>
									</div>
									<div class="col s6">
										<span class="label-name"><b>Email Id :</b></span> <span>{{$team['team_member'][$i]['email']}}</span>
									</div>
								</div>
								<div class="row">
									<div class="col s6">
										<span class="label-name"><b>File Type :</b></span> 
										<?php $fileTypeArray = array('1'=>'Aadhar Card','2'=>'Pan Card','3'=>'College Id');
										 ?> 
										<?php foreach($fileTypeArray as $key => $value){ 
											if($key == $team['team_member'][$i]['file_type']){?>
											<span>{{$team['team_member'][$i]['file_type']}}</span>
											<?php } ?>
										<?php } ?>
									</div>
									<div class="col s6">
										<?php
											$filelink = "/app/public/".$team['team_member'][$i]["file"]["file"]."/".$team['team_member'][$i]["file"]["file_name"];
										?>
										<a class="waves-effect waves-light btn" target="_blank" href="<?= $filelink ?>"><i class="material-icons center" >remove_red_eye</i></a>
									</div>
								</div>
							  </div>
						    </li>
						    @endfor
						</ul>
					</div>		
				</div>
			</div>
		</div>
	</div>
	 
</div>
@endsection