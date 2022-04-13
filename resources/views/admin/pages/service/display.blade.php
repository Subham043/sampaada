@extends('admin.layouts.master')


@section('content')

@include('admin.pages.service.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row flex-space-between align-items-center">
                <div class="col-lg-4">
                  <h5 class="card-title">Service</h5>
                </div>
                <div class="col-lg-4">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="get" action="{{route('service_view')}}">
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
                    <th scope="col">Title</th>
                    <th scope="col">Heading</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub-Category</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($service->count()==0)
                <tr>
                    <td colspan="8" style="text-align:center">No items to display</td>
                </tr>
                @endif
                @foreach ($service->items() as $item)
                    <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->heading }}</td>
                    <td>{{ $item->ServiceCategory->name }}</td>
                    <td>{{ $item->ServiceSubCategory->name }}</td>
                    @if($item->active == 1)
                    <td><span class="badge bg-success">Active</span></td>
                    @else
                    <td><span class="badge bg-danger">Inactive</span></td>
                    @endif
                    <td>
                        <a href="{{route('service_preview',$item->id)}}" target="_blank" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="service preview"><i class="ri-eye-line"></i></a>
                        <a href="{{route('service_copy',$item->id)}}" type="button" class="btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="copy service"><i class="ri-file-copy-2-line"></i></a>
                        <a href="{{route('service_edit',$item->id)}}" type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="edit service"><i class="ri-ball-pen-line"></i></a>
                        <button type="button" onclick="del({{ $item->id }})" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="delete service"><i class="ri-delete-bin-2-line"></i></button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $service->links() }}
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @stop


    @section('javascript')
      <script>
        function del(id){
          if (confirm("Are you sure you want to delete this?") == true) {
            window.location.replace("{{url('/')}}/admin/service/delete/"+id);
            return;
          }
          return false;
        }
      </script>
    @stop