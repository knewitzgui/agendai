@extends('admin.layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.posts.post') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <label for="inputTitle" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="inputTitle" name="title">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Categoria</label>
                                <select class="js-example-basic-single form-select" name="category" data-width="100%">
                                    <option>Selecione</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-2">
                                <label for="tinymceExample">Descrição</label>
                                <textarea class="form-control" name="description" id="tinymceExample" rows="10"></textarea>
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

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  {{-- <script src="{{ asset('assets/plugins/simplemde/simplemde.min.js') }}"></script> --}}
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/tinymce.js') }}"></script>
  <script src="{{ asset('assets/js/select2.js') }}"></script>
@endpush
