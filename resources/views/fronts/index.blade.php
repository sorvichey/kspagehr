@extends('layouts.front')
@section('content')
    <div class="col-md-9">
        <div class="row  page-title">
            <div class="col-md-4 pd-0">
                <h3 class="m-t">Jobs By Category</h3>
            </div>
            @foreach($job_types as $typ)
                <li class="nav-item"​ style="padding: 0 10px; font-size: 25px; font-weight:400;">
                    <a class="jt" class="nav-link" href="{{url('job-type/'.$typ->id)}}">{{$typ->name}}!</a>
                </li> 
            @endforeach
        </div>
    </div>
    <div class="row row-vdoo">
        <div class="border-job col-md-9">
           <div class="row">
                @foreach($result as $cat)
                    <div class="col-md-6">
                        <div class="border-cat">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12" >
                                    <a href="{{url('/category/'.$cat["id"])}}" class="a-block">
                                        <span class="gray">{{$cat['name']}}</span>
                                        <span class="float-right">{{$cat['total']}}</span>
                                    </a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3 training-course text-center">
            @foreach($video_trainings as $vid)
                <div class="photo">
                    <iframe width="100%" src="{{$vid->url}}" width="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            @endforeach
            @foreach($training_courses as $tra)
                <div class="photo">
                    <a href="{{url($tra->url)}}" target="_blank">
                        <img src="{{asset('ads/'.$tra->photo)}}" width="100%">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <p></p>
@endsection