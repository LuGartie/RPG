CREATE SCHEMA IF NOT EXISTS `rpg` DEFAULT CHARACTER SET utf8 ;
use `rpg` ;

CREATE TABLE IF NOT EXISTS `rpg`.`user` (
	`user_id` tinyint not null primary key auto_increment,
    `user_nick` varchar(30) not null unique,
    `user_password` char(60) not null
);
create table if not exists `rpg`.`persona` (
	`persona_nick` varchar(30) primary key,
    `persona_class` char(1)not null,
    `ap` tinyint,
    `ad` tinyint,
    `rl` tinyint,
    `def` tinyint,
    `hp` tinyint,
    `user_id_fp` varchar(30) null,
    CONSTRAINT `fk_User_Persona`
    FOREIGN KEY (`user_id_fp`)
    REFERENCES `rpg`.`user` (`user_nick`)
); 
