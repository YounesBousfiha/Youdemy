-- SQL Code genere la Schema de Base de Données
CREATE DATABASE IF NOT EXISTS Youdemy;

USE Youdemy;

CREATE TABLE IF NOT EXISTS  Roles (
    role_id INT NOT NULL AUTO_INCREMENT,
    role_name VARCHAR(20) NOT NULL,
    PRIMARY KEY (role_id)
);

CREATE TABLE  IF NOT EXISTS Persons (
    user_id INT NOT NULL AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    fk_role_id INT NOT NULL,
    PRIMARY KEY(user_id),
    FOREIGN KEY (fk_role_id) REFERENCES  Roles(role_id)
);

CREATE TABLE IF NOT EXISTS Categories(
    categorie_id INT NOT NULL AUTO_INCREMENT,
    categorie_nom VARCHAR(255) NOT NULL,
    PRIMARY KEY (categorie_id)
);

CREATE TABLE IF NOT EXISTS  Courses(
    course_id INT NOT NULL AUTO_INCREMENT,
    course_nom VARCHAR(255) NOT NULL,
    course_desc VARCHAR(255) NOT NULL,
    course_miniature VARCHAR(255) NOT NULL,
    course_visibility ENUM('active', 'inactive') DEFAULT 'inactive',
    course_status ENUM('approved', 'rejected', 'pending') DEFAULT 'pending',
    fk_user_id INT NOT NULL,
    fk_categorie_id INT NOT NULL,
    PRIMARY KEY (course_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_categorie_id) REFERENCES Categories(categorie_id)
);

ALTER TABLE Courses
ADD COLUMN course_type ENUM('text', 'video') NOT NULL,
ADD COLUMN course_content TEXT NULL

CREATE TABLE IF NOT EXISTS Tags(
    tag_id INT NOT NULL AUTO_INCREMENT,
    tag_nom VARCHAR(30),
    PRIMARY KEY (tag_id)
);

CREATE TABLE IF NOT EXISTS Course_tags(
    fk_course_id INT NOT NULL,
    fk_tag_id INT NOT NULL,
    PRIMARY KEY (fk_course_id, fk_tag_id)
);

CREATE TABLE IF NOT EXISTS Enrollments(
    enrollment_id INT NOT NULL AUTO_INCREMENT,
    enrollment_status ENUM('active', 'inactive') DEFAULT 'active',
    fk_user_id INT NOT NULL,
    fk_course_id INT NOT NULL,
    PRIMARY KEY (enrollment_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Comments(
    comment_id INT NOT NULL AUTO_INCREMENT,
    comment_content VARCHAR(255) NOT NULL,
    fk_user_id INT NOT NULL,
    fk_course_id INT NOT NULL,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE,
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Sections(
    section_id INT NOT NULL AUTO_INCREMENT,
    section_title VARCHAR(255) NOT NULL,
    section_content TEXT NOT NULL,
    isComplete ENUM('TRUE', 'FALSE') DEFAULT 'FALSE',
    fk_course_id INT NOT NULL,
    PRIMARY KEY (section_id),
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id) ON DELETE CASCADE
);

ALTER TABLE Courses DROP COLUMN  course_content;

ALTER TABLE Courses
DROP COLUMN course_status,
ADD COLUMN course_visibility ENUM('active', 'inactive') DEFAULT 'inactive',
ADD COLUMN course_status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending';

ALTER TABLE Persons
ADD COLUMN user_status ENUM('active', 'inactive') DEFAULT 'active';

INSERT INTO Categories (categorie_nom) VALUES ('Web developpment'), ('Data Science'), ('Blockchain developpment');

ALTER TABLE Categories
ADD COLUMN categorie_img VARCHAR(255) NOT NULL;

CREATE VIEW inactiveAccount AS
SELECT P.user_id ,P.prenom, P.nom, P.email, P.fk_role_id FROM Persons P WHERE user_status = 'inactive';

CREATE VIEW Users AS
SELECT P.user_id, P.nom, P.prenom, P.email, P.user_status, R.role_name
FROM Persons P
JOIN Roles R ON P.fk_role_id = R.role_id
WHERE R.role_name NOT LIKE 'Admin'

CREATE VIEW CommentToAdmin AS
    SELECT C.comment_id, CO.course_nom, C.comment_content, P.nom, P.prenom
    FROM Comments C
    JOIN Persons P ON P.user_id = C.fk_user_id
    JOIN Courses CO ON C.fk_course_id = CO.course_id

ALTER TABLE Courses
    DROP FOREIGN KEY fk_user_id,
    ADD CONSTRAINT fk_user_id FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE;

ALTER TABLE Enrollments
    DROP FOREIGN KEY fk_user_id,
    ADD CONSTRAINT fk_user_id FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE;

ALTER TABLE Comments
    DROP FOREIGN KEY fk_user_id,
    ADD CONSTRAINT fk_user_id FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id) ON DELETE CASCADE;

CREATE VIEW TeacherCourseView AS
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
ORDER BY C.course_id

CREATE VIEW EnrolledStudents AS
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

DELIMITER $$

CREATE PROCEDURE CreateCourse(
	IN course_nom VARCHAR(255),
    IN course_desc VARCHAR(255),
    IN course_miniature VARCHAR(255),
    IN course_status ENUM('approuved', 'rejected', 'pending'),
    IN course_type ENUM('text', 'video'),
    IN course_content TEXT,
    IN fk_user_id INT,
    IN fk_categorie_id INT
)

BEGIN
	INSERT INTO Courses (course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id)
	VALUES (course_nom, course_desc, course_miniature, course_status, course_type, course_content, fk_user_id, fk_categorie_id);


    SELECT LAST_INSERT_ID();
END $$

DELIMITER ;


CREATE VIEW CourseManagerByAdmin AS
    SELECT C.* ,CA.categorie_nom ,U.nom, U.prenom
FROM Courses C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Categories CA ON C.fk_categorie_id = CA.categorie_id


CREATE VIEW MyCourses AS
SELECT E.*, C.course_nom, C.course_miniature, C.course_desc
FROM Enrollments E
JOIN Courses C ON E.fk_course_id = C.course_id

CREATE VIEW CourseDetails AS
SELECT *
FROM Courses C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Categories ON C.fk_categorie_id = Categories.categorie_id
JOIN Course_tags CT ON CT.fk_course_id = C.course_id
JOIN Tags T ON CT.fk_tag_id = T.tag_id;

CREATE VIEW CourseComments AS
SELECT C.comment_id, C.comment_content, C.fk_user_id, U.nom, U.prenom, CO.course_id
FROM Comments C
JOIN Users U ON C.fk_user_id = U.user_id
JOIN Courses CO ON C.fk_course_id = CO.course_id
