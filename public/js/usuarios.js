function validarPass(){
    var c1 = $('#txtpassword1').val();
    var c2 = $('#txtpassword2').val();

    if(c1!=c2){
        $('#aviso_pass').prop('hidden',false);
        $('#btnaceptar').prop('disabled',true);
    }else{
        $('#btnaceptar').prop('disabled',false);
        $('#aviso_pass').prop('hidden',true);
    }
}




//NIVELES DE LOS USUARIOS



