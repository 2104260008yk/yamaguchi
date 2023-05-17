-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-08-30 21:01:49
-- サーバのバージョン： 10.4.20-MariaDB
-- PHP のバージョン: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `school`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `Japanese` int(11) DEFAULT NULL,
  `English` int(11) DEFAULT NULL,
  `Mathematicts` int(11) DEFAULT NULL,
  `Science` int(11) DEFAULT NULL,
  `Social_studies` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `average` int(11) DEFAULT NULL,
  `red` varchar(255) DEFAULT NULL,
  `max_sub` varchar(255) DEFAULT NULL,
  `max_score` int(11) DEFAULT NULL,
  `min_sub` varchar(255) DEFAULT NULL,
  `min_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `student`
--

INSERT INTO `student` (`id`, `s_name`, `class`, `Japanese`, `English`, `Mathematicts`, `Science`, `Social_studies`, `total`, `average`, `red`, `max_sub`, `max_score`, `min_sub`, `min_score`) VALUES
(1, '三吉杏', '1-1', 67, 87, 43, 76, 34, 307, 61, '社会', '英語', 87, '社会', 34),
(2, '羽藤久迩', '1-1', 100, 98, 96, 95, 97, 486, 97, 'なし', '国語', 100, '理科', 95),
(3, '紺野真里', '1-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '梅津めめ', '1-2', 54, 65, 22, 87, 54, 282, 56, '数学', '理科', 87, '数学', 22),
(6, '日南みどり', '1-2', 65, 43, 23, 54, 65, 250, 50, '数学', '国語', 65, '数学', 23),
(7, '湯谷裕也', '1-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '鵜飼茉奈', '1-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '斎藤詩織', '1-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '東雲照', '1-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `teacher`
--

CREATE TABLE `teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `t_name` varchar(255) NOT NULL,
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `teacher`
--

INSERT INTO `teacher` (`id`, `t_name`, `login_id`, `password`, `class`) VALUES
(1, '塩谷真白', 'teacher01', 'teacher01', '1-1'),
(2, '夏野みかん', 'teacher02', 'teacher02', '1-2');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
