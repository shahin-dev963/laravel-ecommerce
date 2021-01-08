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
            <li><a href="{{ url('category/product-show/'.$category->id) }}">{{ $category->category_name }}</a></li>
        @endforeach
    </ul>
</div>
