<?php
$subject = 'MY TEST EMAIL';
echo '============' . "\n";
echo $subject . "\n";
echo '============' . "\n";
$firstName = 'Maksim';
$text1 = "firstName : {$firstName}" . "\n";
$text2 = "Lorem ";
$text3 = "ipsum ";
$text4 = "dolor ";
$text5 = "sit ";
$text6 = "amet ";
$message = $text1 . $text2 . $text3. $text4. $text5;
$message .= $text6;
echo $message;
$headers = 'From: filmaksim02@gmail.com';
mail("m.m.fil@student.khai.edu", $subject, $message, $headers);
?>