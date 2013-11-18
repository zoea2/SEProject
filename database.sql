create database `Movie_System`;
ALTER DATABASE `Movie_System` DEFAULT CHARACTER SET utf8;   
use `Movie_System`;



-- User --
create table `User` (
	`uid` integer unsigned not null auto_increment,
	`username` varchar(45) not null unique default '',
	`password` varchar (45)  not null default '',
	`gender` char(1) not null default '0',
	`email` varchar(255) ,
	`photo_id` integer unsigned not null default 0,
	`birth` date,
	`reg_time` date,
	`auth` char(1) not null default '0',
	`signature` text,
	primary key (`uid`)
);

-- Movie --
create table `Movie` (
	`movie_id` integer unsigned not null auto_increment,
	`movie_name` varchar(45) not null default '',
	`content` text,
	`poster` integer unsigned not null default 0,
	`year` year,
	primary key (`movie_id`)
);

-- Participant --
create table `Participant` (
	`pid` integer unsigned not null auto_increment ,
	`name` varchar(45) not null default '',
	`birth` date,
	`gender` char(1) not null default '0',
	`photo_id` integer unsigned not null default 0,
	`content` text,
	primary key (`pid`)
);

-- Picture --
create table `Picture` (
	`pic_id` integer unsigned not null auto_increment,
	`pic` blob,
	primary key (`pic_id`)
);
ALTER TABLE `Picture` auto_increment = 0;	

-- Download_link --
create table `Download_link` (
	`movie_id` integer unsigned not null,
	`href` varchar(255)
);

-- Role --
create table `Role` (
	`movie_id` integer unsigned not null,
	`pid` integer unsigned not null,
	`role` varchar(255) ,
	primary key (`movie_id` , `pid`)
);

-- Rating --

create table `Rating` (
	`movie_id` integer unsigned not null,
	`uid` integer unsigned not null,
	`rate` numeric(3,2) not null default 0.00,
	primary key (`movie_id`,`rate`) 
);

-- Movie_Comment --
create table `Movie_Comment` (
	`m_comment_id` integer unsigned not null auto_increment,
	`uid` integer unsigned not null,
	`movie_id` integer unsigned not null,
	`create_time` datetime,
	`content` text,
	primary key(`m_comment_id`)
);


-- Comment --
create table `Comment` (
	`comment_id` integer unsigned not null auto_increment,
	`uid` integer unsigned not null,
	`m_comment_id` integer unsigned not null ,
	primary key (`comment_id`),
	foreign key(`m_comment_id`) references `Movie_Comment`(`m_comment_id`) on delete cascade
);

-- Message --
create table `Message` (
	`comment_id` integer unsigned not null,
	`read` char(1) default 0,
	`uid` integer unsigned,
	foreign key(`comment_id`) references `Comment`(`comment_id`) on delete cascade
);