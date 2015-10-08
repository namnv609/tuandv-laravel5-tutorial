@extends('layouts.admin.default')

@section('top_buttons')
    {!! Html::link(
        url('admin/categories'),
        trans('admin.create.btn_back'),
        [
            'class' => 'btn btn-info'
        ]
    ) !!}
@endsection

@section('page_header')
    {{ trans('admin.edit.heading') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['role' => 'form']) !!}

            <div class="form-group">
                <label>{{ trans('admin.edit.name') }}</label>
                {!! Form::text('name', $category->name, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('admin.buttons.save'), [
                    'name' => 'edit',
                    'class' => 'btn btn-primary'
                ]) !!}
                
                {!! Form::submit(trans('admin.buttons.delete'), [
                    'name'=> 'delete',
                    'class' => 'btn btn-primary',
                    'onclick' => 'return confirm("Do you want delete?")',
                    'type' => 'submit',
                ]) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection



