CREATE DATABASE mobile_mining;

CREATE TABLE miners (
    tag varchar(20) NOT NULL UNIQUE,
    pool varchar(100) NOT NULL,
    wallet varchar(300) NOT NULL,
    pass varchar(50) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8;