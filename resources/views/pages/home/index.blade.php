@extends('layouts.master')


@section('content')

@include('includes.banner')

<!-- About Section Two -->
<section class="about-section-two">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content-block">
                    <div class="sec-title mb-30">
                        <div class="sub-title">About Us</div>
                        <h2>Welcome To<br>Sampaada HR Services</h2>
                    </div>

                    <div class="text">Nunc quam arcu, pretium quis quam sed, laoret efficitur liquam volutpat. lobortis
                        sem consequat consequat imperdiet. In nulla sed viveraut lorem tetur diam nunc bibendum
                        imperdiets. Lorem ipsum dolor sit amet cons isicing elit usmod tempor incididunt labore
                        consequat.</div>
                    <div class="bottom-content">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="signature"><img src="{{ asset('assets/images/resource/sign.png') }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="author-info">
                                    <h4>Tamy Robinson</h4>
                                    <div class="designation">C.E.O Drivega</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="consult-form-wrapper">
                    <div class="top-content">
                        <h3>Need Assistance ?</h3>
                        <div class="text">Nunc quam ar pretium quis lobortis consequat</div>
                    </div>
                    <div class="consult-form">

                        <form method="post" id="mainForm1" onsubmit="formHandler(event)">
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input id="fname" name="fname" placeholder="First Name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="lname" name="lname" placeholder="Last Name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="email" name="email" placeholder="Email" type="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="phone" name="phone" placeholder="Phone" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <input id="service" name="service" placeholder="Service You’re Interested In" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea id="message" name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit"
                                        class="theme-btn btn-style-one style-three"><span>Enquire</span></button>
                                </div>
                            </div>
                            <div class="text">Offering Call Assistance <a href="tel:+17003330088"><span
                                        class="fas fa-phone-volume"></span>+1 (700) 333 0088</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Working Process section -->
<section class="working-process-section">
    <!-- <div class="background-icon"><img src="{{ asset('assets/images/icons/icon-12.png') }}" alt=""></div> -->
    <div class="auto-container">
        <div class="top-content">
            <div class="sec-title text-center mb-30">
                <div class="sub-title">Procedure</div>
                <h2>How Sampaada HR Services Works</h2>
            </div>
            <div class="text text-center">Aute irure dolor reprehenderit cepteur sint ocaecat cupidatate <br> sed ipsum
                non proident int sunt indys culpa quis. </div>
        </div>
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-4 col-md-6 process-block">
                    <div class="inner-box">
                        <div class="count">01</div>
                        <div class="content">
                            <div>
                                <h4>Select a Service</h4>
                                <div class="text">Nunc quam ar pretium quis <br> lobortis sel consequat conse <br> tetur
                                    diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 process-block active">
                    <div class="inner-box">
                        <div class="count">02</div>
                        <div class="content">
                            <div>
                                <h4>Fill The Form</h4>
                                <div class="text">Nunc quam ar pretium quis <br> lobortis sel consequat conse <br> tetur
                                    diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 process-block">
                    <div class="inner-box">
                        <div class="count">03</div>
                        <div class="content">
                            <div>
                                <h4>Rest Leave It To Our <br> EXPERTS</h4>
                                <div class="text">Nunc quam ar pretium quis <br> lobortis sel consequat conse <br> tetur
                                    diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@include('includes.dedicated_services')




<section class="working-process-section">
    <div class="auto-container">
        <div class="top-content">
            <div class="sec-title text-center mb-30">
                <div class="sub-title">WHY US</div>
                <h2>Why Choose Sampaada HR Services</h2>
            </div>
            <div class="text text-center">Aute irure dolor reprehenderit cepteur sint ocaecat cupidatate <br> sed ipsum
                non proident int sunt indys culpa quis. </div>
        </div>
        <div class="course-details mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Single Contact Person</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">You will talk to a specific person every time you contact us. So you need
                                not explain your queries each time.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Open Pricing Always</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">As Opposed to market standards, Our price is listed on our page anad we do
                                not
                                have any hidden fees</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Timely Submission</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">As Opposed to market standards, Our price is listed on our page anad we do
                                not
                                have any hidden fees</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Complete Online Process</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">You will talk to a specific person every time you contact us. So you need
                                not explain your queries each time.</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Unlimited Consultation</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">As Opposed to market standards, Our price is listed on our page anad we do
                                not
                                have any hidden fees</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                    <div class="text-block">
                        <div class="top-content">
                            <h4>Team Of Professional</h4>
                        </div>
                        <div class="bottom-content">
                            <div class="text">As Opposed to market standards, Our price is listed on our page anad we do
                                not
                                have any hidden fees</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="cta-section" style="background-image: url({{ asset('assets/images/background/bg-2.jpg') }});">
    <div class="auto-container">
        <h5>How WE MAKE A DIFFERENCE</h5>
        <h2>We Give Best Guidence To Each Student, <br> That’s Why We Produce Confident & Safe Drivers </h2>
        <div class="link-box">
            <a href="#" class="theme-btn btn-style-one"><span>Apply Now</span></a>
        </div>
    </div>
