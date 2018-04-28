@extends('layouts.front')
@section('content')
<section>
    <div class="container">
        <div class="row" style="font-size: 13px;">
            <div class="col-md-3">
                <div class="panel-body panel-body-costum">
                    <ul class="list-group">
                    <li class="category">
                        <h3>Jobs By Category</h3>
                    </li>
                        @foreach($categories as $cat)
                        <li class="category">
                            <a href="{{url('/category/'.$cat->id)}}"><i class="fa fa-angle-double-right
                            "></i> &nbsp;{{$cat->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 rp page-title">
            <h3>List of Jobs </h3><hr>
            <div>
            @if(count($jobs)<=0)
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <br>
                        <h5 class="text-info">This category has no job posting!</h5>
                        <br><br>
                    </div>
                </div>
            @endif
            @foreach($jobs as $job)
            <div class="row" style="font-weight: 400;">
                <div class="col-sm-12">
                <aside class="job-title new-job">
                    <a href="{{url('/job/'.$job->id)}}"><span class="text-info" style="font-size: 16px;"><b>{{$job->job_title}}</b></span></a><br>
                    <a href="{{url('/job/'.$job->id)}}"><span class="txt"></i> <b>{{$job->cname}}</b></span></a>
                </aside>
                <aside>
                <span class="text-primary"><i class="fa fa-angle-double-right"></i> {{$job->catname}}</span>&nbsp;&nbsp;
                    <span class="text-success"><i class="fa fa-map-marker"></i> {{$job->location}}</span>&nbsp;&nbsp;
                    <span class="text-danger"><i class="fa fa-calendar-times-o"></i> {{trans("labels.close_on")}} {{$job->closing_date}}</span> &nbsp;&nbsp;
                </aside>
                    <hr>
                </div>
            </div>
            @endforeach
            {{$jobs->links()}}
                </div>
            </div>
        </div>
    </section><p></p>
@endsection
@section('customer')
    <div class="container">
        <div class="row">
            <div class="well-custom text-center bold orange our-partner">
                {{trans('labels.our_customer')}}
            </div>
            <div class="slide-partner-img">
                <div id="carousel0"  class="owl-carousel owl-theme">
                    <?php
                    // get customers
                    $customers = DB::table('partners')
                        ->where('type', 'customer')
                        ->where('active',1)
                        ->orderBy('sequence')
                        ->get();
                    ?>
                    @foreach($customers as $cus)
                        <div class="item text-center">
                            <img src="{{asset('partners/'.$cus->logo)}}" alt="{{$cus->name}}" class="img-responsive" />
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <section class="container well-custom">
        <div class="row">
            <div class="col-sm-12">
                <?php
                // get bottom advertisement
                $bottom_ads = DB::table('advertisements')
                    ->where('active', 1)
                    ->where('position','Bottom')
                    ->orderBy('order_number')
                    ->get();
                ?>
                @foreach($bottom_ads as $bads)
                    <div class="col-md-2 col-sm-2 padding-top-and-button">
                        <img src="{{asset('ads/'.$bads->photo)}}">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section("js")
    <script>
        $(document).ready(function () {
            $("#q").val("{{$q}}");
        });
    </script>
@endsection