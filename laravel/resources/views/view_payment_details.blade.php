@extends('layouts.app')
@section('content')
<div class="container">
   
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
<div class="row">
            <nav class="breadcrumb-nav">
                <div class="nav-wrapper">
                    <div class="col s12">
                        <a href="{{URL::asset('/home')}}" class="breadcrumb">Home</a>    
<a href="#!" class="breadcrumb">Payment Details</a>          
                    </div>
                </div>
            </nav>
        </div>
            <div class="panel panel-default">
                <div class="panel-heading">Provide Your Payment Information</div>

                <div class="panel-body">
                <div class="alert alert-warning">
                    <p><span style="color: red; font-size: 20px;">*</span> DD/Cheque, in favour of “Confederation of Indian Industry”</p>
                </div>

                    <form id="paymentDetailsForm" class="form-horizontal">
                        {{ csrf_field() }}
                        <input id="team_id" name="team_id" type="hidden" class="validate" value="{{$team->id}}">
                        <div class="row">
                            <div class="col s8">
                              <label for="payment_type">Payment Type</label>
                              <select id="payment_type" name="payment_type" class="validate browser-default" disabled>
                              <option value="" selected>Select Payment Type</option>
                            
                                  <?php $paymentTypes = ['1'=>'DD','2'=>'Cheque','3'=>'Online','4'=>'Cash']; ?>
					                         <?php
                                    $is_selected = "";
                                    foreach($paymentTypes as $key => $value){
                                    $is_selected = "";
                                    if($value == $team->payment_type)
                                    $is_selected = "selected=selected";
                                    ?>
                                    <option value="{{ $value}}" <?= $is_selected ?> >{{ $value }}</option>
                                    <?php
                                    }

                                  ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                              <input id="transaction_id" name="transaction_id" type="text" class="validate" value="{{$team->transaction_id}}" disabled>
                              <label for="transaction_id">DD/Cheque/Cash details</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">

                              <input id="payment_amount" name="payment_amount" type="text" class="validate" value="{{$team->amount}}" disabled>
                              <label for="payment_amount">Amount</label>
                            </div>
                        </div>         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
