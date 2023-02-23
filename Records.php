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
        <h1>Home Page</h1>
    </div>
    <div class="home_table">
        <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Name</th>
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