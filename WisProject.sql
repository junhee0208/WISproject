create database DbWis;


create table User (
	userId int(10) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	UserName varchar(128) NOT NULL,
	UserEmail varchar(128) NOT NULL,
	UserUid varchar(128) NOT NULL,
	UserPwd varchar(128) NOT NULL
);