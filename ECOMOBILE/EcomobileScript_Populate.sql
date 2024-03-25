use Ecomobil;



insert into Client(Prenom, Nom, email,numero) Value('Ghislano','Ronaldo','Ghislano.Ronaldo@gmail.com','0601081505');
insert into Client(Prenom, Nom, email,numero) Value('Fred','Dubois','Fred.Dubois@gmail.com','0603487741');
insert into Client(Prenom, Nom, email,numero) Value('Giles','goelan','Goelan74@gmail.com','0603485484');
insert into Client(Prenom, Nom, email,numero) Value('Michel','Hang','HangMc@gmail.com','0603841028');

select * from client;

insert into entrepot(localisation) value('Annecy');

select * from entrepot;


insert into tarif(tarifhorairehautesSaison,HeureSupplementaireHautesSaison,TarifJourneeHautesSaison,
			      TarifHoraireBasseSaison,HeureSupplementaireBasseSaison,TarifJourneeBasseSaison)
		Value(12,8,30,10,5,25);			#Velo Electrique
        
insert into tarif(tarifhorairehautesSaison,HeureSupplementaireHautesSaison,TarifJourneeHautesSaison,
			      TarifHoraireBasseSaison,HeureSupplementaireBasseSaison,TarifJourneeBasseSaison)
		Value(15,10,40,12,6,30);		#VTT Electrique, Grypodes
        
insert into tarif(tarifhorairehautesSaison,HeureSupplementaireHautesSaison,TarifJourneeHautesSaison,
			      TarifHoraireBasseSaison,HeureSupplementaireBasseSaison,TarifJourneeBasseSaison)
		Value(10,7,28,8,6,25);			#HoverBoard
        
insert into tarif(tarifhorairehautesSaison,HeureSupplementaireHautesSaison,TarifJourneeHautesSaison,
			      TarifHoraireBasseSaison,HeureSupplementaireBasseSaison,TarifJourneeBasseSaison)
		Value(8,6,25,6,5,20);			#trottinette électrique, Skateboard electrique

select * from tarif;


insert into location(date,heure,dureelocation,statuslocation,fk_idclient) value('2022-12-04','14:30','1h','terminé',1);
insert into location(date,heure,dureelocation,statuslocation,fk_idclient) value('2022-11-05','12:30','3h','en cours',2);
insert into location(date,heure,dureelocation,statuslocation,fk_idclient) value('2022-10-06','11:30','1j','confirmé',3);
insert into location(date,heure,dureelocation,statuslocation,fk_idclient) value('2022-09-07','8:30','5j','annulé',4);

select * from location;

insert into typevehicule(Libelle,fk_idtarif) Value('Vélo Electrique','1');
insert into typevehicule(Libelle,fk_idtarif) Value('VTT Electrique','2');
insert into typevehicule(Libelle,fk_idtarif) Value('HoverBoard','3');
insert into typevehicule(Libelle,fk_idtarif) Value('Trottinette Electrique','4');
insert into typevehicule(Libelle,fk_idtarif) Value('Gyropodes','2');
insert into typevehicule(Libelle,fk_idtarif) Value('Skateboard Electrique','4');



insert into Agence(Ville,Region,fk_identrepot) Value('Annecy','Rhone-Aples','1');


insert into vehicule(statusvehicule,annee,couleur,fk_agence,fk_idtypevehicule) value('disponible','2020-01-01','Rouge','Annecy','1');
insert into vehicule(statusvehicule,annee,couleur,fk_agence,fk_idtypevehicule) value('disponible','2020-02-02','Vert','Annecy','2');
insert into vehicule(statusvehicule,annee,couleur,fk_agence,fk_idtypevehicule) value('disponible','2020-03-03','Bleu','Annecy','3');

update vehicule set statusvehicule = 'réservé' where idvehicule = 1;
select * from vehicule;

insert into participant(Prenom,nom,forfait,fk_idvehicule,fk_idnumerolocation) value('Xavier','pierre','Etudiant','1','1');
insert into participant(Prenom,nom,forfait,fk_idvehicule,fk_idnumerolocation) value('Philou','deLafleur','Famille','2','2');
insert into participant(Prenom,nom,forfait,fk_idvehicule,fk_idnumerolocation) value('Fifou','duSol','aucun','3','3');


insert into incident(Etat,DateIncident,fk_idnumerolocation,fk_idvehicule) value('Panne','2022-10-03',4,1);
insert into incident(Etat,DateIncident,fk_idnumerolocation,fk_idvehicule) value('Vol','2022-09-03',2,2);
insert into incident(Etat,DateIncident,fk_idnumerolocation,fk_idvehicule) value('Sinistre','2022-08-03',3,3);



insert into Reparation(Technicien,StatusReparation,fk_identrepot,fk_idVehicule) value('M.Giroud','Sortie Location','1','2');
insert into Reparation(Technicien,StatusReparation,fk_identrepot,fk_idVehicule) value('M.Girard','entree Location','1','3');


select * from participant;
select * from Client;
select * from location;
