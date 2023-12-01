<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD - App</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
    @if ($message = Session::get('success'))
        <div class="alert alert-success"> <strong>{{ $message }}</strong> </div>
    @endif
    <h2 class="text-center mt-5 mb-2">CRUD Application in Laravel</h2>
    <hr>
    <form method="post" enctype="multipart/form-data" action="{{ route('product.insert') }}">@csrf
        <div class="d-flex align-items-start bg-body-tertiary mb-3">
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="text" name="productName" class="form-control" autofocus value="{{ old('productName') }}"
                    {{-- Old function is used to store the old values once again in the input field --}} />
                <label class="form-label">Enter Product name</label>

                {{-- This is when you want to show the error msg --}}
                {{-- @if ($errors->has('productName'))
                    <span>{{ $errors->first('productName') }}</span>
                @endif --}}

            </div>
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="text" name="productDescription" class="form-control"
                    value="{{ old('productDescription') }}" />
                <label class="form-label">Enter Product Description</label>
            </div>
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="file" name="productImage" class="form-control" value="{{ old('productImage') }}" />
            </div>
            <button type="submit" class="btn btn-dark m-3" data-mdb-ripple-init>Submit</button>
        </div>
    </form>
    <hr class="mt-5">
    <h3 class="text-center mt-5">All Product Data</h3>
    <table class="table m-3">
        <thead class="text-center">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Description</th>
                <th scope="col">Product Image Name</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="uploads/{{ $product->image }}" alt="{{ $product->image }}" class="rounded-circle"
                            width="50px" height="50px" /></td>
                    <td><a href="products/{{ $product->id }}/updatePage" class="btn btn-dark"><i
                                class="far fa-pen-to-square"></i></a></td>
                    <td> <a href="products/{{ $product->id }}/delete" class="btn btn-dark"><i
                                class="far fa-trash-can"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>
</body>

</html>
