ALTER TABLE `tbl_purchase_order` CHANGE `payment_status` `approval_status` INT(11) NOT NULL;

ALTER TABLE `tbl_order` CHANGE `payment_status` `approval_status` INT(11) NULL DEFAULT '0';