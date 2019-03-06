-- setup database system

CREATE DATABASE videogames_db;
USE videogames_db;

-- schema table setup

CREATE TABLE MEMBER (
    MEMBERID INT(6) UNSIGNED AUTO_INCREMENT,
    NAME VARCHAR(255),
    EMAIL VARCHAR(255) UNIQUE,
    BANNED BOOLEAN,
    BALANCE FLOAT DEFAULT 0,
    PRIMARY KEY(MEMBERID)
);

CREATE TABLE GAME (
    GAMEID INT(6) UNSIGNED AUTO_INCREMENT,
    THUMB TEXT,
    TITLE VARCHAR(255),
    PLATFORM VARCHAR(255),
    GENRE VARCHAR(255),
    RELEASEYEAR FLOAT,
    PRICE FLOAT,
    RATING FLOAT,
    DAMAGED BOOLEAN DEFAULT FALSE,
    AVAILABLE BOOLEAN DEFAULT TRUE,
    PRIMARY KEY(GAMEID)
);

CREATE TABLE RENTAL (
    RENTALID INT(6) UNSIGNED AUTO_INCREMENT,
    MEMBERID INT(6) UNSIGNED,
    GAMEID INT(6) UNSIGNED,
    ACTIVE BOOLEAN DEFAULT TRUE,
    PRIMARY KEY(RENTALID),
    FOREIGN KEY(MEMBERID) REFERENCES MEMBER(MEMBERID) ON DELETE CASCADE,
    FOREIGN KEY(GAMEID) REFERENCES GAME(GAMEID) ON DELETE CASCADE
);

-- need to add computed column

CREATE TABLE RENTALINFO (
    INFOID INT(6) UNSIGNED,
    STARTDATE DATE,
    DUEDATE DATE,
    PRIMARY KEY(INFOID),
    FOREIGN KEY(INFOID) REFERENCES RENTAL(RENTALID) ON DELETE CASCADE
);

CREATE TABLE EXTENTION (
    EXTID INT(6) UNSIGNED,
    PRIMARY KEY(EXTID),
    FOREIGN KEY(EXTID) REFERENCES RENTAL(RENTALID) ON DELETE CASCADE
);

CREATE TABLE VIOLATION (
    VIOID INT(6) UNSIGNED,
    VIOLATIONDATE DATE,
    PRIMARY KEY(VIOID),
    FOREIGN KEY(VIOID) REFERENCES RENTAL(RENTALID) ON DELETE CASCADE
);


-- periods are integers to be used as Intervals
-- in queries

CREATE TABLE SETTINGS(
    VERSIONID INT(6) UNSIGNED AUTO_INCREMENT, -- kept to keep track of all settings iterations
    RENTALPERIOD INT(3) UNSIGNED DEFAULT 3,  -- how long they can rent a game for in weeks
    RENTALLIMIT INT(3) UNSIGNED DEFAULT 2, -- how many games they can rent at once
    EXTENTIONSLIMIT INT(3) UNSIGNED DEFAULT 2, -- how many extentions they can have for one game
    VIOLATIONSLIMIT INT(3) UNSIGNED DEFAULT 3, -- how many occasions they can violate the rules before getting banned
    VIOLATIONSPERIOD INT(3) UNSIGNED DEFAULT 12, -- how long before violations are reset
    BANPERIOD INT(3) UNSIGNED DEFAULT 6, -- how long a ban lasts
    PRIMARY KEY(VERSIONID)
);


-- fill database with test data (TEMPORARY)

insert into GAME(thumb, title, platform, genre, releaseyear, price)
values ('https://static.metacritic.com/images/products/games/5/47dc3e3e49c9cbcf53beefcedcdd6cea-98.jpg', 'Persona 5', 'PS4', 'RPG', 2016, 30.00),
('https://static.metacritic.com/images/products/games/7/49d553990488e666f576cc0b11906ed4-78.jpg', 'Minecraft', 'SWITCH', 'RPG', 2015, 20.00),
('https://static.metacritic.com/images/products/games/6/83a854e88e731ec780ae2d8e2e3659f7-98.jpg', 'Borderlands 2', 'PC', 'RPG', 2012, 5.00),
('https://static.metacritic.com/images/products/games/6/e5cfe9ceea82fd605822b1eb90ff3e73-98.jpg', 'Horizon: Zero Dawn', 'PS4', 'RPG', 2017, 20.00),
('https://static.metacritic.com/images/products/games/6/83a854e88e731ec780ae2d8e2e3659f7-98.jpg', 'Borderlands 2', 'XBOXONE', 'RPG', 2012, 15.00)
