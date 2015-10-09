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
    {{ trans('admin.content.edit.heading') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            {!! Form::open(['role' => 'form']) !!}

            <div class="form-group">
                <label>{{ trans('admin.content.edit.title') }}</label>
                {!! Form::text('title', $content->title, ['class' => 'form-control']) !!}
                @if (count($errors) > 0 && $errors->has('title'))
                    <p class="has-error">{{ $errors->first('title') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.content') }}</label>
                {!! Form::text('content', $content->content, ['class' => 'form-control']) !!}
                @if (count($errors) > 0 && $errors->has('content'))
                    <p class="has-error">{{ $errors->first('content') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.category') }}</label>
                {!! Form::select('category_id', $categoriesSelect, ['class' => 'form-control', $content->category_id]) !!}
                @if (count($errors) > 0 && $errors->has('category_id'))
                    <p class="has-error">{{ $errors->first('category_id') }}</p>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('admin.content.create.desc') }}</label>
                {!! Form::textarea('descreption', $content->descreption, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit(trans('admin.content.buttons.save'), [
                    'name' => 'edit',
                    'class' => 'btn btn-primary'
                ]) !!}
                
                {!! Form::submit(trans('admin.content.buttons.delete'), [
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
