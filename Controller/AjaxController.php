<?php
	/*
	* La classe AjaxController gére les requetes Ajax
	* Permet de réaliser des action en BDD sans recharger la page.
	*/
	class AjaxController extends BaseController
	{	
		/**
		 * Permet de créer une commande individuel
		 */
		public function CreateIndiOrder($nameIndividualOrder, $idGeneralOrder)
		{
			//Verifier si le titre de la commande n'est pas déja utilisé
			$checkIfExist = $this->IndividualOrderManager->getByNameByGeneOrder($nameIndividualOrder, $idGeneralOrder);
			if(!empty($checkIfExist)) 
			{
				//Si il est utilisé, on retourne false
				echo json_encode(false);
			} else {
				//Sinon, On créer un nouvel objet commande individuelle
				$individualOrder = new IndividualOrder("0", $nameIndividualOrder, "0", date("m.d.y"), "0", $idGeneralOrder);
				//On l'insert en BDD
				$lastInsertid = $this->IndividualOrderManager->create($individualOrder, array("id_indi_order", "name_indi_order", "price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
				//On renvoie l'id du dernier insert en BDD
				echo json_encode($lastInsertid);
			}

		}

		/**
		 * Permet d'afficher la liste complete des parfums
		 */
		public function ShowListPerfume($text)
		{
			if($text === "[object HTMLInputElement]")
			{
				$tPerfume = $this->PerfumeManager->getAllPerfume();
			} else {
				$tPerfume = $this->PerfumeManager->getSearchPerfume($text);
			}
			
			if(!empty($tPerfume))
			{
				$previoslyM = "";
				$previoslyS = "";
				foreach ($tPerfume as $value) {
					if($value->getGenderPerfume() !== $previoslyS || $value->getBrandPerfume() !== $previoslyM) {
						echo '<thead>
								<tr class="table-primary">
									<th scope="col">'.$value->getBrandPerfume().' '.ucfirst($value->getGenderPerfume()).'</th>
								</tr>
							</thead>';
		
						$previoslyS = $value->getGenderPerfume() ;
						$previoslyM = $value->getBrandPerfume();
					}
						echo '<tr>
								<td>
									<button type="button" class="btn" id="perfumeBtn" name="'.$value->getIdPerfume().'">'.$value->getNamePerfume().'</button>
								</td>
							</tr>';
				}
			} else {
				echo '<tr>
						<td>
							Aucun resultat pour la recherche : '.$text.'
						</td>
					</tr>';
			}
		}

		/**
		 * Permet d'afficher la liste des parfums d'une commande individuelle
		 */
		public function showIndiviualOrder($idIndividualOrder, $idGeneralOrder)
		{
			if($idIndividualOrder == "") {
				echo "Ajouter une nouvelle commande individuelle";
			} else {
			$individualOrder = $this->IndividualOrderManager->getOneOrderByGeneOrder($idGeneralOrder, $idIndividualOrder);
			$tPerfume = $this->PerfumeManager->getPerfumeByOrderIndi($individualOrder->getIdOrder());
			$_SESSION['individualOrder'] = $individualOrder;
			echo '
				<div class="row sticky-top back">
					<div class="col-2 align-self-center">
						<button type="button" class="btn" id="indiOrderDelete" name="'.$idIndividualOrder.'">
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
								<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
								<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
							</svg>
						</button>
					</div>
					<div class="col-8">
						<h3 id="titreCommande">'.$individualOrder->getNameOrder().'</h3>
						<h4>Quantite parfums : '.$individualOrder->getQuantityOrder().'</h4>
						<h4>Prix total : '.$individualOrder->getPriceOrder().' €</h4>
						<input type="hidden" id="idIndiOrder" value="'.$individualOrder->getIdOrder().'">
					</div>
					<div class="col-2">
					</div>
				</div>';
				if(!empty($tPerfume))
				{
					$previoslyM = "";
					$previoslyS = "";
					echo 
					'<div class="mt-2">
					<table class="table table-hover">
						<tbody>';
					foreach ($tPerfume as $value) {
						$possesses = $this->PossessesManager->getByIdPerfumeAndIdOrder($idIndividualOrder, $value->getIdPerfume(), array("id_indi_order", "id_perfume", "quantity"));
						if($value->getGenderPerfume() !== $previoslyS || $value->getBrandPerfume() !== $previoslyM) {
							echo '<thead>
									<tr class="table-primary">
										<th scope="col">'.$value->getBrandPerfume().' '.ucfirst($value->getGenderPerfume()).'</th>
									</tr>
								</thead>';
			
							$previoslyS = $value->getGenderPerfume() ;
							$previoslyM = $value->getBrandPerfume();
						};
							echo '<tr>
									<td>
										<div class="row">
											<div class="col-2 align-self-center">
												<button type="button" class="btn" id="delete" name="'.$value->getIdPerfume().'">
													<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
														<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
														<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
										  			</svg>
												</button>
											</div>
											<div class="col-8">
												<button type="button" class="btn" id="perfumeBtn" name="'.$value->getIdPerfume().'">'.$value->getNamePerfume().'</button>
											</div>
											<div class="col-2 align-self-center">
												<input type="number" class="text-right quantity" name="'.$value->getIdPerfume().'" value="'.$possesses->getQuantity().'" min="1">
											</div>
										</div>
									</td>
								</tr>';
					};
				} else {
					echo '<tr>
							<td>
								La commande est vide.
							</td>
						</tr>';
				};
					echo
						'</tbody>
					</table>
					</div>';
			}
		}

		/**
		 * Permet de supprimer un parfum d'une commande individuelle
		 */
		public function deletePerfume($idIndividualOrder, $idPerfume)
		{
			//Recupérer l'objet possesses en BDD concerné par la modification (si il existe)
			$possesses = $this->PossessesManager->getByIdPerfumeAndIdOrder($idIndividualOrder, $idPerfume, array("id_indi_order", "id_perfume", "quantity"));
			//supprimer l'objet en BDD
			$this->PossessesManager->deletePerfume($possesses, array("id_indi_order", "id_perfume"));
			//Récuperer l'objet commande individuelle
			$individualOrder = $_SESSION['individualOrder'];
			//Récuperer l'objet commande général
			$generalOrder = $_SESSION['generalOrder'];
			//Modifier la quantité et le prix de la commande individuelle
			$quantity = $this->PossessesManager->getCountQuantityPerfume($idIndividualOrder);
			$totalPrice = $this->IndividualOrderManager->getTotalPrice($idIndividualOrder);
			$individualOrder->setQuantityOrder($quantity[0]);
			$individualOrder->setPriceOrder($totalPrice[0]);
			//Modifier la commande individuelle en BDD
			$this->IndividualOrderManager->update($individualOrder, array("id_indi_order", "name_indi_order", "price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			//Modifier la quantit" et le prix de la commande général
			$quantityGeneOrder = $this->IndividualOrderManager->getTotalQuantityByGeneOrder($generalOrder->getIdOrder());
			$priceGeneOrder = $this->IndividualOrderManager->getTotalPriceByGeneOrder($generalOrder->getIdOrder());
			$generalOrder->setQuantityOrder($quantityGeneOrder[0]);
			$generalOrder->setPriceOrder($priceGeneOrder[0]);
			//Modifier la commande général en BDD
			$this->GeneralOrderManager->update($generalOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));

		}

		/**
		 * Permet de modifier la quantité d'un parfum selectionné 
		 * dans une commande individuelle.
		 */
		public function modifyQuantityPerfume($idIndividualOrder, $idPerfume, $value)
		{
			//Récuperer l'objet commande individuelle
			$individualOrder = $_SESSION['individualOrder'];
			//Récuperer l'objet commande général
			$generalOrder = $_SESSION['generalOrder'];
			//Recuperer le parfum selectionné en BDD
			$perfume = $this->PerfumeManager->getPerfumeById($idPerfume);
			//Recupérer l'objet possesses en BDD concerné par la modification (si il existe)
			$possesses = $this->PossessesManager->getByIdPerfumeAndIdOrder($idIndividualOrder, $idPerfume, array("id_indi_order", "id_perfume", "quantity"));
			//Si l'objet retourné en BDD est faux alors on ajoute un parfum
			if($possesses == false)
			{
				//Creer un nouvel objet possesses
				$newPossesses =  new Possesses($idIndividualOrder, $idPerfume, $value);
				//Inseret l'objet possesses en BDD
				$this->PossessesManager->create($newPossesses, array("id_indi_order", "id_perfume", "quantity"));//Ajouter l'objet Posseses en BDD
			} else {
				//Modifier la quantité dans l'objet possesses
				$possesses->setQuantityPossesses($value);
				//Modifier le possesses en BDD
				$this->PossessesManager->updatePossesses($possesses, array("quantity", "id_indi_order", "id_perfume" ));
			}
			//Modifier la quantité et le prix de la commande individuelle
			$quantity = $this->PossessesManager->getCountQuantityPerfume($idIndividualOrder);
			$totalPrice = $this->IndividualOrderManager->getTotalPrice($idIndividualOrder);
			$individualOrder->setQuantityOrder($quantity[0]);
			$individualOrder->setPriceOrder($totalPrice[0]);
			//Modifier la commande individuelle en BDD
			$this->IndividualOrderManager->update($individualOrder, array("id_indi_order", "name_indi_order", "price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			//Modifier la quantit" et le prix de la commande général
			$quantityGeneOrder = $this->IndividualOrderManager->getTotalQuantityByGeneOrder($generalOrder->getIdOrder());
			$priceGeneOrder = $this->IndividualOrderManager->getTotalPriceByGeneOrder($generalOrder->getIdOrder());
			$generalOrder->setQuantityOrder($quantityGeneOrder[0]);
			$generalOrder->setPriceOrder($priceGeneOrder[0]);
			//Modifier la commande général en BDD
			$this->GeneralOrderManager->update($generalOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));
		}

		/**
		 * Permet de supprimer une commande individuelle.
		 */
		public function deleteIndividualOrder($idIndividualOrder)
		{
			//Récuperer l'objet commande général
			$generalOrder = $_SESSION['generalOrder'];
			//Creer un objet possesses pour la suppression dans la table
			$possesses = new Possesses($idIndividualOrder, "1", "1");
			//Supprimer en BDD
			$this->PossessesManager->delete($possesses, array("id_indi_order", "id_perfume", "quantity"));
			//Récuperer l'objet commande individuelle
			$individualOrder = $_SESSION['individualOrder'];
			//Supprimer en BDD
			$this->IndividualOrderManager->delete($individualOrder, array("id_indi_order", "name_indi_order", "price_indi_order", "date_indi_order", "quantity_indi_order", "id_gene_order"));
			//Modifier la quantité et le prix de la commande général
			$quantityGeneOrder = $this->IndividualOrderManager->getTotalQuantityByGeneOrder($generalOrder->getIdOrder());
			$priceGeneOrder = $this->IndividualOrderManager->getTotalPriceByGeneOrder($generalOrder->getIdOrder());
			//Si la quantité récupérer est NULL alors la quantité = 0 et le prix = 0
			if($quantityGeneOrder[0] == NULL)
			{
				$quantityGeneOrder[0] = "0";
				$priceGeneOrder[0] = "0";
			}
			$generalOrder->setQuantityOrder($quantityGeneOrder[0]);
			$generalOrder->setPriceOrder($priceGeneOrder[0]);
			//Modifier la commande général en BDD
			$this->GeneralOrderManager->update($generalOrder, array("id_gene_order", "name_gene_order", "price_gene_order", "date_gene_order", "quantity_gene_order"));
			//retourner la premiere commande individuelle pour affichage
			$tIndividualOrder = $this->IndividualOrderManager->getOrderByGeneOrder($generalOrder->getIdOrder());
			//Si le tableau retourné n'est pas vide alors on renvoi la premiere commande récupéré
			if(!empty($tIndividualOrder))
			{
				$individualOrder = $tIndividualOrder[0]->getArray();
				$idIndividualOrder = $individualOrder[0];
				if(empty($idIndividualOrder)) {
					$idIndividualOrder = "";
				}
				echo $idIndividualOrder;
			}
		}
	}