<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0"
>

<title>Seller Portal | HomeHub</title>

<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard-layout">

<!-- Sidebar -->

<aside class="sidebar">

<div>

<div class="brand">
Home<span>Hub</span>
</div>

<p class="user-role">
Seller Portal
</p>

<ul class="nav-links">

<li>
<a href="#dashboard" class="active">
Dashboard
</a>
</li>

<li>
<a href="#add-listing">
Add New Listing
</a>
</li>

<li>
<a href="#properties">
My Properties
</a>
</li>

<li>
<a href="#requests">
Buyer Requests
</a>
</li>

<li>
<a href="#earnings">
Earnings &amp; Sales
</a>
</li>

<li>
<a href="#seller-profile">
Profile
</a>
</li>

</ul>

</div>


<div class="sidebar-bottom">

<a href="buyer.html">
Buyer Portal
</a>

<a href="index.html" class="logout">
Logout
</a>

</div>

</aside>


<!-- Main Content -->

<div class="main-wrapper">

<header class="top-header">

<div>

<p>
Seller Workspace
</p>

<h2>
Property Management Dashboard
</h2>

</div>

<a href="#add-listing" class="btn btn-primary">
+ Add Property
</a>

</header>


<main class="page-content">

<!-- Dashboard Banner -->

<section class="welcome-banner" id="dashboard">

<div>

<p class="small-title light-title">
HOMEHUB SELLER
</p>

<h1>
Manage your properties and connect with buyers.
</h1>

<p>
Add apartments or buildings, monitor admin
approval and view future buyer requests.
</p>

</div>

<a href="#add-listing" class="btn btn-white">
Add Property
</a>

</section>


<!-- Dashboard Summary -->

<section class="summary-grid">

<div class="summary-card">

<p>
Total Properties
</p>

<h2>0</h2>

<span>
No property submitted
</span>

</div>


<div class="summary-card">

<p>
Approved Properties
</p>

<h2>0</h2>

<span>
No approved property
</span>

</div>


<div class="summary-card">

<p>
Buyer Requests
</p>

<h2>0</h2>

<span>
No buyer request
</span>

</div>


<div class="summary-card">

<p>
Total Sales
</p>

<h2>৳ 0</h2>

<span>
No completed sale
</span>

</div>

</section>


<!-- Add Property -->

<section class="card-panel" id="add-listing">

<div class="panel-header">

<div>

<p class="small-title">
NEW PROPERTY
</p>

<h2>
Add New Property for Sale
</h2>

</div>

<span class="badge pending">
Admin Approval Required
</span>

</div>


<form
class="form-grid"
action="seller_connection.php"
method="post"
enctype="multipart/form-data"
>

<!-- Property Title -->

<div class="form-group">

<label for="property-title">
Property Title
</label>

<input
type="text"
id="property-title"
name="property_title"
placeholder="Enter property title"
required
>

</div>


<!-- Property Type -->

<div class="form-group">

<label for="property-type">
Property Type
</label>

<select
id="property-type"
name="property_type"
required
>

<option value="">
Select Property Type
</option>

<option value="Apartment">
Apartment
</option>

<option value="Building">
Building
</option>

</select>

</div>


<!-- Property Price -->

<div class="form-group">

<label for="property-price">
Property Price
</label>

<input
type="text"
id="property-price"
name="property_price"
inputmode="numeric"
pattern="[0-9]+"
placeholder="Enter price in Taka"
required
>

</div>


<!-- Location -->

<div class="form-group">

<label for="property-location">
Location
</label>

<input
type="text"
id="property-location"
name="property_location"
placeholder="Enter property address"
required
>

</div>


<!-- Size -->

<div class="form-group">

<label for="property-size">
Property Size
</label>

<input
type="text"
id="property-size"
name="property_size"
inputmode="numeric"
pattern="[0-9]+"
placeholder="Enter size in square feet"
required
>

</div>


<!-- Bedrooms -->

<div class="form-group">

<label for="bedrooms">
Bedrooms
</label>

<input
type="text"
id="bedrooms"
name="bedrooms"
inputmode="numeric"
pattern="[0-9]+"
placeholder="Enter number of bedrooms"
required
>

</div>


<!-- Bathrooms -->

<div class="form-group">

<label for="bathrooms">
Bathrooms
</label>

<input
type="text"
id="bathrooms"
name="bathrooms"
inputmode="numeric"
pattern="[0-9]+"
placeholder="Enter number of bathrooms"
required
>

</div>


<!-- Images -->

<div class="form-group full-width">

<label for="property-images">
Upload Property Images
</label>

<input
type="file"
id="property-images"
name="property_images"
accept="image/*"
multiple
required
>

</div>


<!-- Description -->

<div class="form-group full-width">

<label for="property-description">
Property Description
</label>

<textarea
id="property-description"
name="property_description"
rows="5"
placeholder="Enter detailed property description"
required
></textarea>

</div>


<!-- Buttons -->

<div class="form-group full-width button-group">

<button
type="reset"
class="btn btn-outline"
>
Clear Form
</button>

<button
type="submit"
class="btn btn-primary"
>
Submit Property
</button>

</div>

