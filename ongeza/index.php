<?php include 'crud.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ongeza Test - Brian Kiwagi</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
</head>
<body>
<style>
    .error {
        color: red;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Ongeza Online Test ~ Implementing Crud - Brian Kiwagi</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#add_new_record_modal">Add New Customer</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Customers:</h3>

            <div class="records_content"></div>
        </div>
    </div>
</div>
<!-- Modal - Add New  -->
<div class="modal fade" id="add_new_record_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
            </div>
            <div class="modal-body">
<form id="adds">
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="town_name">Town Name</label>
        <input type="text" id="town_name" name="town_name" placeholder="Arusha" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="gender">Select Gender:</label>
        <select class="form-control" name="gender_id" id="gender">
            <option selected value="">Gender</option>
            <?php
            $object = new CRUD();
            $gender = $object->Gender();
            if (count($gender) > 0) {
                foreach ($gender as $gen) {
                    echo ' <option value="'.$gen["id"].'">'.$gen["gender_name"].'</option>';
                }
            } else {
                echo '<option value="">....</option>';
            }
            ?>
        </select>
    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Add Record</button>
            </div>
</form>
        </div>
    </div>
</div>
<!-- // Modal -->
<!-- Modal - Update user -->
<div class="modal fade" id="update_user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
<form id="updates">
    <div class="form-group">
        <label for="update_first_name">First Name</label>
        <input type="text" id="update_first_name" name="u_first_name" placeholder="First Name" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="update_last_name">Last Name</label>
        <input type="text" id="update_last_name" name="u_last_name" placeholder="Last Name" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="town_name">Town Name</label>
        <input type="text" id="update_town_name" name="u_town_name" placeholder="Arusha" class="form-control"/>
    </div>

    <div class="form-group">
        <label for="update_gender">Select Gender:</label>
        <select class="form-control" name="u_gender_id" id="update_gender">
            <?php
            $object = new CRUD();
            $gender = $object->Gender();
            if (count($gender) > 0) {
                foreach ($gender as $gen) {
                    echo ' <option value="'.$gen["id"].'">'.$gen["gender_name"].'</option>';
                }
            } else {
                echo '<option value="">....</option>';
            }
            ?>
        </select>
    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
                <input type="hidden" name="hidden_user_id" id="hidden_user_id">
            </div>
</form>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/validation.min.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/script.js"></script>

</body>
</html>