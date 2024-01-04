@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Usuários</h6>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Cadastro</th>
                                    <th>Ultimo acesso</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ Helper::mask($user->phone, 'phone') }}</td>
                                        <td>{{ Helper::dateFormat($user->created_at) }}</td>
                                        <td>{{ $user->last_login_at != null ? Helper::dateFormat($user->last_login_at) : '' }}
                                        </td>
                                        <td width="1rem">
                                            <a href="{{ route('admin.profile', ['id' => $user->id]) }}"><i
                                                    class="text-muted" data-feather="edit-2"></i></a>
                                            <a href="#" onclick="deleteSwal('{!! $user->getTable() !!}', {{ $user->id }})">
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

    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('admin.user.insert') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Novo usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-6">
                                <label for="inputName" class="form-label">Nome</label>
                                <input type="text" class="form-control" required id="inputName" name="name"
                                    autocomplete="off">
                            </div>

                            <div class="col-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="text" class="form-control" required id="inputEmail" name="email"
                                    autocomplete="off" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
    <script>
        $("#btn-new-user").on('click', function() {
            $("#modal-new-user").modal('show');
        });
    </script>
@endpush
