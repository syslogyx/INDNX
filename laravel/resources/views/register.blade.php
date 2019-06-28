@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <div class="row">
        <div class="col-md-3">
            <img src="{{URL::asset('assets/images/Awards_.png')}}" class="img_award">
        </div>
        <div class="col-md-6 ">
            <div class="panel panel-default">
                <div class="panel-heading" data-date="<?=  date('Y-m-d H:i:s') ?>">Register
				
				</div>

                <div class="panel-body">
                <?php 
                //if(date("Y-m-d H:i:s") >= "2018-07-30 06:30:00" && date("Y-m-d H:i:s") <= "2018-07-30 18:30:00"){
					if(true){
?>
 <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name <span class="mandatory">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <span class="mandatory">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password <span class="mandatory">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Please choose strong password." title="Please choose strong password.">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password <span class="mandatory">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">
                                    Register
									
									
                                </button>
                            </div>
                        </div>
                    </form>

<?php
                }else{
?>
<p style="color: #ff3300;font-size: 17px;height:200px;">
Sorry! Registrations for IndNX 4.0 (1st Edition) are closed.<br>

For any queries, please contact,<br>

<a href="mailto:abhaya.singh@cii.in">abhaya.singh@cii.in</a><br>

<a href="mailto:contact@indnx.in">contact@indnx.in</a><br>

<a href="#">+91 9558791575</a>
</p>



<?php
                }                   

                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <img src="{{URL::asset('assets/images/Fees_2.png')}}" class="img_fees">
        </div>
    </div>
    <div class="row" style="background-color:white; margin-top: -2%;" >
        <div class="col-md-8 col-md-offset-2">
            <h4 style="text-align:center">
            <!-- <b>IndNx 4.0</b></br> -->
                <span>Team Registration Process</span>
            </h4>
            <div style="text-align:center; font-style: italic; margin-top: -2%;"> 
                <span >(Right click and save the image for further reference)</span>
            </div>
            </br>
            <img src="{{URL::asset('assets/images/Registration Process_2.png')}}" class="" style="width: 100%;">
        </div>
    </div>
</div>
<style>
    input{
        font-size: 14px!important;
    }
    img.img_award{
        width: 100%;
        margin-top: 85px;
        margin-bottom: 30px;
    }
    img.img_fees{
        width: 100%;
        margin-top: 150px;
        margin-bottom: 5px;
    }
    @media only screen and (max-width: 845px){
        img.img_fees {
            margin-top: 5px !important;
        }
        img.img_award {
            margin-top: 5px !important;
        }
    }
</style>
@endsection
