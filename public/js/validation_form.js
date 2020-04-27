function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}

function isValidPassword(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) &&
        /[a-z]/.test(value) &&
        /\d/.test(value) &&
        /.{8,}/.test(value) &&
        /[^\w\s]/.test(value)
}

function email_input(email) {
    var val = email.val();
    console.log(val);
    if (!isValidEmailAddress(val)) {
        email.addClass("error_input");
        email.removeClass("valid_input");
        if (email.next().prop("tagName").toLowerCase() == "label")
            email.next().remove();
        $('<label class="error">Email form incorrect</label>').insertAfter(email);
    } else {
        email.addClass("valid_input");
        email.removeClass("error_input");
        if (email.next().prop("tagName").toLowerCase() == "label")
            email.next().remove();
    }
}

function pwd_input(pwd) {
    var pwd1 = pwd.val();
    if (!isValidPassword(pwd1)) {
        pwd.addClass("error_input");
        pwd.removeClass("valid_input");        
        if (pwd.next().prop("tagName").toLowerCase() != "label")
            $('<label class="error pwd-pad">Password muste have lower and uper case number and special caracter</label>').insertAfter(pwd);
    } else {
        pwd.addClass("valid_input");
        pwd.removeClass("error_input");
        pwd.removeClass("pwd_pad");
        if (pwd.next().prop("tagName").toLowerCase() == "label")
            pwd.next().remove();
    }
}