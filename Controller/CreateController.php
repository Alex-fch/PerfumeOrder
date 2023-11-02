<?php
	/*
	* La classe CreateController gére la vue create
	* pour créer une commande générale.
	*/
	class CreateController extends BaseController
	{
		/*
		* Affiche la vue create.
		*/
		public function Create()
		{
			$this->addParam("message","");
			//Afficher la vue "create.php"
			$this->View("create");
		}
		
		/*
		* Créer une commande générale en BDD
		* $name le titre de la commande entré par l'utilisateur.
		*/
		public function CreateOrder($name)
		{
			//Verifier si le nom de commande n'existe pas
			$CheckIfExist = $this->GeneralOrderManager->getByName($name);
			//Si il existe alors...
			if($CheckIfExist)
            {
				$this->addParam("message", "Cette commande existe déja, veuillez choisir un autre titre.");
				$this->View("create");
			//Sinon...	
            } else {
				//Créer un nouvel objet general order
				$generalOrder = new GeneralOrder("0", $name, "0", date("m.d.y"), "0");
				//Inserer l'objet en BDD
				$this->GeneralOrderManager->create($generalOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));
				//On recupere en BDD la nouvelle commande générale créer (pour avoir son id)
				$generalOrder = $this->GeneralOrderManager->getByName($generalOrder->getNameOrder());
				//On le place dans une variable global
				$_SESSION['generalOrder'] = $generalOrder;
				//On redidirige vers la page pour gérer la commande créer
				header('Location: http://localhost/perfume/Management');
                
            }    
		}
	}