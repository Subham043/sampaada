@extends('layouts.master')


@section('content')

@include('includes.hero')

<section class="error-section">
        <div class="auto-container">
            <div class="content">
                <h1>404</h1>
                <h2>Oops! That page can’t be found</h2>
                <div class="text">Sorry, but the page you are looking for does not existing</div>
                <a href="{{route('home')}}" class="theme-btn btn-style-one"><span> Go to home page</span></a>
            </div>
        </div>
    </section>

@stop