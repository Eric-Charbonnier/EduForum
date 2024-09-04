@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
    <section id="hello" class="home-update bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.student_edit')</h1> <br />
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
    <div class="col-12 text-center mt-2">
      <h1 class="display-4">
      @lang('lang.student_edit')
      </h1>
    </div>
  </div>
  <hr>
  <div class="row justify-content-center">
    <div class="col-6">
      <div class="card">
        <form method="post">
          @csrf
          @method('put')
          <div class="card-header bg-primary text-white">
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="name">@lang('lang.name')</label>
              <input type="text" id="name" name="name" class="form-control" value="{{ $etudiantDetail->name }}">
              @if ($errors->has('name'))
              <div class="text-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="address">@lang('lang.adress')</label>
              <input type="text" id="address" name="address" class="form-control" value="{{ $etudiantDetail->address }}">
              @if ($errors->has('address'))
              <div class="text-danger">{{ $errors->first('address') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="phone">@lang('lang.phone')</label>
              <input type="text" id="phone" name="phone" class="form-control" value="{{ $etudiantDetail->phone }}">
              @if ($errors->has('phone'))
              <div class="text-danger">{{ $errors->first('phone') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">@lang('lang.email')</label>
              <input type="text" id="email" name="email" class="form-control" value="{{ $etudiantDetail->email }}">
              @if ($errors->has('email'))
              <div class="text-danger">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="birthdate">@lang('lang.birthday')</label>
              <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ $etudiantDetail->birthdate}}">
              @if ($errors->has('birthdate'))
              <div class="text-danger">{{ $errors->first('birthdate') }}</div>
              @endif
            </div>
            <div class="control-group col-12">
              <label for="ville_id">@lang('lang.city')</label>

              <select name="ville_id" id="ville_id" class="form-control">
                @forelse($villes as $ville)
                @if ($ville->id == $etudiantDetail->ville_id)
                <option value="{{ $ville->id }}" selected> {{ $ville->name }} </option>
                @else
                <option value="{{ $ville->id }}"> {{ $ville->name }} </option>
                @endif
                @empty
                <option value="">@lang('lang.no_city')</option>
                @endforelse
              </select>

            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('etudiant.index') }}" class="btn btn-secondary btn-dark">@lang('lang.back_list_student')</a>
            <input type="submit" value="@lang('lang.edit')" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection