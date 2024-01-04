@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="card-title">Posts</h6>
                        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Novo</a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Slug</th>
                                    <th>Categoria</th>
                                    <th>Cadastro</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ Helper::dateFormat($post->created_at) }}</td>
                                        <td>
                                            {!! Helper::checkStatus($post->getTable(), $post->active, $post->id) !!}
                                            {{-- <a href="javascript:void(0);" onclick="changeStatus('{!! $post->getTable() !!}', {{ $post->id }}, {{ $post->active }})" class="btn-change-status" id="btn-change-{{ $post->id }}">{!! Helper::checkStatus($post->active) !!}</a> --}}
                                        </td>
                                        </td>
                                        <td width="1rem">
                                            <a href="{{ route('admin.posts.edit', ['id' => $post->id]) }}"><i
                                                    class="text-muted" data-feather="edit-2"></i></a>
                                            <a href="#" onclick="deleteSwal('{!! $post->getTable() !!}', {{ $post->id }})">
                                                <i class="text-danger" data-feather="trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

