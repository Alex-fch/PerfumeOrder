$(document).ready(function(){
    $("tr").on("click", function(){
        var idGeneralOrder = $(this).attr("id");
        if(idGeneralOrder !== ""){
            $.ajax({
                type : 'POST',
                url : 'http://localhost/perfume/Modify',
                data : 'idGeneralOrder=' + encodeURIComponent(idGeneralOrder),
                success : function(data){
                    window.location.replace("http://localhost/perfume/Management")
                }
            });
        }
    })
})