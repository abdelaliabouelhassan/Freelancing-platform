//=================Validation Sign In Form=================
$('#btn_signin').click(function(){
    var pwd = $('#signin_password').val(); 
    var email = $('#signin_email').val();       
    if(email == "" || pwd == ""){
        if(email == "" || !isValidEmailAddress(email)){            
            $('#signin_email').addClass("error_input");
            if($('#signin_email').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">email false</label>').insertAfter('#signin_email');
        }
        if(pwd == ""){
            $('#signin_password').addClass("error_input");
            if($('#signin_password').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">password false</label>').insertAfter('#signin_password');            
        }
        return false;
    }
    return true;
});
$('#signin_email').keyup(function(){
    email_input($('#signin_email'));
}); 
$('#signin_password').keyup(function(){
    var pwd = $('#signin_password').val(); 
    if(pwd == ""){
        $('#signin_password').addClass("error_input");
        $('#signin_password').removeClass("valid_input");
        if($('#signin_password').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">password false</label>').insertAfter('#signin_password');
    }
    else{        
        $('#signin_password').addClass("valid_input");
        $('#signin_password').removeClass("error_input");
        if($('#signin_password').next().prop("tagName").toLowerCase()=="label")
            $('#signin_password').next().remove();
    }
});
//=================Validation Sign Up Form=================
$('#btn_signup').click(function(){
    var name,email,pwd1,pwd2,c2;
    name = $('#name').val();
    email = $('#email').val();
    pwd1 = $('#pwd1').val();
    pwd2 = $('#pwd2').val();
    c2 = $("#c2");
    if(name == "" || email == "" || pwd1 == "" || pwd2 == "" || !c2.is(':checked') || pwd1 != pwd2){
        if(name == ""){
            $('#name').addClass("error_input");
            if($('#name').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">Requered field</label>').insertAfter('#name');
        }
        if(email == ""){
            $('#email').addClass("error_input");
            if($('#email').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">Requered field</label>').insertAfter('#email');
        }
        if(pwd1 == "" || !isValidPassword(pwd1)){
            $('#pwd1').addClass("error_input");            
            if(!isValidPassword(pwd1)){
                $("#pwd_conf").addClass("pwd_pad");
                if($('#pwd1').next().prop("tagName").toLowerCase()!="label")                    
                    $('<label class="error pwd-pad">Password muste have lower and uper case number and special caracter</label>').insertAfter('#pwd1');
            }

        }
        if(pwd2 == "" || pwd1 != pwd2){
            $('#pwd2').addClass("error_input");
            if($('#pwd2').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">Requered field</label>').insertAfter('#pwd2');
            if(pwd2 != pwd1 && pwd2 != ""){
                if($('#pwd2').next().prop("tagName").toLowerCase()=="label")
                    $('#pwd2').next().remove();
                $('<label class="error">Password not mutch</label>').insertAfter('#pwd2');
            }
        }
        if(!c2.is(':checked')){
            $("#checkcolor").css("color","Red");
        }
        return false
    }
    return true;
});
$("#c2").change(function(){    
    if($("#c2").is(':checked')){
        $("#checkcolor").css("color","#000");
    }
});
$('#name').keyup(function(){
    var name = $('#name').val(); 
    if(name == ""){
        $('#name').addClass("error_input");
        $('#name').removeClass("valid_input");
        if($('#name').next().prop("tagName").toLowerCase()!="label")
                $('<label class="error">Requered field</label>').insertAfter('#name');
    }
    else{        
        $('#name').addClass("valid_input");
        $('#name').removeClass("error_input");
        if($('#name').next().prop("tagName").toLowerCase()=="label")
            $('#name').next().remove();
    }
});
$('#email').keyup(function(){
    email_input($('#email'));
});
$('#pwd1').keyup(function(){
    var pwd1 = $('#pwd1').val(); 
    if(!isValidPassword(pwd1)){
        $('#pwd1').addClass("error_input");
        $('#pwd1').removeClass("valid_input");
        $("#pwd_conf").addClass("pwd_pad");
        if($('#pwd1').next().prop("tagName").toLowerCase()!="label")                    
            $('<label class="error pwd-pad">Password muste have lower and uper case number and special caracter</label>').insertAfter('#pwd1');
    }
    else{        
        $('#pwd1').addClass("valid_input");
        $('#pwd1').removeClass("error_input");
        $('#pwd_conf').removeClass("pwd_pad");
        if($('#pwd1').next().prop("tagName").toLowerCase()=="label")
            $('#pwd1').next().remove();
    }
});
$('#pwd2').keyup(function(){
    var pwd2 = $('#pwd2').val(); 
    var pwd1 = $('#pwd1').val(); 
    if(pwd2 == "" || pwd1 != pwd2){
        $('#pwd2').addClass("error_input");
        $('#pwd2').removeClass("valid_input");
        if(pwd2 != pwd1){
            if($('#pwd2').next().prop("tagName").toLowerCase()=="label")
                $('#pwd2').next().remove();
            $('<label class="error">Password not mutch</label>').insertAfter('#pwd2');        
        }
        else{
            f($('#pwd2').next().prop("tagName").toLowerCase()=="label")
                $('#pwd2').next().remove();
            $('<label class="error">Requered field</label>').insertAfter('#pwd2');  
        }
    }
    else{        
        $('#pwd2').addClass("valid_input");
        $('#pwd2').removeClass("error_input");
        if($('#pwd2').next().prop("tagName").toLowerCase()=="label")
            $('#pwd2').next().remove();
    }
});