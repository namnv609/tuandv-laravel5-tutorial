@extends('layouts.admin.default')

@section('top_buttons')
    {!! Html::link(
        url('admin/contents/create'),
        trans('admin.content.index.add_new_content'),
        [
            'class' => 'btn btn-success'
        ]
    ) !!}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>NA</th>
                        <th>{{ trans('admin.content.index.title') }}</th>
                        <th>{{ trans('admin.content.index.content') }}</th>
                        <th>{{ trans('admin.content.index.category_id') }}</th>
                        <th>{{ trans('admin.content.index.category_name') }}</th>
                        <th>{{ trans('admin.content.index.descreption') }}</th>
                        <th>{{ trans('admin.content.index.updated_at') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            @if($contents->count())
                <tbody>
                @foreach ($contents as $content)
                    <tr>
                        <td>
                            {{ $content->id }}
                        </td>
                        <td>
                            {!! Html::link(
                                url('admin/contents/' . $content->id . '/edit'),
                                $content->title
                            ) !!}
                        </td>
                        <td>
                            {{ $content->content }}
                        </td>
                        <td>
                            {{ $content->category_id }}
                        </td>
                        <td>
                            {{ $content->category->name }}
                        </td>
                        <td>
                            {{ $content->descreption }}
                        </td>
                        <td>
                            {{ $content->updated_at }}
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="8"></td>
                    </tr>
                </tbody>
            @endif
            </table>
        </div>
    </div>
</div>
@endsection
