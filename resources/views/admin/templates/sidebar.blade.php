<div class="side_admin">
    <div class="side_title">
        <h4>Admin Manager</h4>
    </div>
    <ul class="list_sidebar">
    @php
        function menu($menu){
            if(gettype($menu) == 'array'){
                foreach($menu as $men){
                    $icon = 'far fa-circle';
                    if(isset($men['icon']))
                        $icon = $men['icon'];
                    if(isset($men['items'])){
                        echo '<li class="list-item list-drop"><a href="javascript:void(0)"><span><i class="' . $icon . '"></i></span>' . $men['name'] . '</a>';
                        echo '<ul class="dropdown">';
                        menu($men['items']);
                        echo '</ul></li>';
                    }
                    else{
                      echo '<li class="list-item"><a href="'. route($men['route']) . '"><span><i class="' . $icon . '"></i></span>' . $men['name'] . '</a></li>';
                    }
                }
            }
        }
        menu(config('menu'));
    @endphp
    </ul>
</div>
<script>
    var list_drop = document.getElementsByClassName('list-item list-drop');
    for(let i = 0; i<list_drop.length; i++){
        list_drop[i].children[0].addEventListener('click', function() {
            removeClass(list_drop, i);
            this.parentElement.classList.toggle('active');
        });
    }
    function removeClass(arr, index){
        for(let i = 0; i<arr.length; i++){
            if(i!==index)
                list_drop[i].classList.remove('active');
        }
    }
</script>