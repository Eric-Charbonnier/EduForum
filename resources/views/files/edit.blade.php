@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')


@section('hero')
<section id="hello" class="home-upadate-upload bg-mega">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="main_home">
        <div class="home_text">
          <h1 class="text-white">@lang('lang.upload_edit')</h1> <br />
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
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-heading">@lang('lang.edit_file')</div>
        <div class="panel-body">
          <form action="{{ route('files.update', $filePost->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title_fr">@lang('lang.title_fr')</label>
              <input type="text" name="title_fr" id="title_fr" class="form-control" value="{{ $filePost->title_fr }}" />
              @if ($errors->has('title_fr'))
              <div class="text-danger">{{ $errors->first('title_fr') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="title_en">@lang('lang.title_en')</label>
              <input type="text" name="title_en" id="title_en" class="form-control" value="{{ $filePost->title_en }}" />
              @if ($errors->has('title_en'))
              <div class="text-danger">{{ $errors->first('title_en') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="file">@lang('lang.upload')</label>
              <input type="file" name="file" id="file" class="form-control" />
              @if ($errors->has('file'))
              <div class="text-danger">{{ $errors->first('file') }}</div>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">@lang('lang.update')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection