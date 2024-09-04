@extends('layouts.app')
@section('title', 'TP - Maisonneuve2295209')

@section('hero')
    <section id="hello" class="home-students bg-mega">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="main_home">
          <div class="home_text">
          <h1 class="text-white">@lang('lang.student_list')</h1> <br />
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
      <h1 class="text-center my-4 margin-buttom-20">@lang('lang.student_list_college')</h1>

      <div class="text-center my-4 margin-buttom-20">
        <h2 class="text-warning">
        @lang('lang.add_student')
        </h2>
        <a href="{{ route('etudiant.create') }}" class="btn btn-warning mb-3 margin-buttom-40">@lang('lang.add_student') </a>
      </div>

      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr class="bg-primary text-white">
            <!-- <th>ID</th> -->
            <th>@lang('lang.name')</th>
            <th>@lang('lang.adress')</th>
            <th>@lang('lang.phone')</th>
            <th>@lang('lang.email')</th>
            <th>@lang('lang.city')</th>
            <th colspan="3">@lang('lang.actions')</th>
          </tr>
        </thead>
        <tbody>
          @forelse($etudiantDetails as $etudiantDetail)
          <tr>
            <td>{{ $etudiantDetail->name }}</td>
            <td>{{ $etudiantDetail->address }}</td>
            <td>{{ $etudiantDetail->phone }}</td>
            <td>{{ $etudiantDetail->email }}</td>
            <td>{{ $etudiantDetail->etudiantHasVille->name }}</td>
            <td><a href="{{ route('etudiant.show', $etudiantDetail->id) }}" class="btn btn-dark btn-sm">@lang('lang.view')</a></td>
            <td><a href="{{ route('etudiant.edit', $etudiantDetail->id) }}" class="btn btn-info btn-sm">@lang('lang.edit')</a></td>
            <td>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
              @lang('lang.delete')
              </button>

            </td>
          </tr>

          @empty
          <p class="text-warning">
          @lang('lang.no_student')
          </p>
          @endforelse
        </tbody>
      </table>
      <div class="d-flex justify-content-center m-4">
      {{ $etudiantDetails }}
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