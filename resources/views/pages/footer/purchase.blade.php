@extends('layouts.frontend_master');
@section('content')

<!-- Hero Section Begin -->
<section class="hero">
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
                        {{-- <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div> --}}
                        <div class="hero__search__phone__text">
                            <h5>01779108452</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h3 class="text-center">Purchase Policy</h3>

                    <p>
                        The acceptance of cookies is not a requirement for visiting the site. However we would like to point out that the use of the 'basket' functionality
                         on the site and ordering is only possible with the activation of cookies. Cookies are tiny text files which identify your computer to our server as
                          a unique user when you visit certain pages on the site and they are stored by your Internet browser on your computer's hard drive. Cookies can be used
                           to recognize your Internet Protocol address, saving you time while you are on, or want to enter, the site. We only use cookies for your convenience in
                            using the site (for example to remember who you are when you want to amend your shopping cart without having to re-enter your email address) and not for
                             obtaining or using any other information about you (for example targeted advertising). Your browser can be set to not accept cookies, but this would restrict
                              your use of the Site. Please accept our assurance that our use of cookies does not contain any personal or private details and are free from viruses.
                    </p>
                    <p>
                        The Help feature on most browsers will tell you how to prevent your browser from accepting new cookies, how to have the browser notify you when you receive
                         a new cookie, or how to disable cookies altogether. Additionally, you can disable or delete similar data used by browser add-ons, such as Flash cookies, by
                          changing the add-on's settings or visiting the Web site of its manufacturer. Because cookies allow you to take advantage of some of evaly.com's essential
                           features, we recommend that you leave them turned on. For instance, if you block or otherwise reject our cookies, you will not be able to add items to your
                            Shopping Cart, proceed to Checkout, or use any evaly.com.bd products and services that require you to Sign in.
                    </p>
                    <p>
                        The acceptance of cookies is not a requirement for visiting the site. However we would like to point out that the use of the 'basket' functionality
                         on the site and ordering is only possible with the activation of cookies. Cookies are tiny text files which identify your computer to our server as
                          a unique user when you visit certain pages on the site and they are stored by your Internet browser on your computer's hard drive. Cookies can be used
                           to recognize your Internet Protocol address, saving you time while you are on, or want to enter, the site. We only use cookies for your convenience in
                            using the site (for example to remember who you are when you want to amend your shopping cart without having to re-enter your email address) and not for
                             obtaining or using any other information about you (for example targeted advertising). Your browser can be set to not accept cookies, but this would restrict
                              your use of the Site. Please accept our assurance that our use of cookies does not contain any personal or private details and are free from viruses.
                    </p>
                    <p>
                        The Help feature on most browsers will tell you how to prevent your browser from accepting new cookies, how to have the browser notify you when you receive
                         a new cookie, or how to disable cookies altogether. Additionally, you can disable or delete similar data used by browser add-ons, such as Flash cookies, by
                          changing the add-on's settings or visiting the Web site of its manufacturer. Because cookies allow you to take advantage of some of evaly.com's essential
                           features, we recommend that you leave them turned on. For instance, if you block or otherwise reject our cookies, you will not be able to add items to your
                            Shopping Cart, proceed to Checkout, or use any evaly.com.bd products and services that require you to Sign in.
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@endsection
