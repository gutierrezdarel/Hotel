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
        <h1>Dashboard</h1>
    </div>
    <div class="add_button1" id="add_costumer_modal">
        <button><i class="fa-solid fa-plus"></i></button>
    </div>

    <!-- MODAL ADDING TRANSACTION-->
    <div id="room-type__modal" class="modal_overlay">
        <div class="modal_container-add1">
            <div class="title_wrapper">
                <h1>Add Guest</h1>
            </div>
            <div class="error">
                <p>all Fields are require</p>
            </div>
            <div class="input_wrapper">
                <label for="">Name</label>
                <input type="text" class="validation" id="name" required>
            </div>
            <div class="input_wrapper">
                <label for="">Contact</label>
                <input type="number" class="validation" id="contact" required>
            </div>
            <div class="input_wrapper">
                <label for="">Address</label>
                <input type="text" class="validation" id="address" required>
            </div>
            <div class="input_wrapper">
                <label for="">Room Package</label>
                <select class="form-select" class="validation" id="gender_select" required>
                    <option value="">Gender</option>
                    <option value="male">Male</option>
                    <option value="female"> Female</option>
                </select>
            </div>
            <div class="modal_button">
                <button id="close">Close</button>
                <button id="next">Next</button>
            </div>
        </div>


        
        <div class="modal_container-add2">
            <div class="title_wrapper">
                <h1>Add Guest</h1>
            </div>
            <div class="error">
                <p>all Fields are require</p>
            </div>
            <div class="input_wrapper">
                <label for="">Room Type</label>
                <select class="form-select" class="validation2" id="c-roomtype_select" required>
                    <option value="">Room Type</option>
                    <?php
                            select_roomtype();
                     ?>
                </select>
            </div>
            <div class="row_container">
                <div class="input_wrapper">
                    <label for="">Check-in</label>
                    <input type="datetime-local" class=" validation2" id="checkin" required disabled>
                </div>
                <div class="input_wrapper">
                    <label for="">Check-out</label>
                    <input type="datetime-local" class=" validation2" id="checkout" required disabled>
                </div>
            </div>
            <div class="row_container">
                <div class="input_wrapper">
                    <label for="">Room Number</label>
                    <select  class="validation2" id="roomnumber_select" required>
                        <option value="">Room Number</option>
                    </select>
                </div>
                <div class="input_wrapper">
                    <label for="">Guest</label>
                    <select class="validation2" id="guest_select" required>
                        <option value="">Guest</option>
                    </select>
                </div>
            </div>
            <div class="input_wrapper">
                <label for="">Package</label>
                <input type="text" class="validation2" id="package" required readonly>
            </div>

            <div class="row_container">
                <div class="input_wrapper">
                    <label for="">Price</label>
                    <input type="text" class="validation2" id="price" required readonly>
                </div>
                <div class="input_wrapper">
                    <label for="">Payment</label>
                    <input type="number" class="validation2" id="payment" required>
                </div>
            </div>
            <div class="row_container">
            <div class="input_wrapper">
                    <label for="">Total</label>
                    <input type="text" class="validation2" id="total" required readonly>
                </div>

                <div class="input_wrapper">
                    <label for="">Balance</label>
                    <input type="text" class="validation2" id="balance" required readonly>
                </div>
            </div>
            <div class="modal_button">
                <button id="back">Back</button>
                <button id="add" onclick="costumer_action('add_costumer')">Add</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>