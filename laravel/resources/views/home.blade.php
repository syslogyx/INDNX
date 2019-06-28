@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
   
        <div class="col s12 m8 offset-m2">
        <div class="row">
            <nav class="breadcrumb-nav">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="#!" class="breadcrumb">Home</a>        
                    </div>
                </div>
            </nav>
        </div>
        
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="alert alert-warning">
                        <p style="color: red;"><span style="color: red; font-size: 20px;">*</span> Please update the profile and make the payment till 30th July 2018 23:59Hrs to finish the registration process, Thank You!</p>
                    </div>
                    <!-- You are logged in!
                    
                    <p> To update your enrollment details <a href ="{{URL::asset('/user/complete_enrollment')}}" > Click Here</a> -->
                    
                  <ul class="collection">
                    @if (isset($is_profile_updated->is_profile_updated) && $is_profile_updated->is_profile_updated ==1)
                        <li class="collection-item avatar">

                          <i class="material-icons circle green">filter_1</i>
                          <span class="title"></span>
                          
                          <p style="margin: 11px"><a href="{{URL::asset('/team/details/'.$is_profile_updated->id )}}" >Update Profile
                          </a>
                          </p>                          
                        </li>
                    @else
                        <li class="collection-item avatar">
                          <i class="material-icons circle ">filter_1</i>
                          <span class="title"></span>
                          <p style="margin: 11px">
  				                  <?php
  				                    if(date("Y-m-d H:i:s") >= "2018-07-30 06:30:00" && date("Y-m-d H:i:s") <= "2018-07-30 18:30:00"){
  				                  ?>
  				                      <a href="{{URL::asset('/user/complete_enrollment')}}" >Update Profile</a>
  				                  <?php
  				                    }else{
  				                  ?>
  				                      Sorry! As registrations are closed, you can not update your profile.
  				                  <?php
  				                    }
  				                  ?>				
			                   </p>
                        </li>
                    @endif
                    <!-- //second -->
                    @if ( isset($is_profile_updated->is_profile_updated) && $is_profile_updated->payment_verified == 1)
                        <li class="collection-item avatar">
                          <i class="material-icons circle green">filter_2</i>
                          <span class="title"></span>
                          <p style="margin: 11px" ><a href="{{URL::asset('/user/view_payment_details')}}" >Provide Payment Info
                          </a>
                          </p>
                        </li>
                    @else
                        <li class="collection-item avatar">
                          <i class="material-icons circle ">filter_2</i>
                          <span class="title"></span>

                          <p style="margin: 11px">
                          @if(!isset($is_profile_updated->id))
                              Provide Payment Info
                              @else
                              <a href="{{URL::asset('/user/payment_details')}}" >Provide Payment Info
                              @endif
                          </a>
                        </p>
                        </li>
                    @endif

                    <!-- //third -->
                    @if (isset($is_profile_updated->is_profile_updated)  && $is_profile_updated->payment_verified == 1)
                        <li class="collection-item avatar">
                          <i class="material-icons circle green">filter_3</i>
                          <span class="title"></span>
                          <p style="margin: 11px"><a href="{{URL::asset('/view/project_info')}}" >View Project Details
                          </a>
                          </p>
                        </li>
                    @else
                        <li class="collection-item avatar">
                          <i class="material-icons circle ">filter_3</i>
                          <span class="title"></span>
                          <p style="margin: 11px">View Project Details
                          </p>
                        </li>
                    @endif

                     <!-- //fourth -->
                    @if (isset($is_profile_updated->is_profile_updated)  && $is_profile_updated->payment_verified == 1)
                        <li class="collection-item avatar">
                          <i class="material-icons circle green">filter_4</i>
                          <span class="title"></span>
                          <p style="margin: 11px">
                            <a href="{{URL::asset('/view/mentor_info')}}" >View Mentor Details
                          </a>
                          </p>
                        </li>
                    @else
                        <li class="collection-item avatar">
                          <i class="material-icons circle ">filter_4</i>
                          <span class="title"></span>
                          <p style="margin: 11px">View Mentor Details
                          </p>
                        </li>
                    @endif
                  </ul>
            
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
