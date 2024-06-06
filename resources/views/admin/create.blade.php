@extends('admin.AppAdmin')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection
@section('content')
<div class="main">
    <div style="max-width: 800px;margin: 90px auto; box-shadow: 20px 10px 17px 14px rgba(0, 0, 0, 0.1);" class="form simplified">
        @if(session()->has('success-create'))
            <div class="alert alert-success">
                <h1>{{ session('success-create') }}</h1>
            </div>
        @endif
        <form action="{{route('admin.createreq')}}" method="POST">
            @csrf
            <div class="input-group">
                <label for="product-name">Product Name</label>
                <input type="text" id="product-name" name="productName" value="{{ old('productName') }}" placeholder="Product name">
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
                <input type="text" id="product-url" name="productUrl" value="{{ old('productUrl') }}" placeholder="Product URL or Image URL">
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
                <input type="number" id="product-price" name="productPrice" value="{{ old('productPrice') }}" placeholder="Price">
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

            {{-- start Catigory option  --}}

            <div class="input-group">

                <select name="category" id="category" style="border: black solid 2px;padding: 12px 20px;background: #cacaca;border-radius: 8px;margin: 10px 15px;font-size: x-large;">
                    <option>Add categorys</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->NameCategory }}</option>
                    @endforeach
                </select>

            </div>
            {{-- end Catigory option  --}}

            <div class="buttons">
                <button style="background-color: #f66b5e" type="submit" class="btn" id="add-btn">Add Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
