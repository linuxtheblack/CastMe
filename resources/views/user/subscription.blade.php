<?php

use \Illuminate\Support\Facades\Auth;

?>

@extends('layouts.master')
@section('content')
  <main class="container">
    <h2 class="page-header">{{ title_case(__('subscription')) }}</h2>

    <div class="row">

      <div class="col-12 col-sm-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title mb-0">
              @if (Auth::user()->activeSub()) 
                {{ title_case(__('active')) }}
              @else
                {{ title_case(__('inactive')) }}
              @endif
            </h3>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-8">
        <form action="{{ route('user.subscription.dump') }}" method="POST">
          <div class="card">
            <div class="card-body">
              <h3 class="page-header">{{ title_case(__('contact information')) }}</h3>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('fname', ucfirst(__('first name')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('fname', old('fname'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('lname', ucfirst(__('last name')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('lname', old('lname'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('company', ucfirst(__('company')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('company', old('company'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('address1', ucfirst(__('street and house number')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('address1', old('address1'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('address2', ucfirst(__('stairway, floor etc.')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('address2', old('address2'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('zip_code', ucfirst(__('zip code')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('zip_code', old('zip_code'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    {{ Form::label('city', ucfirst(__('city')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('city', old('city'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('phone_number', ucfirst(__('phone number')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('phone_number', old('phone_number'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    {{ Form::label('email', ucfirst(__('email address')), [
                      'class' => 'text-muted'
                    ]) }}
                    {{ Form::text('email', old('email'), [
                      'class' => 'form-control'
                    ]) }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-6">
                  <ul class="pagination">
                    <div class="display-none">
                      <input type="radio" name="days" value="60" id="60days" checked>
                      <input type="radio" name="days" value="90" id="90days">
                      <input type="radio" name="days" value="180" id="180days">
                      <input type="radio" name="days" value="365" id="365days">
                    </div>
                    <li class="page-item w-100 d-flex justify-content-center">
                      <label for="60days" class="page-link w-100 text-center">60 {{ __('days') }} - 179 DKK</label>
                    </li>
                    <li class="page-item w-100 d-flex justify-content-center">
                      <label for="90days" class="page-link w-100 text-center">90 {{ __('days') }} - 279 DKK</label>
                    </li>
                    <li class="page-item w-100 d-flex justify-content-center">
                      <label for="180days" class="page-link w-100 text-center">180 {{ __('days') }} - 449 DKK</label>
                    </li>
                    <li class="page-item w-100 d-flex justify-content-center">
                      <label for="365days" class="page-link w-100 text-center">365 {{ __('days') }} - 799 DKK</label>
                    </li>
                  </ul>
                </div>
              
                <div class="col-sm-6">
                  <input type="checkbox" name="accepth" id="accepth">
                  <label for="accepth">{{ ucfirst(__('i accept the')) }} <a href="https://castme.dk/abonnementsbetingelser/" target="blank">{{
                      __('subscription conditions') }}</a></label>
                </div>
              </div>

              <div class="row my-4">
                <div class="col-sm-12">
                  <script src="https://js.stripe.com/v3/"></script>

                  <div id="card-element" class="field is-empty"></div>

                  <script>
                    const stripeTokenHandler = token => {
                      // Insert the token ID into the form so it gets submitted to the server
                      const form = document.getElementById("payment-form");
                      const hiddenInput = document.createElement("input");
                      hiddenInput.setAttribute("type", "hidden");
                      hiddenInput.setAttribute("name", "stripeToken");
                      hiddenInput.setAttribute("value", token.id);
                      form.appendChild(hiddenInput);

                      // Submit the form
                      form.submit();
                    };

                    let stripe = Stripe("pk_test_vwXRriarK5ffUa851WaUwOoS");
                    let elements = stripe.elements();

                    let card = elements.create("card", {
                      iconStyle: "solid",
                      style: {
                        base: {
                          iconColor: "#8898AA",
                          color: "white",
                          lineHeight: "36px",
                          fontWeight: 300,
                          fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                          fontSize: "19px",

                          "::placeholder": {
                            color: "#8898AA"
                          }
                        },
                        invalid: {
                          iconColor: "#e85746",
                          color: "#e85746"
                        }
                      },
                      classes: {
                        focus: "is-focused",
                        empty: "is-empty"
                      }
                    });
                    card.mount("#card-element");

                    card.addEventListener("change", ({ error }) => {
                      const displayError = document.getElementById("card-errors");
                      if (error) {
                        displayError.textContent = error.message;
                      } else {
                        displayError.textContent = "";
                      }
                    });

                    // Create a token or display an error when the form is submitted.
                    const form = document.getElementById("payment-form");
                    form.addEventListener("submit", async event => {
                      event.preventDefault();

                      const { token, error } = await stripe.createToken(card);

                      if (error) {
                        // Inform the customer that there was an error.
                        const errorElement = document.getElementById("card-errors");
                        errorElement.textContent = error.message;
                      } else {
                        // Send the token to your server.
                        stripeTokenHandler(token);
                      }
                    });
                  </script>
                  
                </div>
              </div>

            </div>

            <button class="card-footer btn btn-primary" type="submit">
              @if(Auth::user()->activeSub())
                {{ title_case(__('update information')) }}
              @else
                {{ title_case(__('subscribe')) }}
              @endif
            </button>
          </div>

          @csrf
          @method('POST')
        </form>
        
      </div>

    </div>
  </main>
@endsection
