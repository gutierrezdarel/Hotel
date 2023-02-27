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
    <div class="conetent_container">
        <div class="card-content_container">
            <div class="card_container">
                <div class="card_wrapper">
                    <span><svg fill="rgb(9, 72, 109)" width="40px" height="40px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="rgb(9, 72, 109)">
                            <g id="SVGRepo_bgCarrier" stroke-width="0" />
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />
                            <g id="SVGRepo_iconCarrier">
                                <path d="M16 21.916c-4.797 0.020-8.806 3.369-9.837 7.856l-0.013 0.068c-0.011 0.048-0.017 0.103-0.017 0.16 0 0.414 0.336 0.75 0.75 0.75 0.357 0 0.656-0.25 0.731-0.585l0.001-0.005c0.875-3.885 4.297-6.744 8.386-6.744s7.511 2.859 8.375 6.687l0.011 0.057c0.076 0.34 0.374 0.59 0.732 0.59 0 0 0.001 0 0.001 0h-0c0.057-0 0.112-0.007 0.165-0.019l-0.005 0.001c0.34-0.076 0.59-0.375 0.59-0.733 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005c-1.045-4.554-5.055-7.903-9.849-7.924h-0.002zM9.164 10.602c0 0 0 0 0 0 2.582 0 4.676-2.093 4.676-4.676s-2.093-4.676-4.676-4.676c-2.582 0-4.676 2.093-4.676 4.676v0c0.003 2.581 2.095 4.673 4.675 4.676h0zM9.164 2.75c0 0 0 0 0 0 1.754 0 3.176 1.422 3.176 3.176s-1.422 3.176-3.176 3.176c-1.754 0-3.176-1.422-3.176-3.176v0c0.002-1.753 1.423-3.174 3.175-3.176h0zM22.926 10.602c2.582 0 4.676-2.093 4.676-4.676s-2.093-4.676-4.676-4.676c-2.582 0-4.676 2.093-4.676 4.676v0c0.003 2.581 2.095 4.673 4.675 4.676h0zM22.926 2.75c1.754 0 3.176 1.422 3.176 3.176s-1.422 3.176-3.176 3.176c-1.754 0-3.176-1.422-3.176-3.176v0c0.002-1.753 1.423-3.174 3.176-3.176h0zM30.822 19.84c-0.878-3.894-4.308-6.759-8.406-6.759-0.423 0-0.839 0.031-1.246 0.089l0.046-0.006c-0.049 0.012-0.092 0.028-0.133 0.047l0.004-0.002c-0.751-2.129-2.745-3.627-5.089-3.627-2.334 0-4.321 1.485-5.068 3.561l-0.012 0.038c-0.017-0.004-0.030-0.014-0.047-0.017-0.359-0.053-0.773-0.084-1.195-0.084-0.002 0-0.005 0-0.007 0h0c-4.092 0.018-7.511 2.874-8.392 6.701l-0.011 0.058c-0.011 0.048-0.017 0.103-0.017 0.16 0 0.414 0.336 0.75 0.75 0.75 0.357 0 0.656-0.25 0.731-0.585l0.001-0.005c0.737-3.207 3.56-5.565 6.937-5.579h0.002c0.335 0 0.664 0.024 0.985 0.070l-0.037-0.004c-0.008 0.119-0.036 0.232-0.036 0.354 0.006 2.987 2.429 5.406 5.417 5.406s5.411-2.419 5.416-5.406v-0.001c0-0.12-0.028-0.233-0.036-0.352 0.016-0.002 0.031 0.005 0.047 0.001 0.294-0.044 0.634-0.068 0.98-0.068 0.004 0 0.007 0 0.011 0h-0.001c3.379 0.013 6.203 2.371 6.93 5.531l0.009 0.048c0.076 0.34 0.375 0.589 0.732 0.59h0c0.057-0 0.112-0.007 0.165-0.019l-0.005 0.001c0.34-0.076 0.59-0.375 0.59-0.733 0-0.057-0.006-0.112-0.018-0.165l0.001 0.005zM16 18.916c-0 0-0 0-0.001 0-2.163 0-3.917-1.753-3.917-3.917s1.754-3.917 3.917-3.917c2.163 0 3.917 1.754 3.917 3.917 0 0 0 0 0 0.001v-0c-0.003 2.162-1.754 3.913-3.916 3.916h-0z" />
                            </g>
                        </svg></span>
                    <div class="text_wrapper">
                        <p>Total guest</p>
                        <h3><?php 
                        display_allguest();
                        ?></h3>
                    </div>
                </div>
                <div class="card_wrapper">
                    <span><svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path d="M16.7071 14.2929C17.0976 14.6834 17.0976 15.3166 16.7071 15.7071C16.3166 16.0976 15.6834 16.0976 15.2929 15.7071L12.3799 12.7941C12.3649 12.7791 12.3503 12.7637 12.3363 12.748C12.13 12.5648 12 12.2976 12 12C12 11.7024 12.13 11.4352 12.3363 11.252C12.3503 11.2363 12.3649 11.2209 12.3799 11.2059L15.2929 8.29289C15.6834 7.90237 16.3166 7.90237 16.7071 8.29289C17.0976 8.68342 17.0976 9.31658 16.7071 9.70711L15.4142 11H21C21.5523 11 22 11.4477 22 12C22 12.5523 21.5523 13 21 13H15.4142L16.7071 14.2929Z" fill="rgb(9, 72, 109)"></path>
                                <path d="M5 2C3.34315 2 2 3.34315 2 5V19C2 20.6569 3.34315 22 5 22H14.5C15.8807 22 17 20.8807 17 19.5V16.7326C16.2351 17.1747 15.2401 17.0686 14.5858 16.4142L11.6728 13.5012C11.658 13.4865 11.6435 13.4715 11.6292 13.4563C11.2431 13.0928 11 12.5742 11 12C11 11.4258 11.2431 10.9072 11.6292 10.5437C11.6435 10.5285 11.658 10.5135 11.6728 10.4988L14.5858 7.58579C15.2402 6.93142 16.2351 6.82529 17 7.26738V4.5C17 3.11929 15.8807 2 14.5 2H5Z" fill="rgb(9, 72, 109)"></path>
                                </path>
                            </g>
                        </svg></span>
                    <div class="text_wrapper">
                        <p>In-room guest</p>
                        <h3><?php 
                        display_Statsguest();
                        ?></h3>
                    </div>
                </div>
            </div>
            <div class="card_container">
                <div class="card_wrapper">
                    <span><svg width="40px" height="40px" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" fill="rgb(9, 72, 109)" stroke="rgb(9, 72, 109)">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                        <g id="Layer_2" data-name="Layer 2"> <g id="invisible_box" data-name="invisible box"> 
                        </g> <g id="icons_Q2" data-name="icons Q2"> 
                        <path d="M32.4,23.6a1.9,1.9,0,0,0-2.8,0L21,32.2l-3.6-3.6a2,2,0,0,0-3.1.2,2.2,2.2,0,0,0,.4,2.7l4.9,4.9a1.9,1.9,0,0,0,2.8,0l10-10A1.9,1.9,0,0,0,32.4,23.6Zm0,0a1.9,1.9,0,0,0-2.8,0L21,32.2l-3.6-3.6a2,2,0,0,0-3.1.2,2.2,2.2,0,0,0,.4,2.7l4.9,4.9a1.9,1.9,0,0,0,2.8,0l10-10A1.9,1.9,0,0,0,32.4,23.6Z"></path> <path d="M44,8H35V4.1A2.1,2.1,0,0,0,33.3,2,2,2,0,0,0,31,4V8H17V4.1A2.1,2.1,0,0,0,15.3,2,2,2,0,0,0,13,4V8H4a2,2,0,0,0-2,2V42a2,2,0,0,0,2,2H44a2,2,0,0,0,2-2V10A2,2,0,0,0,44,8ZM42,40H6V20H42Zm0-24H6V12H42Z">
                    </path> </g> </g> </g></svg></span>
                    <div class="text_wrapper">
                        <p>Available Rooms </p>
                        <h3><?php 
                       display_availablerooms();
                        ?></h3>
                    </div>
                </div>
                
                <div class="card_wrapper">
                    <span><svg fill="rgb(9, 72, 109)" width="38px" height="38px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier"> 
                        <path d="M1694.176 451.765H225.942V282.353c0-31.624 24.846-56.471 56.47-56.471h169.411v56.471c0 31.623 24.848 56.471 56.471 56.471 31.624 0 56.471-24.848 56.471-56.471v-56.471h790.589v56.471c0 31.623 24.846 56.471 56.47 56.471 31.623 0 56.47-24.848 56.47-56.471v-56.471h169.412c31.623 0 56.47 24.847 56.47 56.471v169.412ZM847.118 1491.953l-378.353-379.482 79.058-79.059 299.295 298.164 525.176-524.047 79.06 79.059-604.236 605.365Zm790.588-1379.012h-169.412v-56.47c0-31.624-24.847-56.471-56.47-56.471-31.624 0-56.47 24.847-56.47 56.471v56.47H564.765v-56.47C564.765 24.847 539.918 0 508.294 0c-31.623 0-56.471 24.847-56.471 56.471v56.47H282.412C188.671 112.941 113 188.612 113 282.353V1920h1694.118V282.353c0-93.741-75.671-169.412-169.412-169.412Z" fill-rule="evenodd">
                    </path> </g></svg></span>
                    <div class="text_wrapper">
                        <p>Occupied Rooms</p>
                        <h3><?php   
                        display_Occupiedroom();
                         ?></h3>
                    </div>

                </div>
            </div>
        </div>
        <div class="add_button" id="add_costumer_modal">
            <button><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="table_wrapper">
            <div class="filter_wrapper">
                <h1>Today</h1>
                <input type="text" id="fillter_today" placeholder="Search...." autocomplete="off">
            </div>
            <div class="dashboard_table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Room Number</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Guest</th>
                        <th>Room Type</th>
                    </tr>
                </thead>
             
                <tbody>
                <?php
               display_today();
                ?>
                </tbody>
            </table>
            </div>
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
                    <select class="validation2" id="roomnumber_select" required>
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