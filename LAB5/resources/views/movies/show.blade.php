<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #343a40;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .list_btn {
    display: inline-block; /* Hiển thị dưới dạng khối nội tuyến */
    padding: 10px 20px; /* Khoảng cách trong nút */
    font-size: 16px; /* Kích thước chữ */
    font-weight: bold; /* Chữ đậm */
    color: #fff; /* Màu chữ */
    background-color: #007bff; /* Màu nền */
    border: none; /* Không viền */
    border-radius: 5px; /* Bo tròn góc */
    text-align: center; /* Căn giữa chữ trong nút */
    text-decoration: none; /* Bỏ gạch chân */
    transition: background-color 0.3s ease; /* Hiệu ứng chuyển màu nền */
}

.list_btn:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}

.list_btn:active {
    background-color: #003f7f; /* Màu nền khi nhấn */
}

.list_btn:focus {
    outline: none; /* Bỏ viền khi focus */
    box-shadow: 0 0 5px #0056b3; /* Thêm viền sáng khi focus */
}

        
    </style>
</head>
<body>
    <div class="container">
        <h1>Sửa phim</h1>
        <form action="{{ route('edit',['id'=>$one->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="title">Tiêu đề Phim:</label>
            <input type="text" id="title" name="title" value="{{$one->title}}"disabled>

            <label for="thumbnail">Áp phích:</label>
            {{-- <input type="file" name="poster" id="thumbnail"> --}}
            {{-- <input type="text" name="poster" id="thumbnail"> --}}
            <img src="{{ asset('storage') }}/{{$one->poster}}" alt="" width="100">

            <label for="author">Giới thiệu phim:</label>
            <input type="text" id="author" name="intro" value="{{$one->intro}}" disabled>

            <label for="publisher">Ngày công chiếu:</label>
            <input type="date" id="publisher" name="release_date" value="{{$one->release_date}}" disabled>

            <label for="category_id">Danh mục:</label>
            <input type="text" disabled value="{{$one->gene->name}}">

            <a href="{{ route('list') }}" class="list_btn">List</a>
        </form>
    </div>
</body>
</html>
