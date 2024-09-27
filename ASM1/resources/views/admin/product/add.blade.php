@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Thêm sản phẩm</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.product.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="price">Giá sản phẩm</label>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <label for="image">Hình ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label >Số lượng</label>
                                <input class="form-control"  name="quantity" type="text"></input>
                            </div>
                            <div class="form-group">
                                <label for="description">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="category">Danh mục sản phẩm</label>
                                <select class="form-control" id="category" name="category_id">
                                    @foreach($category as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection