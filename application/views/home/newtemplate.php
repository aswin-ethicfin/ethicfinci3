<?php

defined('BASEPATH') or exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>

    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }

        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
            text-decoration: none;
        }

        a:hover {
            color: #97310e;
        }

        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }

        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }

        #body {
            margin: 0 15px 0 15px;
            min-height: 96px;
        }

        p {
            margin: 0 0 10px;
            padding: 0;
        }

        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }

        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
    </style>
</head>

<body>
    <? php// include ('../template/header.php'); ?>
    <div class="container mt-5">
        <?php if ($this->session->userdata('message')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->userdata('message'); ?>
                <?php $this->session->unset_userdata('message'); // Unset the session message after displaying it ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->userdata('message_duplicate')): ?>
            <div class="alert alert-danger text-light">
                <?php echo $this->session->userdata('message_duplicate'); ?>
                <?php $this->session->unset_userdata('message_duplicate'); // Unset the session message after displaying it ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <!-- Dropdown for Main Template Selection -->
            <div class="form-row align-items-center">
                <div class="col-auto">
                    <label for="mainTemplate" class="col-form-label">Select Main Template</label>
                </div>
                <div class="col-auto">
                    <select class="form-control border border-3" id="mainTemplate" name="main_template">
                        <option value="">Choose...</option>
                        <?php foreach ($templates as $template) { ?>

                            <option value="<?= $template['id'] ?>"><?= $template['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- Input for Custom Template Name -->
            <div class="form-row align-items-center mt-3">
                <div class="col-auto">
                    <label for="customTemplateName" class="col-form-label">Custom Template Name</label>
                </div>
                <div class="col-auto">
                    <input type="text" class="form-control border border-3" id="customTemplateName"
                        placeholder="Enter custom template name" name="template_name">
                </div>
            </div>

            <!-- Table with Checkboxes -->
            <div class="form-group mt-3">
                <label>Select Values</label>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Sl.No</th>
                            <th scope="col">Option</th>
                            <th scope="col">Select</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $check_array = array('Sl.No', 'Item', 'Price', 'Quantity', 'Unit', 'Total');
                        foreach ($fields as $field) { ?>
                            <tr>
                                <th scope="row"><?= $i ?></th>
                                <td><?= $field['field_name'] ?></td>
                                <td>
                                    <input type="checkbox" class="form-check-input" <?= in_array($field['field_name'], $check_array) ? 'checked' : '' ?> name="selected_fields[]"
                                        value="<?= $field['id'] ?>">
                                </td>
                            </tr>
                            <?php
                            $i++;
                        } ?>

                    </tbody>
                </table>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>