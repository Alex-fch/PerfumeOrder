<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Liste des commandes actuelles</h2>
            <h3 class="section-subheading text-muted">Selectionne une commande pour l'éditer</h3>
        </div>
        <form id="formCreate" action="CreateOrder" method="post">
            <div class="row text-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="col-md-4"></div>
            </div>
            <div class="row mt-5">
                <div class="col-3"></div>
                <div class="col-6">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Titre</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Quantité</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tGeneralOrder as $generalOrder) { ?>
                            <tr onclick="" class="tableCell" id="<?=$generalOrder->getIdOrder()?>">
                                <td><?= $generalOrder->getNameOrder()?></td>
                                <td><?= $generalOrder->getPriceOrder()?></td>
                                <td><?= $generalOrder->getQuantityOrder()?></td>
                                <td><?= $generalOrder->getDateOrder()?></td>
                                <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                                        <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
                                        <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
                                    </svg>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-3"></div>
            </div>
        </form>
    </div>
</section>