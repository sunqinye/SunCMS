-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2014 年 05 月 08 日 06:28
-- 服务器版本: 5.5.32-log
-- PHP 版本: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `suncms`
--
CREATE DATABASE IF NOT EXISTS `suncms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `suncms`;

-- --------------------------------------------------------

--
-- 表的结构 `sun_admin`
--

CREATE TABLE IF NOT EXISTS `sun_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` char(32) NOT NULL,
  `gid` tinyint(3) unsigned NOT NULL,
  `email` varchar(50) NOT NULL,
  `lastDatetime` datetime NOT NULL COMMENT '最后一次登录日期',
  `lastIp` varchar(50) NOT NULL COMMENT '最后一次登录IP',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sun_admin`
--

INSERT INTO `sun_admin` (`uid`, `username`, `password`, `gid`, `email`, `lastDatetime`, `lastIp`) VALUES
(1, 'admin', '7e8cddc3d440f391ddd1c0b27cd79fa2', 1, 'admin@admin.com', '2013-12-19 23:27:03', '::1'),
(3, 'test', '17be973ad4c3af3028db42243bd27287', 2, 'test@test.com', '2013-02-07 20:55:29', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `sun_advertise`
--

CREATE TABLE IF NOT EXISTS `sun_advertise` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `sun_advertise`
--

INSERT INTO `sun_advertise` (`aid`, `title`, `type`, `datetime`) VALUES
(1, '111111', 1, '2013-02-16 21:46:41'),
(2, '222222', 1, '2013-02-16 21:46:56'),
(3, '333333', 1, '2013-02-16 21:47:04'),
(4, '444444', 1, '2013-02-16 21:47:12'),
(5, '555555', 2, '2013-02-16 22:06:30'),
(6, 'asdf', 2, '2013-02-13 10:20:53'),
(7, 'aaaa', 1, '2013-02-16 17:06:17'),
(8, '', 2, '2013-02-16 18:59:12'),
(9, '', 2, '2013-02-16 19:15:28'),
(10, '', 2, '2013-02-16 19:16:12'),
(11, '', 2, '2013-02-16 19:19:52'),
(12, '', 2, '2013-02-16 19:21:11'),
(13, '', 2, '2013-02-16 19:21:58'),
(14, '', 2, '2013-02-16 19:22:38'),
(15, '', 2, '2013-02-16 19:23:10'),
(16, '', 2, '2013-02-16 19:23:15'),
(17, '', 2, '2013-02-16 19:23:21'),
(18, 'aaaaa', 2, '2013-02-16 19:30:46'),
(19, 'bbb', 2, '2013-02-16 19:32:04'),
(20, 'aaaaaaa', 2, '2013-02-16 19:32:39'),
(21, 'rewre', 2, '2013-02-16 19:33:06'),
(22, 'yyyyy', 2, '2013-02-16 19:34:06'),
(23, 'bbbb', 2, '2013-02-16 19:35:13'),
(24, 'aassas', 2, '2013-02-16 19:36:47'),
(25, 'rrrrrr', 2, '2013-02-16 19:42:54'),
(26, 'tttttt', 2, '2013-02-16 19:43:43'),
(27, 'qqqqqq', 2, '2013-02-16 19:44:56'),
(28, 'qqqqqq', 2, '2013-02-16 19:44:57'),
(29, 'ccc', 2, '2013-02-16 19:51:27'),
(30, 'ccc', 2, '2013-02-16 19:51:33'),
(31, 'sss', 2, '2013-02-16 19:52:34'),
(32, 'sss', 2, '2013-02-16 19:53:06'),
(33, 'qq123', 2, '2013-02-16 21:13:18'),
(34, 'qwe', 1, '2013-02-16 21:17:41'),
(35, 'asdf', 2, '2013-02-16 22:06:58');

-- --------------------------------------------------------

--
-- 表的结构 `sun_advertise_code`
--

CREATE TABLE IF NOT EXISTS `sun_advertise_code` (
  `aid` smallint(5) unsigned NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sun_advertise_code`
--

INSERT INTO `sun_advertise_code` (`aid`, `code`) VALUES
(1, '111111'),
(34, 'asdfsdfsdfa');

-- --------------------------------------------------------

--
-- 表的结构 `sun_advertise_focus`
--

CREATE TABLE IF NOT EXISTS `sun_advertise_focus` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sun_advertise_focus`
--

INSERT INTO `sun_advertise_focus` (`id`, `title`, `url`, `image`) VALUES
(1, '测试1', 'http://baidu.com', 'data/image/20130929/13804633156969.jpg'),
(2, '测试2', 'http://baidu.com', 'data/image/20130806/1375758128781.jpg'),
(3, '测试3', 'http://baidu.com', 'data/image/20130806/13757581486431.jpg'),
(4, '测试4', 'http://baidu.com', 'data/image/20130806/13757581572797.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `sun_advertise_image`
--

CREATE TABLE IF NOT EXISTS `sun_advertise_image` (
  `aid` smallint(5) unsigned NOT NULL,
  `image` varchar(100) NOT NULL,
  `width` varchar(5) NOT NULL,
  `height` varchar(5) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sun_advertise_image`
--

INSERT INTO `sun_advertise_image` (`aid`, `image`, `width`, `height`, `url`) VALUES
(5, 'data/image/20130216/1361022598684.png', '', '', 'http://www.baidu.com'),
(20, '', '222', '222', ''),
(21, '', '', '', ''),
(22, '', '', '', ''),
(23, '', 'nnn', 'nnn', ''),
(24, '', '', '', ''),
(25, '', '123', '132', ''),
(26, '', '12345', '12345', ''),
(27, '', '1115', '1115', ''),
(28, '', '1115', '1115', ''),
(29, '', '', '', ''),
(30, '\r\n&lt;div class=&quot;header oh&quot;&gt;\r\n	&lt;div class=&quot;header_logo left&quot;&gt;\r\n		&lt;a ', '111', '111', ''),
(31, '', '', '', ''),
(32, '\r\n&lt;div class=&quot;header oh&quot;&gt;\r\n	&lt;div class=&quot;header_logo left&quot;&gt;\r\n		&lt;a ', '111', '111', ''),
(33, 'data/image/20130216/13610203555309.gif', '321', '321', ''),
(35, 'data/image/20130216/13610236172329.jpg', '1', '1', 'http://www.hisuncms.com');

-- --------------------------------------------------------

--
-- 表的结构 `sun_channel`
--

CREATE TABLE IF NOT EXISTS `sun_channel` (
  `cid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `name` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sun_channel`
--

INSERT INTO `sun_channel` (`cid`, `type`, `name`, `url`, `target`, `hidden`, `order`) VALUES
(1, 1, '新闻中心', 'http://www.hisuncms.com', 1, 0, 1),
(2, 1, '产品中心', '', 1, 0, 2),
(3, 1, '关于我们', '', 1, 0, 3),
(4, 2, 'cs', 'hao123.com', 1, 0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `sun_column`
--

CREATE TABLE IF NOT EXISTS `sun_column` (
  `cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `coltype` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `name` varchar(30) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `type` varchar(15) NOT NULL,
  `channel` smallint(5) unsigned NOT NULL DEFAULT '0',
  `parentid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `deep` smallint(5) unsigned NOT NULL,
  `hidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `order` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `sun_column`
--

INSERT INTO `sun_column` (`cid`, `coltype`, `name`, `url`, `target`, `type`, `channel`, `parentid`, `deep`, `hidden`, `order`) VALUES
(2, 1, '测试', '', 1, 'page', 1, 0, 1, 0, 1),
(3, 1, '文章', '', 1, 'article', 1, 0, 1, 0, 0),
(4, 1, '产品', '', 1, 'product', 1, 0, 1, 0, 3),
(5, 1, '留言', '', 1, 'leaveword', 1, 0, 1, 0, 4),
(6, 1, '电源', '', 1, 'page', 3, 0, 1, 0, 0),
(7, 2, 'cs', 'hao123.com', 1, 'null', 4, 0, 1, 0, 1),
(8, 1, 'test', '', 1, 'product', 2, 0, 1, 0, 0),
(9, 1, '阿士大夫', '', 1, 'picture', 1, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sun_comment`
--

CREATE TABLE IF NOT EXISTS `sun_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mid` tinyint(3) unsigned NOT NULL,
  `fid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `username` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sun_group`
--

CREATE TABLE IF NOT EXISTS `sun_group` (
  `gid` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `allowhomepagecontent` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowset` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowchannel` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowuser` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowadvertise` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sun_group`
--

INSERT INTO `sun_group` (`gid`, `name`, `allowhomepagecontent`, `allowset`, `allowchannel`, `allowuser`, `allowadvertise`) VALUES
(1, '站长', 1, 1, 1, 1, 1),
(2, '管理员', 1, 1, 1, 0, 1),
(3, '频道管理员', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sun_group_column`
--

CREATE TABLE IF NOT EXISTS `sun_group_column` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(10) unsigned NOT NULL,
  `gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- 转存表中的数据 `sun_group_column`
--

INSERT INTO `sun_group_column` (`id`, `cid`, `gid`) VALUES
(46, 3, 2),
(47, 5, 2),
(48, 8, 2),
(49, 4, 1),
(50, 5, 1),
(51, 9, 1),
(52, 8, 1);

-- --------------------------------------------------------

--
-- 表的结构 `sun_module`
--

CREATE TABLE IF NOT EXISTS `sun_module` (
  `mid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `sun_module`
--

INSERT INTO `sun_module` (`mid`, `type`, `name`) VALUES
(1, 'page', '单页模块'),
(2, 'article', '文章模块'),
(3, 'product', '产品模块'),
(4, 'leaveword', '留言模块'),
(5, 'picture', '图片模块');

-- --------------------------------------------------------

--
-- 表的结构 `sun_module_article`
--

CREATE TABLE IF NOT EXISTS `sun_module_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `column` mediumint(8) unsigned NOT NULL,
  `title` varchar(150) NOT NULL,
  `author` varchar(30) NOT NULL,
  `source` varchar(30) NOT NULL,
  `sourceurl` varchar(200) NOT NULL DEFAULT '#',
  `content` longtext NOT NULL,
  `clicknum` int(10) unsigned NOT NULL DEFAULT '0',
  `pubDatetime` datetime NOT NULL,
  `upDatetime` datetime NOT NULL,
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sun_module_article`
--

INSERT INTO `sun_module_article` (`id`, `column`, `title`, `author`, `source`, `sourceurl`, `content`, `clicknum`, `pubDatetime`, `upDatetime`, `order`) VALUES
(1, 3, '测试钞', '是', '超市', '测辐射', '&lt;p&gt;的萨菲是打发士大夫&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://localhost/hisuncms/extend/ueditor/php/../../../data/image//remote/99291358734414.jpg&quot; /&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;extend/ueditor/php/../../../data/image/20130121/13587350882719.png&quot; title=&quot;6666.png&quot; /&gt;&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;extend/ueditor/php/../../../data/image/20130121/13587351293210.png&quot; title=&quot;6666.png&quot; /&gt;&lt;br /&gt;&lt;/p&gt;', 0, '2013-01-21 10:24:51', '0000-00-00 00:00:00', 0),
(2, 3, 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasdf', '&lt;p&gt;adsfasdf&lt;br /&gt;&lt;/p&gt;', 0, '2013-01-22 17:19:07', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sun_module_leaveword`
--

CREATE TABLE IF NOT EXISTS `sun_module_leaveword` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `column` mediumint(8) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sun_module_leaveword`
--

INSERT INTO `sun_module_leaveword` (`id`, `column`, `name`, `phone`, `email`, `company`, `content`, `datetime`) VALUES
(1, 5, 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', '2013-01-22 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `sun_module_page`
--

CREATE TABLE IF NOT EXISTS `sun_module_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `column` mediumint(8) unsigned NOT NULL,
  `content` longtext NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sun_module_page`
--

INSERT INTO `sun_module_page` (`id`, `column`, `content`, `datetime`) VALUES
(1, 2, '&lt;p&gt;&lt;span id=&quot;_baidu_bookmark_start_0&quot; style=&quot;display:none;line-height:0px;&quot;&gt;﻿&lt;/span&gt;sdsdsdsdASDF&lt;br /&gt;&lt;/p&gt;', '2012-12-23 12:16:38'),
(2, 6, '', '2013-01-22 19:56:53');

-- --------------------------------------------------------

--
-- 表的结构 `sun_module_picture`
--

CREATE TABLE IF NOT EXISTS `sun_module_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `column` smallint(5) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `sun_module_picture`
--

INSERT INTO `sun_module_picture` (`id`, `column`, `title`, `image`, `description`, `datetime`) VALUES
(2, 9, '阿道夫', '阿士大夫', '阿斯顿法师打发士大夫', '0000-00-00 00:00:00'),
(3, 9, '阿道夫', '阿士大夫', '阿斯顿法师打发士大夫', '0000-00-00 00:00:00'),
(4, 9, '阿道夫', '阿士大夫', '阿斯顿法师打发士大夫', '0000-00-00 00:00:00'),
(5, 9, '阿道夫', '阿士大夫', '阿斯顿法师打发士大夫', '0000-00-00 00:00:00'),
(7, 9, 'asdf', 'asdf', '&lt;p&gt;asdf&lt;br /&gt;&lt;/p&gt;', '2013-04-20 22:12:11'),
(8, 9, 'asdfasdasdf', 'asdfasf33', '&lt;p&gt;asdfasf44&lt;br /&gt;&lt;/p&gt;', '2013-04-20 23:36:31'),
(9, 9, 'adsfasdfasd11', 'data/image/20130420/13664736168543.jpg', '&lt;p&gt;asdf2211&lt;br /&gt;&lt;/p&gt;', '2013-04-20 23:37:28'),
(10, 9, 'aaaaaaaaaaa', 'data/image/20130420/13664733929914.jpg', '&lt;p&gt;aaaaaaaaaaaaa&lt;br /&gt;&lt;/p&gt;', '2013-04-20 23:56:45'),
(11, 9, '&lt;span class=&quot;aaa&quot;&gt;test&lt;/span&gt;', '', '&lt;p&gt;&amp;lt;span class=&amp;quot;aaa&amp;quot;&amp;gt;test&amp;lt;/span&amp;gt;&lt;br /&gt;&lt;/p&gt;', '2013-12-16 14:48:52');

-- --------------------------------------------------------

--
-- 表的结构 `sun_module_product`
--

CREATE TABLE IF NOT EXISTS `sun_module_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `column` mediumint(8) unsigned NOT NULL,
  `title` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `spec` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `introduce` text NOT NULL,
  `picture1` varchar(255) NOT NULL,
  `picture2` varchar(255) NOT NULL,
  `picture3` varchar(255) NOT NULL,
  `clicknum` int(10) unsigned NOT NULL DEFAULT '0',
  `datetime` datetime NOT NULL,
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `sun_module_product`
--

INSERT INTO `sun_module_product` (`id`, `column`, `title`, `model`, `spec`, `price`, `introduce`, `picture1`, `picture2`, `picture3`, `clicknum`, `datetime`, `order`) VALUES
(2, 4, 'SDF', 'SDF', 'SDF', 'SDF', '&lt;p&gt;SDFSDF&lt;br /&gt;&lt;/p&gt;', 'data/image/20130205/13600541045210.jpg', '', '', 0, '2013-02-05 16:48:29', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sun_user`
--

CREATE TABLE IF NOT EXISTS `sun_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` char(32) NOT NULL,
  `gid` tinyint(3) unsigned NOT NULL,
  `email` varchar(30) NOT NULL,
  `regDatetime` datetime NOT NULL,
  `regIp` varchar(40) NOT NULL,
  `lastDatetime` datetime NOT NULL,
  `lastIp` varchar(40) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `sun_website`
--

CREATE TABLE IF NOT EXISTS `sun_website` (
  `wid` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `sitename` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `switch` tinyint(1) unsigned NOT NULL,
  `closereason` varchar(255) NOT NULL,
  `beian` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `is_comment` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `sun_website`
--

INSERT INTO `sun_website` (`wid`, `sitename`, `url`, `title`, `keywords`, `description`, `switch`, `closereason`, `beian`, `phone`, `email`, `zipcode`, `address`, `is_comment`) VALUES
(1, 'HisunCMS', 'www.hisuncms.com', 'HisunCMS-海讯企业管理系统', '', '', 1, '很抱歉，网站暂时关闭，请稍后访问。', '123456', '13900000000', 'admin@admin.com', '200000', 'China', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
