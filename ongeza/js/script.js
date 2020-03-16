function updateDiv()//refresh gender div
{
    $("#update_gender").load(location.href+" #update_gender>*","");
}
// Add Customer
$(function() {
jQuery.validator.addMethod("alpha", function(value, element) {
    return this.optional(element) || value == value.match(/^[a-zA-Z ]*$/);
},"Only Characters Allowed.");
/* validation rules*/
$("#adds").validate({
    rules:
        {
            first_name: {
                required: true,
                minlength: 3,
                alpha: true
            },
            last_name: {
                required: true,
                alpha: true,
                minlength: 3
            },
            town_name: {required: true, alpha: true},
            gender_id: {required: true},
        },

    messages:
        {
            first_name: {
                required: "First Name Is Required",
                minlength: "Please Enter Real Name"
            }, last_name: {
                required: "Last Name Is Required",
                minlength: "Please Enter The Correct Name"
            }, town_name: {required: "Town Name Is Required"},
            gender: {required: "Please Select Gender Type"}
        },
    submitHandler: function (form) {
        var data = $("#adds").serialize();
        $(form).ajaxSubmit({
            url: "create.php",
            type: "post",
            data:data,
            success: function (data, status) {
                // close the popup
                    $("#add_new_record_modal").modal("hide");
                    // read records again
                    readRecords();
                    // clear fields from the popup
                    $("#first_name").val("");
                    $("#last_name").val("");
                    $("#town_name").val("");
                    $("#gender").val("");

            }
        });
    }
});$("#updates").validate({
        rules:
            {
                u_first_name: {
                    required: true,
                    minlength: 3,
                    alpha: true
                },
                u_last_name: {
                    required: true,
                    alpha: true,
                    minlength: 3
                },
                u_town_name: {required: true, alpha: true},
                u_gender_id: {required: true},
            },

        messages:
            {
                u_first_name: {
                    required: "First Name Is Required",
                    minlength: "Please Enter Real Name"
                }, u_last_name: {
                    required: "Last Name Is Required",
                    minlength: "Please Enter The Correct Name"
                }, u_town_name: {required: "Town Name Is Required"},
                u_gender_id: {required: "Please Select Gender Type"}
            },
        submitHandler: function (form2) {
            var data = $("#updates").serialize();
            $(form2).ajaxSubmit({
                url: "update.php",
                type: "post",
                data:data,
                success: function (data, status) {
                    $("#update_user_modal").modal("hide");
                    readRecords();
                    updateDiv();
                }
            });
        }
    })
});
function readRecords() {
    $.get("read.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
function GetUserDetails(id) {
    // Add User ID to the hidden field
    $("#hidden_user_id").val(id);
    $.post("details.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Assign existing values to the modal popup fields
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_town_name").val(user.town_name);
            $("#update_gender").append("<option selected value='"+user.gender_id+"'>"+user.gender_name+"</option>");
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
}
function DeleteUser(id) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("delete.php", {
                id: id
            },
            function (data, status) {
                readRecords();
            }
        );
    }
}$(document).ready(function () {
    readRecords();
});