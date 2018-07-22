@extends('master')
@section('content')
  <main class="container">
    <h2 class="page-header">{{ title_case(__('Conversation')) }}</h2>
      
    <div class="card" style="width: 100%;">
      <div class="card-header">Mike Weiner</div>
      <div class="card-block">
        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem cum assumenda quos nihil nulla ipsam in et aut quaerat, atque maiores aperiam voluptate voluptatum esse distinctio ea doloribus veniam nesciunt error beatae suscipit rem ratione officia minima. Itaque repellat sit atque eum! Error quisquam consequuntur minima commodi, eaque fugit sequi.
        </p>
      </div>
      <div class="card-header">You</div>
      <div class="card-block">
        <p>
          Lorem ipsum dolor sit, amet consectetur adipisicing elit. Itaque numquam facilis fugit corporis consequatur nobis doloremque temporibus et, tempora fugiat.
        </p>
      </div>
    </div>

    <form action="/conversation/send" method="POST">
      <textarea name="message" class="tinymce"></textarea>
      <button type="submit" class="btn btn-primary">Send</button>

      {{ csrf_field() }}
    </form>

  </main>
@endsection