//Contrôler si le titre n'est pas vide
$(document).ready(function(){
  $('#validate').click(function(){
    valid = true;
    var name = $('#name').val();
    if(name !== ""){
      $('#error').text("");
    } else {
      valid = false;
      $('#error').text("Veuillez saisir un titre de commande.");
    }
    return valid;
  })
});
