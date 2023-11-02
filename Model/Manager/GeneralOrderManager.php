<?php
	class GeneralOrderManager extends BaseManager
	{
		public function __construct($datasource)
		{
			parent::__construct("general_order","GeneralOrder",$datasource);
		}

        public function getByName($name)
		{
			$req = $this->bdd->prepare("SELECT * FROM general_order WHERE name_gene_order=?");
			$req->execute(array($name));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"GeneralOrder",array("id_gene_order", "name_gene_order","price_gene_order", "date_gene_order", "quantity_gene_order"));
			return $req->fetch();
		}
	}