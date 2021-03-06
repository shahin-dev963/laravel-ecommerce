@extends('layouts.frontend_master');
@section('content')

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    @php
                        $categories = App\Category::where('status',1)->latest()->get();
                    @endphp
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="#">{{ $category->category_name }}</a></li>
                        @endforeach
                    </ul>
                </div>
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
                    <h2>My Profile</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>My Order Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                @include('pages.profile.inc.sidebar');
            </div>
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Invoice No</th>
                                <th scope="col">Payment Type</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Total</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $order->invoice_no }}</th>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->total }}</td>
                                </tr>
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">State</th>
                                <th scope="col">Post Code</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $shipping->shipping_first_name }}</th>
                                    <th>{{ $shipping->shipping_last_name }}</th>
                                    <th>{{ $shipping->shipping_email }}</th>
                                    <th>{{ $shipping->shipping_phone }}</th>
                                    <th>{{ $shipping->address }}</th>
                                    <th>{{ $shipping->state }}</th>
                                    <th>{{ $shipping->post_code }}</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Product Code</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orderItems as $orderItem)
                                    <tr>
                                        <th>
                                            <img src="{{ asset($orderItem->OrderItemToProductJoin->image_one) }}" style="height: 50px; width: 50px;" alt="">
                                        </th>
                                        <th>{{ $orderItem->OrderItemToProductJoin->product_name }}</th>
                                        <th>{{ $orderItem->OrderItemToProductJoin->product_code }}</th>
                                        <th>{{ $orderItem->OrderItemToProductJoin->product_quantity }}</th>
                                        <th>{{ $orderItem->OrderItemToProductJoin->product_price }}</th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
