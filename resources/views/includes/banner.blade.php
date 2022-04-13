<!-- Bnner Section -->
<section class="banner-section">
    <div class="swiper-container banner-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide"
                style="background-image: url({{ asset('assets/images/main-slider/banner.jpeg') }});">
                <div class="row banner-inner-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 banner-col-first">
                        <div class="content-outer">
                            <div class="content-box">
                                <div class="inner">
                                    <h1>Sampaada HR Services</h1>
                                    <div class="text">Mod tempor incididunt ut laboret dolore magna aliqua tenim <br>
                                        adnim veniam quis nostrud exercitation ullamco.
                                    </div>
                                    <div class="link-box">
                                        <a href="courses-1.html" class="theme-btn btn-style-one"><span>View
                                                Services</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 banner-col single-slider-service">
                        <div class="theme_carousel owl-theme owl-carousel"
                            data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "1" }, "1200":{ "items" : "1" }}}'>
                            @foreach ($service as $item)
                            <div class="col-lg-12 course-block">
                                <div class="inner-box">
                                    <div class="image"><img
                                            src="{{url('service/'.$item->image)}}"
                                            alt=""></div>
                                    <div class="lower-content">
                                        <h4><a href="{{route('product',$item->id)}}">{{$item->title}}</a></h4>
                                        <div class="text">{{$item->description}}</div>

                                        <div class="link-btn"><a href="{{route('product',$item->id)}}"
                                                class="theme-btn btn-style-one style-three"><span>Apply
                                                    Now</span></a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- <div class="banner-slider-nav">
            <div class="banner-slider-control banner-slider-button-prev"><span><i class="flaticon-left-arrow"></i></span></div>
            <div class="banner-slider-control banner-slider-button-next"><span><i class="flaticon-left-arrow"></i></span> </div>
        </div> -->
</section>
<!-- End Bnner Section -->