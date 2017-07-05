<?php

$mbox = imap_open ("{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}Inbox", "example@gmail.com", "***********", OP_READONLY) 
or die("can't connect: " . imap_last_error()); 
$check = imap_mailboxmsginfo($mbox); 
$number_of_messages = $check->{'Nmsgs'};
if ($number_of_messages<=1000) { 
print "Total number of messages is: ". $check->Unread; //. "/" . $check->Nmsgs; 
} else { 
print "Failed, there are too many messages"; 
}

?>
