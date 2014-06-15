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
<script src="/asset/datetimepicker-master/jquery.datetimepicker.js"></script>
<script src="/asset/jquery-validation-1.12.0/dist/jquery.validate.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/asset/datetimepicker-master/jquery.datetimepicker.css"/ >
<style type="text/css">
    html,
    body {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
    }

    /* Wrapper for page content to push down footer */
    #wrap {
        min-height: 100%;
        height: auto;
        /* Negative indent footer by its height */
        margin: 0 auto -60px;
        /* Pad bottom by footer height */
        padding: 0 0 60px;
    }

    /* Set the fixed height of the footer here */
    #footer {
        height: 60px;
        background-color: #f5f5f5;
    }
</style>
<script>
    $(document).ready(function(){
        //console.log( "ready!" );
       $('#datetimepicker').datetimepicker({
            format:	'd.m.Y H:i',
            formatTime:	'H:i',
            formatDate:	'd.m.Y'}
       );

       $('#cancel').click(function(){
           var answer = confirm('Are you sure you want to cancel your account?');
           return answer;
        });
    });
</script>
</html>