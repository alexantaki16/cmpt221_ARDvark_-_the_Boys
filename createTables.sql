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
  uid       INT AUTO_INCREMENT PRIMARY KEY,
  fname     TEXT NOT NULL,
  lname     TEXT NOT NULL,
  email     TEXT,
  pass      TEXT NOT NULL,
  reg_date  DATETIME NOT NULL,
  admin     BOOLEAN NOT NULL
);


-- Stuff table holds lost and found stuff
CREATE TABLE stuff(
  sid          INT AUTO_INCREMENT PRIMARY KEY,
  description  TEXT NOT NULL,
  create_date  DATETIME NOT NULL,
  update_date  DATETIME NOT NULL,
  pName        TEXT,
  email        TEXT,
  itemName     TEXT,
  catagory     SET ('Clothes', 'Electronics', 'School Supplies', 'Personal Items', 'Other') NOT NULL,
  status       SET ('found', 'lost', 'claimed') NOT NULL,
  lid          INT REFERENCES location(lid)
);


-- Location table holds location data
CREATE TABLE location(
  lid           INT AUTO_INCREMENT PRIMARY KEY,
  name          TEXT NOT NULL,
  create_date   DATETIME NOT NULL,
  update_date   DATETIME NOT NULL,
  latCord       FLOAT(10,6) NOT NULL,
  longCord      FLOAT(10,6) NOT NULL
);


-- #We insert values into the table so we can add to our buildings database
INSERT INTO location(create_date, update_date, name, latCord, longCord)
VALUES
 (Now(), Now(), "Bryne House", "41.720132", "-73.936647"),
 (Now(), Now(), "Cannavino Library", "41.722114", "-73.934126"),
 (Now(), Now(), "Champagnat Hall", "41.720494", "-73.935808"),
 (Now(), Now(), "Chapel", "41.722193", "-73.933544"),
 (Now(), Now(), "Cornell Boathouse", "41.721361", "-73.938409"),
 (Now(), Now(), "Donnelly Hall", "41.720998", "-73.9325"),
 (Now(), Now(), "Dyson Center", "41.724291", "-73.933083"),
 (Now(), Now(), "Fern Tor", "41.728189", "-73.935784"),
 (Now(), Now(), "Fontaine Hall", "41.725664", "-73.932973"),
 (Now(), Now(), "Foy Townhouses", "41.724832", "-73.934391"),
 (Now(), Now(), "Lower Fulton Street Townhouses", "41.722717", "-73.92881"),
 (Now(), Now(), "Upper Fulton Street Townhouses", "41.72238", "-73.926672"),
 (Now(), Now(), "Greystone", "41.721446", "-73.933893"),
 (Now(), Now(), "Hancock Center", "41.722924", "-73.934496"),
 (Now(), Now(), "Kieran Gatehouse", "41.723269", "-73.932264"),
 (Now(), Now(), "Kirk House", "41.723881", "-73.935333"),
 (Now(), Now(), "Leo Hall", "41.719472", "-73.936336"),
 (Now(), Now(), "Longview Park", "41.72193", "-73.937953"),
 (Now(), Now(), "Lowell Thomas Communication Center", "41.723278", "-73.932855"),
 (Now(), Now(), "Lower Townhouses", "41.722768", "-73.935293"),
 (Now(), Now(), "Marian Halll", "41.721157", "-73.934182"),
 (Now(), Now(), "Marist Boathouse", "41.720741", "-73.938391"),
 (Now(), Now(), "McCann Center", "41.71766", "-73.935349"),
 (Now(), Now(), "Mid-Rise Hall", "41.721542", "-73.935899"),
 (Now(), Now(), "North Campus Housing Complex", "41.726785", "-73.934131"),
 (Now(), Now(), "St. Ann's Hermitage", "41.728189", "-73.934201"),
 (Now(), Now(), "St. Peter's", "41.722493", "-73.932704"),
 (Now(), Now(), "Science and Allied Health Building", "41.722261", "-73.930111"),
 (Now(), Now(), "Sheahan Hall", "41.719186", "-73.935826"),
 (Now(), Now(), "Steel Plant Studios and Gallery", "41.721403", "-73.930993"),
 (Now(), Now(), "Dennis J. Murray Student Ceneter/Music Building", "41.72097", "-73.935185"),
 (Now(), Now(), "Lower West Cedar Townhouses", "41.720401", "-73.92969"),
 (Now(), Now(), "Upper West Cedar Townhouses", "41.720942", "-73.92628"),
 (Now(), Now(), "Other", "41.722114", "-73.934126");
