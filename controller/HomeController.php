<?php

include_once "../entity/Predstava.php";


class HomeController
{
    

    public static function getPredstave($connection)
    {
        return Predstava::getPredstave1($connection);
        
    }


    public static function getPredstaveCtiteria($connection,$naziv){

        
        return Predstava::getPredstaveFind($connection, $naziv);
        

    }

    public static function updatePredstava($connection, $id){
        return Predstava::updPredstava($connection, $id);
    }

}


?>