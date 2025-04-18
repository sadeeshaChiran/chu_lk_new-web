ALTER TABLE `sales` ADD `is_exchange` INT(2) NOT NULL DEFAULT '0' AFTER `delivery_type`;
ALTER TABLE `cash_registers` ADD `closing_balance` DOUBLE NOT NULL DEFAULT '0' AFTER `cash_in_hand`;


04/18   
ALTER TABLE `cash_registers` ADD `next_day_opening_balance` DOUBLE NOT NULL DEFAULT '0' AFTER `closing_balance`;

04/19
ALTER TABLE `packing_slips` ADD `user_id` INT NOT NULL DEFAULT '57' AFTER `delivery_id`;
INSERT INTO `roles` (`id`, `name`, `description`, `guard_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin can access all data...', 'web', 1, '2018-06-01 18:16:44', '2018-06-02 17:43:05'),
(2, 'Owner', 'Staff of shop', 'web', 1, '2018-10-21 21:08:13', '2022-02-01 07:43:30'),
(3, 'role 1without pos', 'without warehouse without pos', 'web', 1, '2025-02-26 15:02:29', '2025-03-15 13:42:10'),
(4, 'role 2 Oder Sales', 'without warehouse', 'web', 1, '2025-02-26 15:02:43', '2025-03-15 13:53:23'),
(5, 'role 3', 'without warehouse', 'web', 1, '2025-02-26 15:02:52', '2025-02-26 15:02:52'),
(6, 'role 4', 'without warehouse', 'web', 1, '2025-02-26 15:02:52', '2025-02-26 15:02:52'),
(7, 'role 5', 'without warehouse', 'web', 1, '2025-02-26 15:02:52', '2025-02-26 15:02:52'),
(8, 'role 6', 'without warehouse', 'web', 1, '2025-02-26 15:02:52', '2025-02-26 15:02:52'),
(9, 'Admin Staff', 'staff has specific acess...', 'web', 1, '2018-06-01 18:35:27', '2025-02-22 18:00:17'),
(10, 'Customer', NULL, 'web', 1, '2020-11-05 01:13:16', '2020-11-14 18:54:15'),
(11, 'Packing', 'Packing', 'web', 1, '2025-01-28 12:57:23', '2025-03-25 12:42:30'),
(12, 'test pos', NULL, 'web', 1, '2025-03-10 02:41:14', '2025-03-10 02:41:14'),
(13, 'test1', NULL, 'web', 1, '2025-02-26 14:12:19', '2025-02-26 14:12:19'),
(14, 'Admin All Permition', NULL, 'web', 1, '2025-02-22 18:05:27', '2025-02-22 18:05:27'),
(15, 'Pos User and Packing', NULL, 'web', 1, '2025-02-22 17:53:21', '2025-03-15 13:43:12');

UPDATE users
SET role_id = CASE 
    WHEN role_id = 7 THEN 15
    WHEN role_id = 4 THEN 9
    WHEN role_id = 5 THEN 10
    WHEN role_id = 6 THEN 11
    WHEN role_id = 8 THEN 14
    ELSE role_id
END
WHERE role_id IN (4, 5, 6, 7, 8);


UPDATE role_has_permissions
SET role_id = CASE 
    WHEN role_id = 7 THEN 15
    WHEN role_id = 4 THEN 9
    WHEN role_id = 5 THEN 10
    WHEN role_id = 6 THEN 11
    WHEN role_id = 8 THEN 14
    ELSE role_id
END
WHERE role_id IN (4, 5, 6, 7, 8);