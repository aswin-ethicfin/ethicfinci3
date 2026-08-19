<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2026-08-18 14:47:22 --> Config Class Initialized
INFO - 2026-08-18 14:47:22 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:47:22 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:47:22 --> Utf8 Class Initialized
INFO - 2026-08-18 14:47:22 --> URI Class Initialized
INFO - 2026-08-18 14:47:22 --> Router Class Initialized
INFO - 2026-08-18 14:47:22 --> Output Class Initialized
INFO - 2026-08-18 14:47:22 --> Security Class Initialized
DEBUG - 2026-08-18 14:47:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:47:22 --> Input Class Initialized
INFO - 2026-08-18 14:47:22 --> Language Class Initialized
INFO - 2026-08-18 14:47:22 --> Loader Class Initialized
INFO - 2026-08-18 14:47:22 --> Controller Class Initialized
DEBUG - 2026-08-18 14:47:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:47:22 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:47:22 --> Database Driver Class Initialized
INFO - 2026-08-18 14:47:22 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:47:22 --> Helper loaded: form_helper
INFO - 2026-08-18 14:47:22 --> Helper loaded: url_helper
INFO - 2026-08-18 14:47:22 --> Model "Default_model" initialized
INFO - 2026-08-18 14:47:22 --> Helper loaded: language_helper
INFO - 2026-08-18 14:47:22 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:47:22 --> GET EMPLOYEES BY DESIGNATION: 2
INFO - 2026-08-18 14:47:22 --> Final output sent to browser
DEBUG - 2026-08-18 14:47:22 --> Total execution time: 0.0839
INFO - 2026-08-18 14:47:26 --> Config Class Initialized
INFO - 2026-08-18 14:47:26 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:47:26 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:47:26 --> Utf8 Class Initialized
INFO - 2026-08-18 14:47:26 --> URI Class Initialized
INFO - 2026-08-18 14:47:26 --> Router Class Initialized
INFO - 2026-08-18 14:47:26 --> Output Class Initialized
INFO - 2026-08-18 14:47:26 --> Security Class Initialized
DEBUG - 2026-08-18 14:47:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:47:26 --> Input Class Initialized
INFO - 2026-08-18 14:47:26 --> Language Class Initialized
INFO - 2026-08-18 14:47:26 --> Loader Class Initialized
INFO - 2026-08-18 14:47:26 --> Controller Class Initialized
DEBUG - 2026-08-18 14:47:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:47:26 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:47:26 --> Database Driver Class Initialized
INFO - 2026-08-18 14:47:26 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:47:26 --> Helper loaded: form_helper
INFO - 2026-08-18 14:47:26 --> Helper loaded: url_helper
INFO - 2026-08-18 14:47:26 --> Model "Default_model" initialized
INFO - 2026-08-18 14:47:26 --> Helper loaded: language_helper
INFO - 2026-08-18 14:47:26 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:47:26 --> ========== SAVEAPPROVAL START ==========
DEBUG - 2026-08-18 14:47:26 --> PHPMailer Library loaded.
ERROR - 2026-08-18 14:47:26 --> ========== POST VALUES ==========
ERROR - 2026-08-18 14:47:26 --> doc_id = 4
ERROR - 2026-08-18 14:47:26 --> approval_id = 9
ERROR - 2026-08-18 14:47:26 --> status RAW = 3
ERROR - 2026-08-18 14:47:26 --> status INT = 3
ERROR - 2026-08-18 14:47:26 --> type = 0
ERROR - 2026-08-18 14:47:26 --> employee_id = 3
ERROR - 2026-08-18 14:47:26 --> from_page = 
ERROR - 2026-08-18 14:47:26 --> ========== BEFORE APPROVAL ID VALIDATION ==========
ERROR - 2026-08-18 14:47:26 --> approval_id = 9
ERROR - 2026-08-18 14:47:26 --> status = 3
ERROR - 2026-08-18 14:47:26 --> doc_id: 4
ERROR - 2026-08-18 14:47:26 --> approval_id: 9
ERROR - 2026-08-18 14:47:26 --> type: 0
ERROR - 2026-08-18 14:47:26 --> employee_id: 3
ERROR - 2026-08-18 14:47:26 --> from_page: 
ERROR - 2026-08-18 14:47:26 --> transfer_from CURRENT VALUE: 4
ERROR - 2026-08-18 14:47:26 --> transfer_to CURRENT VALUE: 1
ERROR - 2026-08-18 14:47:26 --> ========== NEW APPROVAL DATA ==========
ERROR - 2026-08-18 14:47:26 --> Array
(
    [doc_id] => 4
    [type] => 0
    [transfer_from] => 1
    [transfer_to] => 3
    [approval_status] => 3
    [remark] => Forwarded for further approval
    [transfer_from_datetime] => 2026-08-18
    [transfer_to_datetime] => 
    [action_datetime] => 
    [status] => 0
    [added_by] => 1
    [ip_address] => 127.0.0.1
    [created_at] => 2026-08-18 14:47:26
)

ERROR - 2026-08-18 14:47:26 --> STEP 1: BEFORE tbl_document_approval INSERT
ERROR - 2026-08-18 14:47:26 --> STEP 2: AFTER tbl_document_approval INSERT
ERROR - 2026-08-18 14:47:26 --> NEW ID: 10
ERROR - 2026-08-18 14:47:26 --> DB ERROR AFTER INSERT: Array
(
    [code] => 0
    [message] => 
)

ERROR - 2026-08-18 14:47:26 --> LAST QUERY AFTER INSERT: INSERT INTO `tbl_document_approval` (`doc_id`, `type`, `transfer_from`, `transfer_to`, `approval_status`, `remark`, `transfer_from_datetime`, `transfer_to_datetime`, `action_datetime`, `status`, `added_by`, `ip_address`, `created_at`) VALUES (4, 0, 1, 3, 3, 'Forwarded for further approval', '2026-08-18', NULL, NULL, 0, 1, '127.0.0.1', '2026-08-18 14:47:26')
ERROR - 2026-08-18 14:47:26 --> ========== UPDATE DOCUMENT APPROVAL ==========
ERROR - 2026-08-18 14:47:26 --> TYPE: 0
ERROR - 2026-08-18 14:47:26 --> DOC ID: 4
ERROR - 2026-08-18 14:47:26 --> STATUS: 3
ERROR - 2026-08-18 14:47:26 --> TABLE SELECTED: tbl_porder
INFO - 2026-08-18 14:47:26 --> Config Class Initialized
INFO - 2026-08-18 14:47:26 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:47:26 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:47:26 --> Utf8 Class Initialized
INFO - 2026-08-18 14:47:26 --> URI Class Initialized
INFO - 2026-08-18 14:47:26 --> Router Class Initialized
INFO - 2026-08-18 14:47:26 --> Output Class Initialized
INFO - 2026-08-18 14:47:26 --> Security Class Initialized
DEBUG - 2026-08-18 14:47:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:47:26 --> Input Class Initialized
INFO - 2026-08-18 14:47:26 --> Language Class Initialized
INFO - 2026-08-18 14:47:26 --> Loader Class Initialized
INFO - 2026-08-18 14:47:26 --> Controller Class Initialized
DEBUG - 2026-08-18 14:47:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:47:26 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:47:26 --> Database Driver Class Initialized
INFO - 2026-08-18 14:47:26 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:47:26 --> Helper loaded: form_helper
INFO - 2026-08-18 14:47:26 --> Helper loaded: url_helper
INFO - 2026-08-18 14:47:26 --> Model "Default_model" initialized
INFO - 2026-08-18 14:47:26 --> Helper loaded: language_helper
INFO - 2026-08-18 14:47:26 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:47:26 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:47:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:47:26 --> Final output sent to browser
DEBUG - 2026-08-18 14:47:26 --> Total execution time: 0.0467
INFO - 2026-08-18 14:48:48 --> Config Class Initialized
INFO - 2026-08-18 14:48:48 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:48:48 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:48:48 --> Utf8 Class Initialized
INFO - 2026-08-18 14:48:48 --> URI Class Initialized
INFO - 2026-08-18 14:48:48 --> Router Class Initialized
INFO - 2026-08-18 14:48:48 --> Output Class Initialized
INFO - 2026-08-18 14:48:48 --> Security Class Initialized
DEBUG - 2026-08-18 14:48:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:48:48 --> Input Class Initialized
INFO - 2026-08-18 14:48:48 --> Language Class Initialized
INFO - 2026-08-18 14:48:48 --> Loader Class Initialized
INFO - 2026-08-18 14:48:48 --> Controller Class Initialized
DEBUG - 2026-08-18 14:48:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:48:48 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:48:48 --> Database Driver Class Initialized
INFO - 2026-08-18 14:48:48 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:48:48 --> Helper loaded: form_helper
INFO - 2026-08-18 14:48:48 --> Helper loaded: url_helper
INFO - 2026-08-18 14:48:48 --> Model "Default_model" initialized
INFO - 2026-08-18 14:48:48 --> Helper loaded: language_helper
INFO - 2026-08-18 14:48:48 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:48:48 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:48:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:48:48 --> Final output sent to browser
DEBUG - 2026-08-18 14:48:48 --> Total execution time: 0.0492
INFO - 2026-08-18 14:49:00 --> Config Class Initialized
INFO - 2026-08-18 14:49:00 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:00 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:00 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:00 --> URI Class Initialized
INFO - 2026-08-18 14:49:00 --> Router Class Initialized
INFO - 2026-08-18 14:49:00 --> Output Class Initialized
INFO - 2026-08-18 14:49:00 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:00 --> Input Class Initialized
INFO - 2026-08-18 14:49:00 --> Language Class Initialized
INFO - 2026-08-18 14:49:00 --> Loader Class Initialized
INFO - 2026-08-18 14:49:00 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:00 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:00 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:00 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:00 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:00 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:00 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:00 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:00 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:00 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:49:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:49:01 --> Final output sent to browser
DEBUG - 2026-08-18 14:49:01 --> Total execution time: 0.0576
INFO - 2026-08-18 14:49:22 --> Config Class Initialized
INFO - 2026-08-18 14:49:22 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:22 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:22 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:22 --> URI Class Initialized
INFO - 2026-08-18 14:49:22 --> Router Class Initialized
INFO - 2026-08-18 14:49:22 --> Output Class Initialized
INFO - 2026-08-18 14:49:22 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:22 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:22 --> Input Class Initialized
INFO - 2026-08-18 14:49:22 --> Language Class Initialized
INFO - 2026-08-18 14:49:22 --> Loader Class Initialized
INFO - 2026-08-18 14:49:22 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:22 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:22 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:22 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:22 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:22 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:22 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:22 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:22 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:22 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:22 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:49:22 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:49:22 --> Final output sent to browser
DEBUG - 2026-08-18 14:49:22 --> Total execution time: 0.0444
INFO - 2026-08-18 14:49:25 --> Config Class Initialized
INFO - 2026-08-18 14:49:25 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:25 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:25 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:25 --> URI Class Initialized
INFO - 2026-08-18 14:49:25 --> Router Class Initialized
INFO - 2026-08-18 14:49:25 --> Output Class Initialized
INFO - 2026-08-18 14:49:25 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:25 --> Input Class Initialized
INFO - 2026-08-18 14:49:25 --> Language Class Initialized
INFO - 2026-08-18 14:49:25 --> Loader Class Initialized
INFO - 2026-08-18 14:49:25 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:25 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:25 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:25 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:25 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:25 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:25 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:25 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:25 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:25 --> GET EMPLOYEES BY DESIGNATION: 2
INFO - 2026-08-18 14:49:25 --> Final output sent to browser
DEBUG - 2026-08-18 14:49:25 --> Total execution time: 0.0406
INFO - 2026-08-18 14:49:27 --> Config Class Initialized
INFO - 2026-08-18 14:49:27 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:27 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:27 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:27 --> URI Class Initialized
INFO - 2026-08-18 14:49:27 --> Router Class Initialized
INFO - 2026-08-18 14:49:27 --> Output Class Initialized
INFO - 2026-08-18 14:49:27 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:27 --> Input Class Initialized
INFO - 2026-08-18 14:49:27 --> Language Class Initialized
INFO - 2026-08-18 14:49:27 --> Loader Class Initialized
INFO - 2026-08-18 14:49:27 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:27 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:27 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:27 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:27 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:27 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:27 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:27 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:27 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:27 --> ========== SAVEAPPROVAL START ==========
DEBUG - 2026-08-18 14:49:27 --> PHPMailer Library loaded.
ERROR - 2026-08-18 14:49:27 --> ========== POST VALUES ==========
ERROR - 2026-08-18 14:49:27 --> doc_id = 4
ERROR - 2026-08-18 14:49:27 --> approval_id = 10
ERROR - 2026-08-18 14:49:27 --> status RAW = 3
ERROR - 2026-08-18 14:49:27 --> status INT = 3
ERROR - 2026-08-18 14:49:27 --> type = 0
ERROR - 2026-08-18 14:49:27 --> employee_id = 3
ERROR - 2026-08-18 14:49:27 --> from_page = 
ERROR - 2026-08-18 14:49:27 --> ========== BEFORE APPROVAL ID VALIDATION ==========
ERROR - 2026-08-18 14:49:27 --> approval_id = 10
ERROR - 2026-08-18 14:49:27 --> status = 3
ERROR - 2026-08-18 14:49:27 --> doc_id: 4
ERROR - 2026-08-18 14:49:27 --> approval_id: 10
ERROR - 2026-08-18 14:49:27 --> type: 0
ERROR - 2026-08-18 14:49:27 --> employee_id: 3
ERROR - 2026-08-18 14:49:27 --> from_page: 
ERROR - 2026-08-18 14:49:27 --> transfer_from CURRENT VALUE: 3
ERROR - 2026-08-18 14:49:27 --> transfer_to CURRENT VALUE: 1
ERROR - 2026-08-18 14:49:27 --> ========== NEW APPROVAL DATA ==========
ERROR - 2026-08-18 14:49:27 --> Array
(
    [doc_id] => 4
    [type] => 0
    [transfer_from] => 1
    [transfer_to] => 3
    [approval_status] => 3
    [remark] => Forwarded for further approval
    [transfer_from_datetime] => 2026-08-18
    [transfer_to_datetime] => 
    [action_datetime] => 
    [status] => 0
    [added_by] => 1
    [ip_address] => 127.0.0.1
    [created_at] => 2026-08-18 14:49:27
)

