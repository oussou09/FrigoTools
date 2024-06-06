@extends('user.Appuser')

@section('style')
  <link rel="stylesheet" href="{{ asset('productDetails/css/styles.css') }}">
@endsection

@section('content')

<section class="product-container">
    <!-- left side -->
    <div class="img-card">
        <img src="{{ $product->imageUrl }}" alt="" id="featured-image">
        <!-- small img -->
        <div class="small-Card">
            <img src="{{ $product->imageUrl }}" alt="" class="small-Img">
            {{-- <img src="img/small-img-2.png" alt="" class="small-Img">
            <img src="img/small-img-3.png" alt="" class="small-Img">
            <img src="img/image-1.png" alt="" class="small-Img"> --}}
        </div>
    </div>
    <!-- Right side -->
    <div class="product-info">
        <h3 class="producth3">{{ $product->productName }}</h3>
        <h5 class="producth5">Price: ${{ $product->price }} <del>${{ $product->price+50 }}</del></h5>
        <p class="productp">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa accusantium, aspernatur provident beatae corporis veniam atque facilis, consequuntur assumenda, vitae dignissimos iste exercitationem dolor eveniet alias eos ullam nesciunt voluptatum.</p>
        <p class="productp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore accusamus natus dolorum. Quaerat nulla quod doloremque, officia quis provident amet adipisci unde esse iure delectus, maxime inventore optio fuga nisi?</p>

        {{-- <div class="sizes">
            <p>Size:</p>
            <select name="Size" id="size" class="size-option">
                <option value="xxl">XXL</option>
                <option value="xl">XL</option>
                <option value="medium">Medium</option>
                <option value="small">Small</option>
            </select>
        </div> --}}

        <div class="quantity">
            <input class="productinput" type="number" value="1" min="1">
            <button class="productbtn">Add to Cart</button>
        </div>

        {{-- <div>
            <p>Delivery:</p>
            <p>Free standard shipping on orders over $35 before tax, plus free returns.</p>
            <div class="delivery">
                <p>TYPE</p> <p>HOW LONG</p> <p>HOW MUCH</p>
            </div>
            <hr>
            <div class="delivery">
                <p>Standard delivery</p>
                <p>1-4 business days</p>
                <p>$4.50</p>
            </div>
            <hr>
            <div class="delivery">
                <p>Express delivery</p>
                <p>1 business day</p>
                <p>$10.00</p>
            </div>
            <hr>
            <div class="delivery">
                <p>Pick up in store</p>
                <p>1-3 business days</p>
                <p>Free</p>
            </div>
        </div> --}}
    </div>
</section>

<script src="{{ asset('productDetails/js/cart.js') }}"></script>
@endsection
