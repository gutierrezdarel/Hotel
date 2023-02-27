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
        <h1>Bookings</h1>
        

    </div>
    <div  class="home_table">
        <div id="checkin-table" class="table show">
            <table>
                <thead>
                    <tr>
                        <th>Room Number</th>
                        <th>Name</th>
                        <th>Guest</th>
                        <th>Date/Time Checkin</th>
                        <th>Date/Time Checkout</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Checkout</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    display_costumer();
                    ?>
                </tbody>
            </table>
        </div>

    </div>
    <div id="update_costumer-modal" class="modal_overlay">
        <div class="modal_container-add">
            <div class="title_wrapper">
                <h1>Update Checkout</h1>
            </div>
            <div class="error">
                    <p class="message"></p>
                </div>
            <div class="input_wrapper">
                    <label for="">Check-out</label>
                    <input type="datetime-local" id="update_checkout" required >
                </div>
                <input type="hidden"  id="id" >
                <div class="input_wrapper">
                    <label for="">Price</label>
                    <input type="text"  id="update_price" required readonly>
                </div>
                <div class="input_wrapper">
                    <label for="">Amount</label>
                    <input type="text"  id="update_amount" required readonly>
                </div>
                <div class="input_wrapper">
                    <label for="">Total</label>
                    <input type="text" id="update_payment" required readonly>
                </div><div class="input_wrapper">
                    <label for="">Balance</label>
                    <input type="text" id="update_balance" required readonly>
                </div>
            <div class="modal_button">
                <button id="close_update">Close</button>
                <button type="submit" onclick="checkout('update_guest')">Update</button>
            </div>      
        </div>
    </div>

    <div id="checkout_guest-modal" class="delete_modal_overlay">
        <div class="modal_container-delete">
                <div class="title_wrapper">
                    <h1>Checkout</h1>
                </div>
                <div class="error">
                    <p class="message"></p>
                </div>
                <input type="hidden" id="roomnumber_id">
                <input type="hidden" id="checkout_id">
                <div class="input_wrapper">
                    <p>Do you want to Check-out this guest?</p>
                </div>
                <div class="modal_button_delete">
                    <button  id="close_delete">Close</button>
                    <button class="delete_btn" onclick="checkout('checkout_guest')">Yes</button>
                </div>
            </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>

<script>
 


</script>