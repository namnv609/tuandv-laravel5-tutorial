@extends('layouts.admin.default')

@section('top_buttons')
    {!! Html::link(
        url('admin/categories'),
        trans('admin.category.create.btn_back'),
        [
            'class' => 'btn btn-info'
        ]
    ) !!}
@endsection

@section('page_header')
    {{ trans('admin.category.create.heading') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['role' => 'form']) !!}

            <div class="form-group">
                <label>{{ trans('admin.category.create.name') }}</label>
                {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('admin.category.buttons.save'), [
                    'class' => 'btn btn-primary'
                ]) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
