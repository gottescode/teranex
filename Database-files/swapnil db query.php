
// master table changes
ALTER TABLE `master_user` CHANGE `is_active` `is_active` INT(11) NOT NULL DEFAULT '1';
    
    
//contact
ALTER TABLE `contact_us`  ADD `created_date` VARCHAR(25) NULL DEFAULT NULL  AFTER `message`;

ALTER TABLE `course_enrollment` ADD `user_type` INT NULL DEFAULT NULL AFTER `course_status`;

ALTER TABLE `rapid_prototyping_rfq_request_supplier` ADD `user_type` INT NULL DEFAULT NULL AFTER `supplier_program_code`;

ALTER TABLE `research_speak_consultant` ADD `user_type` INT NULL DEFAULT NULL AFTER `requirement`;

ALTER TABLE `analytics_speak_consultant` ADD `user_type` INT NULL DEFAULT NULL AFTER `updated_date`;

ALTER TABLE `snapshots_analyst_query` ADD `user_type` INT NULL DEFAULT NULL FIRST;

ALTER TABLE `snapshots_sales_query` ADD `user_type` INT NULL DEFAULT NULL AFTER `updated_date`;

ALTER TABLE `snapshots_request_call` ADD `user_type` INT NULL DEFAULT NULL AFTER `updated_date`;

ALTER TABLE `remote_programming_rfq` ADD `user_type` INT NULL DEFAULT NULL AFTER `requested_date`;


ALTER TABLE `master_user` ADD `email_actie_status` INT(11) NOT NULL DEFAULT '0' AFTER `session_value`;



ALTER TABLE `event_booking` CHANGE `token_id` `token_id` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `event_booking` CHANGE `session_id` `session_id` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;



ALTER TABLE `event_booking`  ADD `status` INT NOT NULL DEFAULT '0' COMMENT '0,not join event,1 join event'  AFTER `payment_status`;
