function changeStatus(table, id){
    // console.log($(this));
    $.ajax({
        type: 'GET',
        url: $('body').attr("data-base-url") + '/admin/changeStatus/' + table + '/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(response) {
            $("#btn-change-" + id).children().removeClass("bg-success");
            $("#btn-change-" + id).children().removeClass("bg-danger");
            if (response == "activated"){
                $("#btn-change-" + id).children().addClass("bg-success");
                $("#btn-change-" + id).children().text('Ativo');
            } else {
                $("#btn-change-" + id).children().addClass("bg-danger");
                $("#btn-change-" + id).children().text('Inativo');
            }
        }
    })
}

function deleteSwal(table, id) {
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
                url: $('body').attr("data-base-url") + `/admin/deleteSwal/${table}/${id}`,
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