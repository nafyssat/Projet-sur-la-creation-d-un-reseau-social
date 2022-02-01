CREATE TABLE IF NOT EXISTS utilisateur (
  userhash VARCHAR(255) NOT NULL PRIMARY KEY,
  ID BIGINT(20) NOT NULL AUTO_INCREMENT UNIQUE KEY,
  nom VARCHAR(30),
  prenom VARCHAR(30),
  sexe VARCHAR(15),
  pseudo VARCHAR(30) UNIQUE KEY,
  datedenaissance DATE,
  email VARCHAR(255) UNIQUE KEY,
  motdepasse CHAR(255),
  inscriptiondate DATE NOT NULL DEFAULT current_timestamp(),
  private TINYINT(1) DEFAULT '0'
);

CREATE TABLE IF NOT EXISTS categories (
  user VARCHAR(30) UNIQUE KEY,
  cat1 VARCHAR(30),
  cat2 VARCHAR(30),
  cat3 VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS followers (
  id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
  utilisateur_id INT(11),
  followed_id INT(11),
  date   datetime TIMESTAMP DEFAULT current_timestamp()
);

CREATE TABLE IF NOT EXISTS postes (
  id BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  utilisateur_id INT(11) NOT NULL,
  contenu TEXT,

  date  datetime TIMESTAMP DEFAULT current_timestamp()
);