ERROR - 2026-08-18 14:49:27 --> STEP 1: BEFORE tbl_document_approval INSERT
ERROR - 2026-08-18 14:49:27 --> STEP 2: AFTER tbl_document_approval INSERT
ERROR - 2026-08-18 14:49:27 --> NEW ID: 11
ERROR - 2026-08-18 14:49:27 --> DB ERROR AFTER INSERT: Array
(
    [code] => 0
    [message] => 
)

ERROR - 2026-08-18 14:49:27 --> LAST QUERY AFTER INSERT: INSERT INTO `tbl_document_approval` (`doc_id`, `type`, `transfer_from`, `transfer_to`, `approval_status`, `remark`, `transfer_from_datetime`, `transfer_to_datetime`, `action_datetime`, `status`, `added_by`, `ip_address`, `created_at`) VALUES (4, 0, 1, 3, 3, 'Forwarded for further approval', '2026-08-18', NULL, NULL, 0, 1, '127.0.0.1', '2026-08-18 14:49:27')
INFO - 2026-08-18 14:49:27 --> Config Class Initialized
INFO - 2026-08-18 14:49:27 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:27 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:27 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:27 --> URI Class Initialized
INFO - 2026-08-18 14:49:27 --> Router Class Initialized
INFO - 2026-08-18 14:49:27 --> Output Class Initialized
INFO - 2026-08-18 14:49:27 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:27 --> Input Class Initialized
INFO - 2026-08-18 14:49:27 --> Language Class Initialized
INFO - 2026-08-18 14:49:27 --> Loader Class Initialized
INFO - 2026-08-18 14:49:27 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:27 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:27 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:27 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:27 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:27 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:27 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:27 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:27 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:27 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:49:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:49:27 --> Final output sent to browser
DEBUG - 2026-08-18 14:49:27 --> Total execution time: 0.0544
INFO - 2026-08-18 14:49:57 --> Config Class Initialized
INFO - 2026-08-18 14:49:57 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:49:57 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:49:57 --> Utf8 Class Initialized
INFO - 2026-08-18 14:49:57 --> URI Class Initialized
INFO - 2026-08-18 14:49:57 --> Router Class Initialized
INFO - 2026-08-18 14:49:57 --> Output Class Initialized
INFO - 2026-08-18 14:49:57 --> Security Class Initialized
DEBUG - 2026-08-18 14:49:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:49:57 --> Input Class Initialized
INFO - 2026-08-18 14:49:57 --> Language Class Initialized
INFO - 2026-08-18 14:49:57 --> Loader Class Initialized
INFO - 2026-08-18 14:49:57 --> Controller Class Initialized
DEBUG - 2026-08-18 14:49:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:49:57 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:49:57 --> Database Driver Class Initialized
INFO - 2026-08-18 14:49:57 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:49:57 --> Helper loaded: form_helper
INFO - 2026-08-18 14:49:57 --> Helper loaded: url_helper
INFO - 2026-08-18 14:49:57 --> Model "Default_model" initialized
INFO - 2026-08-18 14:49:57 --> Helper loaded: language_helper
INFO - 2026-08-18 14:49:57 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:49:57 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:49:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:49:57 --> Final output sent to browser
DEBUG - 2026-08-18 14:49:57 --> Total execution time: 0.0795
INFO - 2026-08-18 14:50:52 --> Config Class Initialized
INFO - 2026-08-18 14:50:52 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:50:52 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:50:52 --> Utf8 Class Initialized
INFO - 2026-08-18 14:50:52 --> URI Class Initialized
INFO - 2026-08-18 14:50:52 --> Router Class Initialized
INFO - 2026-08-18 14:50:52 --> Output Class Initialized
INFO - 2026-08-18 14:50:52 --> Security Class Initialized
DEBUG - 2026-08-18 14:50:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:50:52 --> Input Class Initialized
INFO - 2026-08-18 14:50:52 --> Language Class Initialized
ERROR - 2026-08-18 15:50:52 --> 404 Page Not Found: Home/viewpurorder
INFO - 2026-08-18 14:51:48 --> Config Class Initialized
INFO - 2026-08-18 14:51:48 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:51:48 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:51:48 --> Utf8 Class Initialized
INFO - 2026-08-18 14:51:48 --> URI Class Initialized
INFO - 2026-08-18 14:51:48 --> Router Class Initialized
INFO - 2026-08-18 14:51:48 --> Output Class Initialized
INFO - 2026-08-18 14:51:48 --> Security Class Initialized
DEBUG - 2026-08-18 14:51:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:51:48 --> Input Class Initialized
INFO - 2026-08-18 14:51:48 --> Language Class Initialized
INFO - 2026-08-18 14:51:48 --> Loader Class Initialized
INFO - 2026-08-18 14:51:48 --> Controller Class Initialized
DEBUG - 2026-08-18 14:51:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:51:48 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:51:48 --> Database Driver Class Initialized
INFO - 2026-08-18 14:51:48 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:51:48 --> Helper loaded: form_helper
INFO - 2026-08-18 14:51:48 --> Helper loaded: url_helper
INFO - 2026-08-18 14:51:48 --> Model "Default_model" initialized
INFO - 2026-08-18 14:51:48 --> Helper loaded: language_helper
INFO - 2026-08-18 14:51:48 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:51:48 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:51:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:51:48 --> Final output sent to browser
DEBUG - 2026-08-18 14:51:48 --> Total execution time: 0.1081
INFO - 2026-08-18 14:51:51 --> Config Class Initialized
INFO - 2026-08-18 14:51:51 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:51:51 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:51:51 --> Utf8 Class Initialized
INFO - 2026-08-18 14:51:51 --> URI Class Initialized
INFO - 2026-08-18 14:51:51 --> Router Class Initialized
INFO - 2026-08-18 14:51:51 --> Output Class Initialized
INFO - 2026-08-18 14:51:51 --> Security Class Initialized
DEBUG - 2026-08-18 14:51:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:51:51 --> Input Class Initialized
INFO - 2026-08-18 14:51:51 --> Language Class Initialized
INFO - 2026-08-18 14:51:51 --> Loader Class Initialized
INFO - 2026-08-18 14:51:51 --> Controller Class Initialized
DEBUG - 2026-08-18 14:51:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:51:51 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:51:51 --> Database Driver Class Initialized
INFO - 2026-08-18 14:51:51 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:51:51 --> Helper loaded: form_helper
INFO - 2026-08-18 14:51:51 --> Helper loaded: url_helper
INFO - 2026-08-18 14:51:51 --> Model "Default_model" initialized
INFO - 2026-08-18 14:51:51 --> Helper loaded: language_helper
INFO - 2026-08-18 14:51:51 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:51:51 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:51:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:51:51 --> Final output sent to browser
DEBUG - 2026-08-18 14:51:51 --> Total execution time: 0.0668
INFO - 2026-08-18 14:51:56 --> Config Class Initialized
INFO - 2026-08-18 14:51:56 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:51:56 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:51:56 --> Utf8 Class Initialized
INFO - 2026-08-18 14:51:56 --> URI Class Initialized
INFO - 2026-08-18 14:51:56 --> Router Class Initialized
INFO - 2026-08-18 14:51:56 --> Output Class Initialized
INFO - 2026-08-18 14:51:56 --> Security Class Initialized
DEBUG - 2026-08-18 14:51:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:51:56 --> Input Class Initialized
INFO - 2026-08-18 14:51:56 --> Language Class Initialized
ERROR - 2026-08-18 15:51:56 --> 404 Page Not Found: Home/viewpurorder
INFO - 2026-08-18 14:53:58 --> Config Class Initialized
INFO - 2026-08-18 14:53:58 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:53:58 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:53:58 --> Utf8 Class Initialized
INFO - 2026-08-18 14:53:58 --> URI Class Initialized
INFO - 2026-08-18 14:53:58 --> Router Class Initialized
INFO - 2026-08-18 14:53:58 --> Output Class Initialized
INFO - 2026-08-18 14:53:58 --> Security Class Initialized
DEBUG - 2026-08-18 14:53:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:53:58 --> Input Class Initialized
INFO - 2026-08-18 14:53:58 --> Language Class Initialized
INFO - 2026-08-18 14:53:58 --> Loader Class Initialized
INFO - 2026-08-18 14:53:58 --> Controller Class Initialized
DEBUG - 2026-08-18 14:53:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:53:58 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:53:58 --> Database Driver Class Initialized
INFO - 2026-08-18 14:53:58 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:53:58 --> Helper loaded: form_helper
INFO - 2026-08-18 14:53:58 --> Helper loaded: url_helper
INFO - 2026-08-18 14:53:58 --> Model "Default_model" initialized
INFO - 2026-08-18 14:53:58 --> Helper loaded: language_helper
INFO - 2026-08-18 14:53:58 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:53:58 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:53:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:53:58 --> Final output sent to browser
DEBUG - 2026-08-18 14:53:58 --> Total execution time: 0.0592
INFO - 2026-08-18 14:54:04 --> Config Class Initialized
INFO - 2026-08-18 14:54:04 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:54:04 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:54:04 --> Utf8 Class Initialized
INFO - 2026-08-18 14:54:04 --> URI Class Initialized
INFO - 2026-08-18 14:54:04 --> Router Class Initialized
INFO - 2026-08-18 14:54:04 --> Output Class Initialized
INFO - 2026-08-18 14:54:04 --> Security Class Initialized
DEBUG - 2026-08-18 14:54:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:54:04 --> Input Class Initialized
INFO - 2026-08-18 14:54:04 --> Language Class Initialized
ERROR - 2026-08-18 15:54:04 --> 404 Page Not Found: Home/viewpurorder
INFO - 2026-08-18 14:54:42 --> Config Class Initialized
INFO - 2026-08-18 14:54:42 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:54:42 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:54:42 --> Utf8 Class Initialized
INFO - 2026-08-18 14:54:42 --> URI Class Initialized
INFO - 2026-08-18 14:54:42 --> Router Class Initialized
INFO - 2026-08-18 14:54:42 --> Output Class Initialized
INFO - 2026-08-18 14:54:42 --> Security Class Initialized
DEBUG - 2026-08-18 14:54:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:54:42 --> Input Class Initialized
INFO - 2026-08-18 14:54:42 --> Language Class Initialized
INFO - 2026-08-18 14:54:42 --> Loader Class Initialized
INFO - 2026-08-18 14:54:42 --> Controller Class Initialized
DEBUG - 2026-08-18 14:54:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:54:42 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:54:42 --> Database Driver Class Initialized
INFO - 2026-08-18 14:54:42 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:54:42 --> Helper loaded: form_helper
INFO - 2026-08-18 14:54:42 --> Helper loaded: url_helper
INFO - 2026-08-18 14:54:42 --> Model "Default_model" initialized
INFO - 2026-08-18 14:54:42 --> Helper loaded: language_helper
INFO - 2026-08-18 14:54:42 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:54:42 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:54:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:54:43 --> Final output sent to browser
DEBUG - 2026-08-18 14:54:43 --> Total execution time: 0.0595
INFO - 2026-08-18 14:55:39 --> Config Class Initialized
INFO - 2026-08-18 14:55:39 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:55:39 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:55:39 --> Utf8 Class Initialized
INFO - 2026-08-18 14:55:39 --> URI Class Initialized
INFO - 2026-08-18 14:55:39 --> Router Class Initialized
INFO - 2026-08-18 14:55:39 --> Output Class Initialized
INFO - 2026-08-18 14:55:39 --> Security Class Initialized
DEBUG - 2026-08-18 14:55:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:55:39 --> Input Class Initialized
INFO - 2026-08-18 14:55:39 --> Language Class Initialized
INFO - 2026-08-18 14:55:39 --> Loader Class Initialized
INFO - 2026-08-18 14:55:39 --> Controller Class Initialized
DEBUG - 2026-08-18 14:55:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:55:39 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:55:39 --> Database Driver Class Initialized
INFO - 2026-08-18 14:55:39 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:55:39 --> Helper loaded: form_helper
INFO - 2026-08-18 14:55:39 --> Helper loaded: url_helper
INFO - 2026-08-18 14:55:39 --> Model "Default_model" initialized
INFO - 2026-08-18 14:55:39 --> Helper loaded: language_helper
INFO - 2026-08-18 14:55:39 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:55:39 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:55:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:55:39 --> Final output sent to browser
DEBUG - 2026-08-18 14:55:39 --> Total execution time: 0.0720
INFO - 2026-08-18 14:57:06 --> Config Class Initialized
INFO - 2026-08-18 14:57:06 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:57:06 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:57:06 --> Utf8 Class Initialized
INFO - 2026-08-18 14:57:06 --> URI Class Initialized
INFO - 2026-08-18 14:57:06 --> Router Class Initialized
INFO - 2026-08-18 14:57:06 --> Output Class Initialized
INFO - 2026-08-18 14:57:06 --> Security Class Initialized
DEBUG - 2026-08-18 14:57:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:57:06 --> Input Class Initialized
INFO - 2026-08-18 14:57:06 --> Language Class Initialized
INFO - 2026-08-18 14:57:06 --> Loader Class Initialized
INFO - 2026-08-18 14:57:06 --> Controller Class Initialized
DEBUG - 2026-08-18 14:57:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:57:06 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:57:06 --> Database Driver Class Initialized
INFO - 2026-08-18 14:57:06 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:57:06 --> Helper loaded: form_helper
INFO - 2026-08-18 14:57:06 --> Helper loaded: url_helper
INFO - 2026-08-18 14:57:06 --> Model "Default_model" initialized
INFO - 2026-08-18 14:57:06 --> Helper loaded: language_helper
INFO - 2026-08-18 14:57:06 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:57:06 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:57:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:57:06 --> Final output sent to browser
DEBUG - 2026-08-18 14:57:06 --> Total execution time: 0.0813
INFO - 2026-08-18 14:59:44 --> Config Class Initialized
INFO - 2026-08-18 14:59:44 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:59:44 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:59:44 --> Utf8 Class Initialized
INFO - 2026-08-18 14:59:44 --> URI Class Initialized
INFO - 2026-08-18 14:59:44 --> Router Class Initialized
INFO - 2026-08-18 14:59:44 --> Output Class Initialized
INFO - 2026-08-18 14:59:44 --> Security Class Initialized
DEBUG - 2026-08-18 14:59:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:59:44 --> Input Class Initialized
INFO - 2026-08-18 14:59:44 --> Language Class Initialized
INFO - 2026-08-18 14:59:44 --> Loader Class Initialized
INFO - 2026-08-18 14:59:44 --> Controller Class Initialized
DEBUG - 2026-08-18 14:59:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:59:44 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:59:44 --> Database Driver Class Initialized
INFO - 2026-08-18 14:59:44 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:59:44 --> Helper loaded: form_helper
INFO - 2026-08-18 14:59:44 --> Helper loaded: url_helper
INFO - 2026-08-18 14:59:44 --> Model "Default_model" initialized
INFO - 2026-08-18 14:59:44 --> Helper loaded: language_helper
INFO - 2026-08-18 14:59:44 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:59:44 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\Approval/payment_approval_out.php
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:59:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:59:44 --> Final output sent to browser
DEBUG - 2026-08-18 14:59:44 --> Total execution time: 0.0754
INFO - 2026-08-18 14:59:54 --> Config Class Initialized
INFO - 2026-08-18 14:59:54 --> Hooks Class Initialized
DEBUG - 2026-08-18 14:59:54 --> UTF-8 Support Enabled
INFO - 2026-08-18 14:59:54 --> Utf8 Class Initialized
INFO - 2026-08-18 14:59:54 --> URI Class Initialized
INFO - 2026-08-18 14:59:54 --> Router Class Initialized
INFO - 2026-08-18 14:59:54 --> Output Class Initialized
INFO - 2026-08-18 14:59:54 --> Security Class Initialized
DEBUG - 2026-08-18 14:59:54 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 14:59:54 --> Input Class Initialized
INFO - 2026-08-18 14:59:54 --> Language Class Initialized
INFO - 2026-08-18 14:59:54 --> Loader Class Initialized
INFO - 2026-08-18 14:59:54 --> Controller Class Initialized
DEBUG - 2026-08-18 14:59:54 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 14:59:54 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 14:59:54 --> Database Driver Class Initialized
INFO - 2026-08-18 14:59:54 --> Model "Approval_model" initialized
INFO - 2026-08-18 14:59:54 --> Helper loaded: form_helper
INFO - 2026-08-18 14:59:54 --> Helper loaded: url_helper
INFO - 2026-08-18 14:59:54 --> Model "Default_model" initialized
INFO - 2026-08-18 14:59:54 --> Helper loaded: language_helper
INFO - 2026-08-18 14:59:54 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 14:59:54 --> Could not find the language line "dashboard"
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 14:59:54 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 14:59:54 --> Final output sent to browser
DEBUG - 2026-08-18 14:59:54 --> Total execution time: 0.0532
INFO - 2026-08-18 15:00:16 --> Config Class Initialized
INFO - 2026-08-18 15:00:16 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:00:16 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:00:16 --> Utf8 Class Initialized
INFO - 2026-08-18 15:00:16 --> URI Class Initialized
INFO - 2026-08-18 15:00:16 --> Router Class Initialized
INFO - 2026-08-18 15:00:16 --> Output Class Initialized
INFO - 2026-08-18 15:00:16 --> Security Class Initialized
DEBUG - 2026-08-18 15:00:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:00:16 --> Input Class Initialized
INFO - 2026-08-18 15:00:16 --> Language Class Initialized
INFO - 2026-08-18 15:00:16 --> Loader Class Initialized
INFO - 2026-08-18 15:00:16 --> Controller Class Initialized
DEBUG - 2026-08-18 15:00:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:00:16 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:00:16 --> Database Driver Class Initialized
INFO - 2026-08-18 15:00:16 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:00:16 --> Helper loaded: form_helper
INFO - 2026-08-18 15:00:16 --> Helper loaded: url_helper
INFO - 2026-08-18 15:00:16 --> Model "Default_model" initialized
INFO - 2026-08-18 15:00:16 --> Helper loaded: language_helper
INFO - 2026-08-18 15:00:16 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:00:16 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:00:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:00:16 --> Final output sent to browser
DEBUG - 2026-08-18 15:00:16 --> Total execution time: 0.0731
INFO - 2026-08-18 15:01:03 --> Config Class Initialized
INFO - 2026-08-18 15:01:03 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:01:03 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:01:03 --> Utf8 Class Initialized
INFO - 2026-08-18 15:01:03 --> URI Class Initialized
INFO - 2026-08-18 15:01:03 --> Router Class Initialized
INFO - 2026-08-18 15:01:03 --> Output Class Initialized
INFO - 2026-08-18 15:01:03 --> Security Class Initialized
DEBUG - 2026-08-18 15:01:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:01:03 --> Input Class Initialized
INFO - 2026-08-18 15:01:03 --> Language Class Initialized
INFO - 2026-08-18 15:01:03 --> Loader Class Initialized
INFO - 2026-08-18 15:01:03 --> Controller Class Initialized
DEBUG - 2026-08-18 15:01:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:01:03 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:01:03 --> Database Driver Class Initialized
INFO - 2026-08-18 15:01:03 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:01:03 --> Helper loaded: form_helper
INFO - 2026-08-18 15:01:03 --> Helper loaded: url_helper
INFO - 2026-08-18 15:01:03 --> Model "Default_model" initialized
INFO - 2026-08-18 15:01:03 --> Helper loaded: language_helper
INFO - 2026-08-18 15:01:03 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:01:03 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:01:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:01:03 --> Final output sent to browser
DEBUG - 2026-08-18 15:01:03 --> Total execution time: 0.0999
INFO - 2026-08-18 15:01:05 --> Config Class Initialized
INFO - 2026-08-18 15:01:05 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:01:05 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:01:05 --> Utf8 Class Initialized
INFO - 2026-08-18 15:01:05 --> URI Class Initialized
INFO - 2026-08-18 15:01:05 --> Router Class Initialized
INFO - 2026-08-18 15:01:05 --> Output Class Initialized
INFO - 2026-08-18 15:01:05 --> Security Class Initialized
DEBUG - 2026-08-18 15:01:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:01:05 --> Input Class Initialized
INFO - 2026-08-18 15:01:05 --> Language Class Initialized
INFO - 2026-08-18 15:01:05 --> Loader Class Initialized
INFO - 2026-08-18 15:01:05 --> Controller Class Initialized
DEBUG - 2026-08-18 15:01:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:01:05 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:01:05 --> Database Driver Class Initialized
INFO - 2026-08-18 15:01:05 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:01:05 --> Helper loaded: form_helper
INFO - 2026-08-18 15:01:05 --> Helper loaded: url_helper
INFO - 2026-08-18 15:01:05 --> Model "Default_model" initialized
INFO - 2026-08-18 15:01:05 --> Helper loaded: language_helper
INFO - 2026-08-18 15:01:05 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:01:05 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:01:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:01:05 --> Final output sent to browser
DEBUG - 2026-08-18 15:01:05 --> Total execution time: 0.0764
INFO - 2026-08-18 15:01:12 --> Config Class Initialized
INFO - 2026-08-18 15:01:12 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:01:12 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:01:12 --> Utf8 Class Initialized
INFO - 2026-08-18 15:01:12 --> URI Class Initialized
INFO - 2026-08-18 15:01:12 --> Router Class Initialized
INFO - 2026-08-18 15:01:12 --> Output Class Initialized
INFO - 2026-08-18 15:01:12 --> Security Class Initialized
DEBUG - 2026-08-18 15:01:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:01:12 --> Input Class Initialized
INFO - 2026-08-18 15:01:12 --> Language Class Initialized
INFO - 2026-08-18 15:01:12 --> Loader Class Initialized
INFO - 2026-08-18 15:01:12 --> Controller Class Initialized
DEBUG - 2026-08-18 15:01:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:01:12 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:01:12 --> Database Driver Class Initialized
INFO - 2026-08-18 15:01:12 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:01:12 --> Helper loaded: form_helper
INFO - 2026-08-18 15:01:12 --> Helper loaded: url_helper
INFO - 2026-08-18 15:01:12 --> Model "Default_model" initialized
INFO - 2026-08-18 15:01:12 --> Helper loaded: language_helper
INFO - 2026-08-18 15:01:12 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:01:12 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\Approval/payment_approval_in.php
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:01:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:01:12 --> Final output sent to browser
DEBUG - 2026-08-18 15:01:12 --> Total execution time: 0.0842
INFO - 2026-08-18 15:01:14 --> Config Class Initialized
INFO - 2026-08-18 15:01:14 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:01:14 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:01:14 --> Utf8 Class Initialized
INFO - 2026-08-18 15:01:14 --> URI Class Initialized
INFO - 2026-08-18 15:01:14 --> Router Class Initialized
INFO - 2026-08-18 15:01:14 --> Output Class Initialized
INFO - 2026-08-18 15:01:14 --> Security Class Initialized
DEBUG - 2026-08-18 15:01:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:01:14 --> Input Class Initialized
INFO - 2026-08-18 15:01:14 --> Language Class Initialized
INFO - 2026-08-18 15:01:14 --> Loader Class Initialized
INFO - 2026-08-18 15:01:14 --> Controller Class Initialized
DEBUG - 2026-08-18 15:01:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:01:14 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:01:14 --> Database Driver Class Initialized
INFO - 2026-08-18 15:01:14 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:01:14 --> Helper loaded: form_helper
INFO - 2026-08-18 15:01:14 --> Helper loaded: url_helper
INFO - 2026-08-18 15:01:14 --> Model "Default_model" initialized
INFO - 2026-08-18 15:01:14 --> Helper loaded: language_helper
INFO - 2026-08-18 15:01:14 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:01:14 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:01:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:01:14 --> Final output sent to browser
DEBUG - 2026-08-18 15:01:14 --> Total execution time: 0.0771
INFO - 2026-08-18 15:18:43 --> Config Class Initialized
INFO - 2026-08-18 15:18:43 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:18:43 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:18:43 --> Utf8 Class Initialized
INFO - 2026-08-18 15:18:43 --> URI Class Initialized
INFO - 2026-08-18 15:18:43 --> Router Class Initialized
INFO - 2026-08-18 15:18:43 --> Output Class Initialized
INFO - 2026-08-18 15:18:43 --> Security Class Initialized
DEBUG - 2026-08-18 15:18:43 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:18:43 --> Input Class Initialized
INFO - 2026-08-18 15:18:43 --> Language Class Initialized
INFO - 2026-08-18 15:18:43 --> Loader Class Initialized
INFO - 2026-08-18 15:18:43 --> Controller Class Initialized
DEBUG - 2026-08-18 15:18:43 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:18:43 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:18:43 --> Database Driver Class Initialized
INFO - 2026-08-18 15:18:43 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:18:43 --> Helper loaded: form_helper
INFO - 2026-08-18 15:18:43 --> Helper loaded: url_helper
INFO - 2026-08-18 15:18:43 --> Model "Default_model" initialized
INFO - 2026-08-18 15:18:43 --> Helper loaded: language_helper
INFO - 2026-08-18 15:18:43 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:18:43 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:18:43 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:18:43 --> Final output sent to browser
DEBUG - 2026-08-18 15:18:43 --> Total execution time: 0.0579
INFO - 2026-08-18 15:18:53 --> Config Class Initialized
INFO - 2026-08-18 15:18:53 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:18:53 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:18:53 --> Utf8 Class Initialized
INFO - 2026-08-18 15:18:53 --> URI Class Initialized
INFO - 2026-08-18 15:18:53 --> Router Class Initialized
INFO - 2026-08-18 15:18:53 --> Output Class Initialized
INFO - 2026-08-18 15:18:53 --> Security Class Initialized
DEBUG - 2026-08-18 15:18:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:18:53 --> Input Class Initialized
INFO - 2026-08-18 15:18:53 --> Language Class Initialized
INFO - 2026-08-18 15:18:53 --> Loader Class Initialized
INFO - 2026-08-18 15:18:53 --> Controller Class Initialized
DEBUG - 2026-08-18 15:18:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:18:53 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:18:53 --> Database Driver Class Initialized
INFO - 2026-08-18 15:18:53 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:18:53 --> Helper loaded: form_helper
INFO - 2026-08-18 15:18:53 --> Helper loaded: url_helper
INFO - 2026-08-18 15:18:53 --> Model "Default_model" initialized
INFO - 2026-08-18 15:18:53 --> Helper loaded: language_helper
INFO - 2026-08-18 15:18:53 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:18:53 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:18:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:18:53 --> Final output sent to browser
DEBUG - 2026-08-18 15:18:53 --> Total execution time: 0.0611
INFO - 2026-08-18 15:18:57 --> Config Class Initialized
INFO - 2026-08-18 15:18:57 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:18:57 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:18:57 --> Utf8 Class Initialized
INFO - 2026-08-18 15:18:57 --> URI Class Initialized
INFO - 2026-08-18 15:18:57 --> Router Class Initialized
INFO - 2026-08-18 15:18:57 --> Output Class Initialized
INFO - 2026-08-18 15:18:57 --> Security Class Initialized
DEBUG - 2026-08-18 15:18:57 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:18:57 --> Input Class Initialized
INFO - 2026-08-18 15:18:57 --> Language Class Initialized
INFO - 2026-08-18 15:18:57 --> Loader Class Initialized
INFO - 2026-08-18 15:18:57 --> Controller Class Initialized
DEBUG - 2026-08-18 15:18:57 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:18:57 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:18:57 --> Database Driver Class Initialized
INFO - 2026-08-18 15:18:57 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:18:57 --> Helper loaded: form_helper
INFO - 2026-08-18 15:18:57 --> Helper loaded: url_helper
INFO - 2026-08-18 15:18:57 --> Model "Default_model" initialized
INFO - 2026-08-18 15:18:57 --> Helper loaded: language_helper
INFO - 2026-08-18 15:18:57 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:18:57 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:18:57 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:18:57 --> Final output sent to browser
DEBUG - 2026-08-18 15:18:57 --> Total execution time: 0.0505
INFO - 2026-08-18 15:19:03 --> Config Class Initialized
INFO - 2026-08-18 15:19:03 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:19:03 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:19:03 --> Utf8 Class Initialized
INFO - 2026-08-18 15:19:03 --> URI Class Initialized
INFO - 2026-08-18 15:19:03 --> Router Class Initialized
INFO - 2026-08-18 15:19:03 --> Output Class Initialized
INFO - 2026-08-18 15:19:03 --> Security Class Initialized
DEBUG - 2026-08-18 15:19:03 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:19:03 --> Input Class Initialized
INFO - 2026-08-18 15:19:03 --> Language Class Initialized
INFO - 2026-08-18 15:19:03 --> Loader Class Initialized
INFO - 2026-08-18 15:19:03 --> Controller Class Initialized
DEBUG - 2026-08-18 15:19:03 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:19:03 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:19:03 --> Database Driver Class Initialized
INFO - 2026-08-18 15:19:03 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:19:03 --> Helper loaded: form_helper
INFO - 2026-08-18 15:19:03 --> Helper loaded: url_helper
INFO - 2026-08-18 15:19:03 --> Model "Default_model" initialized
INFO - 2026-08-18 15:19:03 --> Helper loaded: language_helper
INFO - 2026-08-18 15:19:03 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:19:03 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:19:03 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:19:03 --> Final output sent to browser
DEBUG - 2026-08-18 15:19:03 --> Total execution time: 0.0896
INFO - 2026-08-18 15:19:39 --> Config Class Initialized
INFO - 2026-08-18 15:19:39 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:19:39 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:19:39 --> Utf8 Class Initialized
INFO - 2026-08-18 15:19:39 --> URI Class Initialized
INFO - 2026-08-18 15:19:39 --> Router Class Initialized
INFO - 2026-08-18 15:19:39 --> Output Class Initialized
INFO - 2026-08-18 15:19:39 --> Security Class Initialized
DEBUG - 2026-08-18 15:19:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:19:39 --> Input Class Initialized
INFO - 2026-08-18 15:19:39 --> Language Class Initialized
INFO - 2026-08-18 15:19:39 --> Loader Class Initialized
INFO - 2026-08-18 15:19:39 --> Controller Class Initialized
DEBUG - 2026-08-18 15:19:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:19:39 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:19:39 --> Database Driver Class Initialized
INFO - 2026-08-18 15:19:39 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:19:39 --> Helper loaded: form_helper
INFO - 2026-08-18 15:19:39 --> Helper loaded: url_helper
INFO - 2026-08-18 15:19:39 --> Model "Default_model" initialized
INFO - 2026-08-18 15:19:39 --> Helper loaded: language_helper
INFO - 2026-08-18 15:19:39 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:19:39 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:19:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:19:39 --> Final output sent to browser
DEBUG - 2026-08-18 15:19:39 --> Total execution time: 0.0734
INFO - 2026-08-18 15:19:50 --> Config Class Initialized
INFO - 2026-08-18 15:19:50 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:19:50 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:19:50 --> Utf8 Class Initialized
INFO - 2026-08-18 15:19:50 --> URI Class Initialized
INFO - 2026-08-18 15:19:50 --> Router Class Initialized
INFO - 2026-08-18 15:19:50 --> Output Class Initialized
INFO - 2026-08-18 15:19:50 --> Security Class Initialized
DEBUG - 2026-08-18 15:19:50 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:19:50 --> Input Class Initialized
INFO - 2026-08-18 15:19:50 --> Language Class Initialized
INFO - 2026-08-18 15:19:50 --> Loader Class Initialized
INFO - 2026-08-18 15:19:50 --> Controller Class Initialized
DEBUG - 2026-08-18 15:19:50 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:19:50 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:19:50 --> Database Driver Class Initialized
INFO - 2026-08-18 15:19:50 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:19:50 --> Helper loaded: form_helper
INFO - 2026-08-18 15:19:50 --> Helper loaded: url_helper
INFO - 2026-08-18 15:19:50 --> Model "Default_model" initialized
INFO - 2026-08-18 15:19:50 --> Helper loaded: language_helper
INFO - 2026-08-18 15:19:50 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:19:50 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:19:50 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:19:50 --> Final output sent to browser
DEBUG - 2026-08-18 15:19:50 --> Total execution time: 0.0668
INFO - 2026-08-18 15:19:53 --> Config Class Initialized
INFO - 2026-08-18 15:19:53 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:19:53 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:19:53 --> Utf8 Class Initialized
INFO - 2026-08-18 15:19:53 --> URI Class Initialized
INFO - 2026-08-18 15:19:53 --> Router Class Initialized
INFO - 2026-08-18 15:19:53 --> Output Class Initialized
INFO - 2026-08-18 15:19:53 --> Security Class Initialized
DEBUG - 2026-08-18 15:19:53 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:19:53 --> Input Class Initialized
INFO - 2026-08-18 15:19:53 --> Language Class Initialized
INFO - 2026-08-18 15:19:53 --> Loader Class Initialized
INFO - 2026-08-18 15:19:53 --> Controller Class Initialized
DEBUG - 2026-08-18 15:19:53 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:19:53 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:19:53 --> Database Driver Class Initialized
INFO - 2026-08-18 15:19:53 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:19:53 --> Helper loaded: form_helper
INFO - 2026-08-18 15:19:53 --> Helper loaded: url_helper
INFO - 2026-08-18 15:19:53 --> Model "Default_model" initialized
INFO - 2026-08-18 15:19:53 --> Helper loaded: language_helper
INFO - 2026-08-18 15:19:53 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:19:53 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:19:53 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:19:53 --> Final output sent to browser
DEBUG - 2026-08-18 15:19:53 --> Total execution time: 0.0635
INFO - 2026-08-18 15:20:02 --> Config Class Initialized
INFO - 2026-08-18 15:20:02 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:20:02 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:20:02 --> Utf8 Class Initialized
INFO - 2026-08-18 15:20:02 --> URI Class Initialized
INFO - 2026-08-18 15:20:02 --> Router Class Initialized
INFO - 2026-08-18 15:20:02 --> Output Class Initialized
INFO - 2026-08-18 15:20:02 --> Security Class Initialized
DEBUG - 2026-08-18 15:20:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:20:02 --> Input Class Initialized
INFO - 2026-08-18 15:20:02 --> Language Class Initialized
INFO - 2026-08-18 15:20:02 --> Loader Class Initialized
INFO - 2026-08-18 15:20:02 --> Controller Class Initialized
DEBUG - 2026-08-18 15:20:02 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:20:02 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:20:02 --> Database Driver Class Initialized
INFO - 2026-08-18 15:20:02 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:20:02 --> Helper loaded: form_helper
INFO - 2026-08-18 15:20:02 --> Helper loaded: url_helper
INFO - 2026-08-18 15:20:02 --> Model "Default_model" initialized
INFO - 2026-08-18 15:20:02 --> Helper loaded: language_helper
INFO - 2026-08-18 15:20:02 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:20:02 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:20:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:20:02 --> Final output sent to browser
DEBUG - 2026-08-18 15:20:02 --> Total execution time: 0.0594
INFO - 2026-08-18 15:20:08 --> Config Class Initialized
INFO - 2026-08-18 15:20:08 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:20:08 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:20:08 --> Utf8 Class Initialized
INFO - 2026-08-18 15:20:08 --> URI Class Initialized
INFO - 2026-08-18 15:20:08 --> Router Class Initialized
INFO - 2026-08-18 15:20:08 --> Output Class Initialized
INFO - 2026-08-18 15:20:08 --> Security Class Initialized
DEBUG - 2026-08-18 15:20:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:20:08 --> Input Class Initialized
INFO - 2026-08-18 15:20:08 --> Language Class Initialized
INFO - 2026-08-18 15:20:08 --> Loader Class Initialized
INFO - 2026-08-18 15:20:08 --> Controller Class Initialized
DEBUG - 2026-08-18 15:20:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:20:08 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:20:08 --> Database Driver Class Initialized
INFO - 2026-08-18 15:20:08 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:20:08 --> Helper loaded: form_helper
INFO - 2026-08-18 15:20:08 --> Helper loaded: url_helper
INFO - 2026-08-18 15:20:08 --> Model "Default_model" initialized
INFO - 2026-08-18 15:20:08 --> Helper loaded: language_helper
INFO - 2026-08-18 15:20:08 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:20:08 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:20:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:20:08 --> Final output sent to browser
DEBUG - 2026-08-18 15:20:08 --> Total execution time: 0.0602
INFO - 2026-08-18 15:20:11 --> Config Class Initialized
INFO - 2026-08-18 15:20:11 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:20:11 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:20:11 --> Utf8 Class Initialized
INFO - 2026-08-18 15:20:11 --> URI Class Initialized
INFO - 2026-08-18 15:20:11 --> Router Class Initialized
INFO - 2026-08-18 15:20:11 --> Output Class Initialized
INFO - 2026-08-18 15:20:11 --> Security Class Initialized
DEBUG - 2026-08-18 15:20:11 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:20:11 --> Input Class Initialized
INFO - 2026-08-18 15:20:11 --> Language Class Initialized
INFO - 2026-08-18 15:20:11 --> Loader Class Initialized
INFO - 2026-08-18 15:20:11 --> Controller Class Initialized
DEBUG - 2026-08-18 15:20:11 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:20:11 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:20:11 --> Database Driver Class Initialized
INFO - 2026-08-18 15:20:11 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:20:11 --> Helper loaded: form_helper
INFO - 2026-08-18 15:20:11 --> Helper loaded: url_helper
INFO - 2026-08-18 15:20:11 --> Model "Default_model" initialized
INFO - 2026-08-18 15:20:11 --> Helper loaded: language_helper
INFO - 2026-08-18 15:20:11 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:20:11 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:20:11 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:20:11 --> Final output sent to browser
DEBUG - 2026-08-18 15:20:11 --> Total execution time: 0.0518
INFO - 2026-08-18 15:24:56 --> Config Class Initialized
INFO - 2026-08-18 15:24:56 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:24:56 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:24:56 --> Utf8 Class Initialized
INFO - 2026-08-18 15:24:56 --> URI Class Initialized
INFO - 2026-08-18 15:24:56 --> Router Class Initialized
INFO - 2026-08-18 15:24:56 --> Output Class Initialized
INFO - 2026-08-18 15:24:56 --> Security Class Initialized
DEBUG - 2026-08-18 15:24:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:24:56 --> Input Class Initialized
INFO - 2026-08-18 15:24:56 --> Language Class Initialized
INFO - 2026-08-18 15:24:56 --> Loader Class Initialized
INFO - 2026-08-18 15:24:56 --> Controller Class Initialized
DEBUG - 2026-08-18 15:24:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:24:56 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:24:56 --> Database Driver Class Initialized
INFO - 2026-08-18 15:24:56 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:24:56 --> Helper loaded: form_helper
INFO - 2026-08-18 15:24:56 --> Helper loaded: url_helper
INFO - 2026-08-18 15:24:56 --> Model "Default_model" initialized
INFO - 2026-08-18 15:24:56 --> Helper loaded: language_helper
INFO - 2026-08-18 15:24:56 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:24:56 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:24:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:24:56 --> Final output sent to browser
DEBUG - 2026-08-18 15:24:56 --> Total execution time: 0.0801
INFO - 2026-08-18 15:25:12 --> Config Class Initialized
INFO - 2026-08-18 15:25:12 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:25:12 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:25:12 --> Utf8 Class Initialized
INFO - 2026-08-18 15:25:12 --> URI Class Initialized
INFO - 2026-08-18 15:25:12 --> Router Class Initialized
INFO - 2026-08-18 15:25:12 --> Output Class Initialized
INFO - 2026-08-18 15:25:12 --> Security Class Initialized
DEBUG - 2026-08-18 15:25:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:25:12 --> Input Class Initialized
INFO - 2026-08-18 15:25:12 --> Language Class Initialized
INFO - 2026-08-18 15:25:12 --> Loader Class Initialized
INFO - 2026-08-18 15:25:12 --> Controller Class Initialized
DEBUG - 2026-08-18 15:25:12 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:25:12 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:25:12 --> Database Driver Class Initialized
INFO - 2026-08-18 15:25:12 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:25:12 --> Helper loaded: form_helper
INFO - 2026-08-18 15:25:12 --> Helper loaded: url_helper
INFO - 2026-08-18 15:25:12 --> Model "Default_model" initialized
INFO - 2026-08-18 15:25:12 --> Helper loaded: language_helper
INFO - 2026-08-18 15:25:12 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:25:12 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:25:12 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:25:12 --> Final output sent to browser
DEBUG - 2026-08-18 15:25:12 --> Total execution time: 0.0558
INFO - 2026-08-18 15:25:26 --> Config Class Initialized
INFO - 2026-08-18 15:25:26 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:25:26 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:25:26 --> Utf8 Class Initialized
INFO - 2026-08-18 15:25:26 --> URI Class Initialized
INFO - 2026-08-18 15:25:26 --> Router Class Initialized
INFO - 2026-08-18 15:25:26 --> Output Class Initialized
INFO - 2026-08-18 15:25:26 --> Security Class Initialized
DEBUG - 2026-08-18 15:25:26 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:25:26 --> Input Class Initialized
INFO - 2026-08-18 15:25:26 --> Language Class Initialized
INFO - 2026-08-18 15:25:26 --> Loader Class Initialized
INFO - 2026-08-18 15:25:26 --> Controller Class Initialized
DEBUG - 2026-08-18 15:25:26 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:25:26 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:25:26 --> Database Driver Class Initialized
INFO - 2026-08-18 15:25:26 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:25:26 --> Helper loaded: form_helper
INFO - 2026-08-18 15:25:26 --> Helper loaded: url_helper
INFO - 2026-08-18 15:25:26 --> Model "Default_model" initialized
INFO - 2026-08-18 15:25:26 --> Helper loaded: language_helper
INFO - 2026-08-18 15:25:26 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:25:26 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\Approval/payment_approval_in.php
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:25:26 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:25:26 --> Final output sent to browser
DEBUG - 2026-08-18 15:25:26 --> Total execution time: 0.0401
INFO - 2026-08-18 15:25:28 --> Config Class Initialized
INFO - 2026-08-18 15:25:28 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:25:28 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:25:28 --> Utf8 Class Initialized
INFO - 2026-08-18 15:25:28 --> URI Class Initialized
INFO - 2026-08-18 15:25:28 --> Router Class Initialized
INFO - 2026-08-18 15:25:28 --> Output Class Initialized
INFO - 2026-08-18 15:25:28 --> Security Class Initialized
DEBUG - 2026-08-18 15:25:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:25:28 --> Input Class Initialized
INFO - 2026-08-18 15:25:28 --> Language Class Initialized
INFO - 2026-08-18 15:25:28 --> Loader Class Initialized
INFO - 2026-08-18 15:25:28 --> Controller Class Initialized
DEBUG - 2026-08-18 15:25:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:25:28 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:25:28 --> Database Driver Class Initialized
INFO - 2026-08-18 15:25:28 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:25:28 --> Helper loaded: form_helper
INFO - 2026-08-18 15:25:28 --> Helper loaded: url_helper
INFO - 2026-08-18 15:25:28 --> Model "Default_model" initialized
INFO - 2026-08-18 15:25:28 --> Helper loaded: language_helper
INFO - 2026-08-18 15:25:28 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:25:28 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:25:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:25:28 --> Final output sent to browser
DEBUG - 2026-08-18 15:25:28 --> Total execution time: 0.0432
INFO - 2026-08-18 15:26:01 --> Config Class Initialized
INFO - 2026-08-18 15:26:01 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:01 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:01 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:01 --> URI Class Initialized
INFO - 2026-08-18 15:26:01 --> Router Class Initialized
INFO - 2026-08-18 15:26:01 --> Output Class Initialized
INFO - 2026-08-18 15:26:01 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:01 --> Input Class Initialized
INFO - 2026-08-18 15:26:01 --> Language Class Initialized
INFO - 2026-08-18 15:26:01 --> Loader Class Initialized
INFO - 2026-08-18 15:26:01 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:01 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:01 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:01 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:01 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:01 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:01 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:01 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:01 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:01 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:01 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:01 --> Total execution time: 0.1053
INFO - 2026-08-18 15:26:04 --> Config Class Initialized
INFO - 2026-08-18 15:26:04 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:04 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:04 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:04 --> URI Class Initialized
INFO - 2026-08-18 15:26:04 --> Router Class Initialized
INFO - 2026-08-18 15:26:04 --> Output Class Initialized
INFO - 2026-08-18 15:26:04 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:04 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:04 --> Input Class Initialized
INFO - 2026-08-18 15:26:04 --> Language Class Initialized
INFO - 2026-08-18 15:26:04 --> Loader Class Initialized
INFO - 2026-08-18 15:26:04 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:04 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:04 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:04 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:04 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:04 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:04 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:04 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:04 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:04 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:04 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:04 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:04 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:04 --> Total execution time: 0.0762
INFO - 2026-08-18 15:26:05 --> Config Class Initialized
INFO - 2026-08-18 15:26:05 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:05 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:05 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:05 --> URI Class Initialized
INFO - 2026-08-18 15:26:05 --> Router Class Initialized
INFO - 2026-08-18 15:26:05 --> Output Class Initialized
INFO - 2026-08-18 15:26:05 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:05 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:05 --> Input Class Initialized
INFO - 2026-08-18 15:26:05 --> Language Class Initialized
INFO - 2026-08-18 15:26:05 --> Loader Class Initialized
INFO - 2026-08-18 15:26:05 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:05 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:05 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:05 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:05 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:05 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:05 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:05 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:05 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:05 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:05 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:05 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:05 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:05 --> Total execution time: 0.0612
INFO - 2026-08-18 15:26:05 --> Config Class Initialized
INFO - 2026-08-18 15:26:05 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:05 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:05 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:05 --> URI Class Initialized
INFO - 2026-08-18 15:26:05 --> Router Class Initialized
INFO - 2026-08-18 15:26:05 --> Output Class Initialized
INFO - 2026-08-18 15:26:06 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:06 --> Input Class Initialized
INFO - 2026-08-18 15:26:06 --> Language Class Initialized
INFO - 2026-08-18 15:26:06 --> Loader Class Initialized
INFO - 2026-08-18 15:26:06 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:06 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:06 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:06 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:06 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:06 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:06 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:06 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:06 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:06 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:06 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:06 --> Total execution time: 0.0719
INFO - 2026-08-18 15:26:06 --> Config Class Initialized
INFO - 2026-08-18 15:26:06 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:06 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:06 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:06 --> URI Class Initialized
INFO - 2026-08-18 15:26:06 --> Router Class Initialized
INFO - 2026-08-18 15:26:06 --> Output Class Initialized
INFO - 2026-08-18 15:26:06 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:06 --> Input Class Initialized
INFO - 2026-08-18 15:26:06 --> Language Class Initialized
INFO - 2026-08-18 15:26:06 --> Loader Class Initialized
INFO - 2026-08-18 15:26:06 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:06 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:06 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:06 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:06 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:06 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:06 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:06 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:06 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:06 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:06 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:06 --> Total execution time: 0.0390
INFO - 2026-08-18 15:26:14 --> Config Class Initialized
INFO - 2026-08-18 15:26:14 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:14 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:14 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:14 --> URI Class Initialized
INFO - 2026-08-18 15:26:14 --> Router Class Initialized
INFO - 2026-08-18 15:26:14 --> Output Class Initialized
INFO - 2026-08-18 15:26:14 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:14 --> Input Class Initialized
INFO - 2026-08-18 15:26:14 --> Language Class Initialized
INFO - 2026-08-18 15:26:14 --> Loader Class Initialized
INFO - 2026-08-18 15:26:14 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:14 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:14 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:14 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:14 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:14 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:14 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:14 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:14 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:14 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:14 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:14 --> Total execution time: 0.0551
INFO - 2026-08-18 15:26:19 --> Config Class Initialized
INFO - 2026-08-18 15:26:19 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:26:19 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:26:19 --> Utf8 Class Initialized
INFO - 2026-08-18 15:26:19 --> URI Class Initialized
INFO - 2026-08-18 15:26:19 --> Router Class Initialized
INFO - 2026-08-18 15:26:19 --> Output Class Initialized
INFO - 2026-08-18 15:26:19 --> Security Class Initialized
DEBUG - 2026-08-18 15:26:19 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:26:19 --> Input Class Initialized
INFO - 2026-08-18 15:26:19 --> Language Class Initialized
INFO - 2026-08-18 15:26:19 --> Loader Class Initialized
INFO - 2026-08-18 15:26:19 --> Controller Class Initialized
DEBUG - 2026-08-18 15:26:19 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:26:19 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:26:19 --> Database Driver Class Initialized
INFO - 2026-08-18 15:26:19 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:26:19 --> Helper loaded: form_helper
INFO - 2026-08-18 15:26:19 --> Helper loaded: url_helper
INFO - 2026-08-18 15:26:19 --> Model "Default_model" initialized
INFO - 2026-08-18 15:26:19 --> Helper loaded: language_helper
INFO - 2026-08-18 15:26:19 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:26:19 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:26:19 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:26:19 --> Final output sent to browser
DEBUG - 2026-08-18 15:26:19 --> Total execution time: 0.0763
INFO - 2026-08-18 15:27:34 --> Config Class Initialized
INFO - 2026-08-18 15:27:34 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:27:34 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:27:34 --> Utf8 Class Initialized
INFO - 2026-08-18 15:27:34 --> URI Class Initialized
INFO - 2026-08-18 15:27:34 --> Router Class Initialized
INFO - 2026-08-18 15:27:34 --> Output Class Initialized
INFO - 2026-08-18 15:27:34 --> Security Class Initialized
DEBUG - 2026-08-18 15:27:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:27:34 --> Input Class Initialized
INFO - 2026-08-18 15:27:34 --> Language Class Initialized
INFO - 2026-08-18 15:27:34 --> Loader Class Initialized
INFO - 2026-08-18 15:27:34 --> Controller Class Initialized
DEBUG - 2026-08-18 15:27:34 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:27:34 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:27:34 --> Database Driver Class Initialized
INFO - 2026-08-18 15:27:34 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:27:34 --> Helper loaded: form_helper
INFO - 2026-08-18 15:27:34 --> Helper loaded: url_helper
INFO - 2026-08-18 15:27:34 --> Model "Default_model" initialized
INFO - 2026-08-18 15:27:34 --> Helper loaded: language_helper
INFO - 2026-08-18 15:27:34 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:27:34 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:27:34 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:27:34 --> Final output sent to browser
DEBUG - 2026-08-18 15:27:34 --> Total execution time: 0.0957
INFO - 2026-08-18 15:28:06 --> Config Class Initialized
INFO - 2026-08-18 15:28:06 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:28:06 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:28:06 --> Utf8 Class Initialized
INFO - 2026-08-18 15:28:06 --> URI Class Initialized
INFO - 2026-08-18 15:28:06 --> Router Class Initialized
INFO - 2026-08-18 15:28:06 --> Output Class Initialized
INFO - 2026-08-18 15:28:06 --> Security Class Initialized
DEBUG - 2026-08-18 15:28:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:28:06 --> Input Class Initialized
INFO - 2026-08-18 15:28:06 --> Language Class Initialized
INFO - 2026-08-18 15:28:06 --> Loader Class Initialized
INFO - 2026-08-18 15:28:06 --> Controller Class Initialized
DEBUG - 2026-08-18 15:28:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:28:06 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:28:06 --> Database Driver Class Initialized
INFO - 2026-08-18 15:28:06 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:28:06 --> Helper loaded: form_helper
INFO - 2026-08-18 15:28:06 --> Helper loaded: url_helper
INFO - 2026-08-18 15:28:06 --> Model "Default_model" initialized
INFO - 2026-08-18 15:28:06 --> Helper loaded: language_helper
INFO - 2026-08-18 15:28:06 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:28:06 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:28:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:28:06 --> Final output sent to browser
DEBUG - 2026-08-18 15:28:06 --> Total execution time: 0.0346
INFO - 2026-08-18 15:28:59 --> Config Class Initialized
INFO - 2026-08-18 15:28:59 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:28:59 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:28:59 --> Utf8 Class Initialized
INFO - 2026-08-18 15:28:59 --> URI Class Initialized
INFO - 2026-08-18 15:28:59 --> Router Class Initialized
INFO - 2026-08-18 15:28:59 --> Output Class Initialized
INFO - 2026-08-18 15:28:59 --> Security Class Initialized
DEBUG - 2026-08-18 15:28:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:28:59 --> Input Class Initialized
INFO - 2026-08-18 15:28:59 --> Language Class Initialized
INFO - 2026-08-18 15:28:59 --> Loader Class Initialized
INFO - 2026-08-18 15:28:59 --> Controller Class Initialized
DEBUG - 2026-08-18 15:28:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:28:59 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:28:59 --> Database Driver Class Initialized
INFO - 2026-08-18 15:28:59 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:28:59 --> Helper loaded: form_helper
INFO - 2026-08-18 15:28:59 --> Helper loaded: url_helper
INFO - 2026-08-18 15:28:59 --> Model "Default_model" initialized
INFO - 2026-08-18 15:28:59 --> Helper loaded: language_helper
INFO - 2026-08-18 15:28:59 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:28:59 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:28:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:28:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:28:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:28:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:28:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:28:59 --> Final output sent to browser
DEBUG - 2026-08-18 15:28:59 --> Total execution time: 0.0462
INFO - 2026-08-18 15:29:14 --> Config Class Initialized
INFO - 2026-08-18 15:29:14 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:29:14 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:29:14 --> Utf8 Class Initialized
INFO - 2026-08-18 15:29:14 --> URI Class Initialized
INFO - 2026-08-18 15:29:14 --> Router Class Initialized
INFO - 2026-08-18 15:29:14 --> Output Class Initialized
INFO - 2026-08-18 15:29:14 --> Security Class Initialized
DEBUG - 2026-08-18 15:29:14 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:29:14 --> Input Class Initialized
INFO - 2026-08-18 15:29:14 --> Language Class Initialized
INFO - 2026-08-18 15:29:14 --> Loader Class Initialized
INFO - 2026-08-18 15:29:14 --> Controller Class Initialized
DEBUG - 2026-08-18 15:29:14 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:29:14 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:29:14 --> Database Driver Class Initialized
INFO - 2026-08-18 15:29:14 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:29:14 --> Helper loaded: form_helper
INFO - 2026-08-18 15:29:14 --> Helper loaded: url_helper
INFO - 2026-08-18 15:29:14 --> Model "Default_model" initialized
INFO - 2026-08-18 15:29:14 --> Helper loaded: language_helper
INFO - 2026-08-18 15:29:14 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:29:14 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:29:14 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:29:14 --> Final output sent to browser
DEBUG - 2026-08-18 15:29:14 --> Total execution time: 0.0448
INFO - 2026-08-18 15:29:20 --> Config Class Initialized
INFO - 2026-08-18 15:29:20 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:29:20 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:29:20 --> Utf8 Class Initialized
INFO - 2026-08-18 15:29:20 --> URI Class Initialized
INFO - 2026-08-18 15:29:20 --> Router Class Initialized
INFO - 2026-08-18 15:29:20 --> Output Class Initialized
INFO - 2026-08-18 15:29:20 --> Security Class Initialized
DEBUG - 2026-08-18 15:29:20 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:29:20 --> Input Class Initialized
INFO - 2026-08-18 15:29:20 --> Language Class Initialized
INFO - 2026-08-18 15:29:20 --> Loader Class Initialized
INFO - 2026-08-18 15:29:20 --> Controller Class Initialized
DEBUG - 2026-08-18 15:29:20 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:29:20 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:29:20 --> Database Driver Class Initialized
INFO - 2026-08-18 15:29:20 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:29:20 --> Helper loaded: form_helper
INFO - 2026-08-18 15:29:20 --> Helper loaded: url_helper
INFO - 2026-08-18 15:29:20 --> Model "Default_model" initialized
INFO - 2026-08-18 15:29:20 --> Helper loaded: language_helper
INFO - 2026-08-18 15:29:20 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:29:20 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:29:20 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:29:20 --> Final output sent to browser
DEBUG - 2026-08-18 15:29:20 --> Total execution time: 0.0619
INFO - 2026-08-18 15:29:28 --> Config Class Initialized
INFO - 2026-08-18 15:29:28 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:29:28 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:29:28 --> Utf8 Class Initialized
INFO - 2026-08-18 15:29:28 --> URI Class Initialized
INFO - 2026-08-18 15:29:28 --> Router Class Initialized
INFO - 2026-08-18 15:29:28 --> Output Class Initialized
INFO - 2026-08-18 15:29:28 --> Security Class Initialized
DEBUG - 2026-08-18 15:29:28 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:29:28 --> Input Class Initialized
INFO - 2026-08-18 15:29:28 --> Language Class Initialized
INFO - 2026-08-18 15:29:28 --> Loader Class Initialized
INFO - 2026-08-18 15:29:28 --> Controller Class Initialized
DEBUG - 2026-08-18 15:29:28 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:29:28 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:29:28 --> Database Driver Class Initialized
INFO - 2026-08-18 15:29:28 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:29:28 --> Helper loaded: form_helper
INFO - 2026-08-18 15:29:28 --> Helper loaded: url_helper
INFO - 2026-08-18 15:29:28 --> Model "Default_model" initialized
INFO - 2026-08-18 15:29:28 --> Helper loaded: language_helper
INFO - 2026-08-18 15:29:28 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:29:28 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:29:28 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:29:28 --> Final output sent to browser
DEBUG - 2026-08-18 15:29:28 --> Total execution time: 0.0506
INFO - 2026-08-18 15:29:36 --> Config Class Initialized
INFO - 2026-08-18 15:29:36 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:29:36 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:29:36 --> Utf8 Class Initialized
INFO - 2026-08-18 15:29:36 --> URI Class Initialized
INFO - 2026-08-18 15:29:36 --> Router Class Initialized
INFO - 2026-08-18 15:29:36 --> Output Class Initialized
INFO - 2026-08-18 15:29:36 --> Security Class Initialized
DEBUG - 2026-08-18 15:29:36 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:29:36 --> Input Class Initialized
INFO - 2026-08-18 15:29:36 --> Language Class Initialized
INFO - 2026-08-18 15:29:36 --> Loader Class Initialized
INFO - 2026-08-18 15:29:36 --> Controller Class Initialized
DEBUG - 2026-08-18 15:29:36 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:29:36 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:29:36 --> Database Driver Class Initialized
INFO - 2026-08-18 15:29:36 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:29:36 --> Helper loaded: form_helper
INFO - 2026-08-18 15:29:36 --> Helper loaded: url_helper
INFO - 2026-08-18 15:29:36 --> Model "Default_model" initialized
INFO - 2026-08-18 15:29:36 --> Helper loaded: language_helper
INFO - 2026-08-18 15:29:36 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:29:36 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:29:36 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:29:36 --> Final output sent to browser
DEBUG - 2026-08-18 15:29:36 --> Total execution time: 0.0709
INFO - 2026-08-18 15:30:08 --> Config Class Initialized
INFO - 2026-08-18 15:30:08 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:08 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:08 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:08 --> URI Class Initialized
INFO - 2026-08-18 15:30:08 --> Router Class Initialized
INFO - 2026-08-18 15:30:08 --> Output Class Initialized
INFO - 2026-08-18 15:30:08 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:08 --> Input Class Initialized
INFO - 2026-08-18 15:30:08 --> Language Class Initialized
INFO - 2026-08-18 15:30:08 --> Loader Class Initialized
INFO - 2026-08-18 15:30:08 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:08 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:08 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:08 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:08 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:08 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:08 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:08 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:08 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:08 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:08 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:08 --> Total execution time: 0.0417
INFO - 2026-08-18 15:30:10 --> Config Class Initialized
INFO - 2026-08-18 15:30:10 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:10 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:10 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:10 --> URI Class Initialized
INFO - 2026-08-18 15:30:10 --> Router Class Initialized
INFO - 2026-08-18 15:30:10 --> Output Class Initialized
INFO - 2026-08-18 15:30:10 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:10 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:10 --> Input Class Initialized
INFO - 2026-08-18 15:30:10 --> Language Class Initialized
INFO - 2026-08-18 15:30:10 --> Loader Class Initialized
INFO - 2026-08-18 15:30:10 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:10 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:10 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:10 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:10 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:10 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:10 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:10 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:10 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:10 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:10 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\sales/sales_order.php
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:10 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:10 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:10 --> Total execution time: 0.0301
INFO - 2026-08-18 15:30:27 --> Config Class Initialized
INFO - 2026-08-18 15:30:27 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:27 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:27 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:27 --> URI Class Initialized
INFO - 2026-08-18 15:30:27 --> Router Class Initialized
INFO - 2026-08-18 15:30:27 --> Output Class Initialized
INFO - 2026-08-18 15:30:27 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:27 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:27 --> Input Class Initialized
INFO - 2026-08-18 15:30:27 --> Language Class Initialized
INFO - 2026-08-18 15:30:27 --> Loader Class Initialized
INFO - 2026-08-18 15:30:27 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:27 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:27 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:27 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:27 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:27 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:27 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:27 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:27 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:27 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:27 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:27 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:27 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:27 --> Total execution time: 0.0857
INFO - 2026-08-18 15:30:39 --> Config Class Initialized
INFO - 2026-08-18 15:30:39 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:39 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:39 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:39 --> URI Class Initialized
INFO - 2026-08-18 15:30:39 --> Router Class Initialized
INFO - 2026-08-18 15:30:39 --> Output Class Initialized
INFO - 2026-08-18 15:30:39 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:39 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:39 --> Input Class Initialized
INFO - 2026-08-18 15:30:39 --> Language Class Initialized
INFO - 2026-08-18 15:30:39 --> Loader Class Initialized
INFO - 2026-08-18 15:30:39 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:39 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:39 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:39 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:39 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:39 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:39 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:39 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:39 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:39 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:39 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\Approval/payment_approval_in.php
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:39 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:39 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:39 --> Total execution time: 0.0504
INFO - 2026-08-18 15:30:44 --> Config Class Initialized
INFO - 2026-08-18 15:30:44 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:44 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:44 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:44 --> URI Class Initialized
INFO - 2026-08-18 15:30:44 --> Router Class Initialized
INFO - 2026-08-18 15:30:44 --> Output Class Initialized
INFO - 2026-08-18 15:30:44 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:44 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:44 --> Input Class Initialized
INFO - 2026-08-18 15:30:44 --> Language Class Initialized
INFO - 2026-08-18 15:30:44 --> Loader Class Initialized
INFO - 2026-08-18 15:30:44 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:44 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:44 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:44 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:44 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:44 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:44 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:44 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:44 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:44 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:44 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:44 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:44 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:44 --> Total execution time: 0.0556
INFO - 2026-08-18 15:30:51 --> Config Class Initialized
INFO - 2026-08-18 15:30:51 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:51 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:51 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:51 --> URI Class Initialized
INFO - 2026-08-18 15:30:51 --> Router Class Initialized
INFO - 2026-08-18 15:30:51 --> Output Class Initialized
INFO - 2026-08-18 15:30:51 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:51 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:51 --> Input Class Initialized
INFO - 2026-08-18 15:30:51 --> Language Class Initialized
INFO - 2026-08-18 15:30:51 --> Loader Class Initialized
INFO - 2026-08-18 15:30:51 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:51 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:51 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:51 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:51 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:51 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:51 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:51 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:51 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:51 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:51 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:30:51 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:30:51 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:30:51 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:30:51 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:51 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:51 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:51 --> Total execution time: 0.0340
INFO - 2026-08-18 15:30:59 --> Config Class Initialized
INFO - 2026-08-18 15:30:59 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:30:59 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:30:59 --> Utf8 Class Initialized
INFO - 2026-08-18 15:30:59 --> URI Class Initialized
INFO - 2026-08-18 15:30:59 --> Router Class Initialized
INFO - 2026-08-18 15:30:59 --> Output Class Initialized
INFO - 2026-08-18 15:30:59 --> Security Class Initialized
DEBUG - 2026-08-18 15:30:59 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:30:59 --> Input Class Initialized
INFO - 2026-08-18 15:30:59 --> Language Class Initialized
INFO - 2026-08-18 15:30:59 --> Loader Class Initialized
INFO - 2026-08-18 15:30:59 --> Controller Class Initialized
DEBUG - 2026-08-18 15:30:59 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:30:59 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:30:59 --> Database Driver Class Initialized
INFO - 2026-08-18 15:30:59 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:30:59 --> Helper loaded: form_helper
INFO - 2026-08-18 15:30:59 --> Helper loaded: url_helper
INFO - 2026-08-18 15:30:59 --> Model "Default_model" initialized
INFO - 2026-08-18 15:30:59 --> Helper loaded: language_helper
INFO - 2026-08-18 15:30:59 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:30:59 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:30:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:30:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:30:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:30:59 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:30:59 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:30:59 --> Final output sent to browser
DEBUG - 2026-08-18 15:30:59 --> Total execution time: 0.0518
INFO - 2026-08-18 15:31:08 --> Config Class Initialized
INFO - 2026-08-18 15:31:08 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:31:08 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:31:08 --> Utf8 Class Initialized
INFO - 2026-08-18 15:31:08 --> URI Class Initialized
INFO - 2026-08-18 15:31:08 --> Router Class Initialized
INFO - 2026-08-18 15:31:08 --> Output Class Initialized
INFO - 2026-08-18 15:31:08 --> Security Class Initialized
DEBUG - 2026-08-18 15:31:08 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:31:08 --> Input Class Initialized
INFO - 2026-08-18 15:31:08 --> Language Class Initialized
INFO - 2026-08-18 15:31:08 --> Loader Class Initialized
INFO - 2026-08-18 15:31:08 --> Controller Class Initialized
DEBUG - 2026-08-18 15:31:08 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:31:08 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:31:08 --> Database Driver Class Initialized
INFO - 2026-08-18 15:31:08 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:31:08 --> Helper loaded: form_helper
INFO - 2026-08-18 15:31:08 --> Helper loaded: url_helper
INFO - 2026-08-18 15:31:08 --> Model "Default_model" initialized
INFO - 2026-08-18 15:31:08 --> Helper loaded: language_helper
INFO - 2026-08-18 15:31:08 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:31:08 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:31:08 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:31:08 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:31:08 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:31:08 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:31:08 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:31:08 --> Final output sent to browser
DEBUG - 2026-08-18 15:31:08 --> Total execution time: 0.0634
INFO - 2026-08-18 15:31:09 --> Config Class Initialized
INFO - 2026-08-18 15:31:09 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:31:09 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:31:09 --> Utf8 Class Initialized
INFO - 2026-08-18 15:31:09 --> URI Class Initialized
INFO - 2026-08-18 15:31:09 --> Router Class Initialized
INFO - 2026-08-18 15:31:09 --> Output Class Initialized
INFO - 2026-08-18 15:31:09 --> Security Class Initialized
DEBUG - 2026-08-18 15:31:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:31:09 --> Input Class Initialized
INFO - 2026-08-18 15:31:09 --> Language Class Initialized
INFO - 2026-08-18 15:31:09 --> Loader Class Initialized
INFO - 2026-08-18 15:31:09 --> Controller Class Initialized
DEBUG - 2026-08-18 15:31:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:31:09 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:31:09 --> Database Driver Class Initialized
INFO - 2026-08-18 15:31:09 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:31:09 --> Helper loaded: form_helper
INFO - 2026-08-18 15:31:09 --> Helper loaded: url_helper
INFO - 2026-08-18 15:31:09 --> Model "Default_model" initialized
INFO - 2026-08-18 15:31:09 --> Helper loaded: language_helper
INFO - 2026-08-18 15:31:09 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:31:09 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:31:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:31:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:31:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:31:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:31:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:31:09 --> Final output sent to browser
DEBUG - 2026-08-18 15:31:09 --> Total execution time: 0.0543
INFO - 2026-08-18 15:37:34 --> Config Class Initialized
INFO - 2026-08-18 15:37:34 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:37:34 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:37:34 --> Utf8 Class Initialized
INFO - 2026-08-18 15:37:34 --> URI Class Initialized
INFO - 2026-08-18 15:37:34 --> Router Class Initialized
INFO - 2026-08-18 15:37:34 --> Output Class Initialized
INFO - 2026-08-18 15:37:34 --> Security Class Initialized
DEBUG - 2026-08-18 15:37:34 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:37:34 --> Input Class Initialized
INFO - 2026-08-18 15:37:34 --> Language Class Initialized
ERROR - 2026-08-18 15:37:34 --> Severity: error --> Exception: syntax error, unexpected '$rdata' (T_VARIABLE), expecting function (T_FUNCTION) or const (T_CONST) C:\xampp\htdocs\addon\application\controllers\Approval.php 839
INFO - 2026-08-18 15:38:32 --> Config Class Initialized
INFO - 2026-08-18 15:38:32 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:38:32 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:38:32 --> Utf8 Class Initialized
INFO - 2026-08-18 15:38:32 --> URI Class Initialized
INFO - 2026-08-18 15:38:32 --> Router Class Initialized
INFO - 2026-08-18 15:38:32 --> Output Class Initialized
INFO - 2026-08-18 15:38:32 --> Security Class Initialized
DEBUG - 2026-08-18 15:38:32 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:38:32 --> Input Class Initialized
INFO - 2026-08-18 15:38:32 --> Language Class Initialized
INFO - 2026-08-18 15:38:32 --> Loader Class Initialized
INFO - 2026-08-18 15:38:32 --> Controller Class Initialized
DEBUG - 2026-08-18 15:38:32 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:38:32 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:38:32 --> Database Driver Class Initialized
INFO - 2026-08-18 15:38:32 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:38:32 --> Helper loaded: form_helper
INFO - 2026-08-18 15:38:32 --> Helper loaded: url_helper
INFO - 2026-08-18 15:38:32 --> Model "Default_model" initialized
INFO - 2026-08-18 15:38:32 --> Helper loaded: language_helper
INFO - 2026-08-18 15:38:32 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:38:32 --> Could not find the language line "dashboard"
ERROR - 2026-08-18 15:38:32 --> Severity: Notice --> Undefined variable: view C:\xampp\htdocs\addon\application\controllers\Approval.php 847
INFO - 2026-08-18 15:38:32 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:38:32 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:16 --> Config Class Initialized
INFO - 2026-08-18 15:40:16 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:16 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:16 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:16 --> URI Class Initialized
INFO - 2026-08-18 15:40:16 --> Router Class Initialized
INFO - 2026-08-18 15:40:16 --> Output Class Initialized
INFO - 2026-08-18 15:40:16 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:16 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:16 --> Input Class Initialized
INFO - 2026-08-18 15:40:16 --> Language Class Initialized
INFO - 2026-08-18 15:40:16 --> Loader Class Initialized
INFO - 2026-08-18 15:40:16 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:16 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:16 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:16 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:16 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:16 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:16 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:16 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:16 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:16 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:16 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:40:16 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:40:16 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:16 --> Total execution time: 0.0658
INFO - 2026-08-18 15:40:24 --> Config Class Initialized
INFO - 2026-08-18 15:40:24 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:24 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:24 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:24 --> URI Class Initialized
INFO - 2026-08-18 15:40:24 --> Router Class Initialized
INFO - 2026-08-18 15:40:24 --> Output Class Initialized
INFO - 2026-08-18 15:40:24 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:24 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:24 --> Input Class Initialized
INFO - 2026-08-18 15:40:24 --> Language Class Initialized
INFO - 2026-08-18 15:40:24 --> Loader Class Initialized
INFO - 2026-08-18 15:40:24 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:24 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:24 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:24 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:24 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:24 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:24 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:24 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:24 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:24 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:24 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:40:24 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:40:24 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:24 --> Total execution time: 0.0516
INFO - 2026-08-18 15:40:42 --> Config Class Initialized
INFO - 2026-08-18 15:40:42 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:42 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:42 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:42 --> URI Class Initialized
INFO - 2026-08-18 15:40:42 --> Router Class Initialized
INFO - 2026-08-18 15:40:42 --> Output Class Initialized
INFO - 2026-08-18 15:40:42 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:42 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:42 --> Input Class Initialized
INFO - 2026-08-18 15:40:42 --> Language Class Initialized
INFO - 2026-08-18 15:40:42 --> Loader Class Initialized
INFO - 2026-08-18 15:40:42 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:42 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:42 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:42 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:42 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:42 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:42 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:42 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:42 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:42 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:42 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:40:42 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:40:42 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:42 --> Total execution time: 0.0578
INFO - 2026-08-18 15:40:48 --> Config Class Initialized
INFO - 2026-08-18 15:40:48 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:48 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:48 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:48 --> URI Class Initialized
INFO - 2026-08-18 15:40:48 --> Router Class Initialized
INFO - 2026-08-18 15:40:48 --> Output Class Initialized
INFO - 2026-08-18 15:40:48 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:48 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:48 --> Input Class Initialized
INFO - 2026-08-18 15:40:48 --> Language Class Initialized
INFO - 2026-08-18 15:40:48 --> Loader Class Initialized
INFO - 2026-08-18 15:40:48 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:48 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:48 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:48 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:48 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:48 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:48 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:48 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:48 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:48 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:48 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\Approval/payment_approval_in.php
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:40:48 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:40:48 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:48 --> Total execution time: 0.0384
INFO - 2026-08-18 15:40:52 --> Config Class Initialized
INFO - 2026-08-18 15:40:52 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:52 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:52 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:52 --> URI Class Initialized
INFO - 2026-08-18 15:40:52 --> Router Class Initialized
INFO - 2026-08-18 15:40:52 --> Output Class Initialized
INFO - 2026-08-18 15:40:52 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:52 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:52 --> Input Class Initialized
INFO - 2026-08-18 15:40:52 --> Language Class Initialized
INFO - 2026-08-18 15:40:52 --> Loader Class Initialized
INFO - 2026-08-18 15:40:52 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:52 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:52 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:52 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:52 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:52 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:52 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:52 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:52 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:52 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:52 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:40:52 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:40:52 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:52 --> Total execution time: 0.0592
INFO - 2026-08-18 15:40:58 --> Config Class Initialized
INFO - 2026-08-18 15:40:58 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:40:58 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:40:58 --> Utf8 Class Initialized
INFO - 2026-08-18 15:40:58 --> URI Class Initialized
INFO - 2026-08-18 15:40:58 --> Router Class Initialized
INFO - 2026-08-18 15:40:58 --> Output Class Initialized
INFO - 2026-08-18 15:40:58 --> Security Class Initialized
DEBUG - 2026-08-18 15:40:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:40:58 --> Input Class Initialized
INFO - 2026-08-18 15:40:58 --> Language Class Initialized
INFO - 2026-08-18 15:40:58 --> Loader Class Initialized
INFO - 2026-08-18 15:40:58 --> Controller Class Initialized
DEBUG - 2026-08-18 15:40:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:40:58 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:40:58 --> Database Driver Class Initialized
INFO - 2026-08-18 15:40:58 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:40:58 --> Helper loaded: form_helper
INFO - 2026-08-18 15:40:58 --> Helper loaded: url_helper
INFO - 2026-08-18 15:40:58 --> Model "Default_model" initialized
INFO - 2026-08-18 15:40:58 --> Helper loaded: language_helper
INFO - 2026-08-18 15:40:58 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:40:58 --> GET EMPLOYEES BY DESIGNATION: 2
INFO - 2026-08-18 15:40:58 --> Final output sent to browser
DEBUG - 2026-08-18 15:40:58 --> Total execution time: 0.0547
INFO - 2026-08-18 15:41:01 --> Config Class Initialized
INFO - 2026-08-18 15:41:01 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:41:01 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:41:01 --> Utf8 Class Initialized
INFO - 2026-08-18 15:41:01 --> URI Class Initialized
INFO - 2026-08-18 15:41:01 --> Router Class Initialized
INFO - 2026-08-18 15:41:01 --> Output Class Initialized
INFO - 2026-08-18 15:41:01 --> Security Class Initialized
DEBUG - 2026-08-18 15:41:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:41:01 --> Input Class Initialized
INFO - 2026-08-18 15:41:01 --> Language Class Initialized
INFO - 2026-08-18 15:41:01 --> Loader Class Initialized
INFO - 2026-08-18 15:41:01 --> Controller Class Initialized
DEBUG - 2026-08-18 15:41:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:41:01 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:41:01 --> Database Driver Class Initialized
INFO - 2026-08-18 15:41:01 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:41:01 --> Helper loaded: form_helper
INFO - 2026-08-18 15:41:01 --> Helper loaded: url_helper
INFO - 2026-08-18 15:41:01 --> Model "Default_model" initialized
INFO - 2026-08-18 15:41:01 --> Helper loaded: language_helper
INFO - 2026-08-18 15:41:01 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:41:01 --> ========== PURCHASE ORDER APPROVAL START ==========
ERROR - 2026-08-18 15:41:01 --> POST DATA: Array
(
    [approval_id] => 0
    [reference] => 16
    [from_page] => order_listing
    [doc_id] => 3
    [type] => 0
    [transfer_from] => 0
    [transfer_to] => 0
    [approval_date] => 2026-08-18
    [status] => 3
    [designation_id] => 2
    [employee_id] => 4
    [remarks] => 
)

