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
        <h2 class="mb-4">Cập nhật tài khoản</h2>
        
        @if (session('thongbao'))
        <div class="alert alert-success">{{session('thongbao')}}</div>
        @endif
        <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="fullname" class="form-label">Họ tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="{{$data->fullname}}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Tên tài khoản</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$data->username}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Ảnh đại diện</label>
                <input type="file" class="form-control" id="avatar" name="avatar" accept="image/*">
                <img src="{{ asset('storage') }}/{{$data->avatar}}" alt="Avatar" class="img-thumbnail" width="100" id="img">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('thongtin') }}" class="btn btn-primary mt-3">Thông tin</a>
        </form>
    </div>
    <script>
        var file_img = document.querySelector('#avatar');
        var img = document.querySelector('#img');

        //Khi thay đổi file
        file_img.addEventListener('change', function(event) {
            // console.log(URL.createObjectURL(this.files[0]))
            // event.preventDefault()
            img.src = URL.createObjectURL(this.files[0])
        })
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
