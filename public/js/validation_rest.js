$('#send_pwd').click(function(){     
    var email = $('#send_email').val();       
    if(email == "" || !isValidEmailAddress(email)){
        if(email == ""){            
            $('#send_email').addClass("error_input");
            if($('#send_email').next().prop("tagName").toLowerCase()=="label")
                $('#send_email').next().remove();           
            $('<label class="error">Requered field</label>').insertAfter('#send_email');            
        }  
        else{
            $('#send_email').addClass("error_input");
            if($('#send_email').next().prop("tagName").toLowerCase()=="label")
                $('#send_email').next().remove();
            $('<label class="error">Email form incorrect</label>').insertAfter('#send_email');
        }              
        return false;
    }
    return true;
});
$('#send_email').keyup(function(){
    email_input($('#send_email'));
});
$('#pwd_rest').click(function(){     
    var pwd1,pwd2;    
    pwd1 = $('#pwd1').val();
    pwd2 = $('#pwd2').val();    
    if(pwd1 == "" || pwd2 == ""){        
        if(pwd1 == "" || !isValidPassword(pwd1)){
            $('#pwd1').addClass("error_input");            
            if(!isValidPassword(pwd1)){
                $("#pwd2").addClass("pwd_pad");
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
        return false
    }
    return true;
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
$('#confirm_pwd').click(function(){
    if($('#pwd').val() == ''){
        $('#pwd').addClass("error_input");
        if($('#pwd').next().prop("tagName").toLowerCase()=="label")
            $('#pwd').next().remove();           
        $('<label class="error">Requered field</label>').insertAfter('#pwd');       
    }
});
$('#pwd').keyup(function(){
    var pwd1 = $('#pwd').val(); 
    if(pwd1 == ''){
        $('#pwd').addClass("error_input");
        $('#pwd').removeClass("valid_input");        
        if($('#pwd').next().prop("tagName").toLowerCase()!="label")                    
            $('<label class="error">Requered field</label>').insertAfter('#pwd');     
    }
    else{        
        $('#pwd').addClass("valid_input");
        $('#pwd').removeClass("error_input");        
        if($('#pwd').next().prop("tagName").toLowerCase()=="label")
            $('#pwd').next().remove();
    }
});