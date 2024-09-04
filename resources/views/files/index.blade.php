@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
<section id="hello" class="home-list-uploads bg-mega">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="main_home">
        <div class="home_text">
          <h1 class="text-white">@lang('lang.uploads')</h1> <br />
        </div>
        <br /><br /><br /><br /><br /><br />

      </div>
    </div><!--End off row-->
  </div><!--End off container -->
</section> <!--End off Home Sections-->
@endsection


@section('content')
@if(auth()->check())
<div class="text-center my-4 margin-buttom-20">
  <a href="{{ route('files.create') }}" class="btn btn-warning mb-3">@lang('lang.add_new_file')</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>@lang('lang.title')</th>
      <th>@lang('lang.date')</th>
      <th>@lang('lang.user')</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($filePosts as $filePost)
    <tr>
      <td>{{ app()->getLocale() === 'fr' ? $filePost->title_fr : $filePost->title_en }} <a href="{{ asset('files/'.$filePost->filename) }}" target="_blank">@lang('lang.download')</a></td>
      <td>{{ $filePost->created_at }}</td>
      <td>
        @if ($filePost->user)
        {{ $filePost->user->name }}
        @endif
      </td>


      <td>
        @if ($filePost->user_id === Auth::id())
        <form action="{{ route('files.destroy', $filePost->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">@lang('lang.btn_delete')</button>
        </form>
        @endif
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $filePosts->links() !!}
@else
<h2 class="text-center my-4 text-primary">@lang('lang.must_be_logged_in')</h2>
@endif
@endsection