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
<table class="table">
    <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
          
            <th scope="col">
                <a href="{{ route('admin.category.add') }}" class="btn btn-primary">
                    Thêm mới
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categoriesAdmin as $cate)
            <tr>
                <th scope="row">{{ $cate->id }}</th>
                <td>{{ $cate->name }}</td>
                <td>
                    <img src="{{ asset('/storage/') . '/' . $cate->image }}" width="200"
                        alt="">
                </td>
                <td class="d-flex">
                    <a href="{{ route('admin.category.edit', $cate->id) }}"
                        class="btn btn-primary mr-3">Edit</a>
                    <form action="{{ route('admin.category.delete', $cate) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có muốn xóa không')"
                            type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
{{ $categoriesAdmin->links() }}
</div>
</div>
</div>
</div>
</div>
@endsection