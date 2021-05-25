require('./bootstrap');
$(document).ready( function (){
    //LOGIN
    //animacion block dni
    $("input#dni_input_login").click(function (){
        $(".dni_mov").animate({top: "16px"}, 500)
    });
    //animacion block password
    $("input#password_input_login").click(function (){
        $(".pass_mov").animate({top: "95px"}, 500)
    });
    //forgot password
    $(".forgot_password").click(function (){
        $(this).css("color","#50B2CE");
        $(".popup").css("display","block");
    });
    $(".close_login").click(function (){
        $(".popup").css("display","none");
    });

    //FILTRAR TRABAJADORAS
    $("#dni_search").blur(function (){
        //ajax
        $("#tabla_filtrar").css("display","block");
    });
    $("#select_zonas").on("change",function(){
        var valor=$('select[name=select_zonas]').val();
       /* $.ajax({
            url:"",
            data:{'valor':valor},
            success:function(data){
                $("#tabla_filtrar").css("display","block");
            }*/
        $(".zona_tabla_camp").html(valor);
        $("#tabla_filtrar").css("display","block");
        });

    $(".limpiar_filtro").click(function (){
        $("#tabla_filtrar").css("display","none");
    });

    //USUARIOS
    //Modificar usuario

    $("#update").on("click", function(){
        $("input").css("display", "flex")
        $("label").css("display", "flex")
    })

});
//HEADER
//datetime
function datetime (){
    var datetime = new Date();
    var day= datetime.getDate();
    var month=(datetime.getMonth() +1);
    var year=datetime.getFullYear();
    var h=datetime.getHours();
    var m=datetime.getMinutes();
    var s=datetime.getSeconds();
    if (h < 10) {
        h = "0" + h;
    }
    if (m < 10) {
        m = "0" + m;
    }
    if (s < 10) {
        s = "0" + s;
    }

    $(".date").html(day+"/"+month+"/"+year+"-"+h+":"+m+":"+s);

}
setInterval(datetime,1000);
