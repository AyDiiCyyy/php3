@extends('admin.layout.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title">Danh sách thống kê</h3>
                        
                    </div>
<div class="row">
    <!-- Tổng số sản phẩm -->
    <div class="col-md-4 mb-4">
        <div class="card bg-primary text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);"> 
            <div class="card-header">
                Tổng số sản phẩm
            </div>
            <div class="card-body">
                <h2>{{ $totalProducts }}</h2>
                <p class="text">Sản phẩm hiện có trong hệ thống</p>
            </div>
        </div>
    </div>

    <!-- Tổng số sản phẩm của mỗi danh mục -->
    <div class="col-md-4 mb-4">
        <div class="card bg-success text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);">
            <div class="card-header">
                Tổng số sản phẩm theo danh mục
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($result as $category)
                        <li class="list-group-item" style="color: black">
                            {{ $category['category_name'] }}: <span class="badge bg-light text-dark"
                            style=" background: -webkit-linear-gradient(left, #FF9966, #fa4299);">{{ $category['product_count'] }} sản phẩm</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <!-- Tổng lượt xem -->
    <div class="col-md-4 mb-4">
        <div class="card bg-info text-white" style="  background: -webkit-linear-gradient(left, #FF9966, #fa4299);">
            <div class="card-header">
                Tổng số tài khoản hiện nay
            </div>
            <div class="card-body">
                <h2>{{ $user }}</h2>
                <p class="text">   Tổng số tài khoản có trong hệ thống</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection