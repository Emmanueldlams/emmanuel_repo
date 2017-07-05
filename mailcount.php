<?php

$mbox = imap_open ("{imap.gmail.com:993/imap/ssl/novalidate-cert/norsh}Inbox", "mrango2011@gmail.com", "wordpass15@M", OP_READONLY) 
or die("can't connect: " . imap_last_error()); 
$check = imap_mailboxmsginfo($mbox); 
$number_of_messages = $check->{'Nmsgs'};
if ($number_of_messages<=1000) { 
//print var_dump ($check);
echo "<br \><br \>\n";
print "Number of unread messages is: ". $check->Unread; //. "/" . $check->Nmsgs; 
echo "<br /><br \>\n";
print "The total number of all e-mail messages is: ".$check->Nmsgs; 
} else { 
print "Failed, there are too many messages"; 
}

?>