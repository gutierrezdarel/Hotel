<?php

session_start();
require 'Php/display.php';
include 'inc/header.php';

if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content">
    <div class="home_title">
        <h1>Transactions</h1>
        <!-- <input type="text" id="fillter_costumer" placeholder="Search...." autocomplete="off"> -->
    </div>
    <div class="home_table">
        <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Room Number</th>
                        <th>Room type</th>
                        <th>Room Package</th>
                        <th>Guest</th>
                        <th>Room Price</th>
                        <th>Total Amount </th>
                        <th>Down payment</th>
                        <th>Balance</th>
                        <th>Update payment</th>
                    </tr>
                    <div class="err">
                        <p class="mes"> </p>
                    </div>
                </thead>

                <tbody>
                    <?php
                    display_transaction();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="update_payment-modal" class="modal_overlay">
        <div class="modal_container-add">
            <div class="title_wrapper">
                <h1>Update Payment</h1>
            </div>
            <div class="error">
                <p class="message"></p>
            </div>
            <input type="hidden" id="payment_id">
            <div class="row_container">
                <div class="input_wrapper">
                    <label for="">Payment</label>
                    <input type="number" class="validation2" id="update_payment-trans" required>
                </div>
                <!-- <div class="input_wrapper">
                    <label for="">Guest</label> 
                    <select class="validation2" id="guest_select-trans" required>
                        <option value="">Guest</option>
                    </select>
                </div> -->
            </div>
            <input type="hidden" id="total_payment" required readonly>

            <div class="input_wrapper">
                <label for="">Amount</label>
                <input type="text" id="update_amount-trans" required readonly>
            </div>

            <div class="input_wrapper">
                <label for="">Balance</label>
                <input type="text" id="update_balance-trans" required readonly>
            </div>
            <div class="modal_button">
                <button id="close_update">Close</button>
                <button id="update-btn" onclick="transaction('update_transaction')">Update</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>