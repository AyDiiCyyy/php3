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

        <nav>
            <ul>
                @foreach ($category as $cate )
                
                <li><a href="{{ route('categories',['id'=>$cate->id]) }}">{{$cate->name}}</a></li>

                @endforeach
                <!-- Thêm các danh mục khác tại đây nếu cần -->
            </ul>
        </nav>


        <div class="products-section">
            <h2>Sản phẩm theo danh mục</h2>
            <div class="products">
                @foreach ( $listSp as $sp)
                <a class="product-link" href="{{ route('detai', ['id'=>$sp->id]) }}">
                    <div class="product">
                        <img src="{{$sp->thumbnail}}" >
                        <h3>{{$sp->title}}</h3>
                        <p class="price">{{$sp->Price}}Đ</p>
                        <p class="category">{{$sp->name}}</p>
                    </div>
                </a>
                @endforeach
                
                
                <!-- Repeat for more products -->
            </div>
        </div>

    </div>
</body>
</html>
