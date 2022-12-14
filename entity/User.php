<?php

class User{

    public $id;
    public $username;
    public $pswd;
    public $firstName;
    public $lastName;
    public $age;


    public function __construct($username,$pswd,$firstName,$lastName,$age,$id = 0){
        $this->id = $id;
        $this->username = $username;
        $this->pswd = $pswd;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
      
     
       

    }

    public static function register(User $user, mysqli $connection)
    {
     
        $query = "INSERT INTO user (username, password, firstName, lastName, age) VALUES (?, ?, ?, ?, ?)";
       
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ssssi",$user->username, $user->pswd, $user->firstName, $user->lastName, $user->age);
       

        return $stmt->execute();
    }

    public static function log_in($username,$pswd, mysqli $connection)
    {
     
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$pswd'";
        $rs = $connection->query($query);


       
        while($row = $rs->fetch_array()){
           
           $me =  new User($row["username"],$row["password"],$row["firstName"],$row["lastName"],$row["age"],$row["id"]);
           return $me;
        }
    
        return "failed";
        
    }

}

?>