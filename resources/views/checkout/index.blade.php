@extends('layouts.app')

@section('title') Paiement @endsection

@section('extra-script')
  <script src="https://js.stripe.com/v3/"></script>
    <style>
        main{
            background:rgba(0,0,0,0.8);
        }
    </style>
@endsection

@section('content')
<div class="container ">
    <div class="p-3 m-3 border shadow bg-light ">

        <div class="py-3">
            <h4>1. Récapitulatif commande </h4>
            <hr class="w-100">
            <div class="text-success paiement" hidden><i class="fas fa-check"></i> </div>
            <div class="recap">
                @foreach(Cart::content() as $produit)
                    <div class="row align-items-center">
                        <div class="col-md-3 p-2 m-2 text-center"><img src="{{$produit->model->img}}" width="200"></div>
                        <div class="col">{{$produit->qty}} {{$produit->model->product->name}}<br>
                            Produit vendu par {{$produit->model->seller->user->fullname()}}<br>
                            A récupérer au <a href="https://www.google.fr/maps/place/{{$produit->model->seller->address()}}" target="_blank">{{$produit->model->seller->address()}}</a>
                            <br>Sous-total : {{$produit->subtotal}} €</div>

                    </div>
                    <hr class="w-100">
                @endforeach
            </div>

            <div class="row">
                <a href="{{route('cart')}}" class="nav-link text-shadow-pop-br">Modifier le panier</a>
                <h5 class="ml-auto mr-3 recap" >Sous-total ({{Cart::count() == 1 ? Cart::count(). " article" : Cart::count(). " articles"}}) : <span style="color:#780404;font-weight:bold">{{Cart::subtotal()}} €</span></h5>
            </div>
            <div class="text-center recap" id="gotopayment"><button class="btn btn-warning" type="button">Procéder au paiement</button>  </div>
        </div>


        <div class="col-md">
            <h4>2. Moyen de paiement</h4>
            <hr class="w-100">
            <form action='{{ route('checkout.store') }}' method="POST" class="my-4 paiement" hidden id="payment-form">
                <div class="border p-4" id="card-element">
                    <label class="">Numéro de carte :</label>
                    <div class="border p-3" id="card-number"></div>
                    <div class="row">
                        <div class="col">
                            <label>Date d'expiration :</label>
                            <div class="border p-3" id="card-expiracy"></div>
                        </div>
                        <div class="col">
                            <label>CVC :</label>
                            <div class="border p-3" id="card-cvc"></div>
                        </div>
                    </div>
                </div>
                        <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
                <div class="text-center">
                    <button class="btn btn-success mt-4" id="submit">Payer ({{Cart::subtotal()}} €)</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('extra-js')
<script>
var gotopayment = document.getElementById('gotopayment');
var recap= document.querySelectorAll('.recap');
var paiement = document.querySelectorAll('.paiement');
gotopayment.addEventListener('click' , function (e){
    recap.forEach(element => element.setAttribute('hidden',true));
    paiement.forEach(element => element.removeAttribute('hidden'));

})
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
var card_number = elements.create("cardNumber", { style: style });
card_number.mount("#card-number");
var card_expiry = elements.create("cardExpiry", { style: style });
card_expiry.mount("#card-expiracy");
var card_cvc = elements.create("cardCvc", { style: style });
card_cvc.mount("#card-cvc");

// Soumission du formulaire
var submitButton = document.getElementById('submit');

submitButton.addEventListener('click', function(ev) {
  ev.preventDefault();
  submitButton.disabled = true;
  stripe.confirmCardPayment("{{$clientSecret}}", {
    payment_method: {
      card: card_number
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
