<section class="driving-courses-section style-two">
        <div class="auto-container">
            <div class="outer-box">
                <div class="flex flex-end">
                    <div class="link-btn mb-3"><button class="theme-btn btn-style-one style-three search-toggler"><span>Apply For Multiple Services</span></button></div>
                </div>
                <div class="row">
                    @foreach ($service_sub_category->Service as $item)
                    <div class="col-lg-4 course-block special">
                        <div class="inner-box">
                            <div class="image"><img src="{{url('service/'.$item->image)}}" alt=""></div>
                            <div class="lower-content">
                                <h4><a href="{{route('product',$item->id)}}">{{$item->title}}</a></h4>
                                <div class="text">{{$item->description}}</div>
                                
                                <div class="link-btn"><a href="{{route('product',$item->id)}}" class="theme-btn btn-style-one style-three"><span>Apply Now</span></a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                    
                </div>
            </div>
        </div>
    </section>