$(document).ready(function(){

    $('#datetimepicker').datetimepicker({
        format:	'd.m.Y H:i',
        formatTime:	'H:i',
        formatDate:	'd.m.Y',
        minDate: 0//yesterday is minimum date(for today use 0 or -1970/01/01)
    });

    $('#cancel').click(function(){
        var answer = confirm('Are you sure you want to cancel your account?');
        return answer;
    });


    $("#registrationForm").validate({
        rules: {
            loginInput: {
                required: true,
                minlength: 2
            },
            emailInput: {
                required: true,
                email: true
            },
            phoneInput: {
                required: true,
                digits : true,
                minlength: 2
            },
            passwordInput: {
                required: true,
                minlength: 5
            },
            passwordConfirmationInput: {
                equalTo: "#passwordInput"
            }

        },
        messages: {
            loginInput: "Please enter your login",
            emailInput: "Please enter a valid email address",
            phoneInput: {
                required: "Please enter a phone number",
                digits: "Digits only",
                minlength: "Your username must consist of at least 2 characters"
            },
            passwordInput: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            passwordConfirmationInput: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter the same password as above"
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element).parent('div').removeClass('has-success'); // <-- added this line
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
            $(element).parent('div').removeClass('has-error');
            $(element).parent('div').addClass('has-success'); // <-- added this line
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
            error.addClass('form-error help-block');
        }
    });

    $('#passwordConfirmationInput').change(function(){
        if ($(this).val != $('#passwordInput').val()){
            alert('Password and Password confirm are not equal');
        }
    });

    $("#loginForm").validate({
        rules: {
            login: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            loginInput: "Enter your login",
            password: "Provide a password"
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element).parent('div').removeClass('has-success'); // <-- added this line
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
            $(element).parent('div').removeClass('has-error');
            $(element).parent('div').addClass('has-success'); // <-- added this line
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
            error.addClass('form-error help-block');
        }
    });

    $("#smsForm").validate({
        rules: {
            phonenumberInput: {
                required: true,
                digits : true,
                minlength: 2
            },
            textInput: {
                required: true
            }
        },
        messages: {
            phonenumberInput: "Enter Phone Number",
            textInput: "Enter message"
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass(errorClass).removeClass(validClass);
            $(element).parent('div').removeClass('has-success'); // <-- added this line
            $(element).parent('div').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass(errorClass).addClass(validClass);
            $(element).parent('div').removeClass('has-error');
            $(element).parent('div').addClass('has-success'); // <-- added this line
        },
        errorElement: "span",
        errorPlacement: function(error, element) {
            error.insertAfter(element);
            error.addClass('form-error help-block');
        }
    });


});
