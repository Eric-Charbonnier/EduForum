@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
<section id="hello" class="home-profil bg-mega">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="main_home">
      <div class="home_text">
          <h1 class="text-white">@lang('lang.dashboard')</h1> <br />
        </div>
        <br /><br /><br /><br /><br /><br />

      </div>
    </div><!--End off row-->
  </div><!--End off container -->
</section> <!--End off Home Sections-->
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center display-flex-center">
    <div class="col-lg-8">
      <div class="card mb-4">
        <h4 class="card-header">@lang('lang.dashboard_description')</h4>
        <br />
        <div class="card-body">
          <h5 class="card-title">@lang('lang.welcome_back'), {{ Auth::user()->name }}</h5>
          <p class="card-text">@lang('lang.email'): {{ Auth::user()->email }}</p>
          <p class="card-text">@lang('lang.adress'): {{ Auth::user()->userHasEtudiant->address }}</p>
          <p class="card-text">@lang('lang.phone'): {{ Auth::user()->userHasEtudiant->phone }}</p>
        </div>
      </div>
      <br /><br /><br />

      <div class="card">
        <div class="card-header">@lang('lang.your_forum_posts')</div>
        <div class="card-body">
          @if(Auth::user()->userHasForumPost != null && count(Auth::user()->userHasForumPost) > 0)
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>@lang('lang.title')</th>
                  <th>@lang('lang.content')</th>
                  <th colspan="3">@lang('lang.actions')</th>
                </tr>
              </thead>
              <tbody>
                @foreach(Auth::user()->userHasForumPost as $post)
                @if (app()->getLocale() === 'fr' && $post->title_fr != null && $post->body_fr != null)
                <tr>
                  <td>{{ $post->title_fr ?? $post->title }}</td>
                  <td>{{ $post->body_fr ?? $post->body }}</td>
                  <td>
                    <div class="display-inline-flex">
                      <a href="{{ route('forum.show', $post->id) }}" class="btn btn-info">@lang('lang.view')</a>
                      <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-warning">@lang('lang.edit')</a>
                      <form action="{{ route('forum.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">@lang('lang.delete')</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @elseif (app()->getLocale() === 'en' && $post->title != null && $post->body != null)
                <tr>
                  <td>{{ $post->title ?? $post->title_fr }}</td>
                  <td>{{ $post->body ?? $post->body_fr }}</td>
                  <td>
                    <div class="display-inline-flex">
                      <a href="{{ route('forum.show', $post->id) }}" class="btn btn-info">@lang('lang.view')</a>
                      <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-warning">@lang('lang.edit')</a>
                      <form action="{{ route('forum.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">@lang('lang.delete')</button>
                      </form>
                    </div>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          @else
          <p>@lang('lang.no_post')</p>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection