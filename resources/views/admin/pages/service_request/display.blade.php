@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service_request.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row flex-space-between align-items-center">
                <div class="col-lg-4">
                  <h5 class="card-title">Service Request</h5>
                </div>
                <div class="col-lg-4">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="get" action="{{route('service_request_view')}}">
                      <input type="text" name="search" placeholder="Search" title="Enter search keyword" value="@if(app('request')->has('search')) {{app('request')->input('search')}} @endif">
                      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Table with stripped rows -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Created On</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($service_request->count()==0)
                <tr>
                    <td colspan="6" style="text-align:center">No items to display</td>
                </tr>
                @endif
                @foreach ($service_request->items() as $item)
                    <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->fname }} {{ $item->lname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->ServicePayment->amount }}</td>
                    @if($item->ServicePayment->payment_status == 1)
                    <td><span class="badge bg-success">Paid</span></td>
                    @else
                    <td><span class="badge bg-danger">Unpaid</span></td>
                    @endif
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{route('service_request_view_id',$item->id)}}" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="view service request"><i class="ri-eye-line"></i></a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $service_request->links() }}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @stop
