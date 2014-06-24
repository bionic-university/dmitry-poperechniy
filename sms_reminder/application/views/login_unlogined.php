<form class="navbar-form navbar-left" role="form" id="loginForm" method="POST" action="users/login">
    <div class="form-group">
        <input type="text" class="form-control" id="login" name="login" placeholder="Login" required>
    </div>
    <div class="form-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <span>{notification}</span>
    <button type="submit" class="btn btn-info">Login</button>
    <a href="/registration">
        <button type="button" class="btn btn-warning">Register</button>
    </a>
</form>