<?php
    /**
     * La classe PrintController gére la vue print
     * qui permet d'éditer une commande.
     */
	class PrintController extends BaseController
	{
        /**
         * Afficher la vue print
         */
		public function Print()
		{
            //Reset les sessions
			$_SESSION['generalOrder'] = "";
            $_SESSION['individualOrder'] = "";

            //Récuperer toutes les commandes général
			$tGeneralOrder = $this->GeneralOrderManager->getAll(array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));

            //Ajouter le parametre pour le récuperer dans la vue
			$this->addParam("tGeneralOrder",$tGeneralOrder);
			
            //Afficher la vue 'print.php'
			$this->View("print");
		}

        public function ShowPrint($idGeneralOrder)
        {
            //Récuperer en BDD la commande général séléctionné pour la modification
            $generalOrder = $this->GeneralOrderManager->getById($idGeneralOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));
            
            //La mettre dans la variable global 
            $_SESSION['generalOrder'] = $generalOrder;
        }

        /**
         * Préparer la vue pour l'impréssion
         */
        public function editPrint()
        {
            //Récuperer la commande general en cour
            $generalOrder = $_SESSION['generalOrder'];

            //Récuperer la liste de tout les parfums pour cette commande general
            $tEditOrder = $this->EditOrderManager->getOrder($generalOrder->getIdOrder());

            $tEditOrderByList = array();

            //Récuperer la liste des commandes individuelles pour cette commande général 
            $tIndividualOrder = $this->IndividualOrderManager->getOrderByGeneOrder($generalOrder->getIdOrder());

            foreach($tIndividualOrder as $individualOrder)
            {
                $tEditOrderByList[$individualOrder->getNameOrder()] = array();
                $perfumeList = $this->PerfumeManager->getPerfumeByOrderIndi($individualOrder->getIdOrder());
                foreach($perfumeList as $perfume)
                {
                    $possesses = $this->PossessesManager->getByIdPerfumeAndIdOrder($individualOrder->getIdOrder(), $perfume->getIdPerfume(), array("id_indi_order", "id_perfume", "quantity"));
                    $tListPerfume = array(
                        "name_perfume" => $perfume->getNamePerfume(),
                        "gender_perfume" => $perfume->getGenderPerfume(),
                        "name_brand" => $perfume->getBrandPerfume(),
                        "quantity" => $possesses->getQuantity()
                    );
                    array_push($tEditOrderByList[$individualOrder->getNameOrder()], $tListPerfume);
                }

            }
            //Récuperer les listes d'érreur dans une variable
            $message = '\n';
            $beforeBrand = "";
            foreach($tEditOrder as $editOrder) { 
            if($editOrder->getBrand() !== $beforeBrand)
                {
                    $beforeBrand = $editOrder->getBrand();
                    $message .= "\n".$beforeBrand.' :';
                    $message .= "\n";

                }
                    
                        $message .= "\n"."\t".$editOrder->getName();
                        $message .= " "."x".$editOrder->getQuantity();
                        $message .= "\n";
                        
                
            }
			//Chemin vers fichier texte
			$file ="C:/wamp64/www/Perfume/liste.txt";
			//Ouverture en mode écriture
			$fileopen=(fopen($file,'a'));
			//Ecriture de la liste d'érreyr dans le fichier texte
			fwrite($fileopen,"\n".$message);
			//On ferme le fichier
			fclose($fileopen);
             
            //Ajouter les paramètres pour les récuperer dans la vue
            $this->addParam("tEditOrder",$tEditOrder);
            $this->addParam("generalOrder",$generalOrder);
            $this->addParam("tEditOrderByList", $tEditOrderByList);

            //Afficher la vue 'showPrint.php'
			$this->View("showPrint");
        }

	}