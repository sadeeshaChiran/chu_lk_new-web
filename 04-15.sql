ALTER TABLE `sales` ADD `is_exchange` INT(2) NOT NULL DEFAULT '0' AFTER `delivery_type`;
ALTER TABLE `cash_registers` ADD `closing_balance` DOUBLE NOT NULL DEFAULT '0' AFTER `cash_in_hand`;