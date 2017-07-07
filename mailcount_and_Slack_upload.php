#!/usr/bin/php5
<?php
/**
 * Send a Message to a Slack Channel.
 *
 * In order to get the API Token visit: https://api.slack.com/custom-integrations/legacy-tokens
 * The token will look something like this `xoxo-2100000415-0000000000-0000000000-ab1ab1`.
 *
 * @param string $message The message to post into a channel.
 * @param string $channel The name of the channel prefixed with #, example #foobar
 * @return boolean
 */
$message="There are too many messages in the mail box SD-Plus";
$channel="C4N5QAUHY";

$mbox = imap_open ("{example.server.com:110/pop3/tls}INBOX", "username", "password") or die("can't connect: " . imap_last_error());
$check = imap_mailboxmsginfo($mbox);
$number_of_messages = $check->{'Nmsgs'};

if ($number_of_messages>=50) {
$ch = curl_init("https://slack.com/api/chat.postMessage");
$data = array(
   "token" => "******************************************************************",
   "channel" => $channel, //"#mychannel",
   "text" => $message, //"Hello, Foo-Bar channel message.",
   "username" => "User_posting", //"This is optional, can be left out"
   );
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
//print_r ($result);
echo $result;
curl_close($ch);

return $result;

} //else {
//print "Pleas contact Ignite to check the SD-Plus mailbox";
//echo "\n \n";
//}
?>
