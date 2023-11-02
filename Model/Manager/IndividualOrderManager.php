<?php
	class IndividualOrderManager extends BaseManager
	{
		public function __construct($datasource)
		{
			parent::__construct("individual_order","IndividualOrder",$datasource);
		}

		public function getOrderByGeneOrder($idGeneOrder) 
		{
			$req = $this->bdd->prepare("SELECT * FROM individual_order WHERE id_gene_order=?");
			$req->execute(array($idGeneOrder));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"IndividualOrder",array("id_indi_order", "name_indi_order","price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			return $req->fetchAll();
		}

		public function getOneOrderByGeneOrder($idGeneOrder, $idIndividualOrder)
		{
			$req = $this->bdd->prepare("SELECT * FROM individual_order WHERE id_gene_order=? AND id_indi_order = ?");
			$req->execute(array($idGeneOrder, $idIndividualOrder));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"IndividualOrder",array("id_indi_order", "name_indi_order","price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			return $req->fetch();
		}

		public function getByNameByGeneOrder($name, $idGeneralOrder)
		{
			$req = $this->bdd->prepare("SELECT * FROM individual_order WHERE name_indi_order=? AND id_gene_order=?");
			$req->execute(array($name, $idGeneralOrder));
			$req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"IndividualOrder",array("id_indi_order", "name_indi_order","price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			return $req->fetch();
		}

		public function getTotalPrice($idIndiOrder)
		{
			$req = $this->bdd->prepare("SELECT SUM(perfume_name.price_perfume * possesses.quantity) AS 'price' FROM perfume_name JOIN possesses ON perfume_name.id_perfume = possesses.id_perfume WHERE possesses.id_indi_order = ?");
			$req->execute(array($idIndiOrder));
			return $req->fetch();
		}

		public function getTotalQuantityByGeneOrder($idGeneralOrder)
		{
			$req = $this->bdd->prepare("SELECT SUM(quantity_indi_order) AS 'quantity' FROM individual_order WHERE id_gene_order = ?");
			$req->execute(array($idGeneralOrder));
			return $req->fetch();
		}

		public function getTotalPriceByGeneOrder($idGeneralOrder)
		{
			$req = $this->bdd->prepare("SELECT SUM(price_indi_order) AS 'price' FROM individual_order WHERE id_gene_order = ?");
			$req->execute(array($idGeneralOrder));
			return $req->fetch();
		}
	}