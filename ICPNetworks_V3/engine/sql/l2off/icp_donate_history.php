<?php
$createTable[4] = "CREATE TABLE icp_donate_history ([id] int IDENTITY(1,1) NOT NULL PRIMARY KEY,[account] varchar(45) COLLATE Latin1_General_CI_AS NOT NULL,[amount] int NOT NULL,[currency] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL,[price] decimal(11,2) NOT NULL,[status] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL,[transaction_id] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL,[date] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL,[method] varchar(255) COLLATE Latin1_General_CI_AS NOT NULL)";
$tableName[4] = "icp_donate_history";
$columnsValue[4] = array();