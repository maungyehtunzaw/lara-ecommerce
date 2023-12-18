<div class="card">
    <div class="card-header">My Account</div>
    <div class="card-body">
        <ul class="nav nav-pills flex-column">

            <li class="nav-item">
                <a href="{{route('front.profile')}}" class="nav-link @if(request()->routeIs('front.profile')) active @endif">Profile</a>
            </li>
            <li class="nav-item">
                <a href="{{route('front.orders')}}" class="nav-link @if(request()->routeIs('front.orders')) active @endif">Orders</a>
            </li>
            <li class="nav-item">
                <a href="{{route('front.address')}}" class="nav-link @if(request()->routeIs('front.address')) active @endif">Address</a>
            </li>
            <li class="nav-item">
                <a href="{{route('front.profile')}}" class="nav-link">Password</a>
            </li>
            <li class="nav-item">
                <form action="{{route('customer.logout')}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger ml-3" type="button">
                        <i class="fas fa-power-off"></i> Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
