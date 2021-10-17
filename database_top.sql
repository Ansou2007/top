CREATE DATABASE  IF NOT EXISTS trouve_ou_perdu;

USE trouve_ou_perdu;

CREATE TABLE region (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  nom_region varchar(100) ,
  sigle varchar(10) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE departement(
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  id_region int(11) ,
  nom_departement varchar(10) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE departement ADD CONSTRAINT fk_dep_reg FOREIGN KEY(id_region)
REFERENCES region(id) ON UPDATE CASCADE;

CREATE TABLE commune (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  id_departement int(11) ,
  nom_commune varchar(100) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE commune ADD CONSTRAINT fk_com_dep FOREIGN KEY(id_departement)
REFERENCES departement(id) ON UPDATE CASCADE;

CREATE TABLE utilisateur (
  id int(11) PRIMARY KEY AUTO_INCREMENT,
  id_region int(11) ,
  id_departement int(11) ,
  id_commune int(11) ,
  nom_complet varchar(150) ,
  email varchar(150) ,
  motdepass varchar(150) ,
  telephone varchar(100) , 
  role varchar(50),  /* Super-Administrateur, Administrateur ou  Utilisateur*/
  etat varchar(1) DEFAULT '0' /* 0=Désactivé; 1=Activé */  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE utilisateur ADD CONSTRAINT fk_ut_re FOREIGN KEY(id_region) REFERENCES region(id)
ON UPDATE CASCADE;
ALTER TABLE utilisateur ADD CONSTRAINT fk_ut_depa FOREIGN KEY(id_departement) REFERENCES departement(id)
ON UPDATE CASCADE;
ALTER TABLE utilisateur ADD CONSTRAINT fk_ut_com FOREIGN KEY(id_commune) REFERENCES commune(id)
ON UPDATE CASCADE;

CREATE TABLE declaration_perdu(
id int PRIMARY KEY AUTO_INCREMENT,
id_utilisateur int(11),
code_declaration varchar(100),
date_declaration datetime,
description varchar(250), /*Description de l'objet perdu*/
images text,
objet_trouve varchar(3) DEFAULT 'NON',/* OUI: objet trouvé  NON: objet non trouvé*/
contact varchar(25), /*Le numero a contacter au cas ou l'objet est trouvé*/
autorisation varchar(20) /* Approuver, Mise en Examen,Archiver*/
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE declaration_perdu ADD CONSTRAINT fk_perdu_uti FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE; 

CREATE TABLE declaration_Trouve(
id int PRIMARY KEY AUTO_INCREMENT,
id_utilisateur int(11),
code_trouve varchar(100),
date_declaration datetime,
description varchar(250), /*Description de l'objet perdu*/
images text,
objet_trouve varchar(3) DEFAULT 'NON',/* OUI: objet trouvé  NON: objet non trouvé*/
contact varchar(25), /*Le numero a contacter au cas ou l'objet est trouvé*/
autorisation varchar(20) /* Approuver, Mise en Examen,Archiver*/
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE declaration_trouve ADD CONSTRAINT fk_trouv_uti FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE; 

CREATE TABLE historique(
id int auto_increment PRIMARY KEY,
date_journal datetime,
id_utilisateur int,
action varchar(150)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE historique ADD CONSTRAINT fk_hist_util FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE;