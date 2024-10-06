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
    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm Sách</h1>
        <form action="{{ route('add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="title">Tiêu đề Phim:</label>
            <input type="text" id="title" name="title">

            <label for="thumbnail">Áp phích:</label>
            <input type="file" name="poster" id="thumbnail">
            {{-- <input type="text" name="poster" id="thumbnail"> --}}

            <label for="author">Giới thiệu phim:</label>
            <input type="text" id="author" name="intro">

            <label for="publisher">Ngày công chiếu:</label>
            <input type="date" id="publisher" name="release_date">

            <label for="category_id">Danh mục:</label>
            <select id="category_id" name="genre_id">
                <option value="">Chọn danh mục</option>
                @foreach ($listCate as $cate )
                <option value="{{$cate->id}}">{{$cate->name}}</option>
                @endforeach
                <!-- Thêm các danh mục khác nếu cần -->
            </select>

            <button type="submit">Thêm Phim</button>
        </form>
    </div>
</body>
</html>
