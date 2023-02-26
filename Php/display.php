<?php
require 'connection.php';

//  DISPLAY ROOM TYPE
function display_roomtype()
{
    global $db;

    $query = "SELECT * FROM rtype";
    $res = mysqli_query($db, $query);
    if ($res) {
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td id="r-type-' . $row['id'] . '">' . $row['RoomType'] . ' </td>';
            echo '<td id="r-description-' . $row['id'] . '">' . $row['RoomDescription'] . ' </td>';
            echo '<td id="r-price-' . $row['id'] . '">' . $row['RoomPrice'] . ' </td>';
            echo '<td id="r-capacity-' . $row['id'] . '">' . $row['RoomCapacity'] . ' </td>';
            echo '<td id="r-package-' . $row['id'] . '">' . $row['Package'] . ' </td>';
            echo '<td><button type="button" class="edit_icon" onclick = "Editroomtype(' . $row['id'] . ')"><i class="fa-regular fa-pen-to-square"></i></button></td>';
            echo '<td><button type="button" class="delete_icon" onclick = "Deleteroomtype(' . $row['id'] . ')"><i class="fa-solid fa-x"></i></button></td>';
            echo '</tr>';
        }
    }
}

// DISPLAY TRANSACTION
function display_transaction()
{
    global $db;
    $query = "SELECT a.Costumer_name,
    b.Guest,
    b.Amount,
    b.Payments,
    b.Balance,
    b.id,
    d.roomNumber,
    e.RoomType,
    e.RoomPrice,
    e.Package
    FROM users as a
    RIGHT JOIN trans as b
    ON a.id = b.users_id
    RIGHT JOIN usertrans as c
    ON b.id = c.trans_id
    LEFT JOIN rooms as d
    ON c.room_id = d.id
    LEFT JOIN rtype as e
    ON d.roomtype_id = e.id WHERE b.Balance > 0 ORDER BY b.id ASC";
    $result = mysqli_query($db, $query);

    if ($result) {
        foreach ($result as $row) {
            echo '<tr class="search">';
            echo '<td>' . $row['Costumer_name'] . ' </td>';
            echo '<td>' . $row['roomNumber'] . ' </td>';
            echo '<td>' . $row['RoomType'] . ' </td>';
            echo '<td>' . $row['Package'] . ' </td>';
            echo '<td id="update_guest-' . $row['id'] . '" >' . $row['Guest'] . ' </td>';
            echo '<td>' . $row['RoomPrice'] . ' </td>';
            echo '<td id="update_amount-' . $row['id'] . '" >' . $row['Amount'] . ' </td>';
            echo '<td id="update_payment-' . $row['id'] . '" >' . $row['Payments'] . ' </td>';
            echo '<td id="update_balance-' . $row['id'] . '" >' . $row['Balance'] . ' </td>';
            echo '<td><button type="button" class="edit_icon" onclick = "Editpayment(' . $row['id'] . ')"><i class="fa-regular fa-pen-to-square"></i></button></td>';
            echo '</tr>';
        }
    }
}

// Display Transaction (Guest)
function display_costumer()
{
    global $db;

    $query = "SELECT a.Costumer_name,
    a.Contact,
    a.Gender,
    a.Home_add,
    b.Guest,
    b.Stats,
    b.Payments,
    b.id,
    b.Amount ,
    b.checkin,
    b.checkout,
    b.Balance,
    d.roomNumber,
    d.id as roomid,
    e.RoomPrice
    FROM users AS a
    RIGHT JOIN trans AS b 
    ON a.id = b.users_id
    RIGHT JOIN usertrans AS c 
    ON b.id = c.trans_id
    LEFT JOIN rooms AS d
    ON c.room_id =  d.id
    LEFT JOIN rtype AS e
    ON d.roomtype_id = e.id WHERE b.Stats = 'Occupied' ";
    $query_costumer = mysqli_query($db, $query);

    if ($query_costumer) {
        foreach ($query_costumer as $row) {
            echo '<tr>';
            echo '<td> ' . $row['roomNumber'] . '</td>';
            echo '<td> ' . $row['Costumer_name'] . '</td>';
            echo '<td> ' . $row['Guest'] . '</td>';
            echo '<td>  ' . $row['checkin'] . '</td>';
            echo '<td id="checkout-' . $row['id'] . '"> ' . $row['checkout'] . '</td>';
            echo '<td id="stats-' . $row['id'] . '">' . $row['Stats'] . ' </td>';
            echo '<input type="hidden" id="amount-' . $row['id'] . '"  value = "' . $row['Amount'] . '">';
            echo '<input type="hidden" id="payment-' . $row['id'] . '"  value = "' . $row['Payments'] . '">';
            echo '<input type="hidden" id="balance-' . $row['id'] . '"  value = "' . $row['Balance'] . '">';
            echo '<input type="hidden" id="price-' . $row['id'] . '"  value = "' . $row['RoomPrice'] . '">';
            echo '<input type="hidden" id="roomnumber-' . $row['id'] . '" value = "' . $row['roomid'] . '">';
            echo '<td><button type="button" class="edit_icon" onclick = "Editcheckin(' . $row['id'] . ')"><i class="fa-regular fa-pen-to-square"></i></button></td>';
            echo '<td><button type="button" class="delete_icon" onclick = "Checkoutguest(' . $row['id'] . ')"><i class="fa-solid fa-x"></i></button></td>';
            echo '</tr>';
        }
    }
}

