@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service_request.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              
              <h5 class="card-title">Service Request Details</h5>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Full Name</div>
                <div class="col-lg-9 col-md-8">{{$service_request->fname}} {{$service_request->lname}}</div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Phone</div>
                <div class="col-lg-9 col-md-8">{{$service_request->phone}}</div>
              </div>
              
              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Email</div>
                <div class="col-lg-9 col-md-8">{{$service_request->email}}</div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Service</div>
                <div class="col-lg-9 col-md-8">
                  @foreach ($service_request->ServiceAddon as $item)
                  {{$item->Service->title}}, 
                  @endforeach
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Amount</div>
                <div class="col-lg-9 col-md-8">{{$service_request->ServicePayment->amount}}</div>
              </div>

              <div class="row mb-3">
                <div class="col-lg-3 col-md-4 label ">Status</div>
                @if($service_request->ServicePayment->payment_status == 1)
                <div class="col-lg-9 col-md-8">Paid</div>
                @else
                <div class="col-lg-9 col-md-8">Unpaid</div>
                @endif
              </div>

            </div>
          </div>

        </div>

        

        </div>
      </div>
    </section>

    @stop
