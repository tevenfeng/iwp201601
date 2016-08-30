CREATE DATABASE iwp201602
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201603
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201604
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201605
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201606
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201607
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201608
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201609
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';
CREATE DATABASE iwp201610
CHARACTER SET 'utf8'
COLLATE 'utf8_general_ci';

insert into mysql.user(Host,User,Password) values("%","iwp201602",password("iwp201602"));
insert into mysql.user(Host,User,Password) values("%","iwp201603",password("iwp201603"));
insert into mysql.user(Host,User,Password) values("%","iwp201604",password("iwp201604"));
insert into mysql.user(Host,User,Password) values("%","iwp201605",password("iwp201605"));
insert into mysql.user(Host,User,Password) values("%","iwp201606",password("iwp201606"));
insert into mysql.user(Host,User,Password) values("%","iwp201607",password("iwp201607"));
insert into mysql.user(Host,User,Password) values("%","iwp201608",password("iwp201608"));
insert into mysql.user(Host,User,Password) values("%","iwp201609",password("iwp201609"));
insert into mysql.user(Host,User,Password) values("%","iwp201610",password("iwp201610"));

grant all privileges on iwp201602.* to iwp201602@localhost identified by 'iwp201602';
grant all privileges on iwp201603.* to iwp201603@localhost identified by 'iwp201603';
grant all privileges on iwp201604.* to iwp201604@localhost identified by 'iwp201604';
grant all privileges on iwp201605.* to iwp201605@localhost identified by 'iwp201605';
grant all privileges on iwp201606.* to iwp201606@localhost identified by 'iwp201606';
grant all privileges on iwp201607.* to iwp201607@localhost identified by 'iwp201607';
grant all privileges on iwp201608.* to iwp201608@localhost identified by 'iwp201608';
grant all privileges on iwp201609.* to iwp201609@localhost identified by 'iwp201609';
grant all privileges on iwp201610.* to iwp201610@localhost identified by 'iwp201610';