@extends('master')
@section('content')
  <main class="container">
    <h2 class="page-header">Kontrolpanel</h2>
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <a href="/abonnement" class="btn btn-primary tile">
          <i class="fas fa-grin"></i> Mit Abonnement
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="/profile" class="btn btn-primary tile">
          <i class="fas fa-user"></i> Min profil
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="/posts" class="btn btn-primary tile">
          <i class="fas fa-bookmark"></i> Posts
        </a>
      </div>
    </div>
    {{--Admin only--}}
    @if(in_array(Auth::user()->role, ['Scout', 'Moderator', 'Admin']))
      <h2 class="page-header">Admin</h2>
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <a href="#" class="btn btn-primary tile">
            <i class="fas fa-users"></i> Brugere
          </a>
        </div>
      </div>
    @endif
  </main>
@endsection
