@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
    <section id="hello" class="home-login bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.auth_index')</h1> <br />
        </div>
        <br /><br /><br /><br /><br /><br />

          </div>
        </div><!--End off row-->
      </div><!--End off container -->
    </section> <!--End off Home Sections-->
@endsection

@section('content')
<main class="login-form">
  <div class="container">
    <div class="row justify-content-center display-flex-center">
      <div class="col-md-4 pt-4">
        <div class="card">
          <h3 class="card-header text-center">
          @lang('lang.login')
          </h3>
          <div class="card-body">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong> {{session('success')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(!$errors->isEmpty())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <form action="{{route('user.auth')}}" method="post">
              @csrf
              <div class="form-group mb-3">
              <label for="name">@lang('lang.email')</label> <br />
                <input type="email" class="form-control" name="email" value="{{ old('email')}}">
                @if($errors->has('email'))
                <div class="text-danger mt-2">
                  {{ $errors->first('email')}}
                </div>
                @endif
              </div>

              <div class="form-group mb-3">
              <label for="name">@lang('lang.password')</label><br />
                <input type="password" class="form-control" name="password">
                @if($errors->has('password'))
                <div class="text-danger mt-2">
                  {{ $errors->first('password')}}
                </div>
                @endif
              </div>

              <!-- <div class="mb-3">
                <span><a href="#">Mot de passe oublié?</a></span>
              </div> -->

              <div class="d-grid mx-auto">
                <input type="submit" value="@lang('lang.connexion')" class="btn btn-dark btn-block">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

@endsection