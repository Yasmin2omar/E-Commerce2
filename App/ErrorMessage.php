<?php
namespace App;
class ErrorMessage{
    private $type;
    private $text;
    public function __construct($type,$text){
        $this->text=$text;
        $this->type=$type;
    }
    public static function setMessege($type,$text){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['messege']=[

            'text'=>$text,
            'type'=>$type
        ];
    }
    public static function showMessege(){
        if(isset($_SESSION['messege'])){
            $type=$_SESSION['messege']['type'];
            $messeges=$_SESSION['messege']['text'];
            if(is_array($messeges)){
                foreach($messeges as $messege){
                if(is_array($messege)){
                    foreach($messege as $error){
                        echo"<div class='alert alert-$type'> $error</div>";
                    }
                }else{
                    echo"<div class='alert alert-$type'> $messege</div>";
                }
                break;
                }
            }else{
            echo"<div class='alert alert-$type'>$messeges</div>";
        }
        unset($_SESSION['messege']);
    }
}
}