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
{{--
                <div class="hero__item set-bg" data-setbg="{{ asset('frontend') }}/img/hero/banner.jpg">
                    <div class="hero__text">
                        <span>FRUIT FRESH</span>
                        <h2>Vegetable <br />100% Organic</h2>
                        <p>Free Pickup and Delivery Available</p>
                        <a href="#" class="primary-btn">SHOP NOW</a>
                    </div>
                </div> --}}
                <div>
                    <h3 class="text-center">Terms And Conditions</h3>
                    <p>
                         Welcome to evaly.com.bd; a site conducted and operated under evaly.com.bd Limited. We respect your privacy and want
                         to protect your personal information. To learn more, please read this Privacy Policy.</p>
                    <p>
                        This Privacy Policy clarifies how we gather, utilize and (under specific conditions) uncover your own data. This
                         Privacy Policy additionally clarifies the means we have taken to secure your own data. At long last, this Privacy Policy
                         clarifies your alternatives with respect to the accumulation, utilize and divulgence of your own data. By going to the site
                          specifically or through another site, you acknowledge the practices depicted in this Policy.
                    </p>
                    <p>
                        Information security involves trust and your protection is essential to us. We should, along these lines, just utilize your
                         name and other data which identifies with you in the way set out in this Privacy Policy. We will just gather data where it is
                          fundamental for us to do as such and we will just gather data on the off chance that it is significant to our dealings with you.
                    </p>
                    <p>
                        We will just keep your data for whatever length of time that we are either required to by law or as is pertinent for the reasons for which it was gathered.
                    </p>
                    <p> You can visit the Site and peruse without providing individual points of interest. Amid your visit to the Site you stay mysterious and at no
                     time would we be able to distinguish you unless you have a record on the Site and sign on with your client name and secret word.</p>

                     <P>
                        What kind of information we collect?
                        We may gather different snippets of data in the event that you look to submit a request for an item with us on the site.
                     </P>

                     <p>
                        We gather, store and process your information for handling your purchase on the site and any conceivable claims which you may make later on, and
                        for your better communication with our administration. We may gather individual data including, however not restricted to, your title, name, sexual orientation,
                         date of birth, email address, postal address, conveyance address (if unique), phone number, mobile number, fax number, installment subtle elements, installment
                          card points of interest or financial balance subtle elements.
                     </p>
                     <p>
                        We will utilize the data you give to empower us to process your requests and to give you the administrations and data offered through our
                         site and which you ask. Further, we will utilize the data you furnish to direct your record with us; confirm and do monetary exchanges in
                         connection to installments you make; review the downloading of information from our site; enhance the design or potentially substance of the
                         pages of our site and modify them for clients; distinguish guests on our site; do look into on our clients' socioeconomics; send you data we
                          figure you may discover valuable or which you have asked for from us, including data about our items and administrations, if you have demonstrated
                           that you have not protested being reached for these reasons. Subject to getting your assent we may get in touch with you by email with points of interest
                           of different items and administrations. In the event that you favor not to get any showcasing interchanges from us, you can quit whenever.
                     </p>

                     <p>
                        We may utilize your own data for assessment and statistical surveying. Your points of interest are mysterious and might be utilized for factual purposes.
                         You can quit this whenever. Any responses to overviews or conclusion surveys we may request that you finish won't be sent on to outsiders. Revealing your
                          email address is just vital on the off chance that you might want to participate in rivalries. We spare the solutions to our studies independently from your
                           email address.
                     </p>
                     <p>
                        We may likewise send you other data about us, the Site, our different sites, our items, deals advancements, our bulletins, anything identifying with different
                         organizations in our gathering or our business accomplices. On the off chance that you would incline toward not to get any of this extra data as point by point
                          in this section (or any piece of it) please tap the 'withdraw' connect in any email that we send to you. Inside 7 working (days which are not one or the other
                           (i) a Sunday, nor (ii) an open occasion anyplace in Bangladesh) of receipt of your direction we will stop to send you data as asked. On the off chance that your
                            guideline is indistinct we will get in touch with you for elucidation.
                     </p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->

@endsection
