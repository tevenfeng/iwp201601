drop database if exists eswap;

create database eswap character set 'utf8' collate 'utf8_general_ci';

use eswap;

create table users_information(
	user_id int NOT NULL primary key auto_increment,
	user_nickname varchar(100) NOT NULL,
	user_email varchar(100) NOT NULL UNIQUE,
	user_password varchar(100) NOT NULL,
	user_area varchar(100),
	user_phonenumber varchar(100)
);

create table need_information(
	need_id int NOT NULL primary key auto_increment,
	need_user_id int NOT NULL,
	need_start_time varchar(100),
	need_state varchar(100),
	need_goods_description varchar(300),
	need_goods_quality varchar(100),
	need_goods_first_class varchar(100),
	need_goods_second_class varchar(100),
	need_goods_picture_path varchar(100),
	need_goal_goods varchar(300),
	foreign key(need_user_id) references users_information(user_id)
);

create table trading_information(
	trade_id int NOT NULL primary key auto_increment,
	trade_need_id int,
	trade_first_user_id int,
	trade_second_user_id int,
	trade_start_trade_time varchar(100),
	trade_state varchar(100),
	foreign key(trade_need_id) references need_information(need_id)
);

create table catogary_information(
	catogary_first_class varchar(50),
    catogary_second_class varchar(50) unique,
    primary key(catogary_first_class, catogary_second_class)
);


-- Insert some test data

INSERT INTO users_information(user_nickname, user_email, user_password) VALUES('tevenfeng','fengdingwen@outlook.com','000417');