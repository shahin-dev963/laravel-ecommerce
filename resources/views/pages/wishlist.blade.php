@extends('layouts.frontend_master');

@section('content')

 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                @include('pages.inc.all-category')
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+65 11.188.888</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{ asset('frontend') }}/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Wishlist page</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Wishlist page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @if(session('cart-delete'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session('cart-delete')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                @endif

                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Cart</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wishlists as $wishlist)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset($wishlist->wishlistToProductJoin->image_one) }}" style="height: 70px; width:70px;" alt="">
                                        <h5>{{ $wishlist->wishlistToProductJoin->product_name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        ${{ $wishlist->wishlistToProductJoin->product_price }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form action="{{ url('add/to-cart/'.$wishlist->product_id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="product_price" value="{{ $wishlist->wishlistToProductJoin->product_price }}">
                                            <button type="submit" class="btn btn-sm btn-danger">Add To Cart</button>
                                        </form>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ url('wishlist/destroy/'.$wishlist->id) }}"><span class="icon_close"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Shoping Cart Section End -->

@endsection
