<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit a Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @else
        @endif
    </div>
    <form method="POST" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        @method('put')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" placeholder="David Croza" value="{{ $product->name }}">
        </div>

        <div>
            <label for="qty">Qty</label>
            <input type="text" name="qty" placeholder="5" value="{{ $product->qty }}">
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" name="price" placeholder="€35,00" value="{{ $product->price }}">
        </div>

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" placeholder="More info about product..."
                value="{{ $product->description }}">
        </div>

        <div>
            <input type="submit" value="Save a New Product">
        </div>
    </form>
</body>

</html>
