<?php

  class BaseModel{
    // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

    public function __construct($attributes = null){
      // Käydään assosiaatiolistan avaimet läpi
      foreach($attributes as $attribute => $value){
        // Jos avaimen niminen attribuutti on olemassa...
        if(property_exists($this, $attribute)){
          // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
    }

    //Check all code below, under construction

    public function errors(){
    
	$errors = array();
	//$validator_errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
       	  $validator_errors = $this->{$validator}();
	  $errors = array_merge($errors, $validator_errors);
      }

      return $errors;
    }
    
    
    public function validate_string_length($string, $minlength, $maxlength, $field_name){
    
      $errors = array();
    
      if(strlen($string) < $minlength) {
	
	    if ($minlength == 1) {
	    
	    	$errors[] = $field_name . ': Field cannot be empty!';
	
	    } else { 
	    
	    	$errors[] = $field_name . ': Input has to be atleast ' . $minlength . ' characters!';
	    }
		
      }
      
      if(strlen($string) > $maxlength) {
	
	    $errors[] = $field_name . ': Input text to long! Sorry...';
		
      }
      
      return $errors;
    
    }
    
    public function validate_string_not_empty($string, $field_name){
    
	  $errors = array();
    
      if($string == '') {
	  
	    $errors[] = $field_name . ': Field cannot be empty!';
	  
	  }
    
      return $errors;
    
    }
  }
