# 生活服务分类表
CREATE TABLE `tp5_category`(
	`id` int(11) unsigned NOT NULL auto_increment,
	`name` VARCHAR(50) NOT NULL DEFAULT '',
	`parent_id` int(10) unsigned NOT NULL DEFAULT '0',
 
)