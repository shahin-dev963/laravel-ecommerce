<div class="card" style="width: 18rem;">
    <img class="card-img-top" style="border-radius: 50%; height:100%; width:100%;" src="#" alt="">
    <ul class="list-group list-group-flush">
        <a href="{{ route('home') }}" class="btn btn-sm btn-block btn-primary">Home</a>
        <a href="{{ route('user.order') }}" class="btn btn-sm btn-block btn-danger">My Order</a>
        <a class="btn btn-sm btn-block btn-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>
