CREATE TABLE IF NOT EXISTS user_seeker (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    fullname VARCHAR(50),
    birth_date DATE,
    phone_number INT,
    last_education VARCHAR(30),
    address varchar(50),
    hometown varchar(20),
    description varchar(50),
    busyness varchar(30),
    company boolean,
    password varchar(70)
);
CREATE TABLE IF NOT EXISTS user_achievement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    date DATE,
    description varchar(50),
    organizer varchar(30),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user_seeker(user_id)
);
CREATE TABLE IF NOT EXISTS user_activity (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    date_start DATE,
    date_end DATE,
    undergoing boolean,
    degree varchar(20),
    field varchar(30),
    description varchar(50),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user_seeker(user_id)
);
CREATE TABLE IF NOT EXISTS user_education (
    id INT AUTO_INCREMENT PRIMARY KEY,
    institution_name VARCHAR(50),
    date_start DATE,
    date_end DATE,
    undergoing boolean,
    description varchar(50),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES user_seeker(user_id)
);

CREATE TABLE IF NOT EXISTS user_company (
    company_id INT AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(50),
    company_email VARCHAR(50),
    company_number INT,
    industry VARCHAR(20),
    location VARCHAR(30),
    company boolean,
    password varchar(70),
    website varchar(50),
    logo BLOB,
    description varchar(100)
);
CREATE TABLE IF NOT EXISTS intern_chance(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    periode VARCHAR(50),
    industry VARCHAR(20),
    company_id INT,
    FOREIGN KEY (company_id) REFERENCES user_company(company_id)
);
CREATE TABLE IF NOT EXISTS intern_applied(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    intern_id INT,
    date_start DATE,
    date_end DATE,
    is_finished boolean,
    FOREIGN KEY (user_id) REFERENCES user_seeker(user_id),
    FOREIGN KEY (intern_id) REFERENCES intern_chance(id)
);
CREATE TABLE IF NOT EXISTS intern_request(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    intern_id INT,
    is_handled boolean,
    FOREIGN KEY (user_id) REFERENCES user_seeker(user_id),
    FOREIGN KEY (intern_id) REFERENCES intern_chance(id)
);