DROP table if exists Characters;
CREATE table Characters
( CharacterID int unsigned not null auto_increment primary key,
Name varchar(50),
Occupation varchar(50),
Species varchar(50),
Affiliation varchar(50),
Description text(80)
);

insert into Characters values (NULL, "Han Solo", "Captain of the Millennium Falcon
General in the Rebel Alliance; New Republic
smuggler", "Human", "Galactic Empire; Rebel Alliance; New Republic; Galactic Alliance", "Han Solo is one of the most awesome characters in anything. Ever."); 





