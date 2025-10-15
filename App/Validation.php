<?php

namespace App;
class Validation {
    private $errors = [];

    public function required($field, $value) {
        if (empty(trim($value))) {
            $this->errors[$field] = ucfirst($field) . " is required.";
        }
    }

    public function email($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format.";
        }
    }

    public function minLength($field, $value, $length) {
        if (strlen($value) < $length) {
            $this->errors[$field] = ucfirst($field) . " must be at least {$length} characters.";
        }
    }

    public function errors() {
        return $this->errors;
    }
    
 public function addError($field, $message = null) {
    if ($message === null) {
        
        $this->errors['_general'] = $field;
    } else {
        $this->errors[$field] = $message;
    }
}
    public function passed() {
        return empty($this->errors);
    }
}