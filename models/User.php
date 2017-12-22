<?php 
require_once ("../db/Database.php");
require_once ("../interface/IUser.php");


class User implements IUser
{
	private $con;
		private $id;
		private $username;
		private $password;

public function __construct(Database $db){
		$this->con = new $db;
}	
	
	public function setId($id){
		$this->id = $id;
	}
	public function setUsername($username){
		$this->username = $username;
	}
	public function setPassword($password){
		$this->password = $password;
	}
//insertamos usuario en una tabla con postgresSQL
public function save()
{
	try{
		$query = $this->con->prepare('INSERT INTO user ('username', password) values (?,?)');
		$query->bindParam(1,$this->username,PDO::PARAM_STR);
		$query->bindParam(2, $this->password,PDO::PARAM_STR);
		$query->execute();
		$query->con->close();
	}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
}
public function get()
 {
 try{
            if(is_int($this->id))
            {
                $query = $this->con->prepare('SELECT * FROM users WHERE id = ?');
                $query->bindParam(1, $this->id, PDO::PARAM_INT);
                $query->execute();
     $this->con->close();
     return $query->fetch(PDO::FETCH_OBJ);
            }
            else
            {
                $query = $this->con->prepare('SELECT * FROM users');
     $query->execute();
     $this->con->close();
     return $query->fetchAll(PDO::FETCH_OBJ);
            }
 }
        catch(PDOException $e)
        {
         echo  $e->getMessage();
     }
 }

}

 ?>