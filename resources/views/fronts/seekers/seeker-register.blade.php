@extends('layouts.front')
@section('content')
<div class="row">
    <div class="col-md-9 pd-0">
    <div class="col-md-12">
        <h3 class="page-title">{{trans("labels.seeker_registration_form")}} | <span class="text-danger">{{trans("labels.note")}}</span> </h3>
        <div class="border">
            <form action="{{url('/seeker/save')}}"  id="register" method="post" accept-charset="UTF-8" role="form" onsubmit="check(event)">
            {{csrf_field()}}
            @if(Session::has('sms1'))
            <div class="row">
                <div class="col-sm-12 ">
                    <div class="alert alert-danger border-radius-none" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        {{session('sms1')}}
                    </div>
                </div>
            </div>
            @endif
            <div class="form-group row">
                <label for="first_name" class="control-label col-sm-2">{{trans("labels.first_name")}}<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input class="form-control" name="first_name" id="first_name" 
                    value="{{old('first_name')}}" type="text" required autofocus>
                </div>
                <label for="last_name" class="control-label col-sm-2">{{trans("labels.last_name")}}<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input class="form-control" name="last_name" id="last_name" 
                    value="{{old('last_name')}}" type="text" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="gender" class="control-label col-sm-2">{{trans("labels.gender")}}<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <select name="gender" id="gender" class="form-control">
                        <option value="Male">{{trans("labels.male")}}</option>
                        <option value="Female">{{trans("labels.female")}}</option>
                    </select>
                </div>
                <label for="dob" class="control-label col-sm-2">{{trans("labels.dob")}}</label>
                <div class="col-sm-4">
                    <input class="form-control" name="dob" id="dob" type="text"
                        value="{{old('dob')}}" placeholder="{{trans('labels.dd')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="phone" class="control-label col-sm-2">{{trans("labels.phone1")}}<span class="text-danger">*</span></label>
                <div class="col-sm-4">
                    <input class="form-control" name="phone" id="phone" type="text"
                    value="{{old('phone')}}" required>
                </div>
                <label for="phone1" class="control-label col-sm-2">{{trans("labels.phone2")}}</label>
                <div class="col-sm-4">
                    <input class="form-control" name="phone1" id="phone1" type="text"
                    value="{{old('phone')}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="control-label col-sm-2">{{trans("labels.email")}}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" name="email" id="email" type="email" 
                    value="{{old('email')}}" required>
                </div>
            </div>
           
            <div class="form-group row">
                <label for="username" class="control-label col-sm-2">{{trans("labels.username")}}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" name="username" id="username" type="text" 
                    value="{{old('username')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="control-label col-sm-2">{{trans("labels.password")}}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" name="password" id="password" type="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="cpassword" class="control-label col-sm-2">{{trans("labels.confirm_password")}}<span class="text-danger">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" name="cpassword" id="cpassword" type="password" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="control-label col-sm-2">&nbsp;</label>
                <div class="col-sm-9">
                    <button class="btn btn-success" type="submit">{{trans("labels.register")}}</button>
                    <button class="btn btn-danger" type="reset">{{trans("labels.cancel")}}</button>
                    <a  class="btn btn-info" href="{{url('seeker/login')}}">Back to Login</a>
                </div>
            </div>
            </form>
            </div>
        </div></div>
        <div class="col-md-3">
        <?php   
                $video_trainings = DB::table('video_trainings')
                ->where('active',1)
                ->orderBy('order_number', 'asc')
                ->get();
            ?>
            @foreach($video_trainings as $vid)
                <div class="photo">
                    <object data="{{$vid->url}}" width="100%"></object>
                </div>
            @endforeach
            <?php 
                $training_courses = DB::table('training_courses')
                ->where('active',1)
                ->orderBy('order_number', 'asc')
                ->get();
            ?>
            @foreach($training_courses as $t)
                <div class="photo">
                        <img src="{{asset('ads/'.$t->photo)}}" width="100%">
                </div>
            @endforeach<br>
        </div>
    </div>
    <script src="{{asset('front/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script charset="utf-8" type="text/javascript">
        function check(event)
        {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("cpassword").value;

            if( password != confirm_password) {
                document.getElementById("cpassword").style.border="1px solid red";
                event.preventDefault();
            } 

            if( password === confirm_password){
                document.getElementById("register").submit();
            }
        }
        $(document).ready(function(){
            $("#dob").inputmask('99/99/9999');
           // $("#phone").inputmask('999 999 9999');
            // $("#phone1").inputmask('999 999 9999');
        });
    </script>
@endsection