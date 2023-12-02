<?php
// 建立與資料庫的連線
$conn = new mysqli("localhost", "root", "", "hotel_db");

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 從 POST 請求中取得表單資料
$name = $_POST['name'];
$contactPhone = $_POST['contact-phone'];
$email = $_POST['email'];
$checkIn = $_POST['check-in'];
$checkOut = $_POST['check-out'];
$guests = $_POST['guests'];
$roomNumber = $_POST['room-number'];

// 將資料插入資料庫
$sql = "INSERT INTO reservations (name, contact_phone, email, check_in, check_out, guests, room_number) 
        VALUES ('$name', '$contactPhone', '$email', '$checkIn', '$checkOut', '$guests', '$roomNumber')";

if ($conn->query($sql) === TRUE) {
    // 若預訂成功，使用 header 函式重定向至 reservation-success.html
    header("Location: reservation-success.html");
    exit(); // 重定向後，確保終止腳本執行
} else {
    echo "錯誤: " . $sql . "<br>" . $conn->error;
}

// 關閉資料庫連線
$conn->close();
?>
