
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="listByOrder">
                    <label class="form-check-label" for="inlineRadio1">Liste par commande individuelle</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="singleList" checked>
                    <label class="form-check-label" for="inlineRadio2">Liste unique</label>
                </div>
                <div class="text-center mb-5">
                    <input type="button" class="btn btn-primary" id="btnPrint" value="Imprimer">
                </div>
            </div>
            <div id="print">
                <div id="singleList">
                    <div class="text-center" >
                        <h2 class="section-heading text-uppercase">Commande : <?= $generalOrder->getNameOrder() ?></h2>
                        <h3 class="section-subheading text-muted mb-1">Prix total : <?= $generalOrder->getPriceOrder() ?>€</h3>
                        <h3 class="section-subheading text-muted mb-1">Quantité totale : <?= $generalOrder->getQuantityOrder() ?></h3>
                    </div>
                    <div class="row mt-5">
                        <div class="col-3"></div>
                        <div class="col-6">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Parfum</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
    $beforeBrand = "";
    foreach($tEditOrder as $editOrder) { 
    if($editOrder->getBrand() !== $beforeBrand)
    {
        $beforeBrand = $editOrder->getBrand(); 
?>
                                    <thead>
                                        <tr>
                                            <th><?=$beforeBrand?></th>
                                        </tr>
                                    </thead>
<?php } ?>   
                                    <tr>
                                        <td><?=$editOrder->getName()?></td>
                                        <td><?=$editOrder->getGender()?></td>
                                        <td><?=$editOrder->getQuantity()?></td>
                                    </tr>
<?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
                <div id="listByOrder">
                    <div class="text-center" >
                        <h2 class="section-heading text-uppercase">Commande : <?= $generalOrder->getNameOrder() ?></h2>
                        <h3 class="section-subheading text-muted mb-1">Prix total : <?= $generalOrder->getPriceOrder() ?>€</h3>
                        <h3 class="section-subheading text-muted mb-1">Quantité totale : <?= $generalOrder->getQuantityOrder() ?></h3>
                    </div>
                    <div class="row mt-5">
                        <div class="col-3"></div>
                        <div class="col-6">
<?php
    foreach($tEditOrderByList as $editOrderByList) {
    {
?>
                            <h5>Commande : <?= key($tEditOrderByList) ?></h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Parfum</th>
                                        <th scope="col">Genre</th>
                                        <th scope="col">Quantité</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php 
    $beforeName = "";
    foreach($editOrderByList as $perfume) {
        if($perfume['name_brand'] !== $beforeName)
        {
            $beforeName = $perfume['name_brand'];
?>
                                    <thead>
                                        <tr>
                                            <th><?=$beforeName?></th>
                                        </tr>
                                    </thead> 
<?php } ?>  
                                    <tr>
                                        <td><?=$perfume['name_perfume']?></td>
                                        <td><?=$perfume['gender_perfume']?></td>
                                        <td><?=$perfume['quantity']?></td>
                                    </tr>
<?php }} ?>
                                </tbody>
                            </table>
<?php
    next($tEditOrderByList); 
    } 
?>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

