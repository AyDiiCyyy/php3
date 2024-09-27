@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Sửa sản phẩm</h3>
                    </div>
                    <div class="card-body">
<form action="{{ route('admin.product.edit',$product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="text" name="price" class="form-control"  value="{{ $product->price }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile" name="image">
        <img src="{{ asset('/storage/') .'/'.$product->image}}" alt="" width="100px">
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $cate)
                <option value="{{ $cate->id }}" @selected($product->category_id == $cate->id)>
                    {{ $cate->name }}
                </option>
            @endforeach
        </select>
    </div>      
    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input class="form-control" type="number" name="quantity"  value="{{ $product->quantity }}">
    </div>
    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control"  rows="10" name="description" >
            {{ $product->description }}
        </textarea>
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-dark">Update</button>
    </div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection