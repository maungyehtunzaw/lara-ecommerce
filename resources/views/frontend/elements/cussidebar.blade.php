<div class="card">
    <div class="card-header">My Account</div>
    <div class="card-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{route('front.profile')}}" class="nav-link">Profile</a>
            </li>
            <li class="nav-item">
                <a href="{{route('front.orders')}}" class="nav-link">Orders</a>
            </li>
            <li class="nav-item">
                <a href="{{route('front.profile')}}" class="nav-link">Address</a>
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
