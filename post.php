<?php
$errorMSG = "";
// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Укажите имя ";
} else {
    $name = $_POST["name"];
}
// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Укажите email ";
} else {
    $email = $_POST["email"];
}
// MESSAGE
if (empty($_POST["phone"])) {
    $errorMSG .= "Укажите телефон ";
} else {
    $phone = $_POST["phone"];
}

if ($errorMSG=='') {
	$EmailTo = "root01d@gmail.com";
	$Subject = "Новое сообщение с сайта uber-moskva.com";
	// prepare email body text
	$Body = "Name: $name\nEmail: $email\nPhone: $phone";
	// send email
	$headers = 'From: Uber Москва <noreply@uber-moskva.com>' . "\r\n" .
    'Reply-To: ' .$email. "\r\n" .
    'X-Mailer: PHP/' . phpversion();
	$success = mail($EmailTo, $Subject, $Body, $headers);
	// redirect to success page
	if ($success && $errorMSG == ""){
	   echo "success";
	}else{
		if($errorMSG == ""){
		    echo "Что-то пошло не так :(";
		} else {
		    echo $errorMSG;
		}
	}
} else {
	echo $errorMSG;
}
