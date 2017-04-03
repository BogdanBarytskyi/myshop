@extends('main')
@section('content')

<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('nerds') }}">Nerd Alert</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('admin/category') }}">Все категории</a></li>
            <li><a href="{{ URL::to('admin/category/create') }}">Создать категорию</a>
        </ul>
    </nav>

    <h1>Все категории</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Название</td>
            <td>Действие</td>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>


                <td>

                    <a class="btn btn-small btn-success" href="{{ URL::to('admin/category' . $value->id) }}">Посмотреть</a>


                    <a class="btn btn-small btn-info" href="{{ URL::to('admin/category/' . $value->id . '/edit') }}">Редактировать</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection