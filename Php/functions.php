<?php
require 'connection.php';

if (isset($_POST['Addroomtype'])) {
    insert_roomtype();
}
if (isset($_POST['Addrooms'])) {
    insert_room();
}

if (isset($_POST['costumer'])) {
    if ($_POST['costumer'] == 'add_costumer') {
        insert_transaction();
    }
}

if (isset($_POST['checkout_action'])) {
    if ($_POST['checkout_action'] == 'update_guest') {
        update_date();
    } else if ($_POST['checkout_action'] == 'checkout_guest') {
        update_status();
    }
}

if (isset($_POST['editroom_action'])) {
    if ($_POST['editroom_action'] == 'Editroomtype') {
        Update_roomtype();
    } else if ($_POST['editroom_action'] == 'Deleteroomtype') {
        remove_roomtype();
    }
}

if (isset($_POST['room_action'])) {
    if ($_POST['room_action'] == 'Update_room') {
        update_rooms();
    } else if ($_POST['room_action'] == 'Delete_room') {
        delete_room();
    }
}

if (isset($_POST['payment_action'])) {
    if ($_POST['payment_action'] == 'update_transaction') {
        update_payment();
    }
}
function e($data)
{
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

// ADDING ROOM TYPE
function insert_roomtype()
{
    global $db;
    $room_type = e($_POST['roomtype']);
    $room_description = e($_POST['roomdescription']);
    $room_package = e($_POST['roompackage']);
    $room_price = e($_POST['roomprice']);
    $room_capacity = e($_POST['roomcapacity']);


    $query = "INSERT INTO rtype (RoomType,RoomDescription,RoomPrice,RoomCapacity,Package) VALUES('$room_type','$room_description','$room_price','$room_capacity','$room_package')";
    $res = mysqli_query($db, $query);
    if ($res) {
        header('location:../Room_type.php');
    } else {
        echo ' Not Inserted';
    }
}

// UPDATING ROOM TYPE
function Update_roomtype()
{
    global $db;

    $id = $_POST['id'];
    $update_roomtype = $_POST['update_roomtype'];
    $update_roomdescription = $_POST['update_roomdescription'];
    $update_roomprice = $_POST['update_roomprice'];
    $update_roomcapacity = $_POST['update_roomcapacity'];
    $update_roompackage = $_POST['update_roompackage'];

    if (
        empty($update_roomtype) || empty($update_roomdescription) || empty($update_roomprice) ||
        empty($update_roomcapacity) || empty($update_roompackage)
    ) {
        echo 'empty';
    } else {
        $sql_count = "SELECT count(roomtype_id) as update_roomtype FROM rooms WHERE Stats = 'Occupied' AND roomtype_id = '$id'";
        $count_id = mysqli_query($db, $sql_count);
        $count = mysqli_fetch_assoc($count_id);
        if ($count['update_roomtype'] > 0) {
            echo 'roomtype inuse';
        } else {
            $sql_update = "UPDATE rtype SET RoomType = '$update_roomtype',RoomDescription = '$update_roomdescription', RoomPrice= '$update_roomprice',
                                   RoomCapacity= '$update_roomcapacity', Package = '$update_roompackage' WHERE id ='$id' ";
            $query_update = mysqli_query($db, $sql_update);
            if ($query_update) {
                echo 'Updated';
            } else {
                echo 'not updated';
            }
        }
    }
}

// REOMEVE ROOM TYPE
function remove_roomtype()
{
    global $db;
    $id = $_POST['remove_id'];

    $sql_count = "SELECT count(roomtype_id) as roomtype FROM rooms WHERE Stats = 'Occupied' AND roomtype_id = '$id'";
    $count_id = mysqli_query($db, $sql_count);
    $count = mysqli_fetch_assoc($count_id);
    if ($count['roomtype'] > 0) {
        echo 'cannot delete';
    } else {
        $sql_delete = "DELETE FROM rooms WHERE roomtype_id = '$id'";
        $query_delete = mysqli_query($db, $sql_delete);
        if ($query_delete) {
            $sql_deleterooomtype = "DELETE FROM rtype WHERE id = '$id'";
            $query_deleterooomtype = mysqli_query($db, $sql_deleterooomtype);
            if ($query_deleterooomtype) {
                echo 'deleted';
            }
        }
    }
}

//ADDING ROOMS 
function insert_room()
{
    global $db;

    $room_number = e($_POST['roomnumber']);
    $room_type = $_POST['roomtype_select'];
    $room_status = e($_POST['roomstatus_select']);

    $sql_insert = "INSERT INTO rooms(roomtype_id,RoomNumber,Stats) VALUES('$room_type','$room_number','$room_status')";
    $res = mysqli_query($db, $sql_insert);
    if ($res) {
        header('location: ../Rooms.php');
        // echo 'added room';
    } else {
        echo 'Not inserted';
    }
}

// UPDATE ROOMS
function update_rooms()
{
    global $db;

    $id = $_POST['id'];
    $update_roomnumber = $_POST['update_roomnumber'];
    $update_roomtype = $_POST['update_roomtype'];
    $update_status = $_POST['update_status'];

    $sql_select = "SELECT Stats FROM rooms WHERE id = '$id'";
    $query_select = mysqli_query($db, $sql_select);
    if ($query_select) {
        foreach ($query_select as $row) {
            if ($row['Stats'] == 'Occupied') {
                echo 'used';
            } else {
                $sql_update = "UPDATE rooms SET roomtype_id = '$update_roomtype', RoomNumber ='$update_roomnumber', Stats = '$update_status' WHERE id = '$id'";
                $query_update = mysqli_query($db, $sql_update);
                if ($query_update) {
                    echo 'successs';
                }
            }
        }
    }
}

// DELETE ROOMS
function delete_room()
{
    global $db;
    $id = $_POST['remove_id'];

    $sql_select = "SELECT Stats FROM rooms WHERE id = '$id'";
    $query_select = mysqli_query($db, $sql_select);
    if ($query_select) {
        foreach ($query_select as $row) {
            if ($row['Stats'] == 'Occupied') {
                echo 'used';
            } else {
                $sql_delete = "DELETE FROM usertrans WHERE room_id = '$id'";
                $query_delete = mysqli_query($db, $sql_delete);
                if ($query_delete) {
                    $sql_deleteroom = "DELETE FROM rooms WHERE id = '$id'";
                    $query_deleteroom = mysqli_query($db, $sql_deleteroom);
                    if ($query_delete) {
                        echo 'deleted';
                    }
                }
            }
        }
    }
}

// ADDING TRANSACTIONS
function insert_transaction()
{
    global $db;

    $name = e($_POST['name']);
    $contact = e($_POST['contact']);
    $address = e($_POST['address']);
    $gender = e($_POST['gender']);
    $checkin = e($_POST['checkin']);
    $checkout = e($_POST['checkout']);
    $roomnumber = e($_POST['roomnumber']);
    $guest = e($_POST['guest']);
    $total = e($_POST['total']);
    $payment = e($_POST['payment']);
    $balance = e($_POST['balance']);

    $query = "INSERT INTO users(Costumer_name,Contact,Gender,Home_add)VALUES('$name','$contact','$gender','$address')";
    $costumer_info = mysqli_query($db, $query);
    if ($costumer_info) {
        $user_id = mysqli_insert_id($db);
        $query2 = " INSERT INTO trans (users_id,checkin,checkout,Guest,Stats,Amount,Payments,Balance)VALUES
                                            ('$user_id','$checkin','$checkout','$guest','Occupied','$total','$payment','$balance')";
        $transaction =  mysqli_query($db, $query2);
        if ($transaction) {
            $transaction_id = mysqli_insert_id($db);
            $query3 = "INSERT INTO usertrans(room_id,trans_id)VALUES('$roomnumber','$transaction_id')";
            mysqli_query($db, $query3);
        }
    }
    $update_rooms = "UPDATE rooms SET Stats ='Occupied' WHERE id = '$roomnumber'";
    $rooms =  mysqli_query($db, $update_rooms);
    if ($rooms) {
        echo 'added';
    }
}

// UPDATE PAYMENT
function update_payment()
{
    global $db;

    $id = $_POST['id'];
    $payment = $_POST['payment'];
    $balance = $_POST['balance'];

    $sql_update = "UPDATE trans SET Payments = '$payment' , Balance = '$balance' WHERE id = '$id'";
    $query_update = mysqli_query($db, $sql_update);
    if ($query_update) {
        echo 'updated';
    } else {
        echo 'not updated';
    }
}


// UPDATE extend DATE
function update_date()
{
    global $db;

    $id = $_POST['id'];
    $update_balance = $_POST['update_balance'];
    $update_checkout = $_POST['update_checkout'];
    $update_amount = $_POST['update_amount'];

    $sql_update = "UPDATE trans SET Balance = '$update_balance', checkout = '$update_checkout', Amount = '$update_amount' WHERE id = '$id'";
    $query_update = mysqli_query($db, $sql_update);
    if ($query_update) {
        echo 'updated';
    } else {
        echo 'not update';
    }
}

// UPDATE STATUS (CHECKOUT)
function update_status()
{
    global $db;
    $checkout_id = $_POST['checkout_id'];
    $today = $_POST['today'];
    $roomnumber_id = $_POST['roomnumber_id'];

    $sql_select = "SELECT Balance FROM trans WHERE id = '$checkout_id'";
    $query_select = mysqli_query($db, $sql_select);
    if ($query_select) {
        foreach ($query_select as $row) {
            if ($row['Balance'] == 0) {
                $sql_update = "UPDATE trans SET Stats = 'Un Occupied', checkout = '$today' WHERE id = '$checkout_id'";
                $query_update = mysqli_query($db, $sql_update);
                if ($query_update) {
                    $sql_updateroom = "UPDATE rooms SET Stats = 'Available' WHERE id = '$roomnumber_id'";
                    $query_updateroom = mysqli_query($db, $sql_updateroom);
                    if ($query_updateroom) {
                        echo 'status Updated';
                    }
                }
            } else {
                echo 'Remaining balance';
            }
        }
    }
}
