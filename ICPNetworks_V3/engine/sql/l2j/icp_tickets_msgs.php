<?php
$createTable[26] = "CREATE TABLE `icp_tickets_msgs` (`id` int UNSIGNED NOT NULL AUTO_INCREMENT, `msg_id` int UNSIGNED NOT NULL, `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL, `date` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP, `answered` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '', `attach` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '', `status` int UNSIGNED NOT NULL DEFAULT 1, PRIMARY KEY (`id`) USING BTREE) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;";
$tableName[26] = "icp_tickets_msgs";
$columnsValue[26] = array();