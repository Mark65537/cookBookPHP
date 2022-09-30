$(document).ready(function(){
    $("#ingrAdd").on("click", function(){
        ingr=$('#select option:selected').html();
        measure=$('#measure').html();
        num=$('#num').val();
        $("#ingrDiv").html($("#ingrDiv").html()+"<span style='background:#966636'><span>"+ingr+" "+num+" "+measure+"</span>" +
                                                "<button id='but_X' type='button'>X</button></span>&nbsp;");
    });
    $("#ingrDiv").on("click", function(e){
        if(e.target.id=="but_X")
            e.target.parentElement.remove();
    });
});