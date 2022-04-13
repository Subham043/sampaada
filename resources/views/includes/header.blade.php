<!-- Main Header -->
<header class="main-header header-style-one">

<!-- Header Top -->
<div class="header-top">
    <div class="auto-container">
        <div class="inner-container">
            <div class="left-column">
                <ul class="contact-info">
                    <li><a href="mailto:needhelp@company.com"><i class="pe-7s-paper-plane"></i>72 Main Drive, Calibry, FL</a></li>
                    <li><a href="tel:928886660000"><i class="pe-7s-mail-open"></i>learn.to.drive@drivega.com</a></li>
                    <li><i class="pe-7s-clock"></i>Mon - Fri : 9:00am to 7:00pm</li>
                </ul>
            </div>
            <div class="right-column">
                <ul class="social-icon">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                    <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Header Upper -->
<div class="header-upper">
    <div class="auto-container">
        <div class="inner-container">
            <!--Logo-->
            <div class="logo-box">
                <div class="logo"><a href="{{route('home')}}"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a></div>
            </div>
            <div class="right-column">
                
                
                <div class="navbar-right">
                    <div class="contact-info">
                        <div class="icon"><span class="fas fa-phone-volume"></span></div>
                        <div class="content">
                            <h5>Need Help? Call us</h5>
                            <h4><a href="tel:+1(700)3330088">+1 (700) 333 0088</a></h4>
                        </div>
                    </div>
                </div>
            </div> 
                                  
        </div>
    </div>

    <div class="nav-outer">
                    
                    <div class="mobile-nav-toggler"><img src="{{ asset('assets/images/icons/icon-bar.png') }}" alt=""></div>

                    
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation">      
                                @foreach ($service_category as $item)
                                <li class="dropdown"><a href="#">{{$item->name}}</a>
                                    @if($item->ServiceSubCategory->count()>0)
                                    <ul>
                                    @foreach ($item->ActiveServiceSubCategory as $service_sub_category)
                                    <li class="dropdown"><a href="{{route('category',$service_sub_category->id)}}">{{$service_sub_category->name}}</a>
                                        @if($item->Service->count()>0)
                                        <ul>
                                            @foreach ($item->ActiveService($item->id,$service_sub_category->id) as $service)
                                            <li><a href="{{route('product',$service->id)}}">{{$service->title}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                                
                                
                            </ul>
                        </div>
                    </nav>
                </div>
                
</div>
<!--End Header Upper-->

<!-- Sticky Header  -->
<div class="sticky-header">
    <div class="header-upper">
        <div class="auto-container">
            <div class="inner-container">
                <div class="right-column">
                    <!--Nav Box-->
                    <div class="nav-outer">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="{{ asset('assets/images/icons/icon-bar.png') }}" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                        </nav>
                    </div>
                </div>                       
            </div>
        </div>
    </div>
</div><!-- End Sticky Menu -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><span class="icon flaticon-remove"></span></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="{{ asset('assets/images/logo-2.png') }}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <!--Social Links-->
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                <li><a href="#"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->

<div class="nav-overlay">
    <div class="cursor"></div>
    <div class="cursor-follower"></div>
</div>
</header>
<!-- End Main Header -->
