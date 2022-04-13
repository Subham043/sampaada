@extends('admin.layouts.master')


@section('content')

@include('admin.pages.testimonial.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Testimonial</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('testimonial_create')}}" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required>
                    <div class="invalid-feedback">Please enter the name!</div>
                    @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="place" class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{old('place')}}" required>
                    <div class="invalid-feedback">Please enter the place!</div>
                    @error('place')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="rating">Rating</label>
                  <div class="col-sm-10">
                    <select class="form-select @error('rating') is-invalid @enderror" aria-label="Default select example" id="rating" name="rating" required>
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                      <option value="4">Four</option>
                      <option value="5">Five</option>
                    </select>
                    <div class="invalid-feedback">Please enter the rating!</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="message" class="col-sm-2 col-form-label">Message</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('message') is-invalid @enderror" style="height: 100px" id="message" name="message" required>{{old('message')}}</textarea>
                    <div class="invalid-feedback">Please enter the message!</div>
                    @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required>
                    <div class="invalid-feedback">Please enter the image!</div>
                    @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Active</label>
                  <div class="col-sm-10">
                      <div class="form-check form-switch @error('active') is-invalid @enderror">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" checked>
                      </div>
                      <div class="invalid-feedback">Please enter the active!</div>
                      @error('active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Create</button>
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
