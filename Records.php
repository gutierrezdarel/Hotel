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
        <h1>Records</h1>
        <input type="text" id="fillter_record" placeholder="Search...." autocomplete="off">
    </div>
    <div class="home_table">
        <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Guest</th>
                    <th>Date Checkin</th>
                    <th>Date Checkout</th>
                    <th>Total Payment</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                display_records();
                ?>
            </tbody>
        </table>
        </div>
    </div>

</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
<script src="js/modals.js"></script>
<script src="js/ajax.js"></script>