function display_checkout()
{
    global $db;

    $query = "SELECT a.Costumer_name,
    a.Contact,
    a.Gender,
    a.Home_add,
    b.Guest,
    b.Stats,
    b.id,
    b.checkin,
    b.checkout,
    d.roomNumber,
    d.id as roomid,
    e.RoomPrice
    FROM users AS a
    RIGHT JOIN trans AS b 
    ON a.id = b.users_id
    RIGHT JOIN usertrans AS c 
    ON b.id = c.trans_id
    LEFT JOIN rooms AS d
    ON c.room_id =  d.id
    LEFT JOIN rtype AS e
    ON d.roomtype_id = e.id WHERE b.Stats = 'Un Occupied' ";
    $query_costumer = mysqli_query($db, $query);

    if ($query_costumer) {
        foreach ($query_costumer as $row) {
            echo '<tr>';
            echo '<td> ' . $row['roomNumber'] . '</td>';
            echo '<td> ' . $row['Costumer_name'] . '</td>';
            echo '<td> ' . $row['Guest'] . '</td>';
            echo '<td>  ' . $row['checkin'] . '</td>';
            echo '<td id="checkout-' . $row['id'] . '"> ' . $row['checkout'] . '</td>';
            echo '<td id="stats-' . $row['id'] . '">' . $row['Stats'] . ' </td>';
            echo '</tr>';
        }
    }
}

// DISPLAY ROOMS
function display_room()
{
    global $db;

    $query = " SELECT rtype.RoomType,
    rooms.RoomNumber,
    rooms.Stats,
    rooms.roomtype_id,
    rooms.id
    FROM rtype 
    INNER JOIN rooms
    ON rtype.id = rooms.roomtype_id 
    ORDER BY id ASC";
    $res = mysqli_query($db, $query);
    if ($res) {
        foreach ($res as $row) {
            echo '<tr>';
            echo '<td id="room-number-' . $row['id'] . '">' . $row['RoomNumber'] . '</td>';
            echo '<td id="room-type-' . $row['id'] . '" data-id="' . $row['roomtype_id'] . '">' . $row['RoomType'] . ' </td>';
            echo '<td id="room-stats-' . $row['id'] . '" data-stats="' . $row['Stats'] . '">' . $row['Stats'] . '</td>';
            echo '<td><button type="button" class="edit_icon" onclick = "Editroom(' . $row['id'] . ')"><i class="fa-regular fa-pen-to-square"></i></button></td>';
            echo '<td><button type="button" class="delete_icon" onclick = "Deleteroom(' . $row['id'] . ')"><i class="fa-solid fa-x"></i></button></td>';
            echo '</tr>';
        }
    }
}

// DISPLAY SELECT (ROOM TYPE)
function select_roomtype_display()
{
    global $db;
    $query = "SELECT * FROM  rtype";
    $res = mysqli_query($db, $query);

    if ($res) {
        foreach ($res as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['RoomType'] . '</option>';
        }
    }
}
// DISPLAY SELECT(ROOM TYPE)
function select_roomtype()
{
    global $db;
    $query = "SELECT RoomType,id From rtype";
    $result = mysqli_query($db, $query);
    if ($result) {
        foreach ($result as $row) {
            echo ' <option value="' . $row['id'] . '">' . $row['RoomType'] . '</option>';
        }
    }
}

