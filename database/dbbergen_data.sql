INSERT INTO `bergendb`.`Home`
(`idHome`,
`Title`,
`Text`,
`SoundURL`,
`LinkURL`)
VALUES
(1,
'Velkommen',
'bla bla',
'mwau',
'home.php');


INSERT INTO `bergendb`.`Weather`
(`idWeather`,
`Title`,
`Text`,
`VideoURL`,
`LinkURL`)
VALUES
(1,
'Vær og klima',
'kommer snart',
'film',
'weather.php');


INSERT INTO `bergendb`.`User`
(`Firstname`,
`Lastname`,
`Email`,
`Password`)
VALUES
('Ida',
'Lundstad',
'idalun3@asvg.no',
'Mio');

/* Aktiviteter 1-2-3 */
 INSERT INTO `bergendb`.`Activitytype`
(`idActivitytype`,
`Menutext`,
`Titletext`,
`LinkURL`)
VALUES
(1,
'Serverdigheter',
'Serverdigheter i Bergen',
'sights.php');

INSERT INTO `bergendb`.`Activitytype`
(`idActivitytype`,
`Menutext`,
`Titletext`,
`LinkURL`)
VALUES
(2,
'Spisesteder',
'Spisesteder i Bergen',
'eat.php');

INSERT INTO `bergendb`.`Activitytype`
(`idActivitytype`,
`Menutext`,
`Titletext`,
`LinkURL`)
VALUES
(3,
'Fjell',
'Fjell i Bergen',
'mountains.php');

/* Serverdigheter */
INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(1,
'Ved vågen er det en rekke med gamle hus som ble bygget da hanseatene hadde tatt over Bergen. Husene ble brukt til bl.a. lagre, boliger, kontor til hanseatene og butikker. I dag er Bryggen på UNESCO sin verdensarvliste på grunn av den gamle arkitekturen.',
'Bryggen',
'resources/bryggen.jpg',
60.3976,
5.3245,
1);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(2,
'Fiskemarkedet ligger ved Strandkaien innerst i vågen. Helt siden år 1200 har det blitt solgt varer som fisk, bær og frukt fra fiskere og bønder fra nærområdet. Markedet er åpent hele året i Mathallen, men om sommeren (fra 1. mai - 30. september) har markedet boder ute også.',
'Fiskemarkedet',
'resources/fisketorget.png',
60.3946,
5.3239,
1);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(3,
'Tårnet ble bygget på 1600-tallet (el 1560s) og er et av Bergens viktigste monumenter fra renessansen. Tårnet ble bygget av Erik Rosenkrantz som var ordfører over Bergenhus på den tiden. Tårnet skulle være en vise makten til Rosenkrantz og beskytte byen.',
'Rosenkrantztaarnet',
'resources/rosenkrantztårnet.png',
60.3988,
5.3109,
1);

/* Restauranter */
INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(4,
'Restauranten har et interiør som drar gjestene tilbake til 1900-tallet. De selger tradisjonell mat som lutefisk og rype. Har du først vært der en gang er det stor sannsynlighet for at du drar dit igjen.',
'Bryggeloftet',
'resources/bryggeloftet.png',
60.3964,
5.3225,
2);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(5,
'På Bare Vestland selger de småretter laget av lokale råvarer. De har interessante, eller unike, råvarer og kombinasjoner som kalvetunge og plukkfisk.',
'Bare Vestland',
'resources/barevestland.png',
60.3938,
5.3239,
2);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(6,
'I 3. etasje på Bergen børs finner man Bare Restaurant som er den første restauranten i Bergen til å få en Michelin-stjerne. Det er en restaurant inspirert av de nordiske råvarene fra småskalaprodusenter, noe som gjør at menyen kan endres daglig.',
'Bare restaurant',
'resources/barerestaurant.png',
60.3937,
5.3234,
2);

/* Fjell */
INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(7,
'For å komme opp på Fløyen (400 moh) kan man enten ta Fløibanen eller gå opp langs Skansen. Fra toppen kan man se utover Bergen og alle båtene som ligger ved kysten. På toppen finner man også en restaurant og flere aktiviteter for små barn som lekeplass og klatrepark.',
'Fløyen',
'resources/floyen_400.png',
60.3983,
5.3459,
3);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(8,
'Via Fløyen kan man ta en gangsti opp på Rundemanen (568 moh). På toppen kan man finne en radiostasjon som ble opprettet 1. september 1912. Dette var en viktig kystradio helt frem til 1960. I dag er det Bergen kommune som eier bygningen.',
'Rundemanen',
'resources/rundemanen_400.png',
60.4128,
5.3650,
3);

INSERT INTO `bergendb`.`Activity`
(`idActivity`,
`Text`,
`Header`,
`imageURL`,
`Latitude`,
`Longitude`,
`Activitytype_idActivitytype`)
VALUES
(9,
'Det er ikke mange som besøker Sandviksfjellet (400 moh), det er for det meste tur entusiaster og mosjonister som tar turen. Noe av grunnen kan være den bratte veien opp på Stoltzen. Turen tar ca 3 timer, men på toppen får man en fin utsikt over bryggen og vågen.',
'Sandviksfjellet',
'resources/sandviksfjellet_400.png',
60.4097,
5.3400,
3);

/*
set foreign_key_checks = 0;
drop table Activity;
set foreign_key_checks = 1;
*/

/*drop table Userplan;*/
