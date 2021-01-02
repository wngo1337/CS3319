SHOW DATABASES; 
USE wngo2assign2db;

GRANT USAGE ON *.* TO 'ta'@'localhost';
DROP USER 'ta'@'localhost';
CREATE USER 'ta'@'localhost' IDENTIFIED BY 'cs3319';
GRANT ALL PRIVILEGES ON wngo2assign2db.* TO 'ta'@'localhost';
FLUSH PRIVILEGES;

SHOW TABLES;

-- Query1, also I didn't know that I could write comments like this in files
SELECT coursename FROM westerncourses;

-- Query2
SELECT DISTINCT coursecode FROM outsidecourses;

-- Query3
SELECT * FROM westerncourses ORDER BY coursename;

-- Query4
SELECT coursenumber, coursename FROM westerncourses WHERE weight=0.5;

-- Query5, I'm kind of confused by this: how do I access another table without the foreign key...
SELECT coursecode, coursename FROM outsidecourses WHERE universitynumber in (SELECT universitynumber
FROM otheruniversities WHERE officialname="University of Toronto");

-- Query6
SELECT coursename, nickname FROM outsidecourses NATURAL JOIN otheruniversities 
WHERE coursename LIKE "%Introduction%";

-- Query7, inner joins are way better/faster, but the syntax for them is harder... but converting now
SELECT o.coursename, u.officialname, w.coursename, e.decisiondate 
FROM equivalentto e INNER JOIN outsidecourses o ON e.coursecode=o.coursecode AND e.universitynumber=o.universitynumber
INNER JOIN otheruniversities u ON e.universitynumber=u.universitynumber
INNER JOIN westerncourses w ON e.coursenumber=w.coursenumber 
WHERE e.decisiondate < DATE_SUB(CURDATE(), INTERVAL 5 YEAR);

-- Query8
SELECT coursename, nickname 
FROM equivalentto INNER JOIN outsidecourses ON equivalentto.coursecode=outsidecourses.coursecode
AND equivalentto.universitynumber=outsidecourses.universitynumber
INNER JOIN otheruniversities ON equivalentto.universitynumber=otheruniversities.universitynumber
WHERE equivalentto.coursenumber="cs1026";

-- Query9
SELECT COUNT(*) FROM equivalentto WHERE coursenumber="cs1026";

-- Query10
SELECT w.coursename, o.coursename, u.nickname FROM equivalentto e 
INNER JOIN westerncourses w ON e.coursenumber=w.coursenumber
INNER JOIN outsidecourses o ON e.coursecode=o.coursecode AND e.universitynumber=o.universitynumber
INNER JOIN otheruniversities u ON e.universitynumber=u.universitynumber AND u.city="Waterloo";

-- Query11
SELECT officialname FROM otheruniversities
WHERE otheruniversities.universitynumber NOT IN (SELECT universitynumber FROM equivalentto);

-- Query12
SELECT w.coursename, w.coursenumber FROM equivalentto e 
INNER JOIN westerncourses w ON e.coursenumber=w.coursenumber
INNER JOIN outsidecourses o ON e.coursecode=o.coursecode AND o.intendedyear>=3;

-- Query13
SELECT coursename FROM westerncourses 
WHERE coursenumber IN (SELECT coursenumber FROM equivalentto GROUP BY coursenumber HAVING count(*)>1);

-- Query14
SELECT w.coursenumber as "Western Course Number", w.coursename as "Western Course Name", w.weight as "Course Weight",
o.coursename as "Other Course Name", u.officialname as "University Name", o.weight as "Other Course Weight"
FROM equivalentto e INNER JOIN westerncourses w ON e.coursenumber=w.coursenumber
INNER JOIN outsidecourses o ON e.coursecode=o.coursecode AND e.universitynumber=o.universitynumber AND o.weight!=w.weight
INNER JOIN otheruniversities u ON o.universitynumber=u.universitynumber;


