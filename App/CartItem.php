<?php
namespace App;

use PDO;

class CartItem{
    private Product $product;
    private int $qty;
    public function __construct( Product $product,int $qty){
        $this->product=$product;
        $this->qty=$qty;
    }
    public function getProduct(): Product{
        return $this->product;
    }
    public function getQty(): int{
        return $this->qty;
    }
    public function setQty(int $qty): void{
        $this->qty=$qty;
    }
    
    public function getItemPrice(): float|int{
        return $this->qty * $this->product->getPrice();
    }
    public function toArray(): array{
        return[
            "product"=>[
                "id"=>$this->product->getID(),
                "name"=>$this->product->getName(),
                "price"=>$this->product->getPrice(),
                "description"=>$this->product->getDescription(),
                "stock"=>$this->product->getStock(),
                "category_id"=>$this->product->getCategoryId(),
                "discount"=>$this->product->getDiscount(),
                "image"=>$this->product->getImage()
            ],
            "qty"=>$this->qty
        ];
    }
    public static function fromArray(array $data): CartItem{
        $productData=$data['product'];
        $product=new Product(
            $productData['id'],
            $productData['name'],
            $productData['price'],
            $productData['description'],
            $productData['stock'],
            $productData['category_id'],
            $productData['discount'],
            $productData['image']);
        return new CartItem($product,$data['qty']);
    }
}