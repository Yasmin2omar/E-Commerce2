<?php

class Validator{

    private $errors=[];
    private $data;
    public function __construct($data)
    {
        $this->data=$data;
    }
    public function validate($value,$field,$rules){
        $rulesArray=explode("|",$rules);
        foreach($rulesArray as $rule)
        {
            $rule = explode(":",$rule);
            $ruleName=$rule[0];
            $ruleValue=$rule[1]??null;
            $this->applyRule($value,$ruleName,$field,$ruleValue);

        }
       
    }

    public function applyRule($data,$ruleName,$field,$ruleValue): void
    {
        switch($ruleName){
            case "required" :
                if(empty($data))
                {
                    $this->addError($field,"The $field is required");
                }
                break;
            case "email" :
                if(!empty($data) && !filter_var($data , FILTER_VALIDATE_EMAIL))
                {
                    $this->addError($field,"The $field isn't valid");
                }
                break;
            case  "min" :
                if(!empty($data)  && is_string($data) && strlen(trim($data)) < $ruleValue)   {
                    $this->addError($field,"The $field must be greater than $ruleValue");
                }
                break;
            case  "max" :
                if(!empty($data)  && is_string($data) && strlen(trim($data)) > $ruleValue)   {
                    $this->addError($field,"The $field must be lower than $ruleValue");
                }
                break;
            case "numeric" :
                if(!empty($data) && !is_numeric($data)){
                    $this->addError($field,"Enter a number");
                }
                break;
            case "string" :
                if(!empty($data) && !is_string($data)){
                    $this->addError($field,"The $field must be characters");
                }
                break;
        }
    }
    private function addError($field,$messege = "There was a validation error"): void{
        if(!isset($this->errors[$field])){
            $this->errors[$field]=[];
        }
        $this->errors[$field][]=$messege;
        
    }

    public function getErrors(): array{
        return $this->errors;
    }

    public function hasErrors(): bool{
        return !empty($this->errors);
    }


}