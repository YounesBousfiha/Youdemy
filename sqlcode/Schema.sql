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
    course_content VARCHAR(255) NOT NULL,
    course_miniature VARCHAR(255) NOT NULL,
    course_status ENUM('active', 'inactive') DEFAULT 'inactive',
    fk_user_id INT NOT NULL,
    fk_categorie_id INT NOT NULL,
    PRIMARY KEY (course_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id),
    FOREIGN KEY (fk_categorie_id) REFERENCES Categories(categorie_id)
);

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
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id),
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id)
);

CREATE TABLE IF NOT EXISTS Comments(
    comment_id INT NOT NULL AUTO_INCREMENT,
    comment_content VARCHAR(255) NOT NULL,
    fk_user_id INT NOT NULL,
    fk_course_id INT NOT NULL,
    PRIMARY KEY (comment_id),
    FOREIGN KEY (fk_user_id) REFERENCES Persons(user_id),
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id)
);

CREATE TABLE IF NOT EXISTS Sections(
    section_id INT NOT NULL AUTO_INCREMENT,
    section_title VARCHAR(255) NOT NULL,
    section_content TEXT NOT NULL,
    isComplete ENUM('TRUE', 'FALSE') DEFAULT 'FALSE',
    fk_course_id INT NOT NULL,
    PRIMARY KEY (section_id),
    FOREIGN KEY (fk_course_id) REFERENCES Courses(course_id)
);






