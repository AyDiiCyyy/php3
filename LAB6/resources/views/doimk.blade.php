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
        <h2 class="mb-4">Đổi mật khẩu</h2>
        
        @if (session('message'))
        <div class="alert alert-danger">{{session('message')}}</div>
        @endif
        <form method="POST" action="{{ route('doimk') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fullname" class="form-label">Mật khẩu cũ</label>
                <input type="text" class="form-control" id="fullname" name="passol">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Mật khẩu mới</label>
                <input type="password" class="form-control" id="username" name="password" >
            </div>
            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
            <a href="{{ route('thongtin') }}" class="btn btn-primary mt-3">Thông tin</a>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
