<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thông tin người dùng</h2>
        
        <!-- Display User Information -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Thông tin</h5>
                <p class="card-text"><strong>Họ tên:</strong> {{$data->fullname}}</p>
                <p class="card-text"><strong>Tên tài khoản:</strong> {{$data->username}}</p>
                <p class="card-text"><strong>Email:</strong> {{$data->email}}</p>
                <p class="card-text"><strong>Vai trò:</strong> {{$data->role}}</p>
                @isset($data->avatar)
                <p class="card-text"><strong>Ảnh đại diện:</strong> <img src="{{ asset('storage') }}/{{$data->avatar}}" alt="Avatar" class="img-thumbnail" width="100"></p>
                @endisset
            </div>
        </div>
        <a href="{{ route('update') }}" class="btn btn-primary mt-3">Sửa thông tin</a>
        <a href="{{ route('doimk') }}" class="btn btn-primary mt-3">Đổi mật khẩu</a>
        <a href="{{ route('dangxuat') }}" class="btn btn-danger mt-3">Đăng xuất</a>
        <a href="{{ route('admin.list') }}" class="btn btn-primary mt-3">Đăng nhập admin</a>
    </div>
</body>
</html>
