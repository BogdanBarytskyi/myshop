<!DOCTYPE html>
<html lang="en">
<head>
 @include('partials._head')
</head>

<body>

@include('partials._nav')
<div class="container">
    <div class="row row-offcanvas row-offcanvas-right">

        {{--<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">--}}
            {{--<div class="list-group">--}}
                {{--<h3>Каталог</h3>--}}
                {{--<a href="#" class="list-group-item active">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
                {{--<a href="#" class="list-group-item">Link</a>--}}
            {{--</div>--}}
        {{--</div><!--/.sidebar-offcanvas-->--}}
        @yield('sitebar')

        <div class="col-xs-12 col-sm-9">

            @yield('content')
        </div>
    </div>
    @include('partials._footer')
</div>



@include('partials._javascript')

</body>
</html>