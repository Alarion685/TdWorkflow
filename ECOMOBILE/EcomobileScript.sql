drop database if exists ECOMOBIL;
create database ECOMOBIL;

set default_storage_engine = INNODB;
set autocommit = 1;
set SQL_SAFE_UPDATES = 0;

use Ecomobil;


create table Client (
IdClient int unsigned not null auto_increment primary key,
Prenom VARCHAR(50),
Nom VARCHAR(50),
email VARCHAR(70),
numero CHAR(10) );

create table entrepot(
IdEntrepot int unsigned not null auto_increment primary key,
Localisation VARCHAR(50)
);


Create table tarif (
IdTarif int unsigned not null auto_increment primary key,
TarifHoraireHautesSaison decimal(7,2),
HeureSupplementaireHautesSaison decimal(7,2),
TarifJourneeHautesSaison decimal(7,2),
TarifHoraireBasseSaison decimal(7,2),
HeureSupplementaireBasseSaison decimal(7,2),
TarifJourneeBasseSaison decimal(7,2)
);

create table location (
idNumeroLocation int unsigned not null auto_increment primary key,
Date date,
heure time,
dureeLocation Enum('1h','2h','3h','1j','2j','3j','4j','5j'),
statusLocation Enum('en cours','confirmé','annulé','terminé'), 
fk_IDclient int unsigned not null,
constraint foreign key(fk_IDclient) references client(Idclient) );

create table TypeVehicule (
IDTypevehicule int unsigned not null auto_increment primary key,
Libelle VARCHAR(50),
fk_idtarif int unsigned not null,
constraint foreign key(fk_idtarif) references tarif(IdTarif));

create table Agence(
Ville VARCHAR(50) primary key,
Region VARCHAR(25),
fk_idEntrepot int unsigned not null,
constraint foreign key(fk_idEntrepot) references Entrepot(identrepot)
);

create table vehicule (
IDvehicule int unsigned not null auto_increment primary key,
statusvehicule enum('réservé','disponible','loué'),
annee date,
couleur VARCHAR(20),
fk_Agence VARCHAR(50),
fk_IdTypevehicule int unsigned not null,   											
constraint foreign key(fk_Agence) references Agence(Ville),
constraint foreign key(fk_idtypevehicule) references Typevehicule(idTypevehicule) );


create table participant (
IdParticipant int unsigned not null auto_increment primary key,
Prenom VARCHAR(50),
Nom VARCHAR(50),
Forfait Enum('etudiant', 'famille','aucun'),
fk_idvehicule int unsigned not null,
fk_idnumerolocation int unsigned not null,
constraint foreign key(fk_idnumerolocation) references location(idnumerolocation),
constraint foreign key(fk_idvehicule) references vehicule(idvehicule) );



create table Incident (
IDIncident int unsigned not null auto_increment primary key,
Etat enum('Panne','Vol','Sinistre'),
DateIncident date, 
fk_idnumerolocation int unsigned not null,
fk_idvehicule int unsigned not null,
constraint foreign key(fk_idnumerolocation) references location(idnumerolocation),
constraint foreign key(fk_idvehicule) references vehicule(idvehicule));

create table Reparation ( 
IDRéparation int unsigned not null auto_increment primary key,
Technicien VARCHAR(50),
StatusReparation enum('Sortie location','entree location'),
fk_idEntrepot int unsigned not null,
fk_idVehicule int unsigned not null,
constraint foreign key(fk_idEntrepot) references Entrepot(identrepot),
constraint foreign key(fk_idVehicule) references Vehicule(Idvehicule)
);

create Table USER(
Login VARCHAR(50),
Password VARCHAR(100));



use ecomobil;



drop table user;
CREATE TABLE user (



nom VARCHAR(50),



password VARCHAR(100),



dateinscription DATE,



constraint pk_nom primary key (nom) );



select * from participant;



