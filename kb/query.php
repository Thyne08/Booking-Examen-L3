<?php
if($_POST["submit"]=="query") 
{
    $recipient="youssef.lekfif@ump.ac.ma";
    $subject="Query from bookstore";
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $message=$_POST["message"];
    $mailBody="Name: $sender\nEmail: $senderEmail\n\n$message";
    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $resSub = "Confirmation of receiving your query";
    $resBody= "Dear ". $sender ."\n\nThanks for reaching us.\nThis is to inform you that we have received your query. We will get back to you asap.";
    
    $resBody=$resBody . $note;
    mail($senderEmail , $resSub , $resBody);   
    header("location: index.php?response="."Votre message a est bien envoyé"); 
}
?>	