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

    public function errors(){
      // Lisätään $errors muuttujaan kaikki virheilmoitukset taulukkona
      $errors = array();

      foreach($this->validators as $validator){
        // Kutsu validointimetodia tässä ja lisää sen palauttamat virheet errors-taulukkoon
      }

      return $errors;
    }
    
    //Check all code below, under construction
    
    public function validate_string_length($string, $minlength, $maxlength){
    
      $errors = array();
    
      if(strlen($string) < $minlength) {
	
	    $errors[] = 'Syötetty teksti liian lyhyt';
		
      }
      
      if(strlen($string) > $maxlength) {
	
	    $errors[] = 'Syötetty teksti liian pitkä';
		
      }
      
      return $errors;
    
    }
    
    public function validate_string_not_empty($string){
    
	  $errors = array();
    
      if($string == '') {
	  
	    $errors[] = 'Teksti ei saa olla tyhjä'
	  
	  }
    
      return errors;
    
    }
    
    //Where does $validators come from?
    public function errors(){
	
	$errors = array();
	$validator_errors = array();
	
	foreach ($validators as $validator)
	  $validator_errors = this->{$validator}();
	  $errors = array_merge($errors, $validator_errors);
	
	}
    

  }
