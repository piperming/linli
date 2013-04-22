-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 04 月 22 日 23:38
-- 服务器版本: 5.5.29-0ubuntu0.12.10.1
-- PHP 版本: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `linli`
--

-- --------------------------------------------------------

--
-- 表的结构 `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `staff_id` int(11) NOT NULL DEFAULT '0' COMMENT '员工ID',
  `custom_id` int(11) DEFAULT '0' COMMENT '客户ID',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `custom`
--

CREATE TABLE IF NOT EXISTS `custom` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_name` varchar(15) NOT NULL DEFAULT '' COMMENT '客户姓名',
  `sex` char(1) NOT NULL DEFAULT '0' COMMENT '性别 0:男 1:女',
  `brithday` int(11) NOT NULL DEFAULT '0' COMMENT '生日',
  `education` varchar(15) NOT NULL DEFAULT '' COMMENT '受教育程度',
  `marital_status` char(1) NOT NULL DEFAULT '0' COMMENT '婚姻状况 0:未婚 1:已婚 3:离异',
  `job` varchar(45) NOT NULL DEFAULT '' COMMENT '职业类型',
  `tel` varchar(13) NOT NULL DEFAULT '' COMMENT '座机号码',
  `phone` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '申请日期',
  `credit_card_number` char(19) NOT NULL DEFAULT '' COMMENT '信用卡号码',
  `id_card_number` char(18) NOT NULL DEFAULT '' COMMENT '身份证号码',
  `address` text NOT NULL COMMENT '联系地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_number` varchar(15) NOT NULL DEFAULT '',
  `staff_name` varchar(15) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` char(1) NOT NULL DEFAULT '0' COMMENT '性别 0:男 1:女',
  `brithday` int(11) NOT NULL DEFAULT '0' COMMENT '生日',
  `email` varchar(20) NOT NULL DEFAULT '' COMMENT '邮箱',
  `passwd` varchar(64) NOT NULL DEFAULT '' COMMENT '密码',
  `education` varchar(15) NOT NULL DEFAULT '' COMMENT '学历',
  `tel` varchar(11) NOT NULL DEFAULT '' COMMENT '电话',
  `phone` varchar(11) NOT NULL DEFAULT '' COMMENT '手机',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '注册时间',
  `role` int(11) NOT NULL DEFAULT '0' COMMENT '角色 0:普通成员 1:领导',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `staff`
--

INSERT INTO `staff` (`id`, `staff_number`, `staff_name`, `sex`, `brithday`, `email`, `passwd`, `education`, `tel`, `phone`, `ctime`, `role`) VALUES
(1, 'S001', 'pmpen', '0', 651209013, 'xnnye@qq.com', '21232f297a57a5a743894a0e4a801fc3', '本科', '0736-831819', '13261154495', 136654650, 1);

-- --------------------------------------------------------

--
-- 表的结构 `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_number` int(11) NOT NULL DEFAULT '0' COMMENT '员工编号',
  `staff_name` varchar(15) NOT NULL DEFAULT '' COMMENT '员工姓名',
  `plan_no` int(11) NOT NULL DEFAULT '0' COMMENT '计划办理信用卡张数',
  `fact_no` int(11) NOT NULL DEFAULT '0' COMMENT '实际办理信用卡张数',
  `fail_no` int(11) NOT NULL DEFAULT '0' COMMENT '不符合要求信用卡张数',
  `fail_reason` text NOT NULL COMMENT '不符合要求原因',
  `ctime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
