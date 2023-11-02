$(document).ready(function(){
    $("#btnPrint").on("click", function(){
        var printContent = $("#print").html();
        var originalContent = $("body").html();
        $("body").html(printContent);
        window.print();
        $("body").html(originalContent);
    })

    $("#listByOrder").hide();

    $("#inlineRadio1").on("click", function(){
        $("#listByOrder").show();
        $("#singleList").hide();
    });

    $("#inlineRadio2").on("click", function(){
        $("#listByOrder").hide();
        $("#singleList").show();
    })
})