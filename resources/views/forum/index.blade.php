@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
<section id="hello" class="home-forum bg-mega">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="main_home">
        <div class="home_text">
          <!-- <h1 class="text-white">@lang('lang.forum')</h1> <br /> -->
        </div>
        <br /><br /><br /><br /><br /><br />

      </div>
    </div><!--End off row-->
  </div><!--End off container -->
</section> <!--End off Home Sections-->
@endsection

@section('content')
    <!-- Section pour les posts -->
    <div class="table-responsive">
      @if(auth()->check())
      <h2 class="text-center my-4 text-primary">@lang('lang.forum_posts')</h2>
      <br />
      <div class="text-center my-4 margin-buttom-20">
        <a href="{{ route('forum.create') }}" class="btn btn-warning mb-3">@lang('lang.add_new_post')</a>
      </div>
      <br />
      <table class="table table-bordered table-hover">
        <thead class="bg-primary text-white">
          <tr>
            <th>@lang('lang.title')</th>
            <th>@lang('lang.content')</th>
            <th>@lang('lang.author')</th>
            <th>@lang('lang.date')</th>
          </tr>
        </thead>
        <tbody>
          @foreach($forumPosts as $forumPost)
          @if (app()->getLocale() === 'fr' && $forumPost->title_fr != null && $forumPost->body_fr != null)
          <tr>
            <td><a href="{{ route('forum.show', $forumPost->id) }}">{{ $forumPost->title_fr }}</a></td>
            <td>{{ $forumPost->body_fr }}</td>
            <td>{{ $forumPost->forumPostHasUser->name ?? 'inconnu' }}</td>
            <td>{{ $forumPost->date }}</td>
          </tr>
          @elseif (app()->getLocale() === 'en' && $forumPost->title != null && $forumPost->body != null)
          <tr>
            <td><a href="{{ route('forum.show', $forumPost->id) }}">{{ $forumPost->title }}</a></td>
            <td>{{ $forumPost->body }}</td>
            <td>{{ $forumPost->forumPostHasUser->name ?? 'inconnu' }}</td>
            <td>{{ $forumPost->date }}</td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-4">
        {{$forumPosts}}
      </div>
      @else
      <h2 class="text-center my-4 text-primary">@lang('lang.must_be_logged_in')</h2>
      @endif
    </div>
  </div>
</div>
</div>
@endsection