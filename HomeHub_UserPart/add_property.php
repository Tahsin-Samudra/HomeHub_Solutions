<?php
session_start();
include "seller_database.php";

$db = new Database();
$conn = $db->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_SESSION['user_id'])) {
        die("You must be logged in as a seller to add a property.");
    }

    $seller_id             = $_SESSION['user_id'];
    $property_title        = $_POST['property_title'];
    $property_type         = $_POST['property_type'];
    $property_price        = $_POST['property_price'];
    $property_location     = $_POST['property_location'];
    $property_size         = $_POST['property_size'];
    $bedrooms               = $_POST['bedrooms'];
    $bathrooms              = $_POST['bathrooms']; // form field name stays correct
    $property_description  = $_POST['property_description'];

    $admin_status = 'Pending';
    $sale_status  = 'Available';

    $stmt = $conn->prepare(
        "INSERT INTO `properties table`(`property_id`, `seller_id`, `property_title`, `property_location`, `property_size`, `bedrooms`, `bathroms`, `property_description`, `admin_status`, `sale_status`, `created_at`, `property_price`, `property_type`)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "issiiisssds",
        $seller_id,
        $property_title,
        $property_location,
        $property_size,
        $bedrooms,
        $bathrooms,
        $property_description,
        $admin_status,
        $sale_status,
        $property_price,
        $property_type
    );

    if ($stmt->execute()) {
        header("Location: seller.php#properties");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>