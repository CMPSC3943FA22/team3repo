<!DOCTYPE html>
<html lang="en">
@include('frontend/includes/head')
<body>
@include('frontend/includes/topbar')
@include('frontend/includes/navbar')
<div class="row">
    <div class="col-md-12">

        @if (Session::has('success'))
            <div class="alert alert-success">
                <i class="fa fa-check" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">
                <i class="fa fa-times" aria-hidden="true"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('error') }}
            </div>
        @endif
    </div>
</div>
@include('frontend/includes/checkout/breadcrumb')
@include('frontend/includes/checkout/form')
@include('frontend/includes/footer')
</body>
</html>