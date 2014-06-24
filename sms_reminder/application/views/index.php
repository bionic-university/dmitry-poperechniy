        <form class="form" method="POST" id="smsForm" action="/reminds/create">
                <div class="row" style="margin: 10px auto">
                    <div class="col-md-3">
                        <h2 style="color: red">Cell number</number></h2>
                    </div>
                    <div class="col-md-3">
                        <h2 style="color: red">Date & Time</h2>
                    </div>
                    <div class="col-md-4">
                        <h2 style="color: red">Text Message</h2>
                    </div>
                    <div class="col-md-2">
                        <h2 style="color: red">Repeat</h2>
                    </div>
                </div>
                <div class="row" style="margin: 10px auto">
                    <div class="col-md-3">
                        <label class="sr-only" for="phonenumberInput">Phone number</label>
                        <input type="text" class="form-control" name="phonenumberInput" id="phonenumberInput" placeholder="Enter phone number">
                    </div>
                    <div class="col-md-3">
                        <label class="sr-only" for="datetimepicker">Date & Time</label>
                        <input type="text" class="form-control" name="datetimepicker" id="datetimepicker" placeholder="Enter date & time">
                    </div>
                    <div class="col-md-4">
                        <label class="sr-only" for="textInput">Text message</label>
                        <input type="text" class="form-control" name="textInput" id="textInput" placeholder="Enter text message">
                    </div>
                    <div class="col-md-2">
                        <select class="form-control" name="repeatInput">
                            <option value="0">Never</option>
                            <option value="1">Every Day</option>
                            <option value="2">Every Week</option>
                            <option value="3">Every Month</option>
                            <option value="4">Every Year</option>
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
            </form>
<div><h2>{notification_new_reminder}</h2></div>
                <div class="row">
                    <h3>Upcoming reminders</h3>
                    <span>
                        {upcoming_reminders}
                    </span>
                    <h3>Sent reminders</h3>
                    <span>
                            {sent_reminders}
                    </span>
                </div>
        </form>
