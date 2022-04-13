@extends('admin.layouts.master')


@section('content')

@include('admin.pages.enquiry.includes.breadcrumb')

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="row flex-space-between align-items-center">
                <div class="col-lg-4">
                  <h5 class="card-title">Enquiry</h5>
                </div>
                <div class="col-lg-4">
                  <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="get" action="{{route('enquiry_view')}}">
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
                    <th scope="col">Created On</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @if($enquiry->count()==0)
                <tr>
                    <td colspan="6" style="text-align:center">No items to display</td>
                </tr>
                @endif
                @foreach ($enquiry->items() as $item)
                    <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->fname }} {{ $item->lname }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{route('enquiry_view_id',$item->id)}}" type="button" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="view enquiry"><i class="ri-eye-line"></i></a>
                        <a href="{{route('enquiry_edit',$item->id)}}" type="button" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="edit enquiry"><i class="ri-ball-pen-line"></i></a>
                        <button type="button" onclick="del({{ $item->id }})" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="delete enquiry"><i class="ri-delete-bin-2-line"></i></button>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              {{ $enquiry->links() }}
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
            window.location.replace("{{url('/')}}/admin/enquiry/delete/"+id);
            return;
          }
          return false;
        }
      </script>
    @stop