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
  user_gender      BOOLEAN, #   true means female and false means male
  user_area        VARCHAR(100),
  user_phonenumber VARCHAR(100)
);

CREATE TABLE category_information (
  category_first_class  VARCHAR(50),
  category_second_class VARCHAR(50) UNIQUE,
  PRIMARY KEY (category_first_class, category_second_class)
);

CREATE TABLE needs_information (
  need_id                 INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  need_user_id            INT NOT NULL,
  need_start_time         DATETIME,
  need_state              BOOLEAN, #0 stands for uncompleted, 1 stands for completed
  need_title              VARCHAR(200),
  need_goods_description  VARCHAR(500),
  need_goods_quality      INT, #range from 1 to 9
  need_goods_first_class  VARCHAR(50),
  need_goods_second_class VARCHAR(50),
  need_goods_picture_path VARCHAR(1000),
  need_goal_goods         VARCHAR(500),
  FOREIGN KEY (need_user_id) REFERENCES users_information (user_id),
  FOREIGN KEY (need_goods_first_class) REFERENCES category_information (category_first_class),
  FOREIGN KEY (need_goods_second_class) REFERENCES category_information (category_second_class)
);

CREATE TABLE trading_information (
  trade_id               INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  trade_need_id          INT,
  trade_first_user_id    INT,
  trade_second_user_id   INT,
  trade_start_trade_time DATETIME,
  trade_state            TINYINT, # 0 stands for canceled, 1 stands for under dealing, 2 stands for deal completed
  FOREIGN KEY (trade_need_id) REFERENCES needs_information (need_id),
  FOREIGN KEY (trade_first_user_id) REFERENCES users_information (user_id),
  FOREIGN KEY (trade_second_user_id) REFERENCES users_information (user_id)
);

CREATE TABLE station_message (
  message_id            INT      NOT NULL PRIMARY KEY AUTO_INCREMENT,
  message_from_user_id  INT      NOT NULL,
  message_to_user_id    INT      NOT NULL,
  message_time          DATETIME NOT NULL,
  message_need_id       INT      NOT NULL,
  message_status        BOOLEAN  NOT NULL,  # 0 stands for unread messages, 1 stands for read messages
  message_type          BOOLEAN, # 0 stands for request, 1 stands for reply
  message_agree_request BOOLEAN, # 0 stands for denying, 1 stands for agreement
  FOREIGN KEY (message_from_user_id) REFERENCES users_information (user_id),
  FOREIGN KEY (message_to_user_id) REFERENCES users_information (user_id),
  FOREIGN KEY (message_to_user_id) REFERENCES needs_information (need_user_id),
  FOREIGN KEY (message_need_id) REFERENCES needs_information (need_id)
);

-- Insert some category data
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Electronics", "Cell Phones");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Electronics", "Cameras");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Electronics", "Computers");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Electronics", "Tablets");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Electronics", "Accessories");

INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Books", "Textbooks");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Books", "TOEFL");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Books", "IELTS");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Books", "GRE");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Books", "Other Books");

INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Home Appliances", "Refrigerator");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Home Appliances", "TV");
INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Home Appliances", "Air Conditioner");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Home Appliances", "Washer");
INSERT INTO category_information (category_first_class, category_second_class) VALUES ("Home Appliances", "Fans");

INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Sports and Outdoors", "Athletic Clothing");
INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Sports and Outdoors", "Hunting");
INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Sports and Outdoors", "Fishing");
INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Sports and Outdoors", "Fitness");
INSERT INTO category_information (category_first_class, category_second_class)
VALUES ("Sports and Outdoors", "Water Sports");