</section> -->


<section class="info-form-section" style="background-image: url({{ asset('assets/images/background/bg-2.jpg') }});">
        <!-- <div class="signal-image-one" data-parallax='{"x": -30}'><img src="{{ asset('assets/images/resource/image-1.png') }}" alt=""></div>
        <div class="signal-image-two" data-parallax='{"x": 30}'><img src="{{ asset('assets/images/resource/image-2.png') }}" alt=""></div> -->
        <div class="auto-container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content-block">
                        <div class="sec-title light mb-30">
                            <div class="sub-title">Have queries ?</div>
                            <h2>Get In Touch <br> With Us</h2>
                        </div>
                        <div class="text mb-30">Nunc quam arcu, pretium quis quam sed, laoreet efficitur aliquam  lobortis sem consequat consequat imperdiet. Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididug ut labore et dolore magna aliqua veniam. </div>
                        <ul class="list">
                            <li>Driving school approved online booking</li>
                            <li>Lessons & courses 7 days a week</li>
                            <li>Special weekend classes for busy people</li>
                            <li>Flexibility, Reliability, Patience service</li>
                            <li>Road Test Preparation with 98% success</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="consult-form">
                        <h3>Contact Us</h3>
                        <div class="text">Nunc quam ar pretium quis lobortis consequat</div>
                        <form method="post" id="mainForm2" onsubmit="formHandler2(event)">
                        <input type="hidden" name="_token2" id="token2" value="{{ csrf_token() }}">   
                        <div class="row">
                                <div class="form-group col-md-6">
                                    <input id="fname2" name="fname2" placeholder="First Name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="lname2" name="lname2" placeholder="Last Name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="email2" name="email2" placeholder="Email" type="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="phone2" name="phone2" placeholder="Phone" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <input id="service2" name="service2" placeholder="Service You’re Interested In" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea id="message2" name="message2" placeholder="Massage"></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="theme-btn btn-style-one"><span>Enquire</span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<section class="services-section">
        <div class="auto-container">
            <div class="row no-gutters">
                <div class="service-block-one col-lg-3 col-md-6">
                    <div class="inner-box local-box">
                        <div class="icon">
                            <img src="{{ asset('assets/images/main/1.png') }}" alt="">
                            <div class="hover-icon"><img src="{{ asset('assets/images/main/1.png') }}" alt=""></div>
                        </div>
                        <div class="lower-content">
                            <div class="read-more-btn">
                                <h4>Virtual Classroom <br> Training Facility</h4>
                                <div class="text">Nunc quam ar pretium quis
                                    lobortis sel consequat conse
                                    tetur diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one col-lg-3 col-md-6">
                    <div class="inner-box local-box">
                        <div class="icon">
                            <img src="{{ asset('assets/images/main/2.png') }}" alt="">
                            <div class="hover-icon"><img src="{{ asset('assets/images/main/2.png') }}" alt=""></div>
                        </div>
                        <div class="lower-content">
                            <div class="read-more-btn">
                                <h4>Virtual Classroom <br> Training Facility</h4>
                                <div class="text">Nunc quam ar pretium quis
                                    lobortis sel consequat conse
                                    tetur diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one col-lg-3 col-md-6">
                    <div class="inner-box local-box">
                        <div class="icon">
                            <img src="{{ asset('assets/images/main/3.png') }}" alt="">
                            <div class="hover-icon"><img src="{{ asset('assets/images/main/3.png') }}" alt=""></div>
                        </div>
                        <div class="lower-content">
                            <div class="read-more-btn">
                                <h4>Virtual Classroom <br> Training Facility</h4>
                                <div class="text">Nunc quam ar pretium quis
                                    lobortis sel consequat conse
                                    tetur diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="service-block-one col-lg-3 col-md-6">
                    <div class="inner-box local-box">
                        <div class="icon">
                            <img src="{{ asset('assets/images/main/5.png') }}" alt="">
                            <div class="hover-icon"><img src="{{ asset('assets/images/main/5.png') }}" alt=""></div>
                        </div>
                        <div class="lower-content">
                            <div class="read-more-btn">
                                <h4>Virtual Classroom <br> Training Facility</h4>
                                <div class="text">Nunc quam ar pretium quis
                                    lobortis sel consequat conse
                                    tetur diam nuc bibend.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- <section class="working-process-section">
    <div class="auto-container">
        <div class="flex flex-center">
            <img src="{{ asset('assets/images/banner.webp') }}" alt="">
        </div>
        <div class="row mt-5">
            <div class="col-lg-4 col-md-6 col-sm-12 col-india">
                <div class="col-india-inner" style="background-image: url({{ asset('assets/images/1.jpeg') }});">
                    <p><strong>We support the Startup India initiative that aims to accelerate entrepreneurship in the
                            country and create startups.</strong></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-india">
                <div class="col-india-inner" style="background-image: url({{ asset('assets/images/2.jpeg') }});">
                    <p><strong>We support the Digital India initiative for digitizing Government activities and helping
                            improve digital literarcy.</strong></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-india">
                <div class="col-india-inner" style="background-image: url({{ asset('assets/images/3.webp') }});">
                    <p><strong>We support the Make in India initiative that encourages and facilitates foreign
                            investment into the country.</strong></p>
                </div>
            </div>
        </div>
    </div>
