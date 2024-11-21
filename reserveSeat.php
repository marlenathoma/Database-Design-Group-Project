<?php
include('db.php');

$data = json_decode(file_get_contents('php://input'), true);
$seat_number = $data['seat_number'];
$event_id = $_POST['event_id']; // Event ID should be passed in the request


$stmt = $pdo->prepare("SELECT * FROM seats WHERE seat_number = ? AND event_id = ? AND status = 'available'");
$stmt->execute([$seat_number, $event_id]);

if ($stmt->rowCount() > 0) {
    // Update seat status to reserved
    $updateStmt = $pdo->prepare("UPDATE seats SET status = 'reserved' WHERE seat_number = ? AND event_id = ?");
    $updateStmt->execute([$seat_number, $event_id]);

    
    $user_id = $_SESSION['user_id'];
    $seat_id = $stmt->fetch()['seat_id']; // Get the seat ID
    $bookingStmt = $pdo->prepare("INSERT INTO bookings (user_id, event_id, seat_id) VALUES (?, ?, ?)");
    $bookingStmt->execute([$user_id, $event_id, $seat_id]);

    echo json_encode(['message' => 'Seat reserved successfully!']);
} else {
    echo json_encode(['message' => 'Seat is not available.']);
}
?>
