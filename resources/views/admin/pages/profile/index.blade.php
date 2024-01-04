@extends('admin.layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="row mb-2" style="text-align: center;">
	<div>
		<img class="wd-70 rounded-circle mb-2" src="{{ Auth::user()->getMedia('default')->first() != null ? Auth::user()->getMedia('default')->first()->getUrl('thumb') : '' }}" alt="profile"><br>
		<span class="h4 text-dark">{{ $profile->name }}</span>
	</div>
</div>
<div class="row" style="text-align: -webkit-center;">
  <div class="col-12 grid-margin">
	<div class="card" style="width: 50em">
	  <div class="position-relative">
		<div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
		</div>
	  </div>
	  <div class="d-flex justify-content-center p-3 rounded-bottom">
		<ul class="d-flex align-items-center m-0 p-0">
			<li class="ms-3 ps-3 border-start d-flex align-items-center">
				<i class="me-1 icon-md text-primary icon-change-view icon-div-dados" data-feather="user"></i>
				<a class="pt-1px d-none d-md-block text-primary btn-change-view" data-target="div-dados" href="javascript:void(0);">Dados</a>
			</li>
			<li class="ms-3 ps-3 border-start d-flex align-items-center">
				<i class="me-1 icon-md icon-change-view icon-div-seguranca" data-feather="lock"></i>
				<a class="pt-1px d-none d-md-block text-body btn-change-view" data-target="div-seguranca" href="javascript:void(0);">Segurança</a>
			</li>
			<li class="ms-3 ps-3 border-start d-flex align-items-center">
				<i class="me-1 icon-md icon-change-view icon-div-imagem" data-feather="image"></i>
				<a class="pt-1px d-none d-md-block text-body btn-change-view" data-target="div-imagem" href="javascript:void(0);">Imagem</a>
			</li>
		</ul>
	  </div>
	</div>
  </div>
</div>
<div class="row profile-body">

  <div class="col-md-12 col-xl-12 middle-wrapper" id="div-dados">
	<div class="row">
	  <div class="col-md-12 grid-margin">
		<div class="card">
		  <div class="card-body">
			<form class="forms-sample" method="POST" action="{{ route('admin.profile.update') }}">
				@csrf
				<input type="hidden" name="user_id" value="{{ $profile->id }}">
				<div class="row">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="mb-3">
						  <label for="exampleInputUsername1" class="form-label">Nome</label>
						  <input type="text" class="form-control" id="exampleInputUsername1" name="name" placeholder="Seu lindo nome" value="{{ $profile->name }}">
						</div>
					</div>

					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="mb-3">
						  <label for="exampleInputEmail1" class="form-label">Email</label>
						  <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="{{ $profile->email }}">
						</div>
					</div>

					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="mb-3">
						  <label for="exampleInputPhone" class="form-label">Telefone</label>
						  <input type="text" class="form-control phone" id="exampleInputPhone" name="phone" placeholder="(99) 99999-9999" value="{{ $profile->phone }}">
						</div>
					</div>

					<div class="col-12 mt-2">
						<button type="submit" class="btn btn-primary float-right">Salvar</button>
					</div>
				</div>
			  </form>
		  </div>
		</div>
	  </div>
	</div>
  </div>

  <div class="col-md-12 col-xl-12 middle-wrapper" id="div-seguranca" style="display:none;">
	<div class="row">
	  <div class="col-md-12 grid-margin">
		<div class="card">
		  <div class="card-body">
			<form class="forms-sample" method="POST" action="{{ route('admin.profile.updatePassword') }}">
				@csrf
				<input type="hidden" name="user_id" value="{{ $profile->id }}">
				<div class="mb-3">
				  <label for="exampleInputPassword1" class="form-label">Senha</label>
				  <input type="password" class="form-control" required id="exampleInputPassword1" name="password" autocomplete="off">
				</div>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			  </form>
		  </div>
		</div>
	  </div>
	</div>
  </div>

  <div class="col-md-12 col-xl-12 middle-wrapper" id="div-imagem" style="display:none;">
	<div class="row">
	  <div class="col-md-12 grid-margin">
		<div class="card">
		  <div class="card-body">
			<form class="forms-sample" method="POST" action="{{ route('admin.profile.image') }}" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="user_id" value="{{ $profile->id }}">
				<div class="mb-3">
					<h6 class="card-title">Imagem de perfil</h6>
					<input type="file" name="image" id="myDropify"/>
				</div>
				<button type="submit" class="btn btn-primary float-right">Salvar</button>
			  </form>
		  </div>
		</div>
	  </div>
	</div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/dropify/js/dropify.min.js') }}"></script>
@endpush

@push('custom-scripts')
	<script src="{{ asset('assets/js/dropify.js') }}"></script>
	<script>
		$(".btn-change-view").on("click", function () {
			$(".btn-change-view").removeClass("text-primary");
			$(".btn-change-view").addClass("text-body");
			$(".icon-change-view").removeClass("text-primary");
			$(".icon-" + $(this).attr("data-target")).addClass("text-primary");
			$(this).removeClass('text-body');
			$(this).addClass('text-primary');

			$(".middle-wrapper").hide("fadeOut");
			$("#" + $(this).attr("data-target")).show("fadeIn");
		});
	</script>
@endpush
