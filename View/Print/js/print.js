$(document).ready(function(){
    $("tr").on("click", function(){
        var idGeneralOrder = $(this).attr("id");
        
        if(idGeneralOrder !== ""){
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/Print',
                data : 'idGeneralOrder=' + encodeURIComponent(idGeneralOrder),
                success : function(data){
                    console.log(data);
                    window.location.replace("http://localhost/perfume/EditPrint")
                }
            });
        }
    })
})