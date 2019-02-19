// flags de validação de submit
var flagEmail = 1;
var flagUsername = 1;
var flagPassword = 1;

//verifica se email ja existe ajax


$('#email').blur(function(){
    $("#erroEmail").html("");
    var email = $('#email').val();
    var url = $('#url').val();
 
    $.post(url+"utilizador/verificaEmailAjax", 
    {
        "email": email,
    }, 
    
    function(result){
        if(result==1){
            $("#erroEmail").html('<i class="fas fa-exclamation-circle"></i> Email ja existentente');
            flagEmail = 0;
        }else{
            flagEmail = 1;
        }
        
    }); 

});

//verifica se login ja existe ajax
$('#username').blur(function(){
    $("#erroUsername").html("");
    // $("#submit").attr("disabled", false);

    var username = $('#username').val();
    var url = $('#url').val();

    $.post(url+"utilizador/verificaEmailAjax", 
    {
        "username": username
    }, 
    
    function(result){
        if(result==1){
            $("#erroUsername").html('<i class="fas fa-exclamation-circle"></i> Username ja existentente');
            // $("#submit").attr("disabled", true);
            flagUsername = 0;
        }else{
            flagUsername = 1;
        }
        
    }); 

});
//verifica se cc ja existe ajax
$('#cc').blur(function(){
    $("#erroCC").html("");
    // $("#submit").attr("disabled", false);

    var cc = $('#cc').val();
    var url = $('#url').val();

    $.post(url+"cliente/trataAjaxCliente", 
    {
        "cc": cc
    }, 
    
    function(result){
        if(result==1){
            $("#erroCC").html('<i class="fas fa-exclamation-circle"></i> Cartão de cidadão ja existentente');
            // $("#submit").attr("disabled", true);
            flagUsername = 0;
        }else{
            flagEmail = 1;
        }
        
    }); 

});

//event listener para verificar se passwords coincidem 
$('#confirmPasswordRegisto').blur(function(){
    var confirmPassword = $('#confirmPasswordRegisto').val();
    var passwordRegisto = $('#passwordRegisto').val();
    
    if(confirmPassword != passwordRegisto){
        $('#confirmPw').html('<i class="fas fa-exclamation-circle"></i> Passwords nao coincidem');
        flagPassword = 0;
    }else{
        $('#confirmPw').html('');
        flagPassword = 1;
    }
});

//cancela o submit do formulario se tiver algum erro 

$('#formRegisto').submit(function(event){
    if(flagEmail!=1 || flagUsername!=1 || flagPassword!=1){
        event.preventDefault();
    }   
    
});