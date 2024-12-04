CREATE TABLE Coach(
                      id INT AUTO_INCREMENT,
                      username VARCHAR(50) NOT NULL,
                      password VARCHAR(50) NOT NULL,
                      PRIMARY KEY(id),
                      UNIQUE(username)
)ENGINE=InnoDB;

CREATE TABLE Machine(
                        id INT AUTO_INCREMENT,
                        name VARCHAR(50),
                        picture VARCHAR(50),
                        type VARCHAR(50),
                        PRIMARY KEY(id)
)ENGINE=InnoDB;

CREATE TABLE Parameter(
                          id INT AUTO_INCREMENT,
                          name VARCHAR(50),
                          pValue VARCHAR(1000),
                          PRIMARY KEY(id),
                          UNIQUE(name)
)ENGINE=InnoDB;

CREATE TABLE Type(
                     id VARCHAR(50),
                     name VARCHAR(50) NOT NULL,
                     PRIMARY KEY(id),
                     UNIQUE(name)
)ENGINE=InnoDB;

CREATE TABLE Program(
                        id INT AUTO_INCREMENT,
                        name VARCHAR(50),
                        motif VARCHAR(200),
                        description VARCHAR(1000),
                        type VARCHAR(50),
                        picture VARCHAR(50),
                        PRIMARY KEY(id),
                        UNIQUE(name)
)ENGINE=InnoDB;

CREATE TABLE Exercice(
                         id INT AUTO_INCREMENT,
                         duration INT,
                         repetition INT,
                         rest INT,
                         id_machine INT NOT NULL,
                         PRIMARY KEY(id),
                         FOREIGN KEY(id_machine) REFERENCES Machine(id)
)ENGINE=InnoDB;

CREATE TABLE Entrainement(
                             id_program INT,
                             id_exercice INT,
                             PRIMARY KEY(id_program, id_exercice),
                             FOREIGN KEY(id_program) REFERENCES Program(id),
                             FOREIGN KEY(id_exercice) REFERENCES Exercice(id)
)ENGINE=InnoDB;
