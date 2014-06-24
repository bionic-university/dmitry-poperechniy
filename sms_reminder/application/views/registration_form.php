<div class="row">
    <div class="col-md-2"> </div>
    <div class="col-md-8">
        <form role="form" method="POST" id="registrationForm" action="/users/registrate">
            <div class="form-group">
              <label for="loginInput">Login</label>
              <input type="text" class="form-control" id="loginInput" name="loginInput" placeholder="Enter login" required>
            </div>
            <div class="form-group">
              <label for="emailInput">Email address</label>
              <input type="email" class="form-control" id="emailInput" name="emailInput" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="phoneInput">Phone Number</label>
              <input type="text" class="form-control" id="phoneInput" name="phoneInput" placeholder="Enter phone" required>
            </div>
            <div class="form-group">
              <label for="passwordInput">Password</label>
              <input type="password" class="form-control" id="passwordInput" name="passwordInput" placeholder="Password" onChange="checkPass();" required>
            </div>
            <div class="form-group">
              <label for="passwordConfirmationInput">Password Confirmation</label>
              <input type="password" class="form-control" id="passwordConfirmationInput" placeholder="Password Confirmation" required>
            </div>
            <button id="buttonSubmit" type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
    <div class="col-md-2"> </div>
</div>