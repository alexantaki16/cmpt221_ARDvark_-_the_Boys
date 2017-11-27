-- Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley -- 
-- Prof: Casimer DeCusatis --
-- Date: 11/26/2017 --
-- Assignment: Limbo --
-- File name: createTables.sql --

-- Creates the limbo database
drop database if exists limbo_db;
create database limbo_db ;
use limbo_db ;

-- Strong entities
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS stuff;
DROP TABLE IF EXISTS location;

-- Weak entities 
DROP TABLE IF EXISTS stuffLoc;
DROP TABLE IF EXISTS peopleLoc;
DROP TABLE IF EXISTS stuffPeeps;


-- Users table holds limbo users / admins data
CREATE TABLE users(
  uid       char(3) AUTO_INCREMENT PRIMARY KEY,
  fname     TEXT NOT NULL,
  lname     TEXT NOT NULL,
  email     TEXT,
  pass      TEXT NOT NULL,
  reg_date  DATETIME NOT NULL,
  admin     BOOLEAN NOT NULL
);


-- Stuff table holds lost and found stuff
CREATE TABLE stuff(
  sid          char(3) AUTO_INCREMENT PRIMARY KEY,
  description  TEXT NOT NULL,
  create_date  DATETIME NOT NULL,
  update_date  DATETIME NOT NULL,
  room         TEXT,
  status       SET ('found', 'lost', 'claimed') NOT NULL
);


-- Location table holds location data
CREATE TABLE location(
  lid           char(3) AUTO_INCREMENT PRIMARY KEY,
  name          TEXT NOT NULL,
  create_date   DATETIME NOT NULL,
  update_date   DATETIME NOT NULL,
);

/*

CREATE TABLE stuffLoc(
  sid  char(3)
);

-- 
CREATE TABLE peopleLoc(
);

-- 
CREATE TABLE stuffPeeps(
);

*/

-- #We insert values into the table so we can add to our buildings database
-- INSERT INTO location(id, create_date, update_date, name)
-- VALUES
-- ("1", Now(), Now(), "Bryne House"),
-- ("2", Now(), Now(), "Cannavino Library"),
-- ("3", Now(), Now(), "Champagnat Hall"),
-- ("4", Now(), Now(), "Chapel"),
-- ("5", Now(), Now(), "Cornell Boathouse"),
-- ("6", Now(), Now(), "Donnelly Hall"),
-- ("7", Now(), Now(), "Dyson Center"),
-- ("8", Now(), Now(), "Fern Tor"),
-- ("9", Now(), Now(), "Fontaine Hall"),
-- ("10", Now(), Now(), "Foy Townhouses"),
-- ("11", Now(), Now(), "Lower Fulton Street Townhouses"),
-- ("12", Now(), Now(), "Upper Fulton Street Townhouses"),
-- ("13", Now(), Now(), "Greystone"),
-- ("14", Now(), Now(), "Hancock Center"),
-- ("15", Now(), Now(), "Kieran Gatehouse"),
-- ("16", Now(), Now(), "Kirk House"),
-- ("17", Now(), Now(), "Leo Hall"),
-- ("18", Now(), Now(), "Longview Park"),
-- ("19", Now(), Now(), "Lowell Thomas Communication Center"),
-- ("20", Now(), Now(), "Lower Townhouses"),
-- ("21", Now(), Now(), "Marian Halll"),
-- ("22", Now(), Now(), "Marist Boathouse"),
-- ("23", Now(), Now(), "McCann Center"),
-- ("24", Now(), Now(), "Mid-Rise Hall"),
-- ("25", Now(), Now(), "North Campus Housing Complex"),
-- ("26", Now(), Now(), "St. Ann's Hermitage"),
-- ("27", Now(), Now(), "St. Peter's"),
-- ("28", Now(), Now(), "Science and Allied Health Building"),
-- ("29", Now(), Now(), "Sheahan Hall"),
-- ("30", Now(), Now(), "Steel Plant Studios and Gallery"),
-- ("31", Now(), Now(), "Dennis J. Murray Student Ceneter/Music Building"),
-- ("32", Now(), Now(), "Lower West Cedar Townhouses"),
-- ("33", Now(), Now(), "Upper West Cedar Townhouses");
