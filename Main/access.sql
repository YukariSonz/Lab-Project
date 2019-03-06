-- public user access setup

CREATE USER 'user'@'localhost';

GRANT SELECT ON videogames_db.GAME
TO 'user'@'localhost';

-- staff user access setup

CREATE USER 'staff'@'localhost' IDENTIFIED BY 'vgstaff';

GRANT ALL PRIVILEGES ON videogames_db.MEMBER
TO 'staff'@'localhost';

GRANT ALL PRIVILEGES ON videogames_db.GAME
TO 'staff'@'localhost';

GRANT ALL PRIVILEGES ON videogames_db.RENTAL
TO 'staff'@'localhost';

GRANT ALL PRIVILEGES ON videogames_db.EXTENTION
TO 'staff'@'localhost';

GRANT ALL PRIVILEGES ON videogames_db.VIOLATION
TO 'staff'@'localhost';

-- secretary access setup

CREATE USER 'sec'@'localhost' IDENTIFIED BY 'vgsec';

GRANT ALL PRIVILEGES ON videogames_db.*
TO 'sec'@'localhost'
WITH GRANT OPTION;