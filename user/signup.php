<!-- Dette er eltene for bruker registreringen. Når du trykker på "signup" så vil 
     du bli sendt til signup.inc.php som vil legge brukeren inn i databasen -->

<main>
    <div class="wrapper-main">
        <section class="section-defult" style="padding: 20px;">
            <h1>Registrer ny bruker</h1>
            <p>En fornuftig passordpolicy er å sikre at brukeren bruker et sterkt passord. Det vil si at passordet er sikrest mulig bør det bestå av minst 8  bokstaver, både små og store. Det bør også inneholde minimum ett tall og ett tegn. Samtidig bør det være lett å huske, men vanskelig å knekke, som 1HestLøperi%
            </p>
            
            <form action="user/signup.inc.php" method="post">
                <input type="text" name="firstname" placeholder="Fornavn">
                <input type="text" name="lastname" placeholder="Etternavn">
                <input type="text" name="email" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Passord">
                <input type="password" name="pwdrep" placeholder="Repeter passordet">
                <button type="submit" name="signup" value='signup'>Opprett bruker</button>
            </form>
            <p> Netiquette er regler om hva som er akseptabel oppførsel på nettet. Den sier f.eks at man skal opprettholde normal folkeskikk selv om man ikke kan se hverandre. Nettet er et internasjonalt samfunn med ulike kulturer og folk har ulike meninger. 
Netiquette er også å ha en bra policy og passe på at forbrukerne blir tatt vare på.</p>
        </section>
    </div>
</main>


