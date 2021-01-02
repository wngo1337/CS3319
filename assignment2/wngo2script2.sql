SHOW DATABASES; 
USE wngo2assign2db;

GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON wngo2assign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

SHOW TABLES;

SELECT * FROM otheruniversities;
LOAD DATA LOCAL INFILE "loaddatafall2020.sql" INTO TABLE otheruniversities
FIELDS TERMINATED BY ","
LINES TERMINATED BY "\n";
SELECT * FROM otheruniversities;

SELECT * FROM westerncourses;
INSERT INTO westerncourses VALUES("cs1026", "Computer Science Fundamentals I", 0.5, "A/B");
INSERT INTO westerncourses VALUES("cs1027", "Computer Science Fundamentals II", 0.5, "A/B");
INSERT INTO westerncourses VALUES("cs2210", "Algorithms and Data Structures", 1.0, "A/B");
INSERT INTO westerncourses VALUES("cs3319", "Databases I", 0.5, "A/B");
INSERT INTO westerncourses VALUES("cs2120", "Modern Survival Skills I: Coding Essentials", 0.5, "A/B");
INSERT INTO westerncourses VALUES("cs4490", "Thesis", 0.5, "Z");
INSERT INTO westerncourses VALUES("cs0020", "Intro to Coding using Pascal and Fortran", 1.0, "");
INSERT INTO westerncourses VALUES("kf1337", "Intro to Kung Fu", 0.5, "A/B");
SELECT * FROM westerncourses;

SELECT * FROM otheruniversities;
INSERT INTO otheruniversities VALUES(69, "University of Taking Ls", "Toronto", "ON", "UofL");
SELECT * FROM otheruniversities;

SELECT * FROM outsidecourses;
INSERT INTO outsidecourses VALUES("CompSci022", "Introduction to Programming", 1, 0.5, 2);
INSERT INTO outsidecourses VALUES("CompSci033", "Introduction to Programming for Med students", 3, 0.5, 2);
INSERT INTO outsidecourses VALUES("CompSci021", "Packages", 1, 0.5, 2);
INSERT INTO outsidecourses VALUES("CompSci222", "Introduction to Databases", 2, 1.0, 2);
INSERT INTO outsidecourses VALUES("CompSci023", "Advanced Programming", 1, 0.5, 2);

INSERT INTO outsidecourses VALUES("CompSci011", "Intro to Computer Science", 2, 0.5, 4);
INSERT INTO outsidecourses VALUES("CompSci123", "Using UNIX", 2, 0.5, 4);

INSERT INTO outsidecourses VALUES("CompSci021", "Intro Programming", 1, 1.0, 66);
INSERT INTO outsidecourses VALUES("CompSci022", "Advanced Programming", 1, 0.5, 66);
INSERT INTO outsidecourses VALUES("CompSci319", "Using Databases", 3, 0.5, 66);

INSERT INTO outsidecourses VALUES("CompSci333", "Graphics", 3, 0.5, 55);
INSERT INTO outsidecourses VALUES("CompSci444", "Networks", 4, 0.5, 55);

INSERT INTO outsidecourses VALUES("CompSci022", "Using Packages", 1, 0.5, 77);
INSERT INTO outsidecourses VALUES("CompSci101", "Introduction to Using Data Structures", 2, 0.5, 77);

INSERT INTO outsidecourses VALUES("CompSci069", "Intro to Taking a Fat L", 1, 0.5, 69);
INSERT INTO outsidecourses VALUES("CompSci007", "Advanced Taking a Fat L", 4, 1.0, 69);
SELECT * FROM outsidecourses;

SELECT * FROM equivalentto;
INSERT INTO equivalentto VALUES("cs1026", "CompSci022", 2, "2015-05-22");
INSERT INTO equivalentto VALUES("cs1026", "CompSci033", 2, "2013-01-02");
INSERT INTO equivalentto VALUES("cs1026", "CompSci011", 4, "1997-02-09");
INSERT INTO equivalentto VALUES("cs1026", "CompSci021", 66, "2010-01-12");
INSERT INTO equivalentto VALUES("cs1027", "CompSci023", 2, "2017-06-22");
INSERT INTO equivalentto VALUES("cs1027", "CompSci022", 66, "2019-09-01");
INSERT INTO equivalentto VALUES("cs2210", "CompSci101", 77, "1998-07-12");
INSERT INTO equivalentto VALUES("cs3319", "CompSci222", 2, "1990-09-13");
INSERT INTO equivalentto VALUES("cs3319", "CompSci319", 66, "1987-09-21");
INSERT INTO equivalentto VALUES("cs2120", "CompSci022", 2, "2018-12-10");
INSERT INTO equivalentto VALUES("cs0020", "CompSci022", 2, "1999-09-17");
SELECT * FROM equivalentto;

UPDATE equivalentto SET decisiondate="2018-09-19" WHERE coursenumber="cs0020" AND coursecode="CompSci022" AND 
universitynumber=2;
SELECT * FROM equivalentto;

SELECT * FROM outsidecourses;
UPDATE outsidecourses SET intendedyear=1 WHERE coursename LIKE "Intro%";
SELECT * FROM outsidecourses;

