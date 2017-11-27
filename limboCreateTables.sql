-- Johnathan Clementi, Alex Mahlmeister, Alex Antaki, Matt Oakley -- 
-- Prof: Casimer DeCusatis --
-- Date: 11/13/2017 --
-- Assignment: Assignment 4 --
-- File name: limboCreateTables --

drop database if exists limbo_db;
create database limbo_db;
use limbo_db;

DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Lost;
DROP TABLE IF EXISTS Found;
DROP TABLE IF EXISTS LostBy;
DROP TABLE IF EXISTS FoundBy;


-- CREATE TABLE IF NOT EXISTS stuff( id INT, descr TEXT);
-- ALTER TABLE stuff ADD PRIMARY KEY (id),
--   CHANGE descr description TEXT NOT NULL,
--   ADD COLUMN name INT,
--   ADD COLUMN age INT
--   ADD COLUMN address TEXT;
-- EXPLAIN stuff;

-- Users --
CREATE TABLE Users (
  uid           char(3) AUTO INCREMENT,
  fname         text,
  lname         text, 
  email         text,
 primary key(uid)
);


-- Lost --
CREATE TABLE Lost (
  lid            char(3) AUTO INCREMENT,
  itemName       text,
  dateLost       datetime default"00:00:00",
  --dateSubmitted  datetime default"00:00:00",
  location       text,
  itemDesc       text,
 primary key(lid)
);        


-- Found --
CREATE TABLE Found (
  fid            char(3) AUTO INCREMENT,
  itemName       text,
  dateFound      datetime default"00:00:00",
  --dateSubmitted  datetime default"00:00:00",
  location       text,
  itemDesc       text,
 primary key(fid)
);     


-- -- LostBy --
-- CREATE TABLE LostBy (
--   uid            char(3) not null references Users(uid),
--   lid            char(3) not null references Lost(lid),
-- primary key(uid, lid)
-- );


-- -- FoundBy --
-- CREATE TABLE FoundBy (
--   uid            char(3) not null references Users(uid),
--   fid            char(3) not null references Lost(lid),
-- primary key(uid, fid)
-- );




INSERT INTO Lost (itemName, dateLost, location, itemDesc)
VALUES('iPhone', '2017-11-03', 'Hancock Center', 'iPhone 6s black with orange case'),
  ('textbook', '2017-10-31', 'Donnelly Hall', 'Chemistry textbook with yellow book sock'),
  ('headphones', '2017-09-15', 'Champagnat Hall', 'rose gold Beats by Dre');



INSERT INTO Found (itemName, dateLost, location, itemDesc)
VALUES('backpack', '2017-11-04', 'Hancock Center', 'Orange North Face Jester 2'),
  ('textbook', '2017-11-01', 'Donnelly Hall', 'Biology textbook'),
  ('cd', '2017-09-30', 'Leo Hall', 'The Black Keys El Camino Album cd');