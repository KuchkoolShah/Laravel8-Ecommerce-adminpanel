@extends('layouts.app')
@section('content')
 
<div class="container">
  <main>
   
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">{{$cart->getTotalQty()}}</span>
        </h4>
       <ul class="list-group mb-3">
            @foreach($cart->getContents() as $slug => $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$product['product']->name}}</h6>
                <small class="text-muted">{{$product['qty']}}</small>
              </div>
              <span class="text-muted">${{$product['price']}}</span>
            </li>
            @endforeach
 
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>${{$cart->getTotalPrice()}}</strong>
            </li>
          </ul>

        <form class="card p-2">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Promo code">
            <button type="submit" class="btn btn-secondary">Redeem</button>
          </div>
        </form>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
         <form action="{{route('checkout.store')}}" method="post" >
         @csrf
          <div class="row g-3">
           <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="billing_firstName" class="form-control"   placeholder="" value="{{ auth()->user()->name }}" required="">
                @if($errors->has('billing_firstName'))
                  <div class="alert alert-danger">
                    {{$errors->first('billing_firstName')}}
                  </div>
                @endif
              </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" name="billing_lastName" placeholder="" value="{{ auth()->user()->name }}" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control"  name="username" id="username"  placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email"  name="email" class="form-control" value="{{ auth()->user()->email }}" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="billing_address1" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" name="billing_address2" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" name="billing_country"   id="country" required>
                <option value="">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">State</label>
              <select class="form-select" name="billing_state"  id="state" required>
                <option value="">Choose...</option>
                <option>California</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" name="billing_zip" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

              <div id="shipping_address" class="col-md-12 order-md-1">
              <hr class="mb-4">
          <h4 class="mb-3">Shipping address</h4>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input name="shipping_firstName" type="text"  class="form-control" id="firstName" placeholder="" value="">

                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" name="shipping_lastName"  class="form-control" id="lastName" placeholder="" value="" >

                          </div>
                        </div>
                        <div class="mb-3">
                          <label for="address">Address</label>
                          <input type="text" name="shipping_address1"  class="form-control" id="address" placeholder="1234 Main St">
                          <div class="invalid-feedback">
                            Please enter your shipping address.
                          </div>
                        </div>

                        <div class="mb-3">
                          <label for="address2">Address Line 2<span class="text-muted">(Optional)</span></label>
                          <input type="text" name="shipping_address2" class="form-control" id="address2" placeholder="Apartment or suite">
                        </div>

            <div class="row">
                      <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select name="shipping_country" class="custom-select d-block w-100" id="country" >
                          <option value="">Choose...</option>
                          <option>United States</option>
                        </select>

                      </div>
                    <div class="col-md-4 mb-3">
                      <label for="state">State</label>
                      <select name="shipping_state" class="custom-select d-block w-100" id="state" >
                        <option value="">Choose...</option>
                        <option>California</option>
                      </select>

                    </div>
                      <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" name="shipping_zip" class="form-control" id="zip" placeholder="" >

                      </div>
            </div>
             </div>
         

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </form>
      </div>
    </div>


  </main>


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

@endsection
