<?php
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$email = $_POST["Email"];
$phone = $_POST["Phone"];

$EmailTo = "contact@creamsandco.com";
$Subject = "New Message Received";

$description = $_POST["Description"];
$quantity = $_POST["Quantity"];
$address = $_POST["Address"];

// prepare email body text
$Body = "First Name: ";
$Body .= $firstName;
$Body .= "\n";
 
$Body .= "Last Name: ";
$Body .= $lastName;
$Body .= "\n";
 
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";

$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";

if(isset($_POST["Order"])){
	$Body .= "Interested in: ";
	$Body .= implode(", ",$_POST["Order"]);
	$Body .= "\n";
}

$Body .= "Description: ";
$Body .= $description;
$Body .= "\n";

$Body .= "Quantity/Servings: ";
$Body .= $quantity;
$Body .= "\n";

$Body .= "Address: ";
$Body .= $address;
$Body .= "\n";
// send email

$success = false;
$success = mail($EmailTo, $Subject, $Body, "From:".$email);


// redirect to success page
if ($success){
   echo "success";
}else{
    echo "invalid";
}
?>