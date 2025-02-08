-- SQL Code genere la Schema de Base de Données
--CREATE DATABASE Youdemy;

--\c Youdemy;

CREATE TABLE IF NOT EXISTS  Roles (
    role_id SERIAL NOT NULL,
    role_name VARCHAR(20) NOT NULL,
    PRIMARY KEY (role_id)
);

INSERT INTO Roles (role_name) VALUES ('Admin'), ('Teacher'), ('Student');

CREATE TABLE  IF NOT EXISTS Persons (
    user_id SERIAL NOT NULL ,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    fk_role_id INT NOT NULL,
    PRIMARY KEY(user_id),
    FOREIGN KEY (fk_role_id) REFERENCES  Roles(role_id)
);

CREATE TABLE IF NOT EXISTS Categories(
    categorie_id SERIAL NOT NULL ,
    categorie_nom VARCHAR(255) NOT NULL,
    PRIMARY KEY (categorie_id)
);

CREATE TYPE visibility AS ENUM ('active', 'inactive');
CREATE TYPE status AS ENUM ('approved', 'rejected', 'pending');
CREATE TYPE contentype AS ENUM('text', 'video');

CREATE TABLE IF NOT EXISTS  Courses(
    course_id SERIAL NOT NULL ,
    course_nom VARCHAR(255) NOT NULL,
    course_desc VARCHAR(255) NOT NULL,
    course_miniature VARCHAR(255) NOT NULL,
    course_visibility visibility DEFAULT 'inactive',
    course_status status DEFAULT 'pending',
    course_type contentype NOT NULL,
    course_content TEXT NULL,
    fk_user_id INT NOT NULL,
    fk_categorie_id INT NOT NULL,
    PRIMARY KEY (course_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_categorie_id) REFERENCES Categories(categorie_id)
);

CREATE TABLE IF NOT EXISTS Tags(
    tag_id SERIAL NOT NULL,
    tag_nom VARCHAR(30),
    PRIMARY KEY (tag_id)
);

