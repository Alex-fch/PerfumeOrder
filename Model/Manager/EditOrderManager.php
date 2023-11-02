<?php
	class EditOrderManager extends BaseManager
	{
		public function __construct($datasource)
		{
			parent::__construct("","EditOrder",$datasource);
		}

        public function getOrder($idGeneralOrder)
		{
			$req = $this->bdd->prepare(
				"SELECT perfume_name.name_perfume, perfume_brand.name_brand, perfume_name.gender_perfume, SUM(possesses.quantity) AS 'quantity'
				FROM perfume_name 
				JOIN possesses ON perfume_name.id_perfume = possesses.id_perfume
				JOIN individual_order ON individual_order.id_indi_order = possesses.id_indi_order
                JOIN perfume_brand ON perfume_brand.id_brand = perfume_name.id_brand
				WHERE individual_order.id_gene_order =  ? 
				GROUP BY possesses.id_perfume");
			$req->execute(array($idGeneralOrder));
            $req->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE,"EditOrder",array("name_perfume", "brand_perfume","", "gender_perfume", "quantity"));
            return $req->fetchAll();
		}
    }