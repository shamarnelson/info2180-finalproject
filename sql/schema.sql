DROP DATABASE IF EXISTS bugmedb;
CREATE DATABASE bugmedb;
USE bugmedb;

GRANT ALL PRIVILEGES ON bugmedb.* TO 'admin'@'localhost' IDENTIFIED BY 'The_4Webdevs';
--
-- Database: `schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--
DROP TABLE IF EXISTS issues;
CREATE TABLE `issues` (
  `id` int() AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `decription` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
  PRIMARY KEY(id)
);

INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('XSS Vulnerability in Add User Form', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'OPEN', 'Tom Brady', 'Marsha Brady', '2019-11-01 16:30:12', '2019-11-08 10:00:00');
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Location Service isnt working', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Bug', 'Major', 'OPEN', 'Jan Brady', 'Marsha Brady', '2019-10-15 16:30:12', '2019-12-08 10:00:00');
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Setup Logger', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Major', 'CLOSED', 'Marsha Brady', 'Marsha Brady', '2019-08-10 18:32:12', '2019-10-18 01:00:00');
INSERT INTO issues (title, description, type, priority, status, assigned_to, created_by, created, updated) VALUES ('Create API Documentation', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Proposal', 'Minor', 'IN PROGRESS', 'Mike Brady', 'Tom Brady', '2019-10-29 17:33:12', '2019-11-29 12:34:18');



-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_joined` datetime NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('Tom', 'Brady', MD5('12345'), 'tombrady@bugme.com', '2019-09-11 13:23:42');
INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('Marsha', 'Brady', MD5('12345'), 'marciabrady@bugme.com', '2019-12-21 09:44:02');
INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('BugMe', 'Admin', MD5('password123'), 'admin@bugme.com', '2010-01-01 00:00:00');
INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('Jan', 'Brady', MD5('12345'), 'janbrady@bugme.com', '2010-01-01 00:00:00');
INSERT INTO users (firstname, lastname, password, email, date_joined) VALUES ('Mike', 'Brady', MD5('12345'), 'mikebrady@bugme.com', '2010-01-01 00:00:00');