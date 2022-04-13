@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service_sub_category.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Service Sub-Category</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('service_sub_category_edit',$service_sub_category->id)}}" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
                <div class="row mb-3">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$service_sub_category->name}}" required>
                    <div class="invalid-feedback">Please enter the name!</div>
                    @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="service_category_id">Service Category</label>
                  <div class="col-sm-10">
                    <select class="form-select @error('service_category_id') is-invalid @enderror" aria-label="Default select example" id="service_category_id" name="service_category_id" required>
                      <!-- <option {{$service_sub_category->service_category_id ? '' : 'selected'}} >Open this select menu</option> -->
                      @foreach ($service_category as $item)
                      <option value="{{$item->id}}"  {{$service_sub_category->service_category_id==$item->id ? 'selected' : ''}}>{{$item->name}}</option>
                      @endforeach
                    </select>
                    <div class="invalid-feedback">Please enter the service category!</div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Active</label>
                  <div class="col-sm-10">
                      <div class="form-check form-switch @error('active') is-invalid @enderror">
                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="active" {{$service_sub_category->active == 1 ? 'checked' : '' }} >
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
