@extends('admin.layouts.master')


@section('content')

@include('admin.pages.user.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Change Password</h5>

              <!-- General Form Elements -->
              <form method="POST" action="{{route('user_update_password')}}" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf
                <div class="row mb-3">
                  <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" value="{{old('current_password')}}" required>
                    <div class="invalid-feedback">Please enter the current passwod!</div>
                    @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" value="{{old('new_password')}}" required>
                    <div class="invalid-feedback">Please enter the new passwod!</div>
                    @error('new_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="confirm_password" class="col-sm-2 col-form-label">Confirm New Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" id="confirm_password" name="confirm_password" value="{{old('confirm_password')}}" required>
                    <div class="invalid-feedback">Please enter the confirm new passwod!</div>
                    @error('confirm_password')
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
