@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
    <section id="hello" class="home-show bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.see_forum_post')</h1> <br />
        </div>
        <br /><br /><br /><br /><br /><br />

          </div>
        </div><!--End off row-->
      </div><!--End off container -->
    </section> <!--End off Home Sections-->
@endsection

@section('content')
<!-- @dump($forumPost) -->

<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>@lang('lang.post_detail')</h1>
      <table class="table table-striped">
        <tr>
          <th>@lang('lang.title') :</th>
          <td>
            @if (app()->getLocale() == 'en' && $forumPost->title != null)
            {{ $forumPost->title }}
            @elseif (app()->getLocale() == 'fr' && $forumPost->title_fr != null)
            {{ $forumPost->title_fr }}
            @else
            @lang('lang.post_not_available')
            @endif
          </td>
        </tr>
        <tr>
          <th>@lang('lang.content') :</th>
          <td>
            @if (app()->getLocale() == 'en' && $forumPost->body != null)
            {{ $forumPost->body }}
            @elseif (app()->getLocale() == 'fr' && $forumPost->body_fr != null)
            {{ $forumPost->title_fr }}
            @else
            @lang('lang.post_not_available')
            @endif
          </td>
        </tr>
        <tr>
          <th>@lang('lang.author') :</th>
          <td>{{ $forumPost->forumPostHasUser->name }}</td>
        </tr>
        <tr>
          <th>Date :</th>
          <td>{{ $forumPost->date }}</td>
        </tr>
      </table>
      <a href="{{ route('forum.index') }}" class="btn btn-warning">@lang('lang.back_list')</a>
    </div>
  </div>
</div>
@endsection