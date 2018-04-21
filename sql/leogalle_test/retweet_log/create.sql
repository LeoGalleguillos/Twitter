CREATE TABLE `retweet_log` (
    `retweet_log_id` int(10) unsigned auto_increment,
    `tweet_id` bigint(20) unsigned not null,
    `created` datetime not null default current_timestamp,
    PRIMARY KEY (`retweet_log_id`),
    INDEX `tweet_id` (`tweet_id`)
) charset=utf8;
