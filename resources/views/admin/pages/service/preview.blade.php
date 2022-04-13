@extends('layouts.master')



@section('content')

@include('includes.hero')

<section class="sidebar-page-container">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-7">
                <div class="course-details">
                    <div class="image"><img src="{{url('service/'.$service->image)}}" alt=""></div>
                    <h3>{{$service->heading}}</h3>
                    <div class="text mb-40">
                        {!! $service->content !!}
                        <h4>Price : <strong>INR {{$service->price}}</strong></h4>
                    </div>
                    
                    @if($service->ServiceDocument->count()>0)
                    <div class="group-title">
                        <h4>Documents Required For {{$service->heading}}</h4>
                    </div>
                    <div class="text">Nunc quam arc pretium quis quam sed laoret efficy tur liquam volutpat
                        lobortis sem consets. </div>
                    
                    <ul class="list">
                        @foreach($service->ServiceDocument as $service_document)
                        <li>{{$service_document->document}}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            <div class="col-lg-5">
                <aside class="sidebar sidebar-style-two position-relative">
                    <section class="about-section-two  main-form">
                        <div class="auto-container">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="consult-form-wrapper">
                                        <div class="top-content">
                                            <h3>Get Started</h3>
                                            <div class="text">Nunc quam ar pretium quis lobortis consequat</div>
                                        </div>
                                        <div class="consult-form">

                                            <form action="#" class="">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <input placeholder="First Name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input placeholder="Last Name" type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input placeholder="Email" type="email">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input placeholder="Phone" type="text">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <input placeholder="Service You’re Interested In" type="text"
                                                            value="{{$service->title}}" readonly disabled>
                                                    </div>
                                                    @if($allActiveService->count()>0)
                                                    <div class="form-group col-md-12">
                                                        <label><b>Other Related Services You Might Like</b></label>
                                                        @foreach($allActiveService as $listAll)
                                                        <label class="custom-check">
                                                            <input type="checkbox" name="" id="">{{$listAll->title}}
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                    @endif
                                                    <div class="form-group col-md-12">
                                                        <button type="submit"
                                                            class="theme-btn btn-style-one style-three"><span>Apply</span></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </aside>
            </div>
            <div class="col-lg-12">
                <div class="course-details">
                    <div class="group-title">
                        <h4>{{$service->heading}} Features</h4>
                    </div>
                    <div class="text">{!! $service->feature !!}</div>
                    <!-- <ul class="list-two">
                        <li>5 Hour Pre License CB-009 Course</li>
                        <li>Car To Practice In (Automatic Transmission Only)</li>
                        <li>Road Test Appointment </li>
                    </ul> -->
                    <!-- <table class="table">
                        <tbody>
                            <tr>
                                <td>For 5 Hours Training:</td>
                                <td><strong>$500.00</strong></td>
                            </tr>
                            <tr>
                                <td>For 7.5 Hours (Five Lessons of 1 Hour)</td>
                                <td><strong>$875.00</strong></td>
                            </tr>
                            <tr>
                                <td>For 10 Hours Training:</td>
                                <td><strong>$900.00</strong></td>
                            </tr>
                            <tr>
                                <td>Include Road Test Package:</td>
                                <td><strong>$450.00</strong></td>
                            </tr>
                            <tr>
                                <td>Road test package includes:</td>
                                <td>
                                    <div class="text">90 MIn Simulated Road Test <br> Free Road Testa Appointment (3
                                        Weeks) <br> Car Rental For Test</div>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->
                </div>
            </div>
            @if($service->ServiceFaq->count()>0)
            <div class="col-lg-12">
                <div class="course-details">
                    <div class="group-title">
                        <h4>Proprietorship FAQ's</h4>
                    </div>
                    <div class="text-block-two">
                        <div class="row mb-20">
                            <div class="col-md-12 left-column">
                                <ul class="accordion-box">
                                    <!--Accordion Block-->
                                    
                                    @foreach($service->ServiceFaq as $faq)
                                    <li class="accordion block">
                                        <div class="acc-btn">
                                            <div class="icon-outer"><span class="flaticon-long-right-arrow"></span>
                                            </div>{{$faq->faq_question}}
                                        </div>
                                        <div class="acc-content">
                                            <div class="content">
                                                <div class="text">
                                                    {{$faq->faq_answer}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    
                                    <!-- End Block -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($service_sub_category->count()>0)
            <div class="col-lg-12">
                <div class="course-details">

                    <div class="group-title">
                        <h4>Related Services</h4>
                    </div>
                    <div class="text">In nulla sed viveraut lorem tetur diam nunc bibendum imperdiets. Lorem ipsum dolor
                        sit amet, consectes tur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore
                        magna aliqua.</div>
                    <div class="project-tab">


                        <div class="outer-box">
                            <!--Tabs Content-->
                            <div class="p-tabs-content">
                                <!--Project Tab / Active Tab-->
                                <div class="p-tab active-tab" id="p-tab-1">
                                    <div class="row row-10">
                                        <div class="theme_carousel owl-theme owl-carousel"
                                            data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                                            @foreach($service_sub_category as $activeService)
                                            <div class="col-md-12 course-block">
                                                <div class="text-block">
                                                    <div class="top-content">
                                                        <h4>{{$activeService->title}}</h4>
                                                    </div>
                                                    <div class="bottom-content">
                                                        <div class="text">{{$activeService->description}}</div>
                                                        <div class="link-btn"><a href="{{route('product',$activeService->id)}}">Apply Now <i
                                                                    class="flaticon-long-right-arrow"></i></a></div>
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

                </div>
            </div>
            @endif
        </div>
    </div>
</section>

@stop