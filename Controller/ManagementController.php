<?php
	/*
	* La classe ManagementController gére la vue orderManagement.
	*/
	class ManagementController extends BaseController
	{
		/*
		* Affiche la vue orderManagement
		*/
		public function Management()
		{
			//Recuperer la commande général en cour
			$generalOrder = $_SESSION['generalOrder'];
			//Récuperer la liste des commandes individuelles concerné par la commande général 
			$table = $this->IndividualOrderManager->getOrderByGeneOrder($generalOrder->getIdOrder());
			//Récuperer la liste de tout les parfums
			$tPerfume = $this->PerfumeManager->getAllPerfume();

			if(isset( $_SESSION['individualOrder']))
			{
				$individualOrder = $_SESSION['individualOrder'];

			}
			//Ajouter les paramétres pour les récuperer dans la vue
			$this->addParam("table",$table);
			$this->addParam("tPerfume",$tPerfume);
			$this->addParam("generalOrder",$generalOrder);
			//Afficher la vue 'orderManagement.php'
			$this->View("orderManagement");
		}
	}