</form>

</section>


<!-- My Properties -->

<section class="card-panel" id="properties">

<div class="panel-header">

<div>

<p class="small-title">
PROPERTY MANAGEMENT
</p>

<h2>
My Properties
</h2>

</div>

</div>


<div class="table-responsive">

<table>

<thead>

<tr>
<th>Property</th>
<th>Type</th>
<th>Location</th>
<th>Price</th>
<th>Bedrooms</th>
<th>Bathrooms</th>
<th>Admin Review</th>
<th>Action</th>
</tr>

</thead>


<tbody>
<?php
session_start();
include "seller_database.php";

$db = new Database();
$conn = $db->connect();

$seller_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM properties WHERE seller_id = ?");
$stmt->bind_param("i", $seller_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['property_title']) . "</td>";
        echo "<td>" . htmlspecialchars($row['property_type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['property_location']) . "</td>";
        echo "<td>৳ " . htmlspecialchars($row['property_price']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bedrooms']) . "</td>";
        echo "<td>" . htmlspecialchars($row['bathrooms']) . "</td>";
        echo "<td>" . htmlspecialchars($row['admin_status']) . "</td>";
        echo "<td><a href='#'>Edit</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'><div class='empty-message'>
            <h3>No properties added yet</h3>
            <p>Properties submitted by the seller will appear here later.</p>
          </div></td></tr>";
}
?>
</tbody>

</table>

</div>

</section>


<!-- Buyer Requests -->

<section class="card-panel" id="requests">

<div class="panel-header">

<div>

<p class="small-title">
PURCHASE REQUESTS
</p>

<h2>
Incoming Buyer Requests
</h2>

</div>

</div>


<div class="table-responsive">

<table>

<thead>

<tr>
<th>Buyer</th>
<th>Property</th>
<th>Offered Price</th>
<th>Phone</th>
<th>Message</th>
<th>Status</th>
<th>Action</th>
</tr>

</thead>


<tbody>

<tr>

<td colspan="7">

<div class="empty-message">

<h3>
No buyer requests yet
</h3>

<p>
Buyer purchase requests will appear
here after JavaScript or PHP is connected.
</p>

</div>

</td>

</tr>

</tbody>

</table>

</div>

</section>


<!-- Earnings -->

<section class="card-panel" id="earnings">

<div class="panel-header">

<div>

<p class="small-title">
SALES INFORMATION
</p>

<h2>
Earnings &amp; Sales
</h2>

</div>

</div>


<div class="sales-summary">

<div>

<p>
Total Properties Sold
</p>

<h2>0</h2>

</div>


<div>

<p>
Total Sales Amount
</p>

<h2>৳ 0</h2>

</div>

</div>


<div class="table-responsive">

<table>

<thead>

<tr>
<th>Property</th>
<th>Buyer</th>
<th>Sold Price</th>
<th>Sale Date</th>
<th>Status</th>
</tr>

</thead>


<tbody>

<tr>

<td colspan="5">

<div class="empty-message">

<h3>
No completed sales yet
</h3>

<p>
Completed sales will appear here.
</p>

</div>

</td>

</tr>

</tbody>

</table>

</div>

</section>


<!-- Seller Profile -->

<section class="card-panel" id="seller-profile">

<div class="panel-header">

<div>

<p class="small-title">
ACCOUNT SETTINGS
</p>

<h2>
Seller Profile
</h2>

</div>

</div>


<div class="profile-note">

<p>
Your profile information will be displayed here
after the registration information is connected
using JavaScript or PHP.
</p>

</div>


<form
class="form-grid"
action="#seller-profile"
method="post"
>

<div class="form-group">

<label for="seller-name">
Full Name
</label>

<input
type="text"
id="seller-name"
name="seller_name"
placeholder="Your name will appear here"
>

</div>


<div class="form-group">

<label for="seller-age">
Age
</label>

<input
type="text"
id="seller-age"
name="seller_age"
inputmode="numeric"
pattern="[0-9]+"
placeholder="Your age will appear here"
>

</div>


<div class="form-group">

<label for="seller-email">
Gmail Address
</label>

<input
type="email"
id="seller-email"
name="seller_email"
placeholder="Your Gmail will appear here"
>

</div>


<div class="form-group">

<label for="seller-gender">
Gender
</label>

<input
type="text"
id="seller-gender"
name="seller_gender"
placeholder="Your gender will appear here"
>

</div>


<div class="form-group">

<label for="seller-phone">
Phone Number
</label>

<input
type="tel"
id="seller-phone"
name="seller_phone"
placeholder="Enter phone number"
>

</div>


<div class="form-group">

<label for="seller-password">
Password
</label>

<input
type="password"
id="seller-password"
name="seller_password"
placeholder="Enter password"
>

</div>


<div class="form-group full-width">

<label for="seller-address">
Address
</label>

<textarea
id="seller-address"
name="seller_address"
rows="4"
placeholder="Enter your address"
></textarea>

</div>


<div class="form-group full-width button-group">

<button
type="submit"
class="btn btn-primary"
>
Save Profile
</button>

</div>

</form>

</section>

</main>

</div>

</div>

</body>
</html>