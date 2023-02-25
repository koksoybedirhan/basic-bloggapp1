CREATE TABLE uyeler(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(25) NOT NULL UNIQUE,
    mail VARCHAR(40) NOT NULL UNIQUE,
    number VARCHAR(15) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL,
    date DATETIME DEFAULT CURRENT_TIMESTAMP
)