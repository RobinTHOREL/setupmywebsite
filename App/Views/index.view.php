<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="App/Views/smw-admin/css/style.css">

</head>
<body>

<div class="logo"><i class="fa fa-cog"></i>
    <h1>Setup My Website</h1>
</div>

<form action="/action_page.php">

    <div class="container">
        <label><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>

        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>

        <button type="submit">Login</button>
        <input type="checkbox" checked="checked"> Remember me
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
</form>

<!-- test de grille -->

    <h1>Systeme de grille</h1>

    <div class="clo-6">col6</div>
    <div class="clo-6">col6</div>
    <div class="clo-6">col8</div>
    <div class="clo-2">col2</div>
    <div class="clo-2">col2</div>
    <div class="clo-4">col4</div>
    <div class="clo-4">col4</div>
    <div class="clo-4">col4</div>

</body>
</html>




