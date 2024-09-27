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
                        <form action="{{ route('admin.category.edit', $category->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name"
                                    value="{{ $category->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Image</label>
                                <input class="form-control" type="file" id="formFile" name="image">
                                <img src="{{ asset('/storage/' . $category->image) }}" alt="" srcset=""
                                    width="100">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
