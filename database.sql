-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 11 月 18 日 15:17
-- 服务器版本: 5.00.15
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `movie_system`
--
CREATE DATABASE IF NOT EXISTS `movie_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `movie_system`;

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL,
  `m_comment_id` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`comment_id`),
  KEY `m_comment_id` (`m_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `download_link`
--

CREATE TABLE IF NOT EXISTS `download_link` (
  `movie_id` int(10) unsigned NOT NULL,
  `href` varchar(255) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `comment_id` int(10) unsigned NOT NULL,
  `read` char(1) default '0',
  `uid` int(10) unsigned default NULL,
  KEY `comment_id` (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `movie`
--

CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int(10) unsigned NOT NULL auto_increment,
  `movie_name` varchar(45) NOT NULL default '',
  `content` text,
  `poster` int(10) unsigned NOT NULL default '0',
  `year` year(4) default NULL,
  PRIMARY KEY  (`movie_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `movie_comment`
--

CREATE TABLE IF NOT EXISTS `movie_comment` (
  `m_comment_id` int(10) unsigned NOT NULL auto_increment,
  `uid` int(10) unsigned NOT NULL,
  `movie_id` int(10) unsigned NOT NULL,
  `create_time` datetime default NULL,
  `content` text,
  PRIMARY KEY  (`m_comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL default '',
  `birth` date default NULL,
  `gender` char(1) NOT NULL default '0',
  `photo_id` int(10) unsigned NOT NULL default '0',
  `content` text,
  PRIMARY KEY  (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `pic_id` int(10) unsigned NOT NULL auto_increment,
  `pic` blob,
  PRIMARY KEY  (`pic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `movie_id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `rate` decimal(3,2) NOT NULL default '0.00',
  PRIMARY KEY  (`movie_id`,`rate`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `movie_id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `role` varchar(255) default NULL,
  PRIMARY KEY  (`movie_id`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(45) NOT NULL default '',
  `password` varchar(45) NOT NULL default '',
  `gender` char(1) NOT NULL default '0',
  `email` varchar(255) default NULL,
  `photo_id` int(10) unsigned NOT NULL default '0',
  `birth` date default NULL,
  `reg_time` date default NULL,
  `auth` char(1) NOT NULL default '0',
  `signature` text,
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
