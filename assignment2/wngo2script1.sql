SHOW DATABASES; 
DROP DATABASE wngo2assign2db;
CREATE DATABASE wngo2assign2db;
USE wngo2assign2db;
SHOW TABLES;

GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON wngo2assign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

SHOW TABLES;

CREATE TABLE westerncourses (coursenumber char(6) NOT NULL, coursename varchar(50) NOT NULL, weight decimal(2,1) NOT NULL, 
suffix varchar(3), PRIMARY KEY (coursenumber));
	
CREATE TABLE otheruniversities (universitynumber int NOT NULL, officialname varchar(50) NOT NULL,
city varchar(20) NOT NULL, province char(2) NOT NULL, nickname varchar(20) NOT NULL, PRIMARY KEY (universitynumber));

CREATE TABLE outsidecourses (coursecode char(10) NOT NULL, coursename varchar(50) NOT NULL, intendedyear int NOT NULL,
weight decimal(2,1) NOT  NULL, universitynumber int NOT NULL, PRIMARY KEY (coursecode, universitynumber), 
FOREIGN KEY (universitynumber) REFERENCES otheruniversities(universitynumber));

CREATE TABLE equivalentto (coursenumber char(6) NOT NULL, coursecode char(10) NOT NULL, 
universitynumber int NOT NULL, decisiondate DATE NOT NULL,
PRIMARY KEY (coursenumber, coursecode, universitynumber),
FOREIGN KEY (coursenumber) REFERENCES westerncourses(coursenumber) ON DELETE CASCADE,
FOREIGN KEY (coursecode, universitynumber) REFERENCES outsidecourses(coursecode, universitynumber) ON DELETE CASCADE);

SHOW TABLES;
