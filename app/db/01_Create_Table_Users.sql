
DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
	Id tinyint primary key,
    Email varchar(150) not null unique key,
    Name varchar(30) not null,
    Password varchar(255) not null
)Engine=Innodb;