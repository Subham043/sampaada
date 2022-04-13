@extends('admin.layouts.master')


@section('content')

@include('admin.pages.enquiry.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Message</h5>
              <p class="small fst-italic">{{$enquiry->message}}</p>
              
              <h5 class="card-title">Enquiry Details</h5>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{$enquiry->fname}} {{$enquiry->lname}}</div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Phone</div>
                <div class="col-lg-9 col-md-8">{{$enquiry->phone}}</div>
              </div>
              
              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{$enquiry->email}}</div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Service</div>
                <div class="col-lg-9 col-md-8">{{$enquiry->service}}</div>
              </div>

            </div>
          </div>

        </div>

        

        </div>
      </div>
    </section>

    @stop
