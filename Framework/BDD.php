<?php
	/*
	* La classe BDD pour la connexion à la BDD 
	*/
	class BDD
	{
		private $bdd;
		private static $instance;
		
		public static function getInstance($datasource)
		{
			try 
			{
				if(empty(self::$instance))
				{
					self::$instance = new BDD($datasource);
				}
				return self::$instance->bdd;
			}
			catch(PDOException $e) {
				throw new Exception($e->getMessage());
			}
		}
		private function __construct($datasource)
		{
			$this->bdd = new PDO('mysql:dbname=' . $datasource->dbname . ';host=' . $datasource->host,
								  $datasource->user,
								  $datasource->password);
		}
	}