<?php 

namespace App;

class Cart{

    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }

    public function add($item, $qty=1){
        $storedItem = array_merge(['qty' => 0], $item);
        $this->totalPrice = 0;
        if($this->items){
            if(array_key_exists($item['id'], $this->items)){
                $storedItem = $this->items[$item['id']];
            }
        }
        $storedItem['qty'] += $qty;
        $storedItem['prices'] = $item['price'] * $storedItem['qty'];
        $this->items[$item['id']] = $storedItem;
        $this->totalQty+=$qty;
        foreach($this->items as $it){
            $this->totalPrice += $it['prices'];
        }
         // $storedItem = ['qty' => $qty, 'price' => $item->price, 'item' => $item];
        // if($this->items){
        //     if(array_key_exists($id,$this->items)){
        //         $storedItem = $this->items[$id];
        //     }
        // }
        // $storedItem['qty']++;
        // $storedItem['price'] = $item->price * $storedItem['qty'];
        // $this->items[$id] = $storedItem;
        // $this->totalQty++;
        // $this->totalPrice+= $item->price;
    }

    public function delete($id){
        $storedItem = $this->items[$id];
        $this->totalQty -= $storedItem['qty'];
        $this->totalPrice -= $storedItem['prices'];
        unset($this->items[$id]);
    }

    public function edit($id,$qty){
        $this->totalQty = 0;
        $this->totalPrice = 0;
        $storedItem = $this->items[$id];
        $storedItem['qty'] = $qty;
        $storedItem['prices'] = $qty * $storedItem['price'];
        $this->items[$id] = $storedItem;
        foreach($this->items as $it){
            $this->totalQty += $it['qty'];
            $this->totalPrice += $it['prices'];
        }
    }

}

?>