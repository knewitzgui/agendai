@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="card-title">Newsletter</h6>
                        <a href="{{ route('admin.newsletter.export') }}"><button class="btn btn-primary">Exportar</button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newsletter as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td width="1rem">
                                            <a href="#" onclick="deleteSwal('{!! $data->getTable() !!}', {{ $data->id }})">
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

@push('custom-scripts')
    <script>
        function deleteNewsletter(id) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Esta ação não poderá ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Excluir!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: `{{ url('admin') }}/newsletter/${id}`,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        success: function(response) {
                            if (!response.success) {
                                Swal.fire(
                                    'Erro',
                                    'Houve algum problema com a exclusão do registro, por favor tente novamente mais tarde!',
                                    'error'
                                )
                            } else {
                                location.reload();
                            }
                        }
                    })
                }
            })
        }
    </script>
@endpush
