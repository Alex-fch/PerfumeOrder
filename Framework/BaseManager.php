<?php
	/*
	* La classe BaseManager nous fournis des requêtes de base
	* pour nos futurs manager.
	* $table pour la table en BDD
	* $objet que l'on souhaite traiter
	* $bdd pour la connexion
	*/
    class BaseManager
    {
        private $table;
        private $object;
        protected $bdd;

        public function __construct($table, $object, $datasource)
        {
            $this->table = $table;
            $this->object = $object;
            $this->bdd = BDD::getInstance($datasource);
        }

        public function getById($id, $array)
        {
            $req = $this->bdd->prepare("SELECT * FROM ".$this->table." WHERE ".$array[0]."=?");
            $req->execute(array($id));
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->object, $array);
			return $req->fetch();
        }

        public function getAll($array)
        {
            $req = $this->bdd->prepare("SELECT * FROM ".$this->table);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,$this->object, $array);
            return  $req->fetchAll();
        }

        public function create($obj, $param)
        {
			$paramNumber = count($param);
			$valueArray = array_fill(0,$paramNumber,"?");
			$valueString = implode(", ", $valueArray);
			$sql = "INSERT INTO " . $this->table . "(" . implode(", ", $param) . ") VALUES(" . $valueString . ")";
			$req = $this->bdd->prepare($sql);
			$req->execute($obj->getArray());
			return $this->bdd->lastInsertId();

        }

        public function update($obj, $param)
        {
			$paramForeach = $param;
			array_shift($paramForeach);
			$count = count($paramForeach);
			$timer = 0;
			$point = "= ?,";
            $sql = "UPDATE " . $this->table . " SET ";
			foreach($paramForeach as $paramName)
			{
				$timer ++;
				if($timer === $count) 
				{
					$point = " = ?";
				}
				$sql .= $paramName.$point;
			}
			$sql .= " WHERE ".$param[0]." = ?";
			$req = $this->bdd->prepare($sql);

			$boundParam = $obj->getArray();
			$replace = array_shift($boundParam);
			array_push($boundParam, $replace);
			$req->execute($boundParam);
        }

        public function delete($obj, $array)
        {
			if(property_exists($obj,$array[0]))
			{
				$req = $this->bdd->prepare("DELETE FROM " . $this->table . " WHERE ".$array[0]."=?");
				$boundParam = $obj->getArray();
				$req->execute(array($boundParam[0]));
			}
			else
			{
				throw new PropertyNotFoundException($this->object, $array[0]);	
			}
        }
    }