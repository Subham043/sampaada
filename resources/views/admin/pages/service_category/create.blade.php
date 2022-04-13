@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service_category.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Create Service Category</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('service_category_create')}}" class="needs-validation" enctype="multipart/form-data" novalidate>
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
