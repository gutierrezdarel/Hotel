<?php
include 'inc/header.php';
require 'Php/display.php';
session_start();

if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>
<div class="content">
    <!-- <div class="home_container"> -->
    <div class="home_title">
        <h1>Rooms</h1>
    </div>
    <div class="home_table">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Room type</th>
                        <th>Room Status</th>
                        <th>Edit</th>
                        <th>Remove</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                display_room();
                ?>
                </tbody>
            </table>
        </div>
        <div class="add_button" id="add_room">
            <button><i class="fa-solid fa-plus"></i></button>
        </div>
    </div>

    <!--ADD ROOM MODAL -->
    <div id="add_room-modal" class="modal_overlay">
        <div class="modal_container-add">
            <form action="Php/functions.php" method="POST">
                <div class="title_wrapper">
                    <h1>Add room</h1>
                </div>
                <div class="input_wrapper">
                    <label for="">Room Number</label>
                    <input type="text" id="roomnumber" name="roomnumber" required>
                </div>
                <div class="input_wrapper">
                    <label for="">Room type</label>
                    <select id="roomtype_select" name="roomtype_select" required>
                        <option value="">Select room type</option>
                        <?php
                        select_roomtype_display();
                        ?>
                    </select>

                </div>
                <div class="input_wrapper">
                    <label for="">Room status</label>
                    <select class="form-select" id="roomstatus_select" name="roomstatus_select" required>
                        <option value="">Room Status</option>
                        <option value="Available">Available</option>
                        <option value="Not Available"> Not Available</option>
                    </select>
                </div>
                <div class="modal_button">
                    <button id="close_add">CLOSE</button>
                    <button type="submit" name="Addrooms">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- UPDATE ROOM MODAL -->
    <div id="update_room-modal" class="modal_overlay">
        <div class="modal_container-add">
            <div class="title_wrapper">
                <h1>Update room</h1>
            </div>
            <div class="error">
                    <p class="message"></p>
                </div>
            <input type="hidden" id="room_id" required>
            <div class="input_wrapper">
                <label for="">Room Number</label>
                <input type="text" id="update_roomnumber" required>
            </div>
           
          
            <div class="input_wrapper">
                <label for="">Room type</label>
                <select id="update_roomtype_select" required>
                    <option value="">Select room type</option>
                    <?php
                    select_roomtype_display();
                    ?>
                </select>
            </div>
            <div class="input_wrapper">
                <label for="">Room status</label>
                <select class="form-select" id="update_roomstatus_select" required>
                    <option value="">Room Status</option>
                    <option value="Available">Available</option>
                    <option  id = "occupied" value="Occupied">Occupied</option>
                    <option value="Not Available"> Not Available</option>
                </select>
            </div>
            <div class="modal_button">
                <button id="close_update">Close</button>
                <button onclick="room('Update_room')">Update</button>
            </div>
           
        </div>
    </div>

    <!-- DELETE ROOM MODAL -->
    <div id="delete_room-modal" class="delete_modal_overlay">
        <div class="modal_container-delete">
                <div class="title_wrapper">
                    <h1>Delete room</h1>
                </div>
                <div class="error">
                    <p class="message"></p>
                </div>
                <input type="hidden" id="remove_id">
                <div class="input_wrapper">
                    <p>Do you want to delete this room ?</p>
                </div>
                <div class="modal_button_delete">
                    <button  id="close_delete">Close</button>
                    <button class="delete_btn" onclick="room('Delete_room')">Delete</button>
                </div>
            </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>