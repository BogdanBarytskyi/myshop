<!DOCTYPE html>
<html lang="en">
<head>
 @include('admin.partials._head')
</head>

<body>

@include('admin.partials._nav')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">
        @yield('sitebar')

        <div class="col-xs-12 col-sm-9">

            @yield('content')
        </div>
    </div>
    @include('admin.partials._footer')
</div>



@include('admin.partials._javascript')

</body>
</html>