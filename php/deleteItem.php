<?php 

session_start();

require "../php/db.php";

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

//retrieve the id sent from the other page
$id = $data['ID'];

if (!$id) {
    echo json_encode(['status' => 'error', 'message' => 'id has no value']);
    exit();
}

$email = $_SESSION['email'];

//delete from db
$sql = "DELETE FROM cart WHERE id = ? AND email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $id, $email);   

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo json_encode(['status' => 'success', 'message' => 'Item deleted']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No item found or unauthorized']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to delete']);
}

$stmt->close();
$conn->close();

//cntrl f5 fixed the errors i was having. Refreshes the entire browser cache. PHP coders best friend.






?>