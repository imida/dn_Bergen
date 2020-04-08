<!-- Dette er eltene for bruker registreringen. Når du trykker på "signup" så vil 
     du bli sendt til signup.inc.php som vil legge brukeren inn i databasen -->

<main>
    <div class="wrapper-main">
        <section class="section-defult">
            <h1>Registrer ny bruker</h1>
            <form action="user/signup.inc.php" method="post">
                <input type="text" name="firstname" placeholder="Fornavn">
                <input type="text" name="lastname" placeholder="Etternavn">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Passord">
                <input type="password" name="pwdrep" placeholder="Repeter passordet">
                <button type="submit" name="signup" value='signup'>Opprett bruker</button>
            </form>
        </section>
    </div>
</main>