CREATE TABLE IF NOT EXISTS Course_tags(
    fk_course_id INT NOT NULL,
    fk_tag_id INT NOT NULL,
    PRIMARY KEY (fk_course_id, fk_tag_id),
    FOREIGN KEY (fk_tag_id) REFERENCES  Tags(tag_id),
    FOREIGN KEY (fk_course_id) REFERENCES  Courses(course_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Enrollments(
    enrollment_id SERIAL NOT NULL,
    enrollment_status visibility DEFAULT 'active',
    fk_user_id INT NOT NULL,
    fk_course_id INT NOT NULL,
    PRIMARY KEY (enrollment_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Comments(
    comment_id SERIAL NOT NULL ,
    comment_content VARCHAR(255) NOT NULL,
    fk_user_id INT NOT NULL,
    fk_course_id INT NOT NULL,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id) ON DELETE CASCADE
);

ALTER TABLE Persons
ADD COLUMN user_status visibility DEFAULT 'active';

ALTER TABLE Categories
ADD COLUMN categorie_img VARCHAR(255) NOT NULL;

CREATE VIEW inactiveaccount AS
SELECT P.user_id ,P.prenom, P.nom, P.email, P.fk_role_id FROM Persons P WHERE user_status = 'inactive';

CREATE VIEW Users AS
SELECT P.user_id, P.nom, P.prenom, P.email, P.user_status, R.role_name
FROM Persons P
JOIN Roles R ON P.fk_role_id = R.role_id
WHERE R.role_name NOT LIKE 'Admin';

CREATE VIEW commenttoadmin AS
    SELECT C.comment_id, CO.course_nom, C.comment_content, P.nom, P.prenom
    FROM Comments C
    JOIN Persons P ON P.user_id = C.fk_user_id
    JOIN Courses CO ON C.fk_course_id = CO.course_id;

CREATE VIEW teachercourseview AS
SELECT C.course_id,
       C.course_nom,
    C.course_content,
    C.course_miniature,
    C.course_desc,
	Ca.categorie_nom,
    C.course_type,
    C.course_visibility,
    U.user_id,
	(SELECT COUNT(*)
     FROM Enrollments  E
     WHERE E.fk_course_id = C.course_id) AS Students_Enrolled,
     (SELECT COUNT(*) FROM Enrollments) AS Total_Student
FROM Courses C
JOIN Categories Ca ON C.fk_categorie_id = Ca.categorie_id
JOIN Users U ON U.user_id = C.fk_user_id
ORDER BY C.course_id;

CREATE VIEW enrolledstudents AS
SELECT
	C.course_id as course_id,
    U.nom,
    U.prenom,
    U.email,
    C.course_nom,
    E.enrollment_status,
    C.fk_user_id AS teacher_id
FROM Enrollments E
JOIN Courses C ON E.fk_course_id = C.course_id
JOIN Users U ON E.fk_user_id = U.user_id;

CREATE OR REPLACE FUNCTION createcourse(
    emp_course_nom VARCHAR(255),
    emp_course_desc VARCHAR(255),
    emp_course_miniature VARCHAR(255),
    emp_course_status status,
    emp_course_type contentype,
    emp_course_content TEXT,
    emp_fk_user_id INT,
    emp_fk_categorie_id INT
) RETURNS INT AS $$
DECLARE
    new_course_id INT;
BEGIN
    INSERT INTO Courses (
        course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id
    )
    VALUES (
               emp_course_nom, emp_course_desc, emp_course_miniature, emp_course_status, emp_course_type, emp_course_content, emp_fk_user_id, emp_fk_categorie_id
           )
    RETURNING course_id INTO new_course_id;
    RETURN new_course_id;
END;
$$ LANGUAGE plpgsql;

-- DELIMITER $$
-- CREATE PROCEDURE CreateCourse(
-- 	IN course_nom VARCHAR(255),
--     IN course_desc VARCHAR(255),
--     IN course_miniature VARCHAR(255),
--     IN course_status ENUM('approuved', 'rejected', 'pending'),
--     IN course_type ENUM('text', 'video'),
--     IN course_content TEXT,
--     IN fk_user_id INT,
--     IN fk_categorie_id INT
-- )
--
-- BEGIN
-- 	INSERT INTO Courses (course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id)
-- 	VALUES (course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id);
--
--
--     SELECT LAST_INSERT_ID();
-- END $$
--
--     DELIMITER;



CREATE VIEW CourseManagerByAdmin AS
    SELECT C.* ,CA.categorie_nom ,U.nom, U.prenom
FROM Courses C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Categories CA ON C.fk_categorie_id = CA.categorie_id;


CREATE VIEW mycourses AS
SELECT E.*, C.course_nom, C.course_miniature, C.course_desc
FROM Enrollments E
JOIN Courses C ON E.fk_course_id = C.course_id;

CREATE VIEW coursedetails AS
SELECT *
FROM Courses C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Categories ON C.fk_categorie_id = Categories.categorie_id
JOIN Course_tags CT ON CT.fk_course_id = C.course_id
JOIN Tags T ON CT.fk_tag_id = T.tag_id;

CREATE VIEW coursecomments AS
SELECT C.comment_id, C.comment_content, C.fk_user_id, U.nom, U.prenom, CO.course_id
FROM Comments C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Courses CO ON C.fk_course_id = CO.course_id;

CREATE VIEW searchresultsview AS
SELECT *
FROM Courses C
JOIN Users U ON C.fk_user_id = U.user_id;

CREATE OR REPLACE VIEW totalstudentperteacher AS
SELECT C.fk_user_id, COUNT(*) as StudentsPerTeacher
FROM Enrollments E
JOIN Courses C ON C.course_id = E.fk_course_id
GROUP BY C.fk_user_id;

CREATE OR REPLACE VIEW coursespercategory AS
SELECT CA.categorie_id, CA.categorie_nom, COUNT(C.course_id) as courseCount
FROM Courses C
JOIN Categories CA ON C.fk_categorie_id = CA.categorie_id
GROUP BY CA.categorie_id;


CREATE OR REPLACE  VIEW bestcourse AS
SELECT E.fk_course_id, C.course_nom, COUNT(*) as EnrolledStudent
FROM Enrollments E
         JOIN Courses C ON E.fk_course_id = course_id
GROUP BY E.fk_course_id, C.course_nom
ORDER  BY EnrolledStudent DESC
LIMIT 1;

CREATE OR REPLACE VIEW topthreeteacher AS
SELECT C.fk_user_id, U.nom, U.prenom, U.email, COUNT(*) as StudentsPerTeacher
FROM Enrollments E
JOIN Courses C ON C.course_id = E.fk_course_id
JOIN Users U ON U.user_id = C.fk_user_id
GROUP BY C.fk_user_id, U.nom, U.prenom, U.email
ORDER BY StudentsPerTeacher DESC
LIMIT 3;
