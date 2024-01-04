@extends('admin.layout.master')


@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-4">
                        <h6 class="card-title">Contatos</h6>
                        <a href="{{ route('admin.contact.export') }}"><button class="btn btn-primary">Exportar</button></a>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>Visualizar</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Assunto</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $data)
                                    <tr>
                                        <td class="text-center" width="1rem">
                                            <a href="#" onclick="details({{ json_encode($data) }})">
                                                <i class="text-info" data-feather="eye"></i>
                                            </a>
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->subject }}</td>
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

    <div class="modal fade" id="details" tabindex="-1" aria-labelledby="details-title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="details-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="details-text">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
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
                        url: `{{ url('admin') }}/contato/${id}`,
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

        function details(data){

            date = new Date(data.created_at);
            date = date.getDate() + '/' + ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) + '/' + date.getFullYear();

            let message = `<strong>Nome:</strong> ${data.name} <br>
                           <strong>Email:</strong> ${data.email}<br>
                           <strong>Telefone:</strong> ${data.phone}<br>
                           <strong>Assunto:</strong> ${data.subject}<br><br>
                           <strong>Mensagem:</strong> ${data.message}<br><br>
                           <strong>Mensagem enviada em:</strong> ${date}
                `;

            $('#details-title').text(data.subject);
            $('#details-text').html(message);
            $('#details').modal('show');

        }
    </script>
@endpush
