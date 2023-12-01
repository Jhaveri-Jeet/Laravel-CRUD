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
    <h2 class="text-center mt-5 mb-2">Update Your Product</h2>
    <hr>
    <form method="post" enctype="multipart/form-data" action="{{ route('product.update', [ 'id' => $product->id ]) }}">@csrf @method('PUT')
        <div class="d-flex align-items-start bg-body-tertiary mb-3">
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="text" name="productName" class="form-control" autofocus value="{{ $product->name }}"
                    {{-- Old function is used to store the old values once again in the input field --}} />
                <label class="form-label">Enter Product name</label>

            </div>
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="text" name="productDescription" class="form-control"
                    value="{{ $product->description }}" />
                <label class="form-label">Enter Product Description</label>
            </div>
            <div class="col m-3 form-outline" data-mdb-input-init>
                <input type="file" name="productImage" class="form-control" value="{{ $product->image }}" />
            </div>
            <button type="submit" class="btn btn-dark m-3" data-mdb-ripple-init>Submit</button>
        </div>
    </form>
    <div class="text-center">
        <a class="btn btn-dark" href="{{ route('product.index') }}">Back to home page</a>
    </div>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.0.0/mdb.umd.min.js"></script>
</body>

</html>
