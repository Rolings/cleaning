@extends('layouts.admin')
@section('title',$status)

@section('content')
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-md-11 col-lg-7 col-xl-6 mx-auto">
                <div class="app-branding text-center mb-5">
                    <a class="app-logo" href="{{ route('admin.dashboard.index') }}">

                        <span class="logo-text">EUROFRESH</span>
                        <p>cleaning</p>
                    </a>

                </div><!--//app-branding-->
                <div class="app-card p-5 text-center shadow-sm">
                    <h1 class="page-title mb-4">{{ $status }}<br><span class="font-weight-light">Page Not Found</span></h1>
                    <div class="mb-4">
                        Sorry, we can't find the page you're looking for.
                    </div>
                    <a class="btn app-btn-primary" href="{{ route('admin.dashboard.index') }}">Go to Dashboard</a>
                </div>
            </div><!--//col-->
        </div><!--//row-->
    </div><!--//container-->
@endsection
