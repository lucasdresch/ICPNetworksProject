<?php
$createTable[0] = "CREATE TABLE icp_accounts ([id] int NOT NULL IDENTITY(1,1) PRIMARY KEY,[login] varchar(45) COLLATE Korean_Wansung_CI_AS NULL,[email] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL,[acc_id] int DEFAULT '0' NOT NULL,[status] int DEFAULT '0' NOT NULL,[repass] int DEFAULT '1' NOT NULL,[accessLevel] int DEFAULT '0' NOT NULL,[vip_end] smalldatetime  NOT NULL)";
$tableName[0] = "icp_accounts";
$columnsValue[0] = array();