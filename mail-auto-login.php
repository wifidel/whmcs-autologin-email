<?php
use Illuminate\Database\Capsule\Manager as Capsule;
add_hook('EmailPreSend', 1, function($vars) {
    
    // Nombres de las plantillas en las que habilitar el link.
    $message_names = Array(
        "Credit Card Invoice Created",
        "Invoice Created",
        "Invoice Payment Reminder"
    );
    
    global $CONFIG;

    $merge_fields = array();
    if (in_array($vars['messagename'], $message_names)) {
        $invoice_id = mysql_real_escape_string($vars['relid']);
    
    $invoice = Capsule::table('tblinvoices')->where('id', $invoice_id)->first();    
	$userid = $invoice->userid;    
	$cliente = Capsule::table('tblclients')->where('id', $userid)->first();
        
    
    // Define WHMCS URL & AutoAuth Key
    $whmcsurl = $CONFIG['SystemURL']."/dologin.php";
    $autoauthkey = "abc123";
    
    $timestamp = time(); // Get current timestamp
    $email = $cliente->email; // Clients Email Address to Login
    $goto = 'viewinvoice.php?id='.$invoice_id;
    
    $hash = sha1($email . $timestamp . $autoauthkey); // Generate Hash
    
    // Generate AutoAuth URL & Redirect
    $url = $whmcsurl . "?timestamp=".$timestamp."&email=".$email."&hash=".$hash."&goto=" . urlencode($goto);
    
    $merge_fields = [];
    $merge_fields['linkauto'] = $url;
   
    return $merge_fields;
    }
    
});
