<?php
	class PossessesManager extends BaseManager
	{
		public function __construct($datasource)
		{
			parent::__construct("possesses","Possesses",$datasource);
		}

		public function getByIdPerfumeAndIdOrder($idIndividualOrder, $idPerfume, $array)
		{
			$req = $this->bdd->prepare("SELECT * FROM possesses WHERE ".$array[0]."=? AND ".$array[1]."=?");
			$req->execute(array($idIndividualOrder, $idPerfume));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Possesses", $array);
			return $req->fetch();
		}

		public function deletePerfume($obj, $array)
        {
			if(property_exists($obj,$array[0]))
			{
				$req = $this->bdd->prepare("DELETE FROM possesses WHERE ".$array[0]."=? AND ".$array[1]."=?");
				return $req->execute(array($obj->getIdIndiOrder(), $obj->getIdPerfume()));
			}
			else
			{
				throw new PropertyNotFoundException($obj, $array[0]);	
			}
        }

		public function updatePossesses($obj, $param)
        {
            $sql = "UPDATE 
						possesses 
					SET 
						quantity = '".$obj->getQuantity()."'
					WHERE
						id_indi_order = '".$obj->getIdIndiOrder()."' AND id_perfume = '".$obj->getIdPerfume()."'";
			$req = $this->bdd->prepare($sql);
			$req->execute();
        }

		public function getCountQuantityPerfume($idIndiOrder)
		{
			$req = $this->bdd->prepare("SELECT SUM(quantity) AS quantity FROM possesses WHERE id_indi_order = ?");
			$req->execute(array($idIndiOrder));
			return $req->fetch();
		}
    }