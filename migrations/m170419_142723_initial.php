<?php

use yii\db\Migration;

class m170419_142723_initial extends Migration
{
    public function up()
    {
        $this->execute('SET NAMES utf8');
        $this->execute('SET FOREIGN_KEY_CHECKS = 0;');
        $this->execute('CREATE TABLE `pje_execution` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `start_time` datetime DEFAULT NULL,
            `end_time` datetime DEFAULT NULL,
            `duration` int(11) DEFAULT NULL,
            `success` tinyint(1) DEFAULT NULL,
            `job_id` int(11) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `pje_execution_fk1` (`job_id`),
            CONSTRAINT `pje_execution_fk1` FOREIGN KEY (`job_id`) REFERENCES `pje_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_execution_step` (
            `execution_id` int(11) NOT NULL,
            `job_step_id` int(11) NOT NULL,
            `start_time` datetime DEFAULT NULL,
            `end_time` datetime DEFAULT NULL,
            `duration` int(11) DEFAULT NULL,
            `success` tinyint(1) DEFAULT NULL,
            `response_message` text COLLATE utf8_bin,
            `average_cpu_usage` int(10) unsigned DEFAULT NULL,
            PRIMARY KEY (`execution_id`,`job_step_id`),
            KEY `pje_execution_step_fk2` (`job_step_id`),
            CONSTRAINT `pje_execution_step_fk1` FOREIGN KEY (`execution_id`) REFERENCES `pje_execution` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
            CONSTRAINT `pje_execution_step_fk2` FOREIGN KEY (`job_step_id`) REFERENCES `pje_job_step` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_job` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) COLLATE utf8_bin NOT NULL,
            `description` text COLLATE utf8_bin,
            `job_class` varchar(255) COLLATE utf8_bin DEFAULT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_job_step` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `job_id` int(11) NOT NULL,
            `step_id` int(11) NOT NULL,
            `title` varchar(255) COLLATE utf8_bin NOT NULL,
            `order_num` int(11) NOT NULL,
            `stop_on_failure` tinyint(1) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `pje_job_step_fk1` (`job_id`),
            KEY `pje_job_step_fk2` (`step_id`),
            CONSTRAINT `pje_job_step_fk1` FOREIGN KEY (`job_id`) REFERENCES `pje_job` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_job_step_param` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `job_step_id` int(11) DEFAULT NULL,
            `param_name` varchar(255) COLLATE utf8_bin DEFAULT NULL,
            `param_value` varchar(255) COLLATE utf8_bin DEFAULT NULL,
            PRIMARY KEY (`id`),
            KEY `pje_job_step_param_fk1` (`job_step_id`),
            CONSTRAINT `pje_job_step_param_fk1` FOREIGN KEY (`job_step_id`) REFERENCES `pje_job_step` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_notification` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `execution_id` int(11) NOT NULL,
        `message` varchar(255) COLLATE utf8_bin DEFAULT NULL,
        `notification_type` int(11) DEFAULT NULL,
        `notification_date` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `pje_notification_fk1` (`execution_id`),
        CONSTRAINT `pje_notification_fk1` FOREIGN KEY (`execution_id`) REFERENCES `pje_execution` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('CREATE TABLE `pje_step` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) COLLATE utf8_bin NOT NULL,
            `description` text COLLATE utf8_bin,
            `step_class` varchar(255) COLLATE utf8_bin NOT NULL,
            `is_active` tinyint(1) NOT NULL,
            PRIMARY KEY (`id`)
          ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;');
        $this->execute('SET FOREIGN_KEY_CHECKS = 1;');
    }

    public function down()
    {
        echo "m170419_142723_initial cannot be reverted.\n";

        return false;
    }
}
