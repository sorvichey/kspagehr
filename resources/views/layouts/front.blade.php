<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Kspage HR</title>
        <script type="text/javascript" src="{{asset('front/jq.js')}}"></script>
        <link href="{{asset('front/b.css')}}" rel="stylesheet">
        <link href="{{asset('front/slide.css')}}" rel="stylesheet">
        <link href="{{asset('front/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('front/css/4-col-portfolio.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    </head>
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
        <?php $logo = DB::table('logos')->first(); ?>
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('img/'.$logo->photo)}}" alt="logo" title="{{$logo->name}}" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav" id="menu_top">
                <li class="nav-item active">
                    <a class="nav-link" href="{{url('/')}}">{{trans("labels.home")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/2')}}">{{trans("labels.about_us")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/3')}}">{{trans("labels.training")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('page/4')}}">{{trans("labels.recruitment")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('seeker/login')}}">{{trans("labels.job_seeker")}}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('employer/login')}}">{{trans("labels.employer")}}</a>
                </li>
               
                @if(Session::has('seeker'))
                <li class="nav-item dropdown" >
                    <a class="nav-link dropdown-toggle" href="{{url('seeker/profile')}}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{session('seeker')->first_name}}</a>
                    <div class="dropdown-menu " style="font-size: 13px;" aria-labelledby="dropdown03">
                        <a class="dropdown-item" href="{{url('seeker')}}"><i class="fa fa-user-circle-o"></i> My Profile</a>
                        <a class="dropdown-item" href="{{url('seeker/cv')}}"><i class="fa fa-id-badge" aria-hidden="true"></i> My Resume</a>
                        <a class="dropdown-item" href="{{url('seeker/document')}}"><i class="fa fa-file-text-o" aria-hidden="true"></i> My Document</a>
                        <a class="dropdown-item" href="{{url('seeker/reset-password')}}"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a>
                        <a class="dropdown-item text-danger" href="{{url('/seeker/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </div>
                </li>
                @endif
                @if(Session::has('employer'))
                <li class="nav-item dropdown" >
                <a class="nav-link dropdown-toggle" href="{{url('seeker/profile')}}" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hi, {{session('employer')->first_name}}</a>
                    <div class="dropdown-menu " style="font-size: 13px;" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="{{url('/employer')}}"><i class="fa fa-user-circle-o"></i>  {{trans('labels.my_profile')}}</a>
                 
                    <a class="dropdown-item" href="{{url('/employer/subscription')}}"><i class="fa fa-money" aria-hidden="true"></i> {{trans('labels.my_subscription')}}</a>
               <a class="dropdown-item" href="{{url('/employer/job')}}"><i class="fa fa-id-card-o" aria-hidden="true"></i> {{trans('labels.my_job')}}</a>
                    <a class="dropdown-item" href="{{url('/employer/company')}}"><i class="fa fa-first-order" aria-hidden="true"></i> {{trans('labels.my_company')}}</a>
                                 
                    <a class="dropdown-item" href="{{url('/employer/search/cv')}}"><i class="fa fa-search" aria-hidden="true"></i> {{trans('labels.find_cv')}}</a>
   
            
                    <a class="dropdown-item" href="{{url('/employer/favorite')}}"><i class="fa fa-gratipay" aria-hidden="true"></i> {{trans('labels.favorite_cv')}}</a>
              
                    <a class="dropdown-item" href="{{url('/employer/reset-password')}}"><i class="fa fa-key" aria-hidden="true"></i> {{trans('labels.change_password')}}</a>

                    <a class="dropdown-item text-danger" href="{{url('/employer/logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> {{trans('labels.logout')}}</a>

                    </div>
                </li>
            @endif
            </ul>
            <ul class="navbar-nav ml-auto" id="menu_top">
                <li class="nav-item">
                    <a class="nav-link" href="#" onclick="chLang(event,'km')">
                    <img src="{{asset('front/img/kh.png')}}" width="20"> ភាសាខ្មែរ</a>
                </li>
                <li class="nav-item">  
                    <a class="nav-link" href="#" onclick="chLang(event,'en')">
                    <img src="{{asset('front/img/en.png')}}" width="20"> English</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php 
        $slides = DB::table('slides')->orderBy('order', 'asc')->where('active',1)->get();
        $i = 1;
    ?>
    <div class="container-fluit">   
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                @foreach ($slides as $sli)
                @if($i == 1)
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{asset('img/'.$sli->photo)}}" alt="slide" width="100%">
                    </div>
                @else 
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{asset('img/'.$sli->photo)}}" alt="slide" width="100%">
                    </div>
                @endif
                <?php $i++;?>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="container">
        <div class="search-job"> 
            <form action="{{url('/job/search')}}" method="get" class="form-hozintal">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control search-box" placeholder="Keyword, Position, Location..." aria-label="Keyword, Position, Location..." aria-describedby="basic-addon2" name="q" id="q">
                            <div class="input-group-append">
                                <button class="btn btn-primary search-button" type="submit">{{trans('labels.search')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>  
    </div>

    <div class="container">
        <p></p>
        @yield('content')     
    </div>
    <?php  
     $partners = DB::table('partners')
      ->orderBy('sequence', "asc")
      ->where('active',1)
      ->get();
  ?>    
    <div class="container">
        <div class="top-r">
            <h5>Recruitment Agencies</h5>  
        </div>   
            <div class="col-md-12 b desktop">
                <div id="carousel0" class="swiper-container">
                        <div class="swiper-wrapper"> 
                            <?php $i=1;?>
                            @foreach($partners as $d)
                                @if($i++==1)
                                <div class="swiper-slide text-center"><a href="{{$d->url}}" target="_blank"><img src="{{asset('partners/'.$d->logo)}}" alt="{{$d->name}}" class="img-responsive" width="130" style="margin: 0 auto"></a></div>
                                @else
                                <div class="swiper-slide text-center"><a href="{{$d->url}}" target="_blank"><img src="{{asset('partners/'.$d->logo)}}" alt="{{$d->name}}"  class="img-responsive" width="130" style="margin: 0 auto"></a></div>
                                @endif
                            @endforeach
                            </div>
                        </div>  
                        <div class="swiper-pager">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 b mobile">
                <div id="carousel1" class="swiper-container">
                        <div class="swiper-wrapper"> 
                            <?php $i=1;?>
                            @foreach($partners as $d)
                                @if($i++==1)
                                <div class="swiper-slide text-center"><a href="{{$d->url}}" target="_blank"><img src="{{asset('partners/'.$d->logo)}}" alt="{{$d->name}}" class="img-responsive" width="150" style="margin: 0 auto" ></a></div>
                                @else
                                <div class="swiper-slide text-center"><a href="{{$d->url}}" target="_blank"><img src="{{asset('partners/'.$d->logo)}}" alt="{{$d->name}}"  class="img-responsive" width="150" style="margin: 0 auto" ><a/></div>
                                @endif
                            @endforeach
                            </div>
                        </div>  
                        <div class="swiper-pager">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <p></p>
    <script src="{{asset('front/owl.carousel.min.js')}}"></script>
    <!-- /.container -->
    <script type="text/javascript">
        $('#carousel0').swiper({
            mode: 'horizontal',
            slidesPerView: 5,
            pagination: '.carousel0',
            paginationClickable: true,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            autoplay: 2500,
            loop: true,

        });
        $('#carousel1').swiper({
        mode: 'horizontal',
        slidesPerView: 1,
        pagination: '.carousel0',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        autoplay: 2500,
        loop: true,
    });
    </script>
  
  <footer class="bg-default">
  <div class="container">
     <div class="col-md-12">
         <div class="row">
           <?php $socials = DB::table('socials')->orderBy('order_number', 'asc')->where('active',1)->get();?>
          <div class="col-md-4">
              <h5 class="text-footer"> Socail Network</h5>
              <aside>
                  @foreach($socials as $soc)
                  <a href="{{$soc->url}}" target="_blank">
                      <img src="{{asset('img/'.$soc->icon)}}" alt="">
                  </a>
                  @endforeach
              </aside> 
          </div>
          <div class="col-md-4">
              <h5 class="text-footer"> Our Services</h5>
              <i class="fa fa-bullhorn"></i>&nbsp;&nbsp;Announcement and Consultant  <br>
              <i class="fa fa-compass"></i>&nbsp;&nbsp;Assisting Company Recruitment <br>
              <i class="fa fa-edit"></i>&nbsp;&nbsp;Provide AML and Skills Training 
          </div>
          <div class="col-md-4">
              <h5 class="text-footer">Contact Us</h5>
              <aside><i class="fa fa-phone"></i>&nbsp;&nbsp;855 93 909 242 / 855 17 909 938</aside> 
              <aside><i class="fa fa-phone"></i>&nbsp;&nbsp;855 86 886 637 / 855 98 900 190</aside> 
              <aside><i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href="mailto:mtc@masterjobscambodia.com" class="text-white">mtc@masterjobscambodia.com</a></aside> 
          </div> 
         </div>
     </div>
  </div>
  </footer>
    <script src="{{asset('front/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('front/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('front/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('front/js/main.js')}}"></script>
    <script>
        
        function chLang(evt, ln)
        {
            evt.preventDefault();
            $.ajax({
                type: "GET",
                url: "{{url('/')}}" + "/language/" + ln,
                success: function(sms){
                    if(sms>0)
                    {
                        location.reload();
                    }
                }
            });
        }
    </script>
  </body>
</html>
