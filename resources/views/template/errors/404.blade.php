@extends('template.master')
@push('subintro')
  <section id="subintro">

    <div class="container">
      <div class="row">
        <div class="span4">
          <h3>Sorry <strong>not found</strong></h3>
        </div>
        <div class="span8">
          <ul class="breadcrumb notop">
            <li><a href="#">Home</a><span class="divider">/</span></li>
            <li class="active">404</li>
          </ul>
        </div>
      </div>
    </div>

  </section>
@endpush

@section('content')
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="centered">
            <h2 class="error">404</h2>
            <h3>Sorry, that page doesn't exist!</h3>
            <p>
              The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
            </p>
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-large btn-rounded">kembali ke halaman sebelumnya</a>
          </div>
        </div>
      </div>
    </div>
@endsection