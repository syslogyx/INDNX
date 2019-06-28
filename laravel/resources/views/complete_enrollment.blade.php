@extends('layouts.app')
@section('content')
<style>
    input{font-size: 14px!important };
</style>

<div class="container">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
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
                <div class="panel-heading">TEAM REGISTRATION FORM</div>

                <div class="panel-body">
                    <div class="alert alert-warning">
                        <p>Please, recheck the data you have entered, you cannot change it once submitted successfully. </p>
                    </div>
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif

                    <form id="profileForm" class="form-horizontal" method="POST" action="{{action('TeamController@create')}}">

                        {{ csrf_field() }}
                        <input id="user_id" name="user_id" type="hidden" class="validate" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="email_address" name="email_address" type="email" class="validate" title="This email ID will be used for all the communication related to IndNX 4.0 – 1st Edition." placeholder="This email ID will be used for all the communication related to IndNX 4.0 – 1st Edition.">
                                <label for="email_address">Email Address <span class="mandatory">*</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="institute_name" name="institute_name" type="text" class="validate" required>
                                <label for="institute_name">Institute's Name <span class="mandatory">*</span></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="team_name" name="team_name" type="text" class="validate" required placeholder="This person will be the team lead." title="This person will be the team lead.">
                                <label for="team_name">Team Name <span class="mandatory">*</span></label>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col s12">
                                <label for="project_name">Project Name <span class="mandatory">*</span></label>
                                <select id="project_name" name="project_name" class="browser-default">
                                    <option value="" selected>Select Project Name</option>
                                    @foreach($prjectlist as $item)
									@if($item->is_active == 1)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
									@endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">                            
                            <div class="col s6">
                                <label for="team_size">Team Size <span class="mandatory">*</span></label>
                                <select id="team_size" name="team_size" onchange="onSizeSelection()" class="browser-default">
                                    <option value="" selected>Select Team Size</option>
                                    <?php $last = 5; ?>
                                    <?php $now = 1; ?>
                                    @for ($i = $now; $i <= $last; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div id="parent_Div" >     

                        </div>
                        <div class="row">
                            <div class="col s12">
                                <label>Declaration</label>      
                                <p>
                                  <label for="declaration">
                                    <input type="checkbox" id="declaration" name="check_declaration" class="filled-in" value="0"/>
                                    <span>I confirm that the details given above are factually correct and are applying to the rules laid down by CII.</span>
                                  </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button class="btn waves-effect waves-light" type="submit" name="action" id="profileSubmitBtn">Submit
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="fileUploadModal" class="modal modal-fixed-footer" style="height: 35%; width: 25%;">
        <form enctype="multipart/form-data" method="post" id="fileUploadForm"> 
            <div class="modal-content">
                <h6 >Upload File</h6>

                {{ csrf_field() }}
                <div>   
                    <div id="filediv">
                        <input name="file" type="file" id="packaging_last_recv_file"/>
                    </div>
                </div>   

            </div>
            <div class="modal-footer">
                <button class="waves-effect waves-light btn" id="uploadFileBtn" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>

<script>
// $('#profileForm').submit(function(e) {
//     e.preventDefault();
//     swal({
//     title: "Are you sure?",
//     text: "Once Saved, you will not be able to make changes!",
//     icon: "warning",
//     buttons: true,
//     dangerMode: true,
//     })
//     .then((willDelete) => {
//     if (willDelete) {
//         $('#profileForm').submit();
//         return true;
//     } else {
        
//         return false;
//     }
//     });
// });

function confirmAction(){
    e.preventDefault();
    swal({
    title: "Are you sure?",
    text: "Once Saved, you will not be able to make changes!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
        return true;
    } else {
        
        return false;
    }
    });
}
</script>
@endsection
