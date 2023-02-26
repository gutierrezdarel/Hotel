<?php

$db = new mysqli("localhost", "root", "");
if ($db->connect_errno > 0) {
  die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->query("CREATE DATABASE IF NOT EXISTS `Hotel`");

mysqli_select_db($db, "Hotel");

$admin = "CREATE TABLE IF NOT EXISTS administration(id int(3) NOT NULL auto_increment,
          Username varchar(100),
          Pass varchar(100),
          PRIMARY KEY (id))";
$db->query($admin);


$type = "CREATE TABLE IF NOT EXISTS rtype(id int(2) NOT NULL auto_increment,
      RoomType varchar(50)NOT NULL,
      RoomDescription varchar(500)NOT NULL,
      RoomPrice int(6)NOT NULL,  
      RoomCapacity int(2)NOT NULL,
      Package varchar(100)NOT NULL, 
      PRIMARY KEY (id))";
$db->query($type);


$Rooms = "CREATE TABLE IF NOT EXISTS rooms(id int(3) NOT NULL auto_increment,
      
      roomtype_id int(2) NOT NULL,
      RoomNumber int(3)NOT NULL,
      Stats varchar(50)NOT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY(roomtype_id) REFERENCES rtype(id)
      )";
$db->query($Rooms);


$users = "CREATE TABLE IF NOT EXISTS users(id int(6)  NOT NULL auto_increment,
      Costumer_name varchar(100)NOT NULL,
      Contact varchar(50)NOT NULL,
      Gender varchar(50)NOT NULL,
      Home_add varchar(100)NOT NULL,
      PRIMARY KEY(id))";

$db->query($users);


$Transaction = "CREATE TABLE IF NOT EXISTS trans(id int(6) NOT NULL auto_increment,
      users_id int(6) NOT NULL,
      checkin varchar(50) ,
      checkout varchar(50) ,
      Guest int(2) ,
      Stats varchar(50) ,
      Amount int(5) ,
      Payments int(5),   
      Balance int(5),
      PayStats varchar(50) ,
      PRIMARY KEY (id),
      FOREIGN KEY(users_id) REFERENCES users(id)
      )";
$db->query($Transaction);


$usertrans = "CREATE TABLE IF NOT EXISTS usertrans(id int(6) NOT NULL auto_increment,
      room_id int(3) NOT NULL,
      trans_id int(6) NOT NULL,
      PRIMARY KEY (id),
      FOREIGN KEY(room_id) REFERENCES rooms(id),
      FOREIGN KEY(trans_id) REFERENCES trans(id) 
      )";
$db->query($usertrans);


$sql = "SELECT * FROM administration ";
$result = mysqli_query($db, $sql); 
$count = mysqli_num_rows($result);                
if ($count == 0) {

  $query = "INSERT INTO administration(Username,Pass)
      VALUES('Admin','admin')";
      $db->query($query);

}