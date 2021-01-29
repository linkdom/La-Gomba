@extends('layouts.standard')

@section('content')

    @if(Session::has('cart'))
        <div class="cart-wrapper fade-in">
            <div style="width: 100%" class="row checkout-list">
                <div class="col-md-6">
                    <form method="POST" action="{{ route("create-payment") }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPassword1">Zip Code</label>
                            <input type="text" class="form-control" name="zip_code" id="exampleInputPassword1" placeholder="Zip Code" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" name="city" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Street and Number</label>
                            <input type="text" class="form-control" name="street" id="exampleInputPassword1" placeholder="Street and Number" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="tel" class="form-control" name="phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number" required>
                            <small id="emailHelp" class="form-text text-muted">Phone number is needed for delivery.</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Pay with PayPal</button>
                    </form>
                </div>
            </div>


        </div>
    @else
        <div class="m-10 text-center">
            <div class="alert alert-primary" >
                The shopping cart is empty. <br><br><br>
                <a href="/products" class="btn btn-primary">See my products here</a>
            </div>
        </div>

    @endif


    <div style="position: absolute; width: 100%; bottom: 0;">

        @include('inc.footer')
    </div>

@endsection
