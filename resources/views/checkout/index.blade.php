@extends('layouts.app')

@section('title') Paiement @endsection

@section('extra-script')
  <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<div class="container">
  <div class="row p-3 border shadow text-center">
    <div class="col-md-4 py-3 text-left bg-dark text-white">
      <h4> Récapitulatif commande </h4>
      @foreach(Cart::content() as $produit)
      <div>
        {{$produit->qty}} {{$produit->model->name}}
        <div>Pour : {{$produit->subtotal}} € </div>
      </div>
      <hr class="w-100">
      @endforeach
      <a href="{{route('cart')}}" class="btn btn-sm btn-primary">Modifier le panier</a>
    </div>
    <div class="col-md justify-content-center">
        <h3> Règlement par CB via Stripe</h3>
      <form action='{{ route('checkout.store') }}' method="POST" class="my-4" id="payment-form">
        <div class="border p-4" id="card-element">
          <!-- Elements will create input elements here -->
        </div>

        <!-- We'll put the error messages in this element -->
        <div id="card-errors" role="alert"></div>

        <button class="btn btn-success mt-4" id="submit">Payer ({{Cart::subtotal()}} €)</button>

      </form>
    </div>
  </div>
</div>
@endsection

@section('extra-js')
<script>

// style du formulaire de carte
var stripe = Stripe('pk_test_1nqtoBBNH9e92BWIZyxCCD2T005swDEV3v');
var elements = stripe.elements();
var style = {
  base: {
    color: "#32325d",
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: "antialiased",
    fontSize: "16px",
    "::placeholder": {
      color: "#aab7c4"
    }
  },
  invalid: {
    color: "#fa755a",
    iconColor: "#fa755a"
  }
};
var card = elements.create("card", { style: style });
card.mount("#card-element");

//  Message d'erreur
card.addEventListener('change', ({error}) => {
  const displayError = document.getElementById('card-errors');
  if (error) {
    displayError.textContent = error.message;
  } else {
    displayError.textContent = '';
  }
});

// Soumission du formulaire
var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function(ev) {
  ev.preventDefault();
  submitButton.disabled = true;
  stripe.confirmCardPayment("{{$clientSecret}}", {
    payment_method: {
      card: card,
    }
  }).then(function(result) {
    if (result.error) {
      // Show error to your customer (e.g., insufficient funds)
      submitButton.disabled = false;
      console.log(result.error.message);
    } else {
      // The payment has been processed!
      if (result.paymentIntent.status === 'succeeded') {
        // Show a success message to your customer
        // There's a risk of the customer closing the window before callback
        // execution. Set up a webhook or plugin to listen for the
        // payment_intent.succeeded event that handles any business critical
        // post-payment actions.
        var paymentIntent = result.paymentIntent;
        var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        var form = document.getElementById('payment-form');
        var url = form.action;
        var redirect = '/merci';

        fetch(
          url,
          {
            headers : {
              'Content-Type' : "application/json",
              "Accept" : "application/json,text-plain, */*",
              "X-Requested-with" : "XMLHttpRequest",
              "X-CSRF-TOKEN" : token
            },
            method:'post',
            body: JSON.stringify({
              paymentIntent : paymentIntent
            })
          }
        ).then((data) => {
          console.log(data)
          window.location.href = redirect;
        }).catch((error) => {
          console.log(error)
        })
      }
    }
  });
});

</script>
@endsection
