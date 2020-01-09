<div class="row">
  @include('includes.cart')
  <div class="col-sm-8">
       @if(Auth::check()) <h5 class="info-text"> Payment Information </h5> @endif
  </div>
  @if(Auth::check())                                     
<div class="col-md-8 order-md-1">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" value="{{ old('first_name') ?? auth()->user()->first_name ?? '' }}" >
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="" value="{{ old('last_name') ?? auth()->user()->last_name ?? '' }}" >
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email <span class="text-muted">(Optional)</span></label>
          <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? auth()->user()->email ?? '' }}" placeholder="Email address">
          <div class="invalid-feedback">
            Please enter a valid email address for booking updates.
          </div>
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" name="address_checkout" id="address_checkout" placeholder="1234 Main St" value="{{ old('address') ?? auth()->user()->address ?? '' }}" >
          <div class="invalid-feedback">
            Please enter your booking address.
          </div>
        </div>

        <div class="mb-3" id="address2_checkout">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" name="address2" id="address2" placeholder="Apartment or suite" value="{{ old('address2') ?? auth()->user()->address2 ?? '' }}">
        </div>

        <div class="row">

          <div class="col-md-5 mb-3" id="country_checkout1">
            <label for="country">Country</label>

            <select class="form-control" name="country_checkout" id="country_checkout" >
                <option value="">Choose...</option>
                @foreach($countries as $country)
                  <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                @endforeach
            </select>

            <div class="invalid-feedback">
              Please select a valid country.
            </div>

          </div>

          <div class="col-md-4 mb-3" id="state_checkout1">
            <label for="state">State</label>
            <select class="form-control" name="state_checkout" id="state_checkout" >
              <option value="">Choose...</option>
              <option>California</option>
            </select>

            <div class="invalid-feedback">
              Please provide a valid state.
            </div>

          </div>

          <div class="col-md-3 mb-3" id="zip_checkout1">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" name="zip_checkout" id="zip_checkout" placeholder="" >
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>

        </div>

        <hr class="mb-4">

        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="same-address" onclick="this.checked==true ? sameAddress(): newAddress();">
          <label class="custom-control-label" for="same-address">booking address is the same as my billing address</label>
        </div>

        <div class="custom-control custom-checkbox">

          <input type="checkbox" class="custom-control-input" id="save-info" onclick="this.checked==true ? document.getElementById('location_name1').style.display='':document.getElementById('location_name1').style.display='none';">
          <label class="custom-control-label" for="save-info">Save location details for future use</label>
        </div>



        <div class="custom-control custom-checkbox" id="location_name1"  style="display: none;" >
          <input type="text" class="form-control" name="location_name" id="location_name" value="{{ old('location_name') ?? '' }}" placeholder="Prefered Location name e.g Home" >
        </div>



        <hr class="mb-4">
        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="paypal"checked="" required="">
            <label class="custom-control-label" for="credit">Paypal</label>
          </div>
          <div class="custom-control custom-radio">
            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="stripe" required="">
            <label class="custom-control-label" for="debit">Stripe</label>
          </div>
        </div>




        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>

    </div>
    @else

    @include('auth.form')

    @endif
   
  </div>