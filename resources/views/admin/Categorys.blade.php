@extends('admin.AppAdmin')
@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin/create.css') }}">
@endsection
@section('content')
<div class="main" style="display: flex;flex-direction: column;flex-wrap: wrap;align-content: center;justify-content: center;align-items: flex-start;">
    <div style="width: 800px;margin: 90px auto; box-shadow: 20px 10px 17px 14px rgba(0, 0, 0, 0.1);" class="form simplified">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.categoryreq')}}" method="POST">
            @csrf
            <div class="input-group">
                <h1>Add Category</h1>
            </div>

            <div class="input-group">
                <label for="productsCategory">Category</label>
                <input type="text" id="productsCategory" name="productsCategory" value="{{ old('productsCategory') }}" placeholder="Product Category">
            </div>

            <div class="buttons">
                <button style="background-color: #f66b5e" type="submit" class="btn" id="add-btn">Add Product</button>
            </div>
        </form>
    </div>
    <div class="categorysloop">
        <ul style="display: flex;flex-direction: row;flex-wrap: wrap;align-content: center;justify-content: center;align-items: center;">
            @foreach ($categorys as $category)
                <li style="border: black solid 2px;padding: 10px;background: #cacaca;border-radius: 8px;margin: 10px 15px;">
                    <h1 style="display: flex;flex-direction: row;flex-wrap: wrap;align-content: center;justify-content: center;align-items: center;">
                        {{ $category->NameCategory }}
                        <form action="{{ route('admin.categorydestroy',['id' => $category->id ]) }}" method="POST">
                            @csrf

                            <button style="margin-left: 10px"
                                onclick="return confirm('Are you sure you want to delete {{ $category->NameCategory }}?')"
                                class="card-action-btn" aria-labelledby="card-label-2">
                                <ion-icon name="trash-outline"></ion-icon>
                            </button>
                        </form>
                    </h1>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
