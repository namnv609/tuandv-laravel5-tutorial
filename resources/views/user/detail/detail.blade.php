@extends('layouts.user.default')

@section('slide_bar')
@if ($categories->count())
    @foreach ($categories as $category)
    <li >
        <a href="{{ url('user/' . $category->id . '/category') }}">
            <i class="fa fa-fw fa-dashboard"></i> {{ $category->name }}
        </a>
    </li>
    @endforeach
@endif
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
                <h1>{{ $content->title }}</h1>
                <p>{{ $content->name }}</p>
                <p>{{ $content->descreption }}</p>
            </div><!-- /.col-xs-12 main -->
        </div>
    </div>
</div>
@endsection
