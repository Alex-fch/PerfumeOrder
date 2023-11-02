<?php
	/*
	* La classe ModifyController gére la vue mofify.
	*/
	class ModifyController extends BaseController
	{
		public function GetListOrder()
		{
            //Reset les sessions
			$_SESSION['generalOrder'] = "";
            $_SESSION['individualOrder'] = "";

            //Récuperer toutes les commandes général
			$tGeneralOrder = $this->GeneralOrderManager->getAll(array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));

			//Ajouter les parametres pour les récupérer dans la vue
			$this->addParam("tGeneralOrder",$tGeneralOrder);
			
			//Afficher la vue 'modify.php'
			$this->View("modify");
		}

        public function CheckModify($idGeneralOrder)
        {
            //Récuperer en BDD la commande général séléctionné pour la modification
            $generalOrder = $this->GeneralOrderManager->getById($idGeneralOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));
            $_SESSION['generalOrder'] = $generalOrder;
        }
	}