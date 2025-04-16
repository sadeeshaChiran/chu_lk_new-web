ALTER TABLE `sales` CHANGE `customer_id` `customer_id` INT(11) NULL;

ALTER TABLE ⁠ products ⁠
	ADD COLUMN ⁠ retail_price ⁠ DOUBLE NULL DEFAULT NULL AFTER ⁠ wholesale_price ⁠,
	ADD COLUMN ⁠ online_price ⁠ DOUBLE NULL DEFAULT NULL AFTER ⁠ retail_price ⁠,
	ADD COLUMN ⁠ product_weight ⁠ DOUBLE NULL DEFAULT NULL AFTER ⁠ online_price ⁠;

-- 2025/02/03
ALTER TABLE `sales` ADD `delivery_type` VARCHAR(255) NULL DEFAULT NULL AFTER `woocommerce_order_id`;
ALTER TABLE `packing_slips` ADD `l_id` VARCHAR(255) NULL DEFAULT NULL AFTER `reference_no`;
ALTER TABLE `customers` ADD `phone_number_2` VARCHAR(191) NULL DEFAULT NULL AFTER `phone_number`;

-- 2025/02/06
ALTER TABLE `customer_addresses` CHANGE `country` `country` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `payment_with_credit_card` CHANGE `charge_id` `charge_id` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;