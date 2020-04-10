<!-- Feltene for innlogging. Når du trykker på "submit" så vil du bli sendt til 
     login.inc.php som vil gjennomføre selve pålogginhen -->

<h1>Logg inn</h1>
<form action="user/login.inc.php" method="post">
    <input type="text" name="email" placeholder="Username/e-mail">
    <input type="password" name="pwd" placeholder="password">
    <button type="submit" name="login-submit">Logg inn</button>
</form>
<a href="?page=signup">Ny bruker</a>