</section> -->


<!-- Funfacts Section -->
<section class="funfacts-section">
    <div class="auto-container">
        <div class="row">
            <!--Column-->
            <div class="column counter-column col-lg-4 col-md-6">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon-outer">
                        <div class="icon"><img src="{{ asset('assets/images/icons/icon-9.png') }}" alt=""></div>
                        <div class="hover-icon"><img src="{{ asset('assets/images/icons/icon-9.png') }}" alt=""></div>
                    </div>
                    <div class="content">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="3000" data-stop="100">0</span><span>+</span>
                        </div>
                        <div class="text">Cities Present</div>
                    </div>
                </div>
            </div>
            <!--Column-->
            <div class="column counter-column col-lg-4 col-md-6">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon-outer">
                        <div class="icon"><img src="{{ asset('assets/images/icons/icon-10.png') }}" alt=""></div>
                        <div class="hover-icon"><img src="{{ asset('assets/images/icons/icon-10.png') }}" alt=""></div>
                    </div>
                    <div class="content">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="3000" data-stop="450">0</span><span>+</span>
                        </div>
                        <div class="text">Happy Customers <br> Nationwide</div>
                    </div>
                </div>
            </div>
            <!--Column-->
            <div class="column counter-column col-lg-4 col-md-6">
                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <div class="icon-outer">
                        <div class="icon"><img src="{{ asset('assets/images/icons/icon-11.png') }}" alt=""></div>
                        <div class="hover-icon"><img src="{{ asset('assets/images/icons/icon-11.png') }}" alt=""></div>
                    </div>
                    <div class="content">
                        <div class="count-outer count-box">
                            <span class="count-text" data-speed="3000" data-stop="6">0</span><span>Yrs</span>
                        </div>
                        <div class="text">Our Experience</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Testimonials section -->
<section class="testimonials-section">
    <div class="sec-bg" style="background-image: url({{ asset('assets/images/background/bg-5.jpg') }});"></div>
    <div class="auto-container">
        <div class="top-content">
            <div class="sec-title text-center mb-30">
                <div class="sub-title">What our clients are saying</div>
                <h2>Customer Testimonials</h2>
            </div>
            <div class="text">Aute irure dolor reprehenderit cepteur sint ocaecat cupidatate <br> sed ipsum non proident
                int sunt indys culpa quis. </div>
        </div>
        <div class="row">
            <div class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "1" }, "1200":{ "items" : "2" }}}'>
                @foreach($testimonial as $tm)
                <div class="col-lg-12 testimonial-block">
                    <div class="inner-box">
                        <div class="author-info">
                            <div class="thumb"><img src="{{url('testimonial/'.$tm->image)}}" alt="">
                            </div>
                            <h4>{{$tm->name}}</h4>
                            <div class="location">{{$tm->place}}</div>
                        </div>
                        <div class="content">
                            <div class="rating-info">
                                <div class="rating">
                                    @for($i=0;$i<$tm->rating;$i++)
                                    <span class="fas fa-star"></span>
                                    @endfor
                                </div>
                            </div>
                            <div class="text">{{$tm->message}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        <div class="brand-logo">
            <div class="theme_carousel owl-theme owl-carousel"
                data-options='{"loop": true, "center": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 6000, "smartSpeed": 1000, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "3" } , "992":{ "items" : "3" }, "1200":{ "items" : "4" }}}'>
                <div class="single-logo"><img src="{{ asset('assets/images/resource/client-logo-1.jpg') }}" alt="">
                </div>
                <div class="single-logo"><img src="{{ asset('assets/images/resource/client-logo-2.jpg') }}" alt="">
                </div>
                <div class="single-logo"><img src="{{ asset('assets/images/resource/client-logo-3.jpg') }}" alt="">
                </div>
                <div class="single-logo"><img src="{{ asset('assets/images/resource/client-logo-4.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


@stop

@section('javascript')
@include('admin.pages.javascript.post_js')
@include('admin.pages.javascript.validation_js')
@include('admin.pages.javascript.error_js')

<script>
    function formHandler(e){
        e.preventDefault();
        let fname = document.getElementById('fname').value
        if(!(textValidation(fname, 'first name'))){return false;}
        let lname = document.getElementById('lname').value
        if(!(textValidation(lname, 'last name'))){return false;}
        let email = document.getElementById('email').value
        if(!(textValidation(email, 'email'))){return false;}
        let phone = document.getElementById('phone').value
        if(!(numberValidation(phone, 'phone'))){return false;}
        let service = document.getElementById('service').value
        if(!(textValidation(service, 'service'))){return false;}
        let message = document.getElementById('message').value
        if(!(textValidation(message, 'message'))){return false;}
        let _token = document.getElementsByName('_token')[0].value

        let formData = new FormData()
        formData.append('fname',fname)
        formData.append('lname',lname)
        formData.append('email',email)
        formData.append('phone',phone)
        formData.append('service',service)
        formData.append('message',message)
        formData.append('_token',_token)

        postData("{{route('enquiry_create')}}", formData)
            .then(data => {
                // console.log(data); // JSON data parsed by `data.json()` call

                if(data?.error?.fname){
                errorCheck(data?.error?.fname)
                return;
                }

                if(data?.error?.lname){
                errorCheck(data?.error?.lname)
                return;
                }

                if(data?.error?.email){
                errorCheck(data?.error?.email)
                return;
                }

                if(data?.error?.phone){
                errorCheck(data?.error?.phone)
                return;
                }

                if(data?.error?.service){
                errorCheck(data?.error?.service)
                return;
                }

                if(data?.error?.message){
                errorCheck(data?.error?.message)
                return;
                }

                if(data?.success){
                    tata.success('Success', 'Data stored successfully', {
                            duration: 10000,
                            animate: 'slide',
                    })
                    document.getElementById('mainForm1').reset();
                }

            })
    }

    function formHandler2(e){
        e.preventDefault();
        let fname2 = document.getElementById('fname2').value
        if(!(textValidation(fname2, 'first name'))){return false;}
        let lname2 = document.getElementById('lname2').value
        if(!(textValidation(lname2, 'last name'))){return false;}
        let email2 = document.getElementById('email2').value
        if(!(textValidation(email2, 'email'))){return false;}
        let phone2 = document.getElementById('phone2').value
        if(!(numberValidation(phone2, 'phone'))){return false;}
        let service2 = document.getElementById('service2').value
        if(!(textValidation(service2, 'service'))){return false;}
        let message2 = document.getElementById('message2').value
        if(!(textValidation(message2, 'message'))){return false;}
        let _token2 = document.getElementsByName('_token2')[0].value

        let formData = new FormData()
        formData.append('fname',fname2)
        formData.append('lname',lname2)
        formData.append('email',email2)
        formData.append('phone',phone2)
        formData.append('service',service2)
        formData.append('message',message2)
        formData.append('_token',_token2)

        postData("{{route('enquiry_create')}}", formData)
            .then(data => {
                // console.log(data); // JSON data parsed by `data.json()` call

                if(data?.error?.fname){
                errorCheck(data?.error?.fname)
                return;
                }

                if(data?.error?.lname){
                errorCheck(data?.error?.lname)
                return;
                }

                if(data?.error?.email){
                errorCheck(data?.error?.email)
                return;
                }

                if(data?.error?.phone){
                errorCheck(data?.error?.phone)
                return;
                }

                if(data?.error?.service){
                errorCheck(data?.error?.service)
                return;
                }

                if(data?.error?.message){
                errorCheck(data?.error?.message)
                return;
                }

                if(data?.success){
                    tata.success('Success', 'Data stored successfully', {
                            duration: 10000,
                            animate: 'slide',
                    })
                    document.getElementById('mainForm2').reset();
                }

            })
    }
</script>
@stop