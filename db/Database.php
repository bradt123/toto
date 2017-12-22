<!-- DROP TABLE IF EXISTS "user";
CREATE TABLE "user" (
"id" int  NOT NULL,
"username" varchar(100) COLLATE "default",
"password" varchar(100) COLLATE "default",
"created_at" date DEFAULT ('now'::text)::date NOT NULL
)
WITH (OIDS=FALSE)
 
;
 
 Records of users

BEGIN;
INSERT INTO "user" VALUES ('10', 'iparra', '123456', '2015-10-03');
COMMIT;
 
  Primary Key structure for table users

ALTER TABLE "user" ADD PRIMARY KEY ("id"); -->

<?php 
class Database extends PDO
{
	private $dbname = "crud"
	private $host = "localhost";
	private $user = "postgres";
	private $pass = "brey";
	private $port = 5432;
	private $dbh;

	public function __construct()
	{
		try{
			$this->dbh = parent::__construct("pgsql:host=$this->host;
				port=$this->port;
				dbname=$this->dbname;
				user=$this->user;
				password=$this->pass
				");
		}
		catch (PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function close()
	{
		$this->dbh = null;
	}

}
	

 ?>
