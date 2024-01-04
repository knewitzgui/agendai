@extends('admin.layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row" style="height: 565px">
          <div class="col-md-4 pe-md-0">
            <div class="auth-side-wrapper" style="background-image: url({{ asset('assets/images/bg-login.jpg') }});">

            </div>
          </div>
          <div class="col-md-8 ps-md-0" style="vertical-align: middle">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="https://sycon.tech" class="noble-ui-logo d-block mb-2"><img src="{{asset('assets/images/logo.png')}}"></a>
              <h5 class="text-muted fw-normal mb-4">Bem vindo! Faça login na sua conta.</h5>
              <form method="POST" action="{{ route('login') }}" class="forms-sample">
                @csrf
                <div class="mb-3">
                  <label for="userEmail" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="userEmail" placeholder="Email">
                </div>
                <div class="mb-3">
                  <label for="userPassword" class="form-label">Senha</label>
                  <input type="password" class="form-control" id="userPassword" name="password" autocomplete="current-password" placeholder="Senha">
                </div>
                <div class="form-check mb-3">
                  <input type="checkbox" class="form-check-input" id="authCheck">
                  <label class="form-check-label" for="authCheck">
                    Lembrar login
                  </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 mb-2 mb-md-0">Entrar</button>
                </div>
                <a href="{{ url('/auth/register') }}" class="d-block mt-3 text-muted">Não tem cadastro? Cadastrar-se</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
