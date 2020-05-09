<div class="side_admin">
    <div class="side_title">
        <h4>Admin Manager</h4>
    </div>
    <ul class="list-unstyled">
        <li class="">
            <a href="{{route('banner.index')}}">
                <span><i class="fab fa-bimobject"></i></span>Banner
            </a>
        </li>
        <li class="">
            <a href="{{route('products.index')}}">
                <span><i class="fab fa-product-hunt"></i></span>Products
            </a>
        </li>
        <li class="">
            <a href="{{route('product_type.index')}}">
                <span><i class="fas fa-tape"></i></span>Product Type
            </a>
        </li>
        <li class="">
            <a href="{{route('posts.index')}}">
                <span><i class="fas fa-vote-yea"></i></span>Posts
            </a>
        </li>
        <li class="">
            <a href="{{route('post_type.index')}}">
                <span><i class="fa fa-passport"></i></span>Post Type
            </a>
        </li>
        <li class="">
            <a href="{{route('images.index')}}">
                <span><i class="far fa-images"></i></span>Images Product
            </a>
        </li>
        <li class="">
            <a href="{{route('feedback.index')}}">
                <span><i class="fa fa-comment-alt-check" aria-hidden="true"></i></span>Feedback
            </a>
        </li>
        <li class="">
            <a href="{{route('user.index')}}">
                <span><i class="fas fa-user"></i></span>User
            </a>
        </li>
    </ul>
    <ul>
    @php
        function menu($menu){
            if(gettype($menu) == 'array'){
                foreach($menu as $men){
                    //echo $child == '' ? '<li class="dropdown">' . $men['name'] : '<li>' . $men['name'];
                    if(isset($men['items'])){
                        echo '<li class="drop-head"><a href="javascript:void(0)"><span>';
                        echo isset($men['icon']) ? '<i class="fa "'. $men['icon'] .'"></i>' : '';
                        echo  '</span>'.$men['name'] . '</a>';
                        echo '<ul class="dropdown">';
                        menu($men['items']);
                        echo '</ul></li>';
                    }
                    else{
                      echo '<li><a href="'. route($men['route']) . '">' . $men['name'] . '</a></li>';
                    }
                    
                }
            }
        }
        menu(config('menu'));
    @endphp
    </ul>
</div>