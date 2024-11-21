<?php

$booking_id = $_POST['booking_id'];
$payment_status = 'paid'; // For simplicity, assuming payment is successful

$stmt = $pdo->prepare("UPDATE bookings SET payment_status = ? WHERE booking_id = ?");
$stmt->execute([$payment_status, $booking_id]);

echo "Payment successful!";
?>
