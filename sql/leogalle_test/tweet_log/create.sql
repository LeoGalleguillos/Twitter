CREATE TABLE `tweet_log` (
    `tweet_log_id` int(10) unsigned auto_increment,
    `entity_type_id` int(10) unsigned not null,
    `created` datetime not null default current_timestamp,
    PRIMARY KEY (`tweet_log_id`),
    INDEX `entity_type_id` (`entity_type_id`)
) charset=utf8;
