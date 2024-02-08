<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <h1>
            Create Product
        </h1>
        <div>
            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form method="post" action="{{route('product.store')}}">
            @csrf
            @method('POST')
            <div>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" placeholder="name">
                </div>
                <div>
                    <label>Quantity</label>
                    <input type="text" name="qty" placeholder="Quantity">
                </div>
                <div>
                    <label>Price</label>
                    <input type="text" name="price" placeholder="Price">
                </div>
                <div>
                    <label>description</label>
                    <input type="text" name="description" placeholder="Description">
                </div>
                <div>
                    <input type="submit" value="Save a New Product">
                </div>
                <div>
                    <button type="button" onclick="window.location='{{route('product.index')}}'">Back</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>