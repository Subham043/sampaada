<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/admin/assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/admin/assets/css/style.css') }}" rel="stylesheet">
  <style>
    #loader{
      position: fixed;
      top:0;
      left:0;
      z-index: 999;
      width:100%;
      min-height:100vh;
      background:rgba(0,0,0,0.5);
      display:none;
      place-items:center;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/images/logo.png') }}" alt="">
        <span class="d-none d-lg-block">Sampaada</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/admin/assets/img/admin-avatar.png') }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <!-- <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('user_change_password')}}">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{str_contains(Request::url(), 'dashboard') ? '' : 'collapsed'}}" href="{{route('dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        <a class="nav-link {{str_contains(Request::url(), 'enquiry') ? '' : 'collapsed'}}" href="{{route('enquiry_view')}}">
          <i class="ri-account-pin-circle-line"></i>
          <span>Enquries</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{str_contains(Request::url(), 'service-request') ? '' : 'collapsed'}}" href="{{route('service_request_view')}}">
          <i class="ri-inbox-unarchive-line"></i>
          <span>Service Request</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link  {{str_contains(Request::url(), 'service-category') ? '' : 'collapsed'}}" data-bs-target="#service-category-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-article-fill"></i><span>Service Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="service-category-nav" class="nav-content collapse  {{str_contains(Request::url(), 'service-category') ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('service_category_create')}}"  class="{{str_contains(Request::url(), 'service-category/create') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('service_category_view')}}"  class="{{str_contains(Request::url(), 'service-category/view') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link  {{str_contains(Request::url(), 'service-sub-category') ? '' : 'collapsed'}}" data-bs-target="#service-sub-category-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-book-read-fill"></i><span>Service Sub-Category</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="service-sub-category-nav" class="nav-content collapse  {{str_contains(Request::url(), 'service-sub-category') ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('service_sub_category_create')}}"  class="{{str_contains(Request::url(), 'service-sub-category/create') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('service_sub_category_view')}}"  class="{{str_contains(Request::url(), 'service-sub-category/view') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link  {{(Request::url() == 'service') || str_contains(Request::url(), 'service/') ? '' : 'collapsed'}}" data-bs-target="#service-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-article-line"></i><span>Service</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="service-nav" class="nav-content collapse  {{(Request::url() == 'service') || str_contains(Request::url(), 'service/') ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('service_create')}}"  class="{{str_contains(Request::url(), 'service/create') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('service_view')}}"  class="{{str_contains(Request::url(), 'service/view') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a class="nav-link  {{str_contains(Request::url(), 'testimonial') ? '' : 'collapsed'}}" data-bs-target="#testimonial-nav" data-bs-toggle="collapse" href="#">
          <i class="ri-message-line"></i><span>Testimonial</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="testimonial-nav" class="nav-content collapse  {{str_contains(Request::url(), 'testimonial') ? 'show' : ''}} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('testimonial_create')}}"  class="{{str_contains(Request::url(), 'testimonial/create') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>Create</span>
            </a>
          </li>
          <li>
            <a href="{{route('testimonial_view')}}"  class="{{str_contains(Request::url(), 'testimonial/view') ? 'active' : ''}}">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

  @yield('content')
  
  </main><!-- End #main -->
  <section id="loader">
    <div class="spinner-border text-info" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </section>
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Sampaada HR Services</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
  <script src="{{ asset('assets/admin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/admin/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/admin/assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/tata.js') }}"></script>
<script type="text/javascript">
  @if (session('success_status'))

    tata.success('Success', '{{ session('success_status') }}', {
        duration: 10000,
        animate: 'slide',
    })

    @endif
  @if (session('error_status'))

    tata.error('Error', '{{ session('error_status') }}', {
        duration: 10000,
        animate: 'slide',
    })

    @endif

    </script>
    @yield('javascript')
</body>

</html>