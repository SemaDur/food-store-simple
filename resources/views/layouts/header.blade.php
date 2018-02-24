@if (Route::has('login'))
    <div class="header">

        <div class="clear"> </div>
        <div class="header-top-nav">
            <ul>
                @if (Auth::guest())
                    <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>

                @else
                    <li><a href="/viewProfile">{{ Auth::user()->name }}</a></li>
                    <li>
                        <a href="/cart">
                            Shopping cart
                            {!! (isset($countProductCart) && $countProductCart != 0) ? '<span class="badge" id="countCart">'.$countProductCart .'</span>' : '<span class="badge" id="countCart"></span>' !!}
                        </a>
                    </li>

                    {{--isAdmin--}}
                    @if(Auth::user()->isAdmin())
                        <li><a href="/admin/products">Management</a></li>
                        <li>
                            <a href="/admin/orders">
                                Orders
                                {!! (isset($countActiveOrders) && $countActiveOrders != 0) ? '<span class="badge">'. $countActiveOrders .'</span>' : '' !!}
                            </a>
                        </li>
                    @endif

                    <li><a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">Logout</a></li>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="">
                        {{ csrf_field() }}
                    </form>
                @endif

            </ul>
        </div>

        <div class="clear"> </div>
    </div>
@endif