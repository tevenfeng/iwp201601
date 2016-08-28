DROP DATABASE IF EXISTS eswap;

CREATE DATABASE eswap
  CHARACTER SET 'utf8'
  COLLATE 'utf8_general_ci';

USE eswap;

CREATE TABLE users_information (
  user_id          INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_nickname    VARCHAR(100) NOT NULL,
  user_email       VARCHAR(100) NOT NULL UNIQUE,
  user_password    VARCHAR(100) NOT NULL,
#   true means female and false means male
  user_gender      BOOLEAN,
  user_area        VARCHAR(100),
  user_phonenumber VARCHAR(100)
);

CREATE TABLE need_information (
  need_id                 INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  need_user_id            INT NOT NULL,
  need_start_time         VARCHAR(100),
  need_state              VARCHAR(100),
  need_goods_description  VARCHAR(300),
  need_goods_quality      VARCHAR(100),
  need_goods_first_class  VARCHAR(100),
  need_goods_second_class VARCHAR(100),
  need_goods_picture_path VARCHAR(100),
  need_goal_goods         VARCHAR(300),
  FOREIGN KEY (need_user_id) REFERENCES users_information (user_id)
);

CREATE TABLE trading_information (
  trade_id               INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  trade_need_id          INT,
  trade_first_user_id    INT,
  trade_second_user_id   INT,
  trade_start_trade_time VARCHAR(100),
  trade_state            VARCHAR(100),
  FOREIGN KEY (trade_need_id) REFERENCES need_information (need_id)
);

CREATE TABLE catogary_information (
  catogary_first_class  VARCHAR(50),
  catogary_second_class VARCHAR(50) UNIQUE,
  PRIMARY KEY (catogary_first_class, catogary_second_class)
);

-- Insert some test data

INSERT INTO users_information (user_nickname, user_email, user_password)
VALUES ('tevenfeng', 'fengdingwen@outlook.com', '000417');