@extends('customer.layouts.index');
@section('css')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
@section('content')
<div class="row">
  @php
  $stripe_key = 'pk_test_51Js8LLCvJh510Wa3quVFHACktNoQZRV6dKAzDkUtbZS8Es3xly52jxd8E8YkjRcGTC1L3AmzHkW3YpdXEvPGe7N900W7zpm0fp';
  @endphp
  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing address</h4>
    <form action="{{route('checkout.store')}}" method="post" id="payment-form">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" name="billing_firstName" class="form-control" id="firstName" placeholder="" value="" required="">
          
          
          
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" name="billing_lastName" class="form-control" id="lastName" placeholder="" value="" required="">
          
        </div>
     
      <div class="mb-3">
        <label for="username">Username</label>
        
        
        <input name="username" type="text" class="form-control" id="username" placeholder="Username" required="" value="{{ @Auth::user()->name}}">
        
        
      </div>
      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" value="{{ @Auth::user()->email}}">
        
      </div>
      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" name="billing_address1" class="form-control" id="address" placeholder="1234 Main St" required="">
        
      </div>
      <div class="mb-3">
        <label for="address2">Address Line 2 <span class="text-muted">(Optional)</span></label>
        <input type="text"name="billing_address2" class="form-control" id="address2" placeholder="Apartment or suite">
        
      </div>
      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">Country</label>
          <select name="billing_country" class="custom-select d-block w-100" id="country" required="">
            <option value="">Choose...</option>
            <option>United States</option>
          </select>
          
        </div>
        <div class="col-md-4 mb-3">
          <label for="state">State</label>
          <select name="billing_state" class="custom-select d-block w-100" id="state" required="">
            <option value="">Choose...</option>
            <option>California</option>
          </select>
          
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input name="billing_zip" type="text" class="form-control"  placeholder="" required="">
          
        </div>
      </div>
      <hr class="mb-4">
      
      
      <div id="shipping_address" class="col-md-12 order-md-1">
        <hr class="mb-4">
        
        
        
        
      </div>
       <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="" />
                            </div>
                        </div>
                       
   
      
      </div>
    </div>
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Your cart</span>
      <span class="badge badge-secondary badge-pill">{{ Cart::getTotalQuantity()}}</span>
      </h4>
      
      <ul class="list-group mb-3">
        @foreach ($cartItem as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <h3 >{{$item->name }}</h3>
        </li>
        @endforeach
        <li class="list-group-item d-flex justify-content-between bg-light">
          <div class="text-success">
            <h6 class="my-0">Promo code</h6>
            <small>EXAMPLECODE</small>
          </div>
          <span class="text-success">${{Cart::getTotal() }}</span>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>${{ Cart::getTotal()}}</strong>
        </li>
        
      </ul>
      @foreach ($cartItem as $item)
      <div class="mb-3">
        
        <input type="hidden"name="product_id[]" class="form-control" id="address2"  value="{{$item->name }}">
        
      </div>
      @endforeach
      <div class="mb-3">
        
        <input type="hidden"name="qty" class="form-control" value="{{ Cart::getTotalQuantity()}}">
        
      </div> <div class="mb-3">
      
      <input type="hidden"name="qty" class="form-control" value="{{ Cart::getTotalQuantity()}}">
      
    </div>
  </div>
  <div class="mb-3">
    
    <input type="hidden"name="price" class="form-control"                  value="{{ Cart::getTotal()}}">
    
  </div>
  <div class="mb-3">
    
    <input type="hidden"name="user_id" class="form-control"                  value="{{ @Auth::user()->id}}">
    
  </div>
</div>
  <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pay </button>


</form>
</div>
@endsection
@section('scripts')
<script>
  $(function(){
    $('#same-address').on('change', function(){
      $('#shipping_address').slideToggle(!this.checked)
    })
  })
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
    
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
    
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function(event) {
            event.preventDefault();
    
        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
        });
    </script>

@endsection