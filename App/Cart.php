<?php

namespace App;

use PDO;

class Cart{
    private array $items=[];
    private const SESSION_KEY="cart_item";
    public function __construct(){
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION[self::SESSION_KEY])){
            $this->loadFromSession($_SESSION[self::SESSION_KEY]);
        }
    }
    private function loadFromSession(array $data): void{

        foreach($data as $item){
            $this->items[]= CartItem::fromArray($item);
        }
    }
    public function getItems(): array{
        return $this->items;
    }
    public function saveToSession(): void{
        $data=[];
        foreach($this->items as $item){
            $data[]=$item->toArray();
        }
        $_SESSION[self::SESSION_KEY]=$data;
    }
    public function addItem(Product $product,int $qty=1): void{
        foreach($this->items as $item){
            if($item->getProduct()->getID()==$product->getID()){
                $item->setQty($item->getQty() + $qty);
                $this->saveToSession();
                return;
            }
        } 
        $this->items[]=new CartItem($product,qty: $qty);
        $this->saveToSession();
        return;
    }
    public function removeItem(Product $product): void{
        for($i=0 ; $i < count($this->items) ; $i++){
            if($this->items[$i]->getProduct()->getID()==$product->getID()){
                unset($this->items[$i]);
                $this->items=array_values($this->items);
                $this->saveToSession();
                return;
            }
        }
    }
    public function chanceQty(Product $product ,int $newQty): void{
        foreach($this->items as $item){
            if($item->getProduct()->getID()==$product->getID()){
                $item->getProduct()->setQty($newQty);
                $this->saveToSession();
                return;
            }
        }
    }
    public function clearItems(): void{
        $this->items=[];
        unset($_SESSION[self::SESSION_KEY]);
    }
    public function getTotalPrice(){
        $totalPrice=0;
        foreach($this->items as $item ){
            $totalPrice +=$item->getItemPrice();
        }
        return $totalPrice;
    }
}