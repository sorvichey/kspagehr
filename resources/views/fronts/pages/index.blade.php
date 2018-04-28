@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="page-title">
                {{$page->title}}
            </div>
            <div class="border">
                <p>{!!$page->description!!}</p>
            </div>
        </div>

        {{--  <div class="col-md-3">  --}}
            {{--  <div class="blue"  align="center">{{trans('labels.training_course')}}</div>  --}}

        <div class="col-md-3 training-course">
        <?php   
            $video_trainings = DB::table('video_trainings')
                ->where('active',1)
                ->orderBy('order_number', 'asc')
                ->get();
            ?>
            @foreach($video_trainings as $vid)
            <div class="photo">
                <iframe width="100%" src="{{$vid->url}}" width="100%" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
                        <a href="{{url($t->url)}}" target="_blank">
                                <img src="{{asset('ads/'.$t->photo)}}" width="100%">
                            </a>
                </div>
            @endforeach<br>
        
        </div>
    </div>

@endsection
