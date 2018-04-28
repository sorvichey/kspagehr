@extends('layouts.front')
@section('content')
        <div class="container">
            <div class="col-md-12 pd-0">
            <div class="row">
                <div class="col-md-3 pd-0">
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
                <div class="col-md-9 rp">
                    <div class="border">
                        <div class="row">
                            <div class="col-sm-3 text-center">
                                    <img src="{{asset('company/'.$company->logo)}}" alt="" class="company-logo" width="120">
                            </div>
                            <div class="col-sm-9 text-center">
                                <p></p>
                                <p></p>
                                <h3 class="t">{{$job->job_title}}</h3>
                                <a href="">
                                    <big> <b>with {{$company->name}}</b></big>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <strong>About The Company</strong>
                                <p></p>
                                <p class="text-justify">
                                    {!! $company->description !!}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="ap">
                                Announcement Positions
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <p></p>
                                <span class="blue-job">{{$job->job_title}}</span>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">{{trans('labels.category')}}</label>
                                    <div class="col-sm-9 stxt">
                                        : {{$job->catname}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">{{trans('labels.company')}}</label>
                                    <div class="col-sm-9 stxt">
                                        : {{$company->name}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">{{trans('labels.location')}}</label>
                                    <div class="col-sm-9 stxt">
                                        : {{$job->location}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3">{{trans('labels.job_type')}}</label>
                                    <div class="col-sm-9 stxt">
                                        : {{$job->job_type}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label class="control-label col-sm-4">{{trans('labels.hiring')}}</label>
                                    <div class="col-sm-8 stxt text-info">
                                        : {{$job->hire}} Post(s)
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4">{{trans('labels.gender')}}</label>
                                    <div class="col-sm-8 stxt">
                                        : {{$job->gender}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4">{{trans('labels.posting_date')}}</label>
                                    <div class="col-sm-8 stxt">
                                        : {{date_format(date_create($job->create_at), "Y-m-d")}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-4">{{trans('labels.closing_date')}}</label>
                                    <div class="col-sm-8 stxt text-danger">
                                        : {{$job->closing_date}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="job-title new-job">
                                    <br>
                                    <span class="text-info">
                                        <b>{{trans('labels.job_description')}}</b>
                                    </span>
                                <hr>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {!! $job->description !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p>
                                    <br>
                                    <span class="text-info"><b>{{trans('labels.job_requirement')}}</b></span>
                                </p><hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {!! $job->requirement !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p><br>
                                    <span class="text-info">
                                        <b>{{trans('labels.contact_info')}}</b>
                                    </span>
                                </p><hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">{{trans('labels.contact_person')}}</label>
                                    <div class="col-sm-8 stxt ">
                                        : {{$job->first_name . ' ' . $job->last_name}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">{{trans('labels.email')}}</label>
                                    <div class="col-sm-8 stxt ">
                                        : {{$job->email}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">{{trans('labels.phone')}}</label>
                                    <div class="col-sm-8 stxt ">
                                        : {{$job->phone}}
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2">{{trans('labels.address')}}</label>
                                    <div class="col-sm-8 stxt ">
                                        : {{$company->address}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
<p></p>
@endsection
