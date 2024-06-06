@extends('admin.AppAdmin')
@section('style')
<link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
<style>
#featured-image {
    width: 100%;
    flex-shrink: 0;
    border-radius: 4px;
    height: 400px;
    object-fit: contain;
}
.small-Card {
  display: flex;
  justify-content: start;
  align-items: center;
  margin-top: 15px;
  gap: 12px;
}

.small-Img {
  width: 104px;
  height: 104px;
  cursor: pointer;
  border: solid 3px gray;
  border-radius: 4px;
}

.small-Img:active {
  border: 1px solid #17696a;
}
.main{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    align-content: center;
    gap: 3pc;
    justify-content: flex-start;
    margin: 30px auto;
    width: 100vw;
}
.ImgProductEdit{
    width: 40vw;
    margin-left: 15px;
}
</style>
@endsection
@section('content')
<div class="main">
    <div class="ImgProductEdit">
        <img src="{{ $product->imageUrl }}" alt="" id="featured-image">
        <!-- small img -->
        <div class="small-Card">
            <img src="{{ $product->imageUrl }}" alt="" class="small-Img">
            {{-- <img src="img/small-img-2.png" alt="" class="small-Img">
            <img src="img/small-img-3.png" alt="" class="small-Img">
            <img src="img/image-1.png" alt="" class="small-Img"> --}}
        </div>
    </div>

    <div style="width: 40vw;margin: 90px 0px; box-shadow: 20px 10px 17px 14px rgba(0, 0, 0, 0.1);" class="form simplified">
        <form action="{{route('admin.editreq',['id' => $product->id ])}}" method="POST">
            @csrf
            <div class="input-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="productName" value="{{$product->productName}}" placeholder="Product name">
            </div>
            {{-- start handle error Product Name  --}}
            @if ($errors->has('productName'))
                <div class="alert alert-danger">
                    <ul style="list-style:none">
                        @foreach ($errors->get('productName') as $error)
                            <li style="color:red"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- end handle error Product Name  --}}

            <div class="input-group">
                <label for="product-url">Product URL or Image URL</label>
                <input type="text" id="product-url" name="productUrl" value="{{$product->imageUrl}}" placeholder="Product URL or Image URL">
            </div>
            {{-- start handle error Image URL  --}}
            @if ($errors->has('productUrl'))
                <div>
                    <ul style="list-style:none">
                        @foreach ($errors->get('productUrl') as $error)
                            <li style="color:red"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- end handle error Image URL  --}}

            <div class="input-group">
                <label for="product-price">Price</label>
                <input type="number" id="product-price" name="productPrice" value="{{$product->price}}" placeholder="Price">
            </div>
            {{-- start handle error Price  --}}
            @if ($errors->has('productPrice'))
            <div class="alert alert-danger">
                    <ul style="list-style:none">
                        @foreach ($errors->get('productPrice') as $error)
                            <li style="color:red"><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- end handle error Product Price  --}}

            <div class="buttons">
                <button style="background-color: #f66b5e" type="submit" class="btn" id="add-btn">Edit Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
