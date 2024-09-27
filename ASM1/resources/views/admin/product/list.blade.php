@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Danh sách sản phẩm</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.product.add') }}" class="btn btn-success">Thêm mới</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sanpham as $key=>$product)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ number_format($product->price) }} đ</td>
                                        <td><img src="{{asset('storage')}}/{{$product->image}}" alt="Hình ảnh" class="img-thumbnail" width="200" height="150"></td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        {{-- <td>
                                            @if($product->status == 1)
                                                <span class="badge badge-success">Còn hàng</span>
                                            @else
                                                <span class="badge badge-danger">Hết hàng</span>
                                            @endif
                                        </td> --}}
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product) }}" class="btn btn-primary btn-sm">Sửa</a>
                                            <form action="{{ route('admin.product.delete', $product) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Bạn có muốn xóa k?')" type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection