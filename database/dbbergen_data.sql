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
'',
'Bryggen',
'bilde',
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
'',
'Fiskemarkedet',
'bilde',
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
'',
'Rosenkrantztaarnet',
'bilde',
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
(1,
'',
'Bryggeloftet',
'bilde',
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
(2,
'',
'Bare Vestland',
'bilde',
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
(3,
'',
'Bare restaurant',
'bilde',
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
(1,
'',
'Fløyen',
'bilde',
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
(2,
'',
'Rundemanen',
'bilde',
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
(3,
'',
'Sandviksfjellet',
'bilde',
60.4097,
5.3400,
3);

/*
set foreign_key_checks = 0;
drop table Activity;
set foreign_key_checks = 1;
*/

/*
drop table Home;
drop table User;
drop table Weather;
*/
