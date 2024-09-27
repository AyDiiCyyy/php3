<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }

        .button-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
        }

        .add-button {
            background-color: #28a745;
        }

        .edit-button {
            background-color: #ffc107;
        }

        .delete-button {
            background-color: #dc3545;
        }

        .search-form {
            margin-bottom: 20px;
        }

        .search-form input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 80%;
            max-width: 400px;
        }

        .search-form button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .search-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
    <div class="container">

        <h1>Quản trị người dùng</h1>

        @if (session('thongbao'))
            <div class="alert alert-success">{{ session('thongbao') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Vai trò</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $value)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $value->fullname }}</td>
                        <td>{{ $value->email }}</td>
                        <td><img src="{{ asset('storage') }}/{{ $value->avatar }}" alt=""></td>
                        <td>{{ $value->role }}</td>
                        <td>{{ $value->active ? 'Hoạt động' : 'Tài khoản bị khóa' }}</td>
                        <td>
                            <div class="button-container">

                                <a href="{{ route('admin.update', ['user' => $value]) }}" class="edit-button">Sửa</a>
                                <form action="{{ route('admin.delete', ['user' => $value]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Bạn có muốn xóa k?')" type="submit"
                                        class="btn btn-danger">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach


            </tbody>

        </table>
        {{ $user->links() }}
    </div>
</body>

</html>
