@extends('layouts.layout')
@section('title')
    Trang Cửa hàng
@endsection
@section('libs-css')
    <link rel="stylesheet" href="{{ asset('clients/asset') }}/css/products.css">
@endsection
@section('content')
    <!-- Products Section -->
    <section id="products">
        <div class="container">
            <div class="row">
                <h1 class="text-uppercase text-center mb-3">Danh sách sản phẩm</h1>
                <div class="col-lg-8">
                    <div class="list_products">
                        @if (isset($sp))
                        
                        @foreach ($sp as $item)
                            <div class="product-item">
                                <a href="{{ route('productDetail', $item->id) }}" class="product-link">
                                    <div class="product-image">
                                        <img src="{{asset('storage')}}/{{ $item->image }}" alt="{{ $item->name }}">
                                    </div>
                                    <h3 class="product-name">{{ $item->name }}</h3>
                                    <p class="product-description">{{ $item->description }}</p>
                                    <p class="product-price text-bold">{{ $item->price }}$</p>
                                    <a href="#" class="btn">Thêm vào giỏ hàng</a>
                                </a>
                            </div>
                        @endforeach
                        
                        @else

                        @foreach ($productByCategory as $item)
                        <div class="product-item">
                            <a href="{{ route('productDetail', $item->id) }}" class="product-link">
                                <div class="product-image">
                                    <img src="{{asset('storage')}}/{{ $item->image }}" alt="{{ $item->name }}">
                                </div>
                                <h3 class="product-name">{{ $item->name }}</h3>
                                <p class="product-description">{{ $item->description }}</p>
                                <p class="product-price text-bold">{{ $item->price }}$</p>
                                <a href="#" class="btn">Thêm vào giỏ hàng</a>
                            </a>
                        </div>
                    @endforeach

                        @endif
                        <!-- Product 1 -->
                        {{-- @foreach ($productByCategory as $item)
                            <div class="product-item">
                                <a href="{{ route('productDetail', $item->id) }}" class="product-link">
                                    <div class="product-image">
                                        <img src="{{ $item->image }}" alt="{{ $item->name }}">
                                    </div>
                                    <h3 class="product-name">{{ $item->name }}</h3>
                                    <p class="product-description">{{ $item->description }}</p>
                                    <p class="product-price text-bold">{{ $item->price }}$</p>
                                    <a href="#" class="btn">Thêm vào giỏ hàng</a>
                                </a>
                            </div>
                        @endforeach --}}


                        <!-- Thêm sản phẩm khác tương tự vào đây -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <aside class="sidebar_widget">
                        <div class="widget">
                            <h3 class="widget-title">Danh mục</h3>
                            @foreach ($categories as $cate)
                                <ul class="category-list">
                                    <li><a href="{{ route('shop',$cate->id)  }}">{{ $cate->name }}</a></li>
                                </ul>
                            @endforeach
                        </div>
                        <div class="widget">
                            <h3 class="widget-title">Tìm kiếm</h3>
                            <form class="search-form" action="{{ route('search', ['id'=>$productByCategory[0]->category_id]) }}" method="POST">
                                @csrf
                                <input type="text" placeholder="Tìm kiếm..." name="search">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection
