SHOW DATABASES; 
USE wngo2assign2db;

GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON wngo2assign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

SHOW TABLES;

CREATE VIEW firstyearoutside AS SELECT o.coursename AS "outsidecourse", u.officialname, u.nickname, u.city, 
w.coursename AS "westerncourse"
FROM equivalentto e INNER JOIN outsidecourses o ON e.coursecode=o.coursecode AND e.universitynumber=o.universitynumber
AND o.intendedyear=1
LEFT OUTER JOIN westerncourses w ON e.coursenumber=w.coursenumber
INNER JOIN otheruniversities u ON e.universitynumber=u.universitynumber;
SELECT * FROM firstyearoutside;

SELECT * FROM firstyearoutside WHERE nickname="UofT" ORDER BY westerncourse ASC;

SELECT * FROM otheruniversities;
DELETE FROM otheruniversities WHERE nickname LIKE "%cord%";
SELECT * FROM otheruniversities;

DELETE FROM otheruniversities WHERE province="ON";
-- These universities couldn't be deleted because outside courses use their info in their foreign key
SELECT * FROM otheruniversities;

SELECT * FROM outsidecourses, otheruniversities 
WHERE outsidecourses.universitynumber=otheruniversities.universitynumber;

DELETE FROM outsidecourses WHERE outsidecourses.universitynumber in (SELECT universitynumber FROM otheruniversities 
WHERE city="Waterloo");

SELECT * FROM outsidecourses, otheruniversities 
WHERE outsidecourses.universitynumber=otheruniversities.universitynumber;

SELECT * FROM firstyearoutside;




