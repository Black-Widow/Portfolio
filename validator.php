<?php

class validator {

   private $datas = [];
   private $errors = [];

   public function __construct($datas){
      $this->datas = $datas;
   }
   public function check($name, $rules, $options = false ){
      $validator = "validate_$rules";
      if(!$this->$validator($name, $options)){
         $this->errors[$name] = "Veuillez entrer votre $name";
      }
   }
   public function validate_required($name){
     return array_key_exists($name, $this->datas) && $this->datas[$name] != '';
   }

   public function validate_email($name){
      return array_key_exists($name, $this->datas) && filter_var($this->datas[$name], FILTER_VALIDATE_EMAIL);
   }
   public function errors(){
      return $this->errors;
   }
}