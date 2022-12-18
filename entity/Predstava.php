<?php

class Predstava{

    public $id;
    public $naziv;
    public $datum;
    public $brojSlMesta;
   


    public function __construct($id,$naziv,$datum,$brojSlMesta){
        $this->id = $id;
        $this->naziv = $naziv;
        $this->datum = $datum;
        $this->brojSlMesta = $brojSlMesta;
       
     
       

    }

    public static function getPredstave1(mysqli $connection)
    {
        $query = "SELECT * FROM predstava";

        $rs = $connection->query($query);

        $predstave = array();
        
        while($row = $rs->fetch_array()) {
            $predstava = new Predstava($row["id"], $row["naziv"],$row["datum"],$row["brojSlMesta"]);
            if(isset($_COOKIE["predstavaCookie"]) && $_COOKIE["predstavaCookie"] == $row["id"]) {
                array_unshift($predstave, $predstava);
            } else {
                array_push($predstave, $predstava);
            }
        }
    

        return $predstave;
    }

    public static function getPredstaveFind($connection, $find){

        $query = "SELECT * FROM predstava where naziv = '$find'";

        $rs = $connection->query($query);


        $predstave = array();
        
        while($row = $rs->fetch_array()){
           
            array_push($predstave, new Predstava($row["id"], $row["naziv"],$row["datum"],$row["brojSlMesta"]));
        }
    

        return $predstave;
    }

    public static function updPredstava($connection, $id){

        $query = "SELECT * FROM predstava where id = '$id'";

        $rs = $connection->query($query);


        $brSlMesta;
        
        while($row = $rs->fetch_array()){
           
            $brSlMesta = $row["brojSlMesta"];
            
        }

        $brSlMesta--;
        $query1 = "UPDATE predstava set brojSlMesta = '$brSlMesta' where id = '$id'";

        $rs = $connection->query($query1);
    
    }
   
    public static function getNumSlMesta($connection, $id){

        $query = "SELECT * FROM predstava where id = '$id'";

        $rs = $connection->query($query);

        $brojSlmesta = 0;
        while($row = $rs->fetch_array()){
           
           $brojSlMesta = $row["brojSlMesta"];
            
        }
        return $brojSlMesta;

    }

}

?>