<?php
	class PerfumeManager extends BaseManager
	{
		public function __construct($datasource)
		{
			parent::__construct("perfume_name","Perfume",$datasource);
		}

        public function getAllPerfume()
        {
            $req = $this->bdd->prepare("SELECT 
            perfume_name.id_perfume,
            perfume_name.name_perfume,
            perfume_name.gender_perfume,
            perfume_name.price_perfume, 
            perfume_name.id_brand,
            perfume_brand.name_brand
        FROM 
            perfume_name, perfume_brand 
        WHERE 
            perfume_name.id_brand = perfume_brand.id_brand;");
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Perfume",array("id_perfume", "name_perfume","gender_perfume", "price_perfume", "id_brand", "name_brand"));
            return  $req->fetchAll();
        }

        public function getPerfumeById($id)
        {
            $req = $this->bdd->prepare("SELECT 
            perfume_name.id_perfume,
            perfume_name.name_perfume,
            perfume_name.gender_perfume,
            perfume_name.price_perfume, 
            perfume_name.id_brand,
            perfume_brand.name_brand
        FROM 
            perfume_name, perfume_brand 
        WHERE 
            perfume_name.id_brand = perfume_brand.id_brand 
        AND
            perfume_name.id_perfume = ".$id);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Perfume",array("id_perfume", "name_perfume","gender_perfume", "price_perfume", "id_brand", "name_brand"));
            return  $req->fetch();
        }

        public function getSearchPerfume($text)
        {
            $req = $this->bdd->prepare("SELECT 
            perfume_name.id_perfume,
            perfume_name.name_perfume,
            perfume_name.gender_perfume,
            perfume_name.price_perfume, 
            perfume_name.id_brand,
            perfume_brand.name_brand
        FROM 
            perfume_name, perfume_brand 
        WHERE 
            perfume_name.id_brand = perfume_brand.id_brand 
        AND 
            perfume_brand.name_brand 
        LIKE '".strtoupper($text)."%';");
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Perfume",array("id_perfume", "name_perfume","gender_perfume", "price_perfume", "id_brand", "name_brand"));
        return  $req->fetchAll();
        }

        public function getPerfumeByOrderIndi($id)
        {
            $req = $this->bdd->prepare("SELECT 
            perfume_name.id_perfume,
            perfume_name.name_perfume,
            perfume_name.gender_perfume,
            perfume_name.price_perfume, 
            perfume_name.id_brand,
            perfume_brand.name_brand 
        FROM 
            perfume_name, perfume_brand 
        WHERE 
            perfume_name.id_brand = perfume_brand.id_brand
        AND 
            perfume_name.id_perfume
        IN 
            (SELECT 
                id_perfume 
            FROM 
                possesses 
            WHERE id_indi_order = ".$id.")");
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"Perfume",array("id_perfume", "name_perfume","gender_perfume", "price_perfume", "id_brand", "name_brand"));
            return  $req->fetchAll();
        }
	}