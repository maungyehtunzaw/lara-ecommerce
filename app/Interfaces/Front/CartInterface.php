<?php
namespace App\Interfaces\Front;
use Illuminate\Http\Request;

interface  CartInterface{

    public function storeCheckOut(Request $req);
    public function addToCart(Request $req);
    public function removeFromCart(Request $req);
    public function getCartItem();


}

?>
