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

                        <form action="{{ route('admin.category.add') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image</label>
                                        <input class="form-control" type="file" id="formFile" name="image">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary">Create</button>
                                    </div>
                                </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection