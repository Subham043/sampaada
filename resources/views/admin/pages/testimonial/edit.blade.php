@extends('admin.layouts.master')


@section('content')

@include('admin.pages.testimonial.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Testimonial</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('testimonial_edit',$testimonial->id)}}" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$testimonial->name}}" required>
                    <div class="invalid-feedback">Please enter the name!</div>
                    @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="place" class="col-sm-2 col-form-label">Place</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('place') is-invalid @enderror" id="place" name="place" value="{{$testimonial->place}}" required>
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
                      <option>Open this select menu</option>
                      <option value="1" {{ $testimonial->rating == 1 ? "selected" : "" }}>One</option>
                      <option value="2" {{ $testimonial->rating == 2 ? "selected" : "" }}>Two</option>
                      <option value="3" {{ $testimonial->rating == 3 ? "selected" : "" }}>Three</option>
                      <option value="4" {{ $testimonial->rating == 4 ? "selected" : "" }}>Four</option>
                      <option value="5" {{ $testimonial->rating == 5 ? "selected" : "" }}>Five</option>
                    </select>
                    <div class="invalid-feedback">Please enter the rating!</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="message" class="col-sm-2 col-form-label">Message</label>
                  <div class="col-sm-10">
                    <textarea class="form-control @error('message') is-invalid @enderror" style="height: 100px" id="message" name="message" required>{{$testimonial->message}}</textarea>
                    <div class="invalid-feedback">Please enter the message!</div>
                    @error('message')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="image" class="col-sm-2 col-form-label">File Upload</label>
                  <div class="col-sm-10">
                  <img src="{{url('testimonial/'.$testimonial->image)}}" class="mb-3" style="max-width:100%" alt="Profile">
                    <input class="form-control @error('image') is-invalid @enderror mt-2" type="file" id="image" name="image">
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
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active"  {{$testimonial->active == 1 ? 'checked' : '' }}>
                      </div>
                      <div class="invalid-feedback">Please enter the active!</div>
                      @error('active')
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
