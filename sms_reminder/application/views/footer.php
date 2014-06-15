    <div class="row" id="footer">
        <div class="col-md-12">
            <p class="footer">
            <h2 style="text-align: center">Page rendered in <strong>{elapsed_time}</strong> seconds</h2>
            </p>
        </div>
    </div>
    </div>
    </div>
</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="/static/datetimepicker-master/jquery.datetimepicker.js"></script>
<script src="/static/jquery-validation-1.12.0/dist/jquery.validate.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/static/datetimepicker-master/jquery.datetimepicker.css"/ >
<style type="text/css">

</style>
<script>
    $(document).ready(function(){


       $('#datetimepicker').datetimepicker({
            format:	'd.m.Y H:i',
            formatTime:	'H:i',
            formatDate:	'd.m.Y'}
       );

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
                    required: true,
                    minlength: 5,
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
            }
        });


    });
</script>
</html>