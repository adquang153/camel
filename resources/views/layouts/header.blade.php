
<nav id="header">
    @php
        function menu($menu){
            if(gettype($menu) == 'array'){
                foreach($menu as $men){
                    if(isset($men['items'])){
                        echo '<li class="list-drop"><a href="javascript:void(0)">' . $men['name'] . '</a>';
                        echo '<ul class="dropdown">';
                        menu($men['items']);
                        echo '</ul></li>';
                    }
                    else{
                      echo '<li class="list-item"><a href="'. route($men['route']) . '">' . $men['name'] . '</a></li>';
                    }
                }
            }
        }
    @endphp
    <div class="head_parent">
        <a class="logo_camel" href="{{route('index')}}">
            Camel
        </a>
        <ul class="head_list_first">
            {{menu(config('menu_2'))}}
        </ul>
        <ul class="head_list_second ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="list-item">
                <a class="login" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="list-item">
                    <a class="register" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item">
                <a class="nav-link nav-total" href="{{ route('get_cart') }}">
                    <i class="fab fa-opencart"></i>
                    <span class="total">{{(Session::get('cart')->totalQty??0)}}</span>
                </a>
            </li>
            <li class="list-drop">
                <a id="navbarDropdown" href="#">
                    {{ Auth::user()->nick_name }} <span class="caret"></span>
                </a>
                <ul class="dropdown">
                    <a class="" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        @endguest
        </ul>
    </div>
</nav>