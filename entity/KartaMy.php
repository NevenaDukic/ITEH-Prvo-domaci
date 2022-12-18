<?php
require_once "../entity/Predstava.php";
require_once "../entity/User.php";
class KartaMy{

    public $count;
    public $naziv;
    public $datum;
  
    public function __construct($naziv,$datum,$count){
        $this->count = $count;
        $this->naziv = $naziv;
        $this->datum = $datum;
     
       

    }
  

}

?>