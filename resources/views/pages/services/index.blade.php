@extends('layouts.master')


@section('content')

@include('includes.hero')

<div id="search-popup" class="search-popup">
    <div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <section class="about-section-two  main-form">
                <div class="auto-container">
                    <div class="row flex-center">

                        <div class="col-lg-8">
                            <div class="consult-form-wrapper">
                                <div class="top-content">
                                    <h3>Get Started</h3>
                                    <div class="text">Nunc quam ar pretium quis lobortis consequat</div>
                                </div>
                                <div class="consult-form">

                                    <form  method="POST" onsubmit="formHandler(event)" id="mainForm">
                                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">    
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <input placeholder="First Name" name="fname" id="fname" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input placeholder="Last Name" name="lname" id="lname" type="text">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input placeholder="Email" name="email" id="email" type="email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input placeholder="Phone" name="phone" id="phone" type="text">
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label><b>Select Services</b></label>
                                                @foreach ($service_sub_category->Service as $item)
                                                <label class="custom-check">
                                                    <input type="checkbox" name="service[]" id="service{{$item->id}}" value="{{$item->id}}">{{$item->title}}
                                                </label>
                                                @endforeach
                                            </div>
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
        </div>
    </div>
</div>

@include('includes.services')

@stop

@section('javascript')
@include('admin.pages.javascript.post_js')
@include('admin.pages.javascript.validation_js')
@include('admin.pages.javascript.error_js')

<script>
    function formHandler(e){
        e.preventDefault();
        let _token = document.getElementsByName('_token')[0].value
        let fname = document.getElementById('fname').value
        if(!(textValidation(fname, 'first name'))){return false;}
        let lname = document.getElementById('lname').value
        if(!(textValidation(lname, 'last name'))){return false;}
        let email = document.getElementById('email').value
        if(!(textValidation(email, 'email'))){return false;}
        let phone = document.getElementById('phone').value
        if(!(numberValidation(phone, 'phone'))){return false;}
        let service = document.getElementsByName('service[]')
        let service_count = 0;
        for (var i = 0; i < service.length; i++) {
            if(service[i].checked == true){
                // console.log(service[i].value);
                service_count++;
            }
        }
        if(service_count==0){
            tata.error('Error', 'Please select atleast one service', {
                duration: 10000,
                animate: 'slide',
            })
            return false;
        }

        let formData = new FormData()
        formData.append('fname',fname)
        formData.append('lname',lname)
        formData.append('email',email)
        formData.append('phone',phone)
        formData.append('_token',_token)
        for (var i = 0; i < service.length; i++) {
            if(service[i].checked == true){
                formData.append('service[]',service[i].value)
            }
        }

        postData("{{route('product_store_ajax')}}", formData)
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

                if(data?.success){
                    tata.success('Success', 'Data stored successfully', {
                            duration: 10000,
                            animate: 'slide',
                    })
                    document.getElementById('mainForm').reset();
                    window.location.replace("{{URL::to('/')}}/payment/"+data?.service_request.id);
                }

            })
    }

</script>
@stop