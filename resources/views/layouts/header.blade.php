
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
        <a class="logo_camel" href="#">
            Camel
        </a>
        <ul class="head_list_first">
            {{menu(config('menu_2'))}}
        </ul>
        <ul class="head_list_second ml-auto">
            <li class="list-item">
                <a class="login" href="">Login</a>
            </li>
            <li class="list-item">
                <a class="register" href="">Register</a>
            </li>
        </ul>
    </div>
</nav>