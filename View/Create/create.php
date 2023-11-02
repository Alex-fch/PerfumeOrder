<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Créer une commande</h2>
            <h3 class="section-subheading text-muted">Laisse toi guider pour faire ta commande</h3>
        </div>
        <form id="formCreate" action="CreateOrder" method="post">
            <div class="row text-center">
            <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="my-3">Titre de la commande</h4>
                    <input type="text" class="form-control" name="name" id="name">
                    <p class="text-danger" id="error"><?= $message; ?></p>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row text-center mt-3">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                <button type="submit" class="btn btn-primary" id="validate">Valider</button>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </form>
    </div>
</section>