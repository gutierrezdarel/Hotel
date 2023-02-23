<?php
include 'inc/header.php';
require 'Php/display.php';
session_start();

if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}

?>


<div class="content">
    <div class="home_title">
        <h1>Room Type</h1>
    </div>

    <div class="home_table">
        <div class="table">
            <table>
                <thead>
                    <tr>


                        <th>Room Type</th>
                        <th>Room Description</th>
                        <th>Room Price</th>
                        <th>Room Capacity</th>
                        <th>Room Package</th>
                        <th>Edit</th>
                        <th>Remove</th>


                    </tr>
                </thead>
             
                <tbody>
                <?php
                display_roomtype();
                ?>
                </tbody>
            </table>

        </div>

        <div class="add_button" id="add_roomtype">
            <button><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>

    <!-- ADD ROOM TYPE -->
    <div id="room-type__modal" class="modal_overlay">
        <div class="modal_container-add">
            <form action="Php/functions.php" method="POST">
                <div class="title_wrapper">
                    <h1>Add room type</h1>
                </div>
                <div class="input_wrapper">
                    <label for="">Room Type</label>
                    <input type="text" id="roomtype" name="roomtype" required>
                </div>
                <div class="input_wrapper">
                    <label for="">Room Description</label>
                    <input type="text" id="roomdescription" name="roomdescription" required>
                </div>
                <div class="input_wrapper">
                    <label for="">Room Price</label>
                    <input type="number" id="roomprice" name="roomprice" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="6" required>
                </div>
                <div class="input_wrapper">
                    <label for="">Room Capacity</label>
                    <input type="number" id="roomcapacity" name="roomcapacity" max="50">
                </div>
                <div class="input_wrapper">
                    <label for="">Room Package</label>
                    <input type="text" id="roompackage" name="roompackage" required>
                </div>
                <div class="modal_button">
                    <button type="button" id="close_add">Close</button>
                    <button name="Addroomtype">Add</button>
                </div>
        </div>
        </form>
    </div>

    <!-- UPDATE ROOM TYPE -->
    <div id="update_roomtype-modal" class="modal_overlay">
        <div class="modal_container-add">
            <div class="title_wrapper">
                <h1>Update room type</h1>
            </div>
            <div class="error">
                <p class="message"></p>
            </div>
            <input type="hidden" id="roomtype_id">
            <div class="input_wrapper">
                <label for="">Room Type</label>
                <input type="text" id="update_roomtype" required>
            </div>
            <div class="input_wrapper">
                <label for="">Room Description</label>
                <input type="text" id="update_roomdescription" required>
            </div>
            <div class="input_wrapper">
                <label for="">Room Price</label>
                <input type="text" id="update_roomprice"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="6" required>
            </div>
            <div class="input_wrapper">
                <label for="">Room Capacity</label>
                <input type="text" id="update_roomcapacity" required>
            </div>
            <div class="input_wrapper">
                <label for="">Room Package</label>
                <input type="text" id="update_roompackage" required>
            </div>
            <div class="modal_button">
                <button id="close_update">Close</button>
                <button onclick="roomtype_action('Editroomtype')">Update</button>
            </div>
        </div>
    </div>

    <!-- DELETE MODAL ROOM TYPE -->
    <div id="delete_roomtype-modal" class="delete_modal_overlay">
        <div class="modal_container-delete">
            <div class="title_wrapper">
                <h1>Delete room type</h1>
            </div>
            <div class="error">
                <p class="message"></p>
            </div>
            <input type="hidden" id="remove_id">
            <div class="input_wrapper">
                <p>Do you want to delete this room type?</p>
            </div>
            <div class="modal_button_delete">
                <button id="close_delete">Close</button>
                <button class="delete_btn" onclick="roomtype_action('Deleteroomtype')">Delete</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>

<script>
    $("#roomcapacity").on("keyup", function() {
        if ($("#roomcapacity").val() >= 10) {
            $("#roomcapacity").val(10)
        }
    })

    $("#update_roomcapacity").on("keyup", function() {
        if ($("#update_roomcapacity").val() >= 10) {
            $("#update_roomcapacity").val(10)
        }
    })
</script>