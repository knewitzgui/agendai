@extends('admin.layout.master')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.postsCategories.categories.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <label for="inputTitle" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="inputTitle" name="name">
                            </div>

                            <div class="col-12 mt-3">
                                <button type="submit" class="btn btn-primary float-right">Salvar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection