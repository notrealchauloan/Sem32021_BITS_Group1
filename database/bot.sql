SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `chatbot` (
    `id` type bigint(20) NOT NULL,
    `queries` type varchar(300),
    `replies` type varchar(300),
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `chatbot` (`id`, `queries`, `replies`) VALUES
(1, "hi|hello|hey|wassup|what's up", 'Hello there!'),
(2, "how are you|how old are you|what's your name", "I am just a bot... I don't have an answer for that"),
(3, "I am stressed|I am tired", "Tell me everything, I'm here for you~"),
(4, "joke", "You are a joke.");

