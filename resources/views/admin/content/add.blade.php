@extends('layouts.admin.default')

@section('top_buttons')
    {!! Html::link(
        url('admin/contents'),
        trans('admin.content.create.btn_back'),
        [
            'class' => 'btn btn-info'
        ]
    ) !!}
@endsection

@section('page_header')
    {{ trans('admin.content.create.heading') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['role' => 'form']) !!}

            <div class="form-group">
                <label>{{ trans('admin.content.create.title') }}</label>
                {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                @if (count($errors) > 0 && $errors->has('title'))
                    <p class="has-error">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.content') }}</label>
                {!! Form::text('content', old('content'), ['class' => 'form-control']) !!}
                @if (count($errors) > 0 && $errors->has('title'))
                    <p class="has-error">{{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.category') }}</label>
                {!! Form::select('category_id', $categoriesSelect, ['class' => 'form-control']) !!}
                @if (count($errors) > 0 && $errors->has('category_id'))
                    <p class="has-error">{{ $errors->first('category_id') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.desc') }}</label>
                {!! Form::textarea('descreption', old('descreption'), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('admin.content.buttons.save'), [
                    'class' => 'btn btn-primary'
                ]) !!}
            </div>
            
            {!! Form::close() !!}
        </div>
    </div>
@endsection
