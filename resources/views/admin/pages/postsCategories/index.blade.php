@extends('admin.layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <a href="{{ route('admin.postsCategories.categories.create') }}" class="btn btn-primary float-right">Novo</a>
                        </div>
                    </div>
                    <h6 class="card-title">Posts</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Slug</th>
                                    <th>Cadastro</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ Helper::dateFormat($category->created_at) }}</td>
                                        <td>{{ 'Status' }}</td>
                                        <td width="1rem">
                                            <a href="{{ route('admin.postsCategories.categories.edit', ['id' => $category->id]) }}"><i
                                                    class="text-muted" data-feather="edit-2"></i></a>
                                            <a href="#" onclick="deleteSwal('{!! $category->getTable() !!}', {{ $category->id }})">
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


@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush