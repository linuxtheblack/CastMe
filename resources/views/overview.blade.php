@extends('layouts.master')
@section('content')
  <main class="container bg-white rounded px-5">
    <section class="row">
      <div class="col-12">
        <h2 class="page-header">{{ title_case(__('options')) }}</h2>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="{{ route('user.subscription') }}" class="btn tile">
          <i class="fas fa-grin"></i> {{ title_case(__('subscription')) }}
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="{{ route('user.settings') }}" class="btn tile">
          <i class="fas fa-user"></i> {{ title_case(__('profile settings')) }}
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="{{ route('posts') }}" class="btn tile">
          <i class="fas fa-bookmark"></i> {{ title_case(__('posts')) }}
        </a>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="{{ route('conversations') }}" class="btn tile">
          <i class="fas fa-comments"></i> {{ title_case(__('conversations')) }}
        </a>
      </div>
    </section>
    {{--Scout only--}}
    @if(in_array(Auth::user()->role, ['Scout', 'Moderator', 'Admin']))
    <section class="row">
      <div class="col-12">
        <h2 class="page-header">{{ title_case(__('scout')) }}</h2>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="{{ route('post.new') }}" class="btn tile">
          <i class="fas fa-plus"></i> {{ title_case(__('new post')) }}
        </a>
      </div>
    </section>
    @endif
    {{--Admin only--}}
    @if(in_array(Auth::user()->role, ['Moderator', 'Admin']))
    <section class="row">
      <div class="col-12">
        <h2 class="page-header">{{ title_case(__('admin')) }}</h2>
      </div>
      <div class="col-12 col-sm-6 col-md-3">
        <a href="#" class="btn tile">
          <i class="fas fa-users"></i> {{ title_case(__('users')) }}
        </a>
      </div>
    </section>
    @endif
  </main>
@endsection
