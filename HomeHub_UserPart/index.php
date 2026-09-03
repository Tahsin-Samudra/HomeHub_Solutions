<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>HomeHub | Account Selection</title>

<link rel="stylesheet" href="style.css">

</head>


<body class="login-page">


<main class="login-layout">


<section class="login-picture">


<div class="login-picture-text">


<p class="small-title light-title">
HOMEHUB REAL ESTATE
</p>


<h1>
Find Your Perfect Property
</h1>


<p>
HomeHub connects buyers and sellers through one
simple real estate property management platform.
</p>


</div>


</section>




<section class="login-form-area">


<div class="login-card">



<div class="login-logo">
Home<span>Hub</span>
</div>



<p class="small-title">
WELCOME TO HOMEHUB
</p>



<h2>
Enter Your Information
</h2>



<p class="form-description">
Complete your information and choose whether you
want to continue as a seller or buyer.
</p>





<form method="post" action="register.php">


<!-- Hidden account type -->

<input 
type="hidden" 
name="user_type" 
id="user_type"
>




<!-- Full Name -->

<div class="form-group">


<label for="full-name">
Full Name
</label>


<input

type="text"

id="full-name"

name="name"

placeholder="Enter your full name"

required

>


</div>






<!-- Age -->


<div class="form-group">


<label for="age">
Age
</label>


<input

type="text"

id="age"

name="age"

inputmode="numeric"

pattern="[0-9]+"

placeholder="Enter your age"

required

>


</div>







<!-- Gmail -->


<div class="form-group">


<label for="gmail">
Gmail Address
</label>


<input

type="email"

id="gmail"

name="gmail"

placeholder="example@gmail.com"

pattern="[a-zA-Z0-9._%+\-]+@gmail\.com"

title="Enter a valid Gmail address"

required

>


</div>







<!-- Gender -->


<fieldset class="gender-box">


<legend>
Gender
</legend>



<div class="gender-options">



<label class="gender-option">


<input

type="radio"

name="gender"

value="Male"

required

>


<span>
Male
</span>


</label>






<label class="gender-option">


<input

type="radio"

name="gender"

value="Female"

required

>


<span>
Female
</span>


</label>







<label class="gender-option">


<input

type="radio"

name="gender"

value="Other"

required

>


<span>
Other
</span>


</label>



</div>



</fieldset>








<!-- Account Type -->


<div class="account-heading">


<h3>
Select Account Type
</h3>


<p>
Choose how you want to continue.
</p>


</div>







<div class="account-buttons">






<!-- Seller Button -->


<button

type="submit"

class="account-button seller-button"

onclick="document.getElementById('user_type').value='seller'"


>



<span class="account-icon">

🏠

</span>



<span class="account-text">




<strong>
Continue as Seller
</strong>


<small>
Add and manage properties
</small>


</span>



</button>









<!-- Buyer Button -->


<button

type="submit"

class="account-button buyer-button"

onclick="document.getElementById('user_type').value='buyer'"

>



<span class="account-icon">

🔑

</span>



<span class="account-text">


<strong>
Continue as Buyer
</strong>


<small>
Browse and request properties
</small>


</span>



</button>






</div>





</form>






</div>


</section>



</main>



</body>


</html>