<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('admin.product.list') }}">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.product.list') }}">Sản phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.category.list') }}">Danh mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.list') }}">Người dùng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.thongke') }}">Thống kê</a>
                </li>
                
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>