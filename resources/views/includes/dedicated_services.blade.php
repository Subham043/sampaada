<!-- Team Section -->
<section class="team-section">
    <div class="sec-bg" style="background-image: url({{ asset('assets/images/background/bg-5.jpg') }});"></div>
    <div class="auto-container">
        <div class="top-content">
            <div class="sec-title text-center mb-30">
                <div class="sub-title">services</div>
                <h2>Our Dedicated Services</h2>
            </div>
            <div class="text">Aute irure dolor reprehenderit cepteur sint ocaecat cupidatate <br> sed ipsum non proident
                int sunt indys culpa quis. </div>
        </div>
        <div class="row">
            @foreach ($service as $item)
            <div class="col-lg-3 team-block">
                <div class="inner-box">
                    <div class="image"><img src="{{url('service/'.$item->icon)}}" alt=""></div>
                    <div class="content">
                        <h4>{{$item->title}}</h4>
                    </div>
                    <div class="social-links">
                        <div class="link-btn"><a href="{{route('product', $item->id)}}"
                                class="theme-btn btn-style-one style-three"><span>Apply
                                    Now</span></a></div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>