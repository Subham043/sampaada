@extends('admin.layouts.master')


@section('content')

@include('admin.pages.enquiry.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Enquiry</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('enquiry_edit',$enquiry->id)}}" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
                <div class="row mb-3">
                  <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('fname') is-invalid @enderror" id="fname" name="fname" value="{{$enquiry->fname}}" required>
                    <div class="invalid-feedback">Please enter the first name!</div>
                    @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('lname') is-invalid @enderror" id="lname" name="lname" value="{{$enquiry->lname}}" required>
                    <div class="invalid-feedback">Please enter the last name!</div>
                    @error('lname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$enquiry->email}}" required>
                    <div class="invalid-feedback">Please enter the email!</div>
                    @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="email" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{$enquiry->phone}}" required>
                    <div class="invalid-feedback">Please enter the phone!</div>
                    @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="service" class="col-sm-2 col-form-label">Service</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('service') is-invalid @enderror" id="service" name="service" value="{{$enquiry->service}}" required>
                    <div class="invalid-feedback">Please enter the service!</div>
                    @error('service')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="message" class="col-sm-2 col-form-label">Message</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('message') is-invalid @enderror" style="height: 100px" id="message" name="message" required>{{$enquiry->message}}</textarea>
                    <div class="invalid-feedback">Please enter the message!</div>
                    @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        

        </div>
      </div>
    </section>

    @stop
