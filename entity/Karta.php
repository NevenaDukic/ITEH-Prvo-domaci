<?php
require_once "../entity/Predstava.php";
require_once "../entity/User.php";
include_once "../entity/KartaMy.php";
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

class Karta{

    public $id;
    public ?Predstava $predstava_id = null;
    public ?User $user_id = null;

    public function __construct($id,$predstava_id,$user_id){
        $this->id = $id;
        $this->predstava_id = $predstava_id;
        $this->user_id = $user_id;
     
       

    }

    public static function createKarta(Karta $karta, mysqli $connection)
    {
     
        $query = "INSERT INTO karta (predstava_id,user_id) VALUES (?, ?)";
       
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii",$karta->predstava_id->id, $karta->user_id->id);

        setcookie("predstavaCookie", $karta->predstava_id->id, time() + (86400 * 30), "/");

        return $stmt->execute();
    }

    public static function getKarte(mysqli $connection){

        
        $query = "SELECT * FROM karta join predstava on karta.predstava_id = predstava.id join user on karta.user_id = user.id";

        $rs = $connection->query($query);


        $karta = array();
        
        while($row = $rs->fetch_array()){
           
            array_push($karta, new Karta($row["id_k"], 
            new Predstava($row["predstava_id"], $row["naziv"],$row["datum"],$row["brojSlMesta"]),
            new User($row["user_id"],$row["username"],$row["password"],$row["firstName"],$row["lastName"],$row["age"])));
        }
    

        return $karta;
    }
   
    public static function getKarteDistinct($connection){
        $id = $_SESSION["id"];
        $query = "SELECT predstava.naziv,datum,count(*) as brKarata FROM predstava 
        join karta on karta.predstava_id = predstava.id where karta.user_id = '$id' group by predstava.naziv,predstava.datum;";

        
        $rs = $connection->query($query);


        $karta1 = array();
        
        while($row = $rs->fetch_array()){
           
            array_push($karta1, new KartaMy($row["naziv"],$row["datum"],$row["brKarata"] ));
        }
    

        return $karta1;
    }


}

?>