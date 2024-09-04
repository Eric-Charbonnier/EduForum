@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
<section id="hello" class="home-create-post bg-mega">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="main_home">
        <div class="home_text">
          <h1 class="text-white">@lang('lang.create_forum_post')</h1> <br />
        </div>
        <br /><br /><br /><br /><br /><br />

      </div>
    </div><!--End off row-->
  </div><!--End off container -->
</section> <!--End off Home Sections-->
@endsection

@section('content')

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1 class="text-center my-4 margin-buttom-100">@lang('lang.create_new_forum_post')</h1>
      <form action="{{ route('forum.store') }}" method="POST">
        @csrf
        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-francais-tab" data-bs-toggle="tab" data-bs-target="#nav-francais" type="button" role="tab" aria-controls="nav-francais" aria-selected="true">@lang('lang.french')</button>
            <button class="nav-link" id="nav-anglais-tab" data-bs-toggle="tab" data-bs-target="#nav-anglais" type="button" role="tab" aria-controls="nav-anglais" aria-selected="false">@lang('lang.english')</button>
          </div>
        </nav>
        <br />
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-francais" role="tabpanel" aria-labelledby="nav-francais-tab" tabindex="0">
            <!-- Formulaire en français -->
            <div class="mb-3">
              <label for="title_fr" class="form-label">@lang('lang.title_in_french')</label>
              <input type="text" class="form-control" id="title_fr" name="title_fr">
              @if ($errors->has('title_fr'))
              <div class="text-danger">{{ $errors->first('title_fr') }}</div>
              @endif
            </div>
            <br />
            <div class="mb-3">
              <label for="body_fr" class="form-label">@lang('lang.content_in_french')</label>
              <textarea class="form-control" id="body_fr" name="body_fr" rows="3"></textarea>
            </div>
          </div>

          <div class="tab-pane fade" id="nav-anglais" role="tabpanel" aria-labelledby="nav-anglais-tab" tabindex="0">
            <!-- Formulaire en anglais -->
            <div class="mb-3">
              <label for="title" class="form-label">@lang('lang.title_in_english')</label>
              <input type="text" class="form-control" id="title" name="title">
              @if ($errors->has('title'))
              <div class="text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>
            <br />
            <div class="mb-3">
              <label for="body" class="form-label">@lang('lang.content_in_english')</label>
              <textarea class="form-control" id="body" name="body" rows="3"></textarea>
            </div>
          </div>
        </div>
        <br />
        <button type="submit" class="btn btn-primary">@lang('lang.submit')</button>
      </form>
    </div>
  </div>
</div>
<br /><br /><br />
@endsection