<section class="page-section" id="services">
            <div class="container">
                <!--<form action="index.php?action=ajouterParfum">-->
                    <div id="InfoCommande">
                        <h1>Commande : <?= $generalOrder->getNameOrder()?></h1>
                        <h2>Quantité parfums : <?= $generalOrder->getQuantityOrder()?></h2>
                        <h2>Prix total : <?= $generalOrder->getPriceOrder()?> €</h2>
                        <input id="idGeneralOrder" type="hidden" value="<?= $generalOrder->getIdOrder()?>">
                    </div>
                    <nav class="navbar navbar-expand-lg bg-light">
                        <div class="container-fluid">
                            <button type="button" id="btn" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
                            Ajouter une personne
                            </button>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div>            
                            <!-- Modal -->
                            <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form id="formModal" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="ModalLongTitle">Ajout d'une commande individuelle</h5>
                                                <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">                                        <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <input type="text" class="form-control" id="name" placeholder="Entrez un nom">
                                                <p class="text-danger" id="error"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnClose" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="button" id="save" class="btn btn-primary">Enregistrer</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!--Affichage de la navbar avec requete Ajax -->
                                <?php foreach($table as $value) {
                                    echo '
                                    <ul class="navbar-nav  mb-2 mb-lg-0" id="ul">
                                        <li class="nav-item">
                                            <!--<a class="nav-link" href="#" id="btnCommande" name="'.$value->getNameOrder().'">'.$value->getNameOrder().'</a>-->
                                            <button type="button" class="btn nav-link" id="btnIndiOrder" name="'.$value->getIdOrder().'">'.$value->getNameOrder().'</button>
                                        </li>
                                    </ul>';
                                    }; ?>
                            </div>
                        </div>
                    </nav>
                    <div class="row text-center mt-4">
                        <div class=" form-group col-md-6 border showOrder">
                            <input class="form-control mt-2" type="text" id="text" placeholder="Rechercher un parfum">
                            <div class="mt-2" id="table">
                                <table class="table table-hover">
                                    <tbody id="tbody">
                                        <!--Affichage liste des parfums avec requete Ajax-->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6 border showOrder" id="showIndividualOrder">
                            <h5 class="mt-5">Aucune commande individuelle</h5>
                            <!--Affichage des details d'une commande indi avec requete Ajax-->
                       </div>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="ModalCenterDelete" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form id="formModalDelete" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLongTitleDelete"></h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btnCloseDelete" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                        <button type="button" id="validateDelete" name="" class="btn btn-primary">Supprimer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <!--</form>-->
            </div>
        </section>