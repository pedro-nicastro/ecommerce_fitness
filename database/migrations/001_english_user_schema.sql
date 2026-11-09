-- Run once against an existing installation before deploying the English PHP code.
-- Back up the clients database before applying this migration.
USE clients;

RENAME TABLE usuarios TO users;

ALTER TABLE users
  CHANGE COLUMN ID id INT NOT NULL AUTO_INCREMENT,
  CHANGE COLUMN nome name VARCHAR(255) NOT NULL,
  CHANGE COLUMN pass password_hash VARCHAR(255) NOT NULL,
  CHANGE COLUMN cpf tax_id VARCHAR(50) NOT NULL,
  CHANGE COLUMN mail email VARCHAR(255) NOT NULL;
