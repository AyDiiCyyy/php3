<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
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
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
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
    <div class="container">
        <h1>Movie List</h1>
        <div class="search-form">
            <form action="{{route('list')}}" method="POST">
                @csrf
                <input type="text" name="query" placeholder="Tìm kiếm phim...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
        <div class="button-container">
            <a href="{{ route('add') }}" class="add-button">Thêm Phim</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tiêu đề phim</th>
                    <th>Áp phích</th>
                    <th>Giới thiệu phim</th>
                    <th>Ngày công chiếu</th>
                    <th>Thể loại phim</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moive as $key => $value)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->title}}</td>
                    <td><img src="{{ asset('storage') }}/{{$value->poster}}" alt=""></td>
                    <td>{{$value->intro}}</td>
                    <td>{{$value->release_date}}</td>
                    <td>{{$value->gene->name}}</td>
                    <td>
                        <div class="button-container">

                            <a href="{{ route('edit', ['id'=>$value->id]) }}" class="edit-button">Sửa</a>
                            <a href="{{ route('show', ['id'=>$value->id]) }}" class="edit-button">Chi tiết</a>
                            <a onclick="return confirm('Bạn có muốn xóa k?')" href="{{ route('delete', ['id'=>$value->id]) }}" class="delete-button">Xóa</a>
                        </div>
                    </td>
                </tr>
                @endforeach
                
              
            </tbody>
            
        </table>
        {{$moive->links()}}
    </div>
</body>
</html>
