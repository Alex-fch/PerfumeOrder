$(document).ready(function(){
    //Afficher la liste de parfums par défaut
    showList();

    //Ouvrir la modal
    $("#btn").click(function(){
        $("#ModalCenter").modal('show');
    });
    //Fermer la modal 
    $("#close").click(function(){
        $("#ModalCenter").modal('hide');
    });
    //Fermer la modal (avec le bouton 'Fermer')
    $("#btnClose").click(function(){
        $("#ModalCenter").modal('hide');
    });

    //Ouvrir la modal pour supprimer un parfum
    $(document).on('click', '#delete', function(){
        var idPerfume = $(this).attr("name");
        $("#validateDelete").attr("name" , idPerfume);
        $("#ModalLongTitleDelete").text("Voulez-vous supprimer ce parfum ?");
        $("#ModalCenterDelete").modal('show');
    });

    //Fermer la modal "supprimer un element" (avec le bouton 'Fermer')
    $(document).on('click', '#btnCloseDelete', function(){
        $("#ModalCenterDelete").modal('hide');
    });

    //Valider la modal "supprimer un parfum"
    $(document).on('click', '#validateDelete', function(){
        var idPerfume = $(this).attr("name");
        DeletePerfume(idPerfume);
        $("#ModalCenterDelete").modal('hide');
    });

    //Ouvrir la modal pour supprimer une commande individuelle
    $(document).on('click', '#indiOrderDelete', function(){
        var idIndiOrder = $(this).attr("name");
        $("#validateDelete").attr("name" , idIndiOrder);
        $("#validateDelete").attr("id" , "validateDeleteIndiOrder");
        $("#ModalLongTitleDelete").text("Voulez-vous supprimer cette commande individuelle ?");
        $("#ModalCenterDelete").modal('show');
    });

    //Valider la modal "supprimer un parfum"
    $(document).on('click', '#validateDeleteIndiOrder', function(){
        var idIndividualOrder = $(this).attr("name");
        deleteIndividualOrder(idIndividualOrder);
        $("#ModalCenterDelete").modal('hide');
    });

    //Ajouter une nouvelle commande individuelle
    $('#save').click(function(){
        var name = $('#name').val();
        var idGeneralOrder = $('#idGeneralOrder').val();
        if (name != ""){
            $('#error').text(""); 
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/AjaxCreateIndiOrder',
                data : "nameIndividualOrder=" + encodeURIComponent(name) +
                        "&idGeneralOrder=" + encodeURIComponent(idGeneralOrder),
                dataType : 'json',
                success : function(data) {
                    if(data !== false) {
                        $('#navbarSupportedContent').load("http://localhost/perfume/Management #navbarSupportedContent");
                        showIndividualOrder(data, idGeneralOrder)
                        $('#name').val("");
                        $("#ModalCenter").modal('hide');
                    } else {
                        $('#error').text("Le titre est déja utilisé.");
                    }

                }
            });

        } else {
            $('#error').text("Veuillez entrer un titre.");  
        }
    })

    //Fonction pour afficher la liste des parfums par défaut
    function showList(){
        if($('#text').val() == ""){
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/AjaxShowPerfume',
                data : 'text=' + encodeURIComponent(text),
                success : function(data){
                    document.getElementById("tbody").innerHTML = data;    
                }
            });
        };
    }

    //Rechercher un parfum
    $('#text').keyup(function(){
        var text = $(this).val();
        document.getElementById("tbody").innerHTML = "";
    
        if(text !== "") {
          $.ajax({
            type : 'POST',
            url : 'http://localhost/perfume/AjaxShowPerfume',
            data : 'text=' + encodeURIComponent(text),
            success : function(data){
                document.getElementById("tbody").innerHTML = data;
            }
          });
        } else {
            showList();
        }
    });

    //Afficher une 'sous commande' sur le click de la navbar
    $(document).on('click', '#btnIndiOrder', function(){
        var name = $(this).attr("name");
        var idGeneralOrder = $('#idGeneralOrder').val();
        showIndividualOrder(name, idGeneralOrder);
    });

    //Ajouter un parfum à une sous commande
    $(document).on('click', '#perfumeBtn', function(){
        var idPerfume = $(this).attr("name");
        var idIndividualOrder = $('#idIndiOrder').val();
        var idGeneralOrder = $('#idGeneralOrder').val();
        var value = "1";
        console.log(idPerfume);
        if(idIndividualOrder == undefined) {
            $("#ModalCenter").modal('show');
        } else {
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/AjaxModifyQuantityPerfume',
                data : 
                    "idIndividualOrder=" + encodeURIComponent(idIndividualOrder) +
                    "&idPerfume=" + encodeURIComponent(idPerfume) +
                    "&quantity=" + encodeURIComponent(value),
                success : function(data){
                    $('#InfoCommande').load("http://localhost/perfume/Management #InfoCommande");
                    showIndividualOrder(idIndividualOrder, idGeneralOrder);
                }
            })
        }
    })

    function showIndividualOrder(idIndividualOrder, idGeneralOrder){
        $.ajax({
          type : 'POST',
          url : 'http://localhost/perfume/AjaxShowIndividualOrder',
          data : 
          "idIndividualOrder=" + encodeURIComponent(idIndividualOrder) +
          "&idGeneralOrder=" + encodeURIComponent(idGeneralOrder),
          success : function(data){
                document.getElementById("showIndividualOrder").innerHTML = data;                
            }
        })
    }

    //Supprimer un parfum d'un commande individuelle
    function DeletePerfume(idPerfume){
        var idIndividualOrder = $('#idIndiOrder').val();
        var idGeneralOrder = $('#idGeneralOrder').val();
        $.ajax({
            type : 'POST',
            url : 'http://localhost/perfume/AjaxDeletePerfume',
            data : 
            "idIndividualOrder=" + encodeURIComponent(idIndividualOrder) +
            "&idPerfume=" + encodeURIComponent(idPerfume),
            success : function(data){
                $('#InfoCommande').load("http://localhost/perfume/Management #InfoCommande");
                showIndividualOrder(idIndividualOrder, idGeneralOrder);
            }
        })
    }

    //Gérer la quantité d'un parfum pour une commande individuelle
    $(document).on('keyup click', '.quantity', function(){
        var value = $(this).val();
        var idPerfume = $(this).attr("name");
        var idIndividualOrder = $('#idIndiOrder').val();
        var idGeneralOrder = $('#idGeneralOrder').val();
        /*value = value.replace(/[\-]/g, "");*/

        if($(this).val() == "0"){
            value = "1";
        }
        $(this).val(value);
        if(value !== ""){
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/AjaxModifyQuantityPerfume',
                data : 
                "idIndividualOrder=" + encodeURIComponent(idIndividualOrder) +
                "&idPerfume=" + encodeURIComponent(idPerfume) +
                "&quantity=" + encodeURIComponent(value),
                success : function(data){
                    $('#InfoCommande').load("http://localhost/perfume/Management #InfoCommande");
                    showIndividualOrder(idIndividualOrder, idGeneralOrder);
                }
            })
        }
    })

    //Supprimer une commande individuelle
    function deleteIndividualOrder(idIndividualOrder){
        var idGeneralOrder = $('#idGeneralOrder').val();
        if(idIndividualOrder !== ""){
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/AjaxDeleteIndividualOrder',
                data : 
                "idIndividualOrder=" + encodeURIComponent(idIndividualOrder),
                success : function(data){
                    $('#navbarSupportedContent').load("http://localhost/perfume/Management #navbarSupportedContent");
                    $('#InfoCommande').load("http://localhost/perfume/Management #InfoCommande");
                    if(data !== ""){
                        showIndividualOrder(data, idGeneralOrder);
                    } else {
                        document.getElementById("showIndividualOrder").innerHTML = "<h5 class='mt-5'>Aucune commande individuelle</h5>";
                    }
                }
            })
        }
    }
});
