<?php
$createTable[7] = "CREATE TABLE icp_gallery_screenshots ([id] int IDENTITY(1,1) NOT NULL PRIMARY KEY,[legend] varchar(40) COLLATE Latin1_General_CI_AS DEFAULT 'No legend' NOT NULL,[author] varchar(40) COLLATE Latin1_General_CI_AS DEFAULT 'No author' NOT NULL,[date] smalldatetime NULL,[screenshot] varchar(255) COLLATE Latin1_General_CI_AS DEFAULT 'No photo' NOT NULL,[status] int DEFAULT '0' NOT NULL,[account] varchar(40) COLLATE Korean_Wansung_CI_AS DEFAULT 'No account' NOT NULL)";
$tableName[7] = "icp_gallery_screenshots";
$columnsValue[7] = array();