<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>
<div id="wrap">
    <div class="container">
        <div class="row" style="margin: 20px auto">
            <div class="col-md-10">
                <h2>LOGO</h2>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-warning">Log Out</button>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="" role="form">
                <div class="row">
                    <div class="col-md-12" style="text-align:center">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#">Dashboard</a></li>
                            <li><a href="#">Contacts</a></li>
                            <li><a href="#">Account</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row" style="margin: 10px auto">
                    <div class="col-md-3">
                        <h2 style="color: red">Cell number</h2>
                    </div>
                    <div class="col-md-3">
                        <h2 style="color: red">Date & Time</h2>
                    </div>
                    <div class="col-md-4">
                        <h2 style="color: red">Text Message</h2>
                    </div>
                    <div class="col-md-2">
                        <h2 style="color: mediumorchid">Repeat</h2>
                    </div>
                </div>
                <div class="row" style="margin: 10px auto">
                    <div class="col-md-3">
                        <label class="sr-only" for="phonenumberInput">Phone number</label>
                        <input type="text" class="form-control" id="phonenumberInput" placeholder="Enter phone number">
                    </div>
                    <div class="col-md-3">
                        <label class="sr-only" for="datetimepicker">Date & Time</label>
                        <input type="text" class="form-control" id="datetimepicker" placeholder="Enter date & time">
                    </div>
                    <div class="col-md-4">
                        <label class="sr-only" for="textInput">Text message</label>
                        <input type="text" class="form-control" id="textInput" placeholder="Enter text message">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control">
                            <option>Never</option>
                            <option>Every Week</option>
                            <option>Every Month</option>
                            <option>Every Year</option>
                        </select>
                    </div>
                </div>
                <div class="row" style="margin: 20px auto">
                    <div class="col-md-3">
                        <strong>Examples:</strong>
                        <ul>
                            <li>+38097123451122</li>
                            <li>3809600112399</li>
                        </ul>

                    </div>
                    <div class="col-md-3">
                        <strong>Examples:</strong>
                        <ul>
                            <li>now</li>
                            <li>2015/06/05 01:30</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <strong>Examples:</strong>
                        <ul>
                            <li>1.Buy milk 2.Pay tax bill.</li>
                            <li>Happy birthday, Alex! Wish you all the best buddy!</li>
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success">
                            <h4 style="width:150px">SEND</h4>
                        </button>
                    </div>
                </div>
                <div class="row">
                    <h3>Upcoming reminders</h3>
                    <span>
                        <i>You don't have any scheduled reminders.</i>
                    </span>
                    <h3>Sent reminders</h3>
                    <span>You haven't sent any reminders yet.</span>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="footer">
    <div class="container">
        <div class="col-md-12">
            <p class="footer"><h2 style="text-align: center">Page rendered in <strong>{elapsed_time}</strong> seconds</h2></p>
        </div>
    </div>
</div>


</body>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script src="../../asset/datetimepicker-master/jquery.datetimepicker.js"></script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="../../asset/datetimepicker-master/jquery.datetimepicker.css"/ >
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
    jQuery('#datetimepicker').datetimepicker();
</script>
</html>