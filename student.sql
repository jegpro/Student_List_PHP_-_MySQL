-- Создание базы данных `student`
CREATE DATABASE student_list;


-- Создание таблицы `students`
CREATE TABLE `student_list` (
  `last_name` text NOT NULL,
  `first_name` text NOT NULL,
  `isikukood` bigint(100) NOT NULL PRIMARY KEY,
  `course` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `msg` varchar(250) DEFAULT NULL
);