ERROR - 2026-08-18 15:41:01 --> PURCHASE ORDER RESULT: Array
(
    [0] => Array
        (
            [id] => 3
            [inv_no] => PO01031
            [status] => 0
            [payment_status] => 0
        )

)

ERROR - 2026-08-18 15:41:01 --> EXISTING APPROVAL: Array
(
)

ERROR - 2026-08-18 15:41:01 --> APPROVAL INSERT DATA: Array
(
    [doc_id] => 3
    [reference] => 16
    [type] => 0
    [transfer_from] => 1
    [transfer_to] => 4
    [approval_status] => 3
    [remark] => Forwarded for further approval
    [transfer_from_datetime] => 2026-08-18
    [transfer_to_datetime] => 
    [action_datetime] => 
    [status] => 0
    [added_by] => 1
    [ip_address] => 127.0.0.1
    [created_at] => 2026-08-18 15:41:01
)

ERROR - 2026-08-18 15:41:01 --> APPROVAL INSERTED. ID = 12
ERROR - 2026-08-18 15:41:01 --> PURCHASE ORDER APPROVAL SUCCESS
INFO - 2026-08-18 15:41:01 --> Final output sent to browser
DEBUG - 2026-08-18 15:41:01 --> Total execution time: 0.0396
INFO - 2026-08-18 15:41:01 --> Config Class Initialized
INFO - 2026-08-18 15:41:01 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:41:01 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:41:01 --> Utf8 Class Initialized
INFO - 2026-08-18 15:41:01 --> URI Class Initialized
INFO - 2026-08-18 15:41:01 --> Router Class Initialized
INFO - 2026-08-18 15:41:01 --> Output Class Initialized
INFO - 2026-08-18 15:41:01 --> Security Class Initialized
DEBUG - 2026-08-18 15:41:01 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:41:01 --> Input Class Initialized
INFO - 2026-08-18 15:41:01 --> Language Class Initialized
INFO - 2026-08-18 15:41:01 --> Loader Class Initialized
INFO - 2026-08-18 15:41:01 --> Controller Class Initialized
DEBUG - 2026-08-18 15:41:01 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:41:01 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:41:01 --> Database Driver Class Initialized
INFO - 2026-08-18 15:41:01 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:41:01 --> Helper loaded: form_helper
INFO - 2026-08-18 15:41:01 --> Helper loaded: url_helper
INFO - 2026-08-18 15:41:01 --> Model "Default_model" initialized
INFO - 2026-08-18 15:41:01 --> Helper loaded: language_helper
INFO - 2026-08-18 15:41:01 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:41:01 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\purchase/purchase_order.php
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:41:02 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:41:02 --> Final output sent to browser
DEBUG - 2026-08-18 15:41:02 --> Total execution time: 0.1794
INFO - 2026-08-18 15:41:06 --> Config Class Initialized
INFO - 2026-08-18 15:41:06 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:41:06 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:41:06 --> Utf8 Class Initialized
INFO - 2026-08-18 15:41:06 --> URI Class Initialized
INFO - 2026-08-18 15:41:06 --> Router Class Initialized
INFO - 2026-08-18 15:41:06 --> Output Class Initialized
INFO - 2026-08-18 15:41:06 --> Security Class Initialized
DEBUG - 2026-08-18 15:41:06 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:41:06 --> Input Class Initialized
INFO - 2026-08-18 15:41:06 --> Language Class Initialized
INFO - 2026-08-18 15:41:06 --> Loader Class Initialized
INFO - 2026-08-18 15:41:06 --> Controller Class Initialized
DEBUG - 2026-08-18 15:41:06 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:41:06 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:41:06 --> Database Driver Class Initialized
INFO - 2026-08-18 15:41:06 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:41:06 --> Helper loaded: form_helper
INFO - 2026-08-18 15:41:06 --> Helper loaded: url_helper
INFO - 2026-08-18 15:41:06 --> Model "Default_model" initialized
INFO - 2026-08-18 15:41:06 --> Helper loaded: language_helper
INFO - 2026-08-18 15:41:06 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:41:06 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:41:06 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:41:06 --> Final output sent to browser
DEBUG - 2026-08-18 15:41:06 --> Total execution time: 0.0282
INFO - 2026-08-18 15:41:25 --> Config Class Initialized
INFO - 2026-08-18 15:41:25 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:41:25 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:41:25 --> Utf8 Class Initialized
INFO - 2026-08-18 15:41:25 --> URI Class Initialized
INFO - 2026-08-18 15:41:25 --> Router Class Initialized
INFO - 2026-08-18 15:41:25 --> Output Class Initialized
INFO - 2026-08-18 15:41:25 --> Security Class Initialized
DEBUG - 2026-08-18 15:41:25 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:41:25 --> Input Class Initialized
INFO - 2026-08-18 15:41:25 --> Language Class Initialized
INFO - 2026-08-18 15:41:25 --> Loader Class Initialized
INFO - 2026-08-18 15:41:25 --> Controller Class Initialized
DEBUG - 2026-08-18 15:41:25 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:41:25 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:41:25 --> Database Driver Class Initialized
INFO - 2026-08-18 15:41:25 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:41:25 --> Helper loaded: form_helper
INFO - 2026-08-18 15:41:25 --> Helper loaded: url_helper
INFO - 2026-08-18 15:41:25 --> Model "Default_model" initialized
INFO - 2026-08-18 15:41:25 --> Helper loaded: language_helper
INFO - 2026-08-18 15:41:25 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:41:25 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:41:25 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:41:25 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:41:25 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:41:25 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:41:25 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:41:25 --> Final output sent to browser
DEBUG - 2026-08-18 15:41:25 --> Total execution time: 0.0591
INFO - 2026-08-18 15:41:31 --> Config Class Initialized
INFO - 2026-08-18 15:41:31 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:41:31 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:41:31 --> Utf8 Class Initialized
INFO - 2026-08-18 15:41:31 --> URI Class Initialized
INFO - 2026-08-18 15:41:31 --> Router Class Initialized
INFO - 2026-08-18 15:41:31 --> Output Class Initialized
INFO - 2026-08-18 15:41:31 --> Security Class Initialized
DEBUG - 2026-08-18 15:41:31 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:41:31 --> Input Class Initialized
INFO - 2026-08-18 15:41:31 --> Language Class Initialized
INFO - 2026-08-18 15:41:31 --> Loader Class Initialized
INFO - 2026-08-18 15:41:31 --> Controller Class Initialized
DEBUG - 2026-08-18 15:41:31 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:41:31 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:41:31 --> Database Driver Class Initialized
INFO - 2026-08-18 15:41:31 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:41:31 --> Helper loaded: form_helper
INFO - 2026-08-18 15:41:31 --> Helper loaded: url_helper
INFO - 2026-08-18 15:41:31 --> Model "Default_model" initialized
INFO - 2026-08-18 15:41:31 --> Helper loaded: language_helper
INFO - 2026-08-18 15:41:31 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:41:31 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:41:31 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 95
ERROR - 2026-08-18 15:41:31 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 100
ERROR - 2026-08-18 15:41:31 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 105
ERROR - 2026-08-18 15:41:31 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 110
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:41:31 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:41:31 --> Final output sent to browser
DEBUG - 2026-08-18 15:41:31 --> Total execution time: 0.0549
INFO - 2026-08-18 15:48:47 --> Config Class Initialized
INFO - 2026-08-18 15:48:47 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:48:47 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:48:47 --> Utf8 Class Initialized
INFO - 2026-08-18 15:48:47 --> URI Class Initialized
INFO - 2026-08-18 15:48:47 --> Router Class Initialized
INFO - 2026-08-18 15:48:47 --> Output Class Initialized
INFO - 2026-08-18 15:48:47 --> Security Class Initialized
DEBUG - 2026-08-18 15:48:47 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:48:47 --> Input Class Initialized
INFO - 2026-08-18 15:48:47 --> Language Class Initialized
INFO - 2026-08-18 15:48:47 --> Loader Class Initialized
INFO - 2026-08-18 15:48:47 --> Controller Class Initialized
DEBUG - 2026-08-18 15:48:47 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:48:47 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:48:47 --> Database Driver Class Initialized
INFO - 2026-08-18 15:48:47 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:48:47 --> Helper loaded: form_helper
INFO - 2026-08-18 15:48:47 --> Helper loaded: url_helper
INFO - 2026-08-18 15:48:47 --> Model "Default_model" initialized
INFO - 2026-08-18 15:48:47 --> Helper loaded: language_helper
INFO - 2026-08-18 15:48:47 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:48:47 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:48:47 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 95
ERROR - 2026-08-18 15:48:47 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 100
ERROR - 2026-08-18 15:48:47 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 105
ERROR - 2026-08-18 15:48:47 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 110
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:48:47 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:48:47 --> Final output sent to browser
DEBUG - 2026-08-18 15:48:47 --> Total execution time: 0.0494
INFO - 2026-08-18 15:48:58 --> Config Class Initialized
INFO - 2026-08-18 15:48:58 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:48:58 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:48:58 --> Utf8 Class Initialized
INFO - 2026-08-18 15:48:58 --> URI Class Initialized
INFO - 2026-08-18 15:48:58 --> Router Class Initialized
INFO - 2026-08-18 15:48:58 --> Output Class Initialized
INFO - 2026-08-18 15:48:58 --> Security Class Initialized
DEBUG - 2026-08-18 15:48:58 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:48:58 --> Input Class Initialized
INFO - 2026-08-18 15:48:58 --> Language Class Initialized
INFO - 2026-08-18 15:48:58 --> Loader Class Initialized
INFO - 2026-08-18 15:48:58 --> Controller Class Initialized
DEBUG - 2026-08-18 15:48:58 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:48:58 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:48:58 --> Database Driver Class Initialized
INFO - 2026-08-18 15:48:58 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:48:58 --> Helper loaded: form_helper
INFO - 2026-08-18 15:48:58 --> Helper loaded: url_helper
INFO - 2026-08-18 15:48:58 --> Model "Default_model" initialized
INFO - 2026-08-18 15:48:58 --> Helper loaded: language_helper
INFO - 2026-08-18 15:48:58 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:48:58 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:48:58 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:48:58 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:48:58 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:48:58 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:48:58 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:48:58 --> Final output sent to browser
DEBUG - 2026-08-18 15:48:58 --> Total execution time: 0.0533
INFO - 2026-08-18 15:51:00 --> Config Class Initialized
INFO - 2026-08-18 15:51:00 --> Hooks Class Initialized
DEBUG - 2026-08-18 15:51:00 --> UTF-8 Support Enabled
INFO - 2026-08-18 15:51:00 --> Utf8 Class Initialized
INFO - 2026-08-18 15:51:00 --> URI Class Initialized
INFO - 2026-08-18 15:51:00 --> Router Class Initialized
INFO - 2026-08-18 15:51:00 --> Output Class Initialized
INFO - 2026-08-18 15:51:00 --> Security Class Initialized
DEBUG - 2026-08-18 15:51:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 15:51:00 --> Input Class Initialized
INFO - 2026-08-18 15:51:00 --> Language Class Initialized
INFO - 2026-08-18 15:51:00 --> Loader Class Initialized
INFO - 2026-08-18 15:51:00 --> Controller Class Initialized
DEBUG - 2026-08-18 15:51:00 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 15:51:00 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 15:51:00 --> Database Driver Class Initialized
INFO - 2026-08-18 15:51:01 --> Model "Approval_model" initialized
INFO - 2026-08-18 15:51:01 --> Helper loaded: form_helper
INFO - 2026-08-18 15:51:01 --> Helper loaded: url_helper
INFO - 2026-08-18 15:51:01 --> Model "Default_model" initialized
INFO - 2026-08-18 15:51:01 --> Helper loaded: language_helper
INFO - 2026-08-18 15:51:01 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 15:51:01 --> Could not find the language line "dashboard"
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 15:51:01 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 86
ERROR - 2026-08-18 15:51:01 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 91
ERROR - 2026-08-18 15:51:01 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 96
ERROR - 2026-08-18 15:51:01 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_out.php 101
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_out.php
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 15:51:01 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 15:51:01 --> Final output sent to browser
DEBUG - 2026-08-18 15:51:01 --> Total execution time: 0.0831
INFO - 2026-08-18 18:54:09 --> Config Class Initialized
INFO - 2026-08-18 18:54:09 --> Hooks Class Initialized
DEBUG - 2026-08-18 18:54:09 --> UTF-8 Support Enabled
INFO - 2026-08-18 18:54:09 --> Utf8 Class Initialized
INFO - 2026-08-18 18:54:09 --> URI Class Initialized
INFO - 2026-08-18 18:54:09 --> Router Class Initialized
INFO - 2026-08-18 18:54:09 --> Output Class Initialized
INFO - 2026-08-18 18:54:09 --> Security Class Initialized
DEBUG - 2026-08-18 18:54:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 18:54:09 --> Input Class Initialized
INFO - 2026-08-18 18:54:09 --> Language Class Initialized
INFO - 2026-08-18 18:54:09 --> Loader Class Initialized
INFO - 2026-08-18 18:54:09 --> Controller Class Initialized
DEBUG - 2026-08-18 18:54:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 18:54:09 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 18:54:09 --> Database Driver Class Initialized
INFO - 2026-08-18 18:54:09 --> Model "Approval_model" initialized
INFO - 2026-08-18 18:54:09 --> Helper loaded: form_helper
INFO - 2026-08-18 18:54:09 --> Helper loaded: url_helper
INFO - 2026-08-18 18:54:09 --> Model "Default_model" initialized
INFO - 2026-08-18 18:54:09 --> Helper loaded: language_helper
INFO - 2026-08-18 18:54:09 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 18:54:09 --> Could not find the language line "dashboard"
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 18:54:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 95
ERROR - 2026-08-18 18:54:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 100
ERROR - 2026-08-18 18:54:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 105
ERROR - 2026-08-18 18:54:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 110
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 18:54:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 18:54:09 --> Final output sent to browser
DEBUG - 2026-08-18 18:54:09 --> Total execution time: 0.2476
INFO - 2026-08-18 19:13:56 --> Config Class Initialized
INFO - 2026-08-18 19:13:56 --> Hooks Class Initialized
DEBUG - 2026-08-18 19:13:56 --> UTF-8 Support Enabled
INFO - 2026-08-18 19:13:56 --> Utf8 Class Initialized
INFO - 2026-08-18 19:13:56 --> URI Class Initialized
INFO - 2026-08-18 19:13:56 --> Router Class Initialized
INFO - 2026-08-18 19:13:56 --> Output Class Initialized
INFO - 2026-08-18 19:13:56 --> Security Class Initialized
DEBUG - 2026-08-18 19:13:56 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 19:13:56 --> Input Class Initialized
INFO - 2026-08-18 19:13:56 --> Language Class Initialized
INFO - 2026-08-18 19:13:56 --> Loader Class Initialized
INFO - 2026-08-18 19:13:56 --> Controller Class Initialized
DEBUG - 2026-08-18 19:13:56 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 19:13:56 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 19:13:56 --> Database Driver Class Initialized
INFO - 2026-08-18 19:13:56 --> Model "Approval_model" initialized
INFO - 2026-08-18 19:13:56 --> Helper loaded: form_helper
INFO - 2026-08-18 19:13:56 --> Helper loaded: url_helper
INFO - 2026-08-18 19:13:56 --> Model "Default_model" initialized
INFO - 2026-08-18 19:13:56 --> Helper loaded: language_helper
INFO - 2026-08-18 19:13:56 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 19:13:56 --> Could not find the language line "dashboard"
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\sales/sales_order.php
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 19:13:56 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 19:13:56 --> Final output sent to browser
DEBUG - 2026-08-18 19:13:56 --> Total execution time: 0.0418
INFO - 2026-08-18 19:14:09 --> Config Class Initialized
INFO - 2026-08-18 19:14:09 --> Hooks Class Initialized
DEBUG - 2026-08-18 19:14:09 --> UTF-8 Support Enabled
INFO - 2026-08-18 19:14:09 --> Utf8 Class Initialized
INFO - 2026-08-18 19:14:09 --> URI Class Initialized
INFO - 2026-08-18 19:14:09 --> Router Class Initialized
INFO - 2026-08-18 19:14:09 --> Output Class Initialized
INFO - 2026-08-18 19:14:09 --> Security Class Initialized
DEBUG - 2026-08-18 19:14:09 --> Global POST, GET and COOKIE data sanitized
INFO - 2026-08-18 19:14:09 --> Input Class Initialized
INFO - 2026-08-18 19:14:09 --> Language Class Initialized
INFO - 2026-08-18 19:14:09 --> Loader Class Initialized
INFO - 2026-08-18 19:14:09 --> Controller Class Initialized
DEBUG - 2026-08-18 19:14:09 --> Session: "sess_save_path" is empty; using "session.save_path" value from php.ini.
INFO - 2026-08-18 19:14:09 --> Session: Class initialized using 'files' driver.
INFO - 2026-08-18 19:14:09 --> Database Driver Class Initialized
INFO - 2026-08-18 19:14:09 --> Model "Approval_model" initialized
INFO - 2026-08-18 19:14:09 --> Helper loaded: form_helper
INFO - 2026-08-18 19:14:09 --> Helper loaded: url_helper
INFO - 2026-08-18 19:14:09 --> Model "Default_model" initialized
INFO - 2026-08-18 19:14:09 --> Helper loaded: language_helper
INFO - 2026-08-18 19:14:09 --> Language file loaded: language/english/information_lang.php
ERROR - 2026-08-18 19:14:09 --> Could not find the language line "dashboard"
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/header.php
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/navbar.php
ERROR - 2026-08-18 19:14:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 95
ERROR - 2026-08-18 19:14:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 100
ERROR - 2026-08-18 19:14:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 105
ERROR - 2026-08-18 19:14:09 --> Severity: Notice --> Undefined variable: approval_status C:\xampp\htdocs\addon\application\views\Approval\approval_in.php 110
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\approval/approval_in.php
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/footer.php
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/script.php
INFO - 2026-08-18 19:14:09 --> File loaded: C:\xampp\htdocs\addon\application\views\template/last.php
INFO - 2026-08-18 19:14:09 --> Final output sent to browser
DEBUG - 2026-08-18 19:14:09 --> Total execution time: 0.0330
