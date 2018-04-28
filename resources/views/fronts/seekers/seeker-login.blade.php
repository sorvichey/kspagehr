@extends('layouts.front')
@section('content')
<div class="row">
<div class="col-md-9">
<div class="row">
    <div class="col-md-6">
        <div class="border" style="padding: 62px 15px;">
        <?php $logo = DB::table('logos')->first(); ?>
<a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/'.$logo->photo)}}" alt="logo" title="{{$logo->name}}" class="logo"></a><br>
            <b>if you don't have account please register here!</b> <hr>
            <a href="{{url('/seeker/register')}}" class="btn btn-success btn-block"><i class="fa fa-hand-o-right" aria-hidden="true"></i> 
                {{trans('labels.create_new_account')}}
            </a>
        </div>
    </div>
    <div class="col-md-6">  
        <div class="border">
            <h3 class="page-title text-center">{{trans("labels.seeker_login")}}</h3>  <hr>    
                <form action="{{url('/seeker/dologin')}}" accept-charset="UTF-8" role="form" method="post">
                <fieldset>
                    {{csrf_field()}}
                    @if(Session::has('sms'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success border-radius-none" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{session('sms')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-danger border-radius-none" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    {{session('sms1')}}
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <input class="form-control" placeholder="{{trans('labels.username')}}" name="username" required autofocus type="text" value="{{old('username')}}">
                    </div>
                    <div class="form-group">
                        <input class="form-control" placeholder="{{trans('labels.password')}}" name="password" type="password" required value="{{old('password')}}">
                    </div>
                    <div class="form-group">
                        <p>
                            <a href="{{url('/seeker/forgot')}}" class="text-danger">{{trans("labels.forget_password")}}</a>
                        </p>
                    </div>
                    <input 
                        class="btn btn-lg btn-info btn-block bold border-radius-none" 
                        type="submit" 
                        value="{{trans('labels.login')}}"
                    >
                </fieldset>
            </form>
        </div>
    </div>
</div>
</div>
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
</div><br>
@endsection