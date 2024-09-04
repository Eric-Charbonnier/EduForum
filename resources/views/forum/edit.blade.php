@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')


@section('hero')
    <section id="hello" class="home-edit bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.edit_forum_post')</h1> <br />
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
      <h1 class="text-center my-4 margin-buttom-20">@lang('lang.edit_forum_post')</h1>
      <form action="{{ route('forum.edit', $forumPost->id) }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" name="date" value="{{ $forumPost->date }}">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active btn-info" id="nav-francais-tab" data-bs-toggle="tab" data-bs-target="#nav-francais" type="button" role="tab" aria-controls="nav-francais" aria-selected="true">@lang('lang.french')</button>
            <button class="nav-link btn-warning" id="nav-anglais-tab" data-bs-toggle="tab" data-bs-target="#nav-anglais" type="button" role="tab" aria-controls="nav-anglais" aria-selected="false">@lang('lang.english')</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-francais" role="tabpanel" aria-labelledby="nav-francais-tab" tabindex="0">
            <!-- Formulaire en français -->
            <div class="mb-3">
              <label for="title_fr" class="form-label">@lang('lang.title_in_french')</label>
              <input type="text" class="form-control" id="title_fr" name="title_fr" value="{{ $forumPost->title_fr }}">
              @if ($errors->has('title_fr'))
              <div class="text-danger">{{ $errors->first('title_fr') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label for="body_fr" class="form-label">@lang('lang.content_in_french')</label>
              <textarea class="form-control" id="body_fr" name="body_fr" rows="3">{{ $forumPost->body_fr }}</textarea>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-anglais" role="tabpanel" aria-labelledby="nav-anglais-tab" tabindex="0">
            <!-- Formulaire en anglais -->
            <div class="mb-3">
              <label for="title" class="form-label">@lang('lang.title_in_english')</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $forumPost->title }}">
              @if ($errors->has('title'))
              <div class="text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">@lang('lang.content_in_english')</label>
              <textarea class="form-control" id="body" name="body" rows="3">{{ $forumPost->body }}</textarea>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-success">@lang('lang.update')</button>
        <a href="{{ route('forum.index') }}" class="btn btn-warning">@lang('lang.back_list')</a>
      <a href="{{ route('dashboard') }}" class="btn btn-info">@lang('lang.btn_dashboard')</a>
      </form>
    </div>
  </div>
</div>
@endsection