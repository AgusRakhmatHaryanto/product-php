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
            Products
        </h1>
        <div>
            <a href="{{ route('product.create') }}">
                Create Product
            </a>
        </div>
        <div>
            <table border="1">
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Quantity
                    </th>
                    <th>
                        Price
                    </th>
                    <th>
                        Description
                    </th>
                    <th colspan="2">
                        Action
                    </th>
                </tr>
                @foreach ($products as $product)
                <tr>
                    <td>
                        {{ $product->name }}
                    </td>
                    <td>
                        {{ $product->qty }}
                    </td>
                    <td>
                        {{ $product->price }}
                    </td>
                    <td>
                        {{ $product->description }}
                    </td>
                    <td>
                        <button
                            onclick="window.location.href='{{route('product.edit', ['product' => $product])}}'">Edit</button>
                    </td>

                    <td>
                        <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST" onSubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete">
                        </form>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>