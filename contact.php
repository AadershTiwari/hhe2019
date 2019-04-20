<?php
 
$link = mysqli_connect("localhost", "happyxbd_admin", "happyhut@2017", "happyxbd_masterdb");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$name = mysqli_real_escape_string($link, $_REQUEST['name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$mobno = mysqli_real_escape_string($link, $_REQUEST['mobile']);
$msg = mysqli_real_escape_string($link, $_REQUEST['message']);

$sqlchk = $sql = "SELECT * FROM contact_dtls where email='$email'";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
		echo"We already have your details!!!";

	header("refresh:4;url=http://www.happyhutentertainment.com/index.html");
}
else{

$sql = "INSERT INTO contact_dtls (name, mobno, email, message) VALUES ('$name','$mobno', '$email','$msg')";
if(mysqli_query($link, $sql)){

//to HHE		
$to_email = 'admin@happyhutentertainment.com';
$subject = 'Registration Mail';
$message = 'wanna join ';
$headers .= 'From: '.$email."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail($to_email,$subject,$message,$headers);
		
//to joinee

$to_email = $email;
$subject = 'Welcome to Happy Hut Entertainment';
$message = 'Dear Sir/Mam

Greetings from Happy Hut Entertainment!

With great pleasure and cordial wishes thanking you for your interest towards Happy Hut Entertainment : Get in, Get Entertained.
We are happy and adding you as a member of our Happy Hut.

With best regards
Happy Hut Entertainment Team
Bangalore,India. ';
$headers = 'From: admin@happyhutentertainment.com';
mail($to_email,$subject,$message,$headers);
















		
		echo"Congratulations! Thanks for your interest in Happy Hut Entertainment, will reach out to you soon.";
	header("refresh:5;url=http://www.happyhutentertainment.com/VPO.html");
} else{
    echo "ERROR: Could not able to execute . " . mysqli_error($link);
}





}
} 
 
 
// close connection
mysqli_close($link);
?>