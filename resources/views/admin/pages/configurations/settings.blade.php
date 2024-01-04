@extends('admin.layout.master')

@push('plugin-styles')
	<link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Gerenciamento</a></li>
		<li class="breadcrumb-item active" aria-current="page">Configurações</li>
	</ol>
</nav>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<form method="POST" action="{{ route('admin.settings.post') }}">
					@csrf
					<div class="row mb-3">
						<div class="col-12">
							<div class="mb-3">
								<label for="textAreaGoogleAnalytics" class="form-label mb-0">Google Analytics</label><br>
								<small class="text-muted">Acesse sua conta no Google Analytics, copie o código referente ao domínio do seu site, e cole o código neste campo para gerar estatísticas de acesso do site.</small>
								<textarea class="form-control" id="textAreaGoogleAnalytics" rows="5" name="analytics">{{ isset($settings['analytics']) ? $settings['analytics'] : '' }}</textarea>
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<label for="inputFacebook" class="form-label">Facebook</label>
							<input type="text" class="form-control" id="inputFacebook" name="facebook" value="{{ isset($settings['facebook']) ? $settings['facebook'] : '' }}">
						</div>

						<div class="col-6">
							<label for="inputInstagram" class="form-label">Instaram</label>
							<input type="text" class="form-control" id="inputInstagram" name="instagram" value="{{ isset($settings['instagram']) ? $settings['instagram'] : '' }}">
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<label for="inputLinkedin" class="form-label">Linkedin</label>
							<input type="text" class="form-control" id="inputLinkedin" name="linkedin" value="{{ isset($settings['linkedin']) ? $settings['linkedin'] : '' }}">
						</div>

						<div class="col-6">
							<label for="inputTelefone" class="form-label">Telefone</label>
							<input type="text" class="form-control phone" id="inputTelefone" name="telefone" value="{{ isset($settings['telefone']) ? $settings['telefone'] : '' }}">
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-6">
							<label for="inputYoutube" class="form-label">Youtube</label>
							<input type="text" class="form-control" id="inputYoutube" name="youtube" value="{{ isset($settings['youtube']) ? $settings['youtube'] : '' }}">
						</div>

						<div class="col-6">
							<label for="inputEmail" class="form-label">Email</label>
							<input type="text" class="form-control" id="inputEmail" name="email" value="{{ isset($settings['email']) ? $settings['email'] : '' }}">
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-12">
							<div class="mb-3">
								<label for="textAreaAddress" class="form-label mb-0">Endereço</label><br>
								<textarea class="form-control" id="textAreaAddress" rows="5" name="address">{{ isset($settings['address']) ? $settings['address'] : '' }}</textarea>
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-12">
							<div class="mb-3">
								<label for="tinymceExample" class="form-label mb-0 text-primary"><b>LGPD</b></label><br>
								<textarea class="form-control" id="tinymceExample" rows="5" name="lgpd">{{ isset($settings['lgpd']) ? $settings['lgpd'] : '' }}</textarea>
							</div>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-12">
							<div class="mb-3">
								<label for="tinymceExample" class="form-label mb-0 text-primary"><b>Termos de uso e privacidade</b></label><br>
								<textarea class="form-control" id="tinymceExample" rows="5" name="terms">{{ isset($settings['terms']) ? $settings['terms'] : '' }}</textarea>
							</div>
						</div>
					</div>

					<div class="row mt-3">
						<div class="col-12">
							<button class="btn btn-primary float-right" type="submit">Salvar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('custom-scripts')
	<script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
  	<script src="{{ asset('assets/js/tinymce.js') }}"></script>
@endpush