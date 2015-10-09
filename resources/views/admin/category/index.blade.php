@extends('layouts.admin.default')

@section('top_buttons')
    {!! Html::link(
        url('admin/categories/create'),
        trans('admin.category.index.add_new_category'),
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
                        <th>{{ trans('admin.category.index.title') }}</th>
                        <th>{{ trans('admin.category.index.updated_at') }}</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
            @if($categories->count())
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->id }}
                        </td>
                        <td>
                            {!! Html::link(
                                url('admin/categories/' . $category->id . '/edit'),
                                $category->name
                            ) !!}
                        </td>
                        <td>
                            {{ $category->updated_at }}
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                    <tr>
                        <td colspan="4"></td>
                    </tr>
                </tbody>
            @endif
            </table>
        </div>
    </div>
</div>
@endsection
