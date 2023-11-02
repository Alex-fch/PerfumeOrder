<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Liste des commandes actuelles</h2>
            <h3 class="section-subheading text-muted">Selectionne une commande pour la modifier</h3>
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