if (isset($_POST['request'])) {
    $request = $_POST['request'];

    $json = array();
    $query = "SELECT rooms.RoomNumber,
    rooms.id,
    rooms.roomtype_id,
    rtype.RoomPrice,
    rtype.Package,
    rtype.RoomCapacity,
    rooms.Stats
    FROM rtype
    INNER JOIN rooms
    ON rtype.id = rooms.roomtype_id
    WHERE rooms.roomtype_id = '$request' AND rooms.Stats = 'Available'";
    $res = mysqli_query($db, $query);
    if ($res) {
        foreach ($res as $row) {
            array_push($json, $row);
        }
        echo json_encode($json);
    }
}

// DISPAY ALL RECORDS
function display_records()
{
    global $db;

    $sql_select = "SELECT a.Costumer_name,
        a.Contact,
        a.Home_add,
        b.Guest,
        b.checkin,
        b.checkout,
        b.Payments,
        d.RoomNumber,
        e.RoomType
        FROM users AS a
        RIGHT JOIN trans AS b 
        ON a.id = b.users_id
        RIGHT JOIN usertrans AS c 
        ON b.id = c.trans_id
        LEFT JOIN rooms AS d
        ON c.room_id =  d.id
        LEFT JOIN rtype AS e
        ON d.roomtype_id = e.id ";
        $query_select = mysqli_query($db, $sql_select);
            if($query_select){
                foreach($query_select as $row){
                    echo '<tr class="search">';
                    echo '<td>' . $row['RoomNumber'] . ' </td>';
                    echo '<td>' . $row['RoomType'] . ' </td>';
                    echo '<td>' . $row['Costumer_name'] . ' </td>';
                    echo '<td>' . $row['Contact'] . ' </td>';
                    echo '<td>' . $row['Home_add'] . ' </td>';
                    echo '<td>' . $row['Guest'] . ' </td>';
                    echo '<td>' . $row['checkin'] . ' </td>';
                    echo '<td>' . $row['checkout'] . ' </td>';
                    echo '<td>' . $row['Payments'] . ' </td>';
                    echo '</tr>';
                }
            }
}

if(isset ($_POST ['search'])){
    global $db;

    $search = $_POST['search'];

    $json = array();
        $query = "SELECT a.Costumer_name,
        b.Guest,
        b.Amount,
        b.Payments,
        b.Balance,
        d.roomNumber,
        e.RoomType,
        e.RoomPrice,
        e.Package
        FROM users as a
        RIGHT JOIN trans as b
        ON a.id = b.users_id
        RIGHT JOIN usertrans as c
        ON b.id = c.trans_id
        LEFT JOIN rooms as d
        ON c.room_id = d.id
        LEFT JOIN rtype as e
        ON d.roomtype_id = e.id WHERE a.costumer_name LIKE '{$search}%' LIMIT 5";
        $search_costumer = mysqli_query($db,$query);
    
        if(mysqli_num_rows($search_costumer) > 0){
            foreach($search_costumer as $costumers){
                array_push($json, $costumers);
            }   
            echo json_encode($json);   
        }
}

// COUNT TOTAL GUEST
    function display_availablerooms(){
  
        global $db;
        $query = "SELECT count(id) as rooms FROM rooms WHERE Stats = 'Available'";
        $count_id = mysqli_query($db,$query);
        $values = mysqli_fetch_assoc($count_id);
            $total = $values['rooms'];
            echo $total;  
    }
    function display_allguest(){
  
        global $db;
        $query = "SELECT count(id) as trans FROM trans ";
        $count_id = mysqli_query($db,$query);
        $values = mysqli_fetch_assoc($count_id);
            $total = $values['trans'];
            echo $total;      
    }
    function display_Statsguest(){
  
        global $db;
        $query = "SELECT count(id) as stats FROM trans WHERE Stats = 'Occupied' ";
        $count_id = mysqli_query($db,$query);
        $values = mysqli_fetch_assoc($count_id);
            $total = $values['stats'];
            echo $total;      
    }
    function display_Occupiedroom(){
  
        global $db;
        $query = "SELECT count(id) as stats_room FROM rooms WHERE Stats = 'Occupied'";
        $count_id = mysqli_query($db,$query);
        $values = mysqli_fetch_assoc($count_id);
            $total = $values['stats_room'];
            echo $total;  
    }
