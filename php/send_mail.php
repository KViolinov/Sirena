<?php
mail("n3twork_5h4d0w@proton.me", $_POST['contact_subject'], $_POST['contact_message'], $_POST['contact_email']);

header("location: https://kvb-bg.com/Sirena/index.php");

//header("refresh 3; url=https://kvb-bg.com/B-Smart/contact.html");

?>

