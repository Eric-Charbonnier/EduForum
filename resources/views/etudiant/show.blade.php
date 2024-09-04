@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
    <section id="hello" class="home-details-student bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.student_detail')</h1> <br />
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
      <h1>@lang('lang.student_detail')</h1>
      <table class="table table-striped">
        <tr>
          <th>@lang('lang.name') :</th>
          <td>{{ $etudiantDetail->name }}</td>
        </tr>
        <tr>
          <th>@lang('lang.adress') :</th>
          <td>{{ $etudiantDetail->address }}</td>
        </tr>
        <tr>
          <th>@lang('lang.phone') :</th>
          <td>{{ $etudiantDetail->phone }}</td>
        </tr>
        <tr>
          <th>@lang('lang.email') :</th>
          <td>{{ $etudiantDetail->email }}</td>
        </tr>
        <tr>
          <th>@lang('lang.birthday') :</th>
          <td>{{ $etudiantDetail->birthdate }}</td>
        </tr>
        <tr>
          <th>@lang('lang.city') :</th>
          <td>{{ $etudiantDetail->etudiantHasVille->name ?? 'ville inconnue'}}</td>
        </tr>
      </table>
        <a href="{{ route('etudiant.index') }}" class="btn btn-secondary btn-dark">@lang('lang.back_list_student')</a>
        <a href="{{ route('etudiant.edit', $etudiantDetail->id) }}" class="btn btn-info">@lang('lang.edit')</a>
              <!-- Button trigger modal -->
      <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
      @lang('lang.delete')
      </button>

      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<!-- https://getbootstrap.com/docs/5.3/components/modal/#how-it-works -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete')</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @lang('lang.confirm_delete')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.cancel')</button>
        <form class="d-inline-block" action="{{ route('etudiant.destroy', $etudiantDetail->id)}}" method="post">
          @csrf
          @method('delete')
          <input type="submit" class="btn btn-danger" value="@lang('lang.delete')">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection