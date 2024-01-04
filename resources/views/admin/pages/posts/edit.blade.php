@extends('admin.layout.master')

@push('plugin-styles')
	<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.posts.update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="row">
                            <div class="col-6">
                                <label for="inputTitle" class="form-label">Titulo</label>
                                <input type="text" class="form-control" id="inputTitle" name="title"
                                    value="{{ $post->title }}">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Categoria</label>
                                <select class="js-example-basic-single form-select" name="category" data-width="100%">
                                    <option>Selecione</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $post->post_category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mt-2">
                                <label for="tinymceExample">Descrição</label>
                                <textarea class="form-control" name="description" id="tinymceExample" rows="10">{{ $post->description }}</textarea>
                            </div>

                            <div class="col-md-8 mt-3">
								<h4 class="card-title">Imagem</h4>
                                <div class="mb-3">
                                    <input type="file" name="image" id="myDropify" />
                                </div>
							</div>

                            <div class="col-md-4 mt-5">
                                <div class="mb-3">
									<img src="{{ $post->getMedia('default')->first() == null ? '' : $post->getMedia('default')->first()->getUrl('thumb') }}" alt="" style="max-width: 200px; max-height:200px">
                                </div>
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
    <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
	<script src="{{ asset('assets/js/dropify.js') }}"></script>
@endpush
