CREATE TABLE user_type
(
  type varchar(50) NOT NULL,
  PRIMARY KEY(type)
);

CREATE TABLE faculty
(
id INT AUTO_INCREMENT NOT NULL,
name varchar(255) NOT NULL,
PRIMARY KEY(id)
);

CREATE TABLE major
(
id INT AUTO_INCREMENT NOT NULL,
code varchar(50) NOT NULL,
name varchar(255) NOT NULL,
faculty_id INT NOT NULL,
PRIMARY KEY(id),
CONSTRAINT fk_major_faculty FOREIGN KEY(faculty_id) REFERENCES faculty(id)
);

CREATE TABLE user
(
id INT AUTO_INCREMENT NOT null,
username varchar(100) NOT NULL,
passwrd varchar(100) NOT NULL,
user_type varchar(50) NOT NULL,
faculty_id INT,
major_id INT,
PRIMARY KEY(id),
CONSTRAINT fk_user_type FOREIGN KEY(user_type) REFERENCES user_type(type),
CONSTRAINT fk_user_faculty FOREIGN KEY(faculty_id) REFERENCES faculty(id),
CONSTRAINT fk_user_major FOREIGN KEY(major_id) REFERENCES major(id)
);

CREATE TABLE path
(
  id int AUTO_INCREMENT not null,
  mapid int(11) not null,
  path_coord varchar(255) not null,
  primary key(id),
  constraint fk_path_map foreign key(mapid) references map(id)
);


CREATE TABLE venue
(
	id int AUTO_INCREMENT not null,
	areaid int,
	mapid int,
	name varchar(100) not null,
	type enum('classroom','facility','faculty'),
	primary key(id),
	constraint fk_venue_area foreign key(areaid) references area2(id),
	constraint fk_venue_map foreign key(mapid) references map(id)
)

CREATE TABLE area2
(
	id int AUTO_INCREMENT not null,
	coordinate varchar(400),
    primary key(id)
)