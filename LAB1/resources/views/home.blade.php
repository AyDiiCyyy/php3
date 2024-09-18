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


        <div class="products-section">
            <h2>8 sản phẩm giá cao nhất</h2>
            <div class="products">
                @foreach ( $listSpMax as $Max)
                <a class="product-link" href="{{ route('detai', ['id'=>$Max->id]) }}">
                    <div class="product">
                        <img src="{{$Max->thumbnail}}" >
                        <h3>{{$Max->title}}</h3>
                        <p class="price">{{$Max->Price}}Đ</p>
                        <p class="category">{{$Max->name}}</p>
                    </div>
                </a>
                @endforeach
                
                
                <!-- Repeat for more products -->
            </div>
        </div>

        <div class="products-section">
            <h2>8 sản phẩm giá thấp nhất</h2>
            <div class="products">
                @foreach ( $listSpMin as $Min)
                <a class="product-link" href="{{ route('detai', ['id'=>$Min->id]) }}">
                    <div class="product">
                        <img src="{{$Min->thumbnail}}" >
                        <h3>{{$Min->title}}</h3>
                        <p class="price">{{$Min->Price}}Đ</p>
                        <p class="category">{{$Min->name}}</p>
                    </div>
                </a>
                @endforeach
               
                <!-- Repeat for more products -->
            </div>
        </div>
    </div>
</body>
</html>
