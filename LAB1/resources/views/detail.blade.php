<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products Page</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="container">
            <ul class="nav-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{route('categories')}}">Category</a></li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <h1>Welcome to shop bịp</h1>

        


        <div class="product-detail">
            <div class="product-image">
                <img  src="{{$sp->thumbnail}}" alt="Product Image">
            </div>
            <div class="product-info">
                <h1>{{$sp->title}}</h1>
                <p class="author">Tác giả: {{$sp->author}}</p>
                <p class="publisher">Nhà xuất bản: {{$sp->publisher}}</p>
                <p class="production-date">Ngày xuất bản: {{$sp->Publication}}</p>
                <p class="category">Danh mục: {{$sp->name}}</p>
                <p class="price">Giá: {{$sp->Price}}Đ</p>
                <p class="quantity">Số lượng: {{$sp->Quantity}}</p>
                <button class="btn">Add to Cart</button>
            </div>
        </div>

    </div>
</body>
</html>
