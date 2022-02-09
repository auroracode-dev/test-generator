CREATE DATABASE test_generator;

USE test_generator;

CREATE TABLE degrees(
	id INT AUTO_INCREMENT PRIMARY KEY,
	grade VARCHAR(2) NOT NULL
);

CREATE TABLE user_types(
	id INT AUTO_INCREMENT PRIMARY KEY,
	type VARCHAR(255) NOT NULL
);

CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	fullname VARCHAR(300) NOT NULL,
	email VARCHAR(300) NOT NULL,
	password VARCHAR(300) NOT NULL,
	grade_id INT NULL,
	user_type INT NOT NULL,
	FOREIGN KEY(user_type) REFERENCES user_types(id)
);

CREATE TABLE tests(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(400) NOT NULL,
	description VARCHAR(450) NULL,
  grade_id INT NOT NULL,
	user_id INT NOT NULL,
  FOREIGN KEY(grade_id) REFERENCES degrees(id),
	FOREIGN KEY(user_id) REFERENCES users(id)
);

CREATE TABLE questions(
	id INT AUTO_INCREMENT PRIMARY KEY,
	question TEXT NOT NULL,
	answer_a TEXT NOT NULL,
	answer_b TEXT NOT NULL,
	answer_c TEXT NOT NULL,
	answer_d TEXT NOT NULL,
	test_id INT NOT NULL,
	FOREIGN KEY(test_id) REFERENCES tests(id)
);

CREATE TABLE scores(
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_id INT NOT NULL,
	test_id INT NOT NULL,
	score INT NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id),
	FOREIGN KEY(test_id) REFERENCES tests(id)
);


/*********** Libs ***********/

/* test data */
INSERT INTO degrees(grade) VALUES (6),(7),(8),(9),(10),(11);
INSERT INTO user_types(type) VALUES ("teacher"), ("student");
INSERT INTO users(fullname, email, password, grade_id, user_type) VALUES ('Aurora Code', 'auroacode@code.com', 'auroracode', null, 1),('Andres Felipe', 'student@gmail.com', '12345', 2, 2);



SELECT tests.id, tests.title, tests.description, scores.* FROM tests LEFT JOIN scores ON scores.test_id=tests.id WHERE tests.grade_id=2 AND (scores.user_id!=1 OR scores.id IS NULL);