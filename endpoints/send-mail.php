<?php
    require_once('vendor/autoload.php');
    $data = json_decode($_POST["myData"]);;
    $Name = $data -> Name;
    $business = $data -> business;
    $Mobile_number = $data -> Mobile_number;
    $Email_address = $data -> Email_address;
    $Message = $data -> Message;


    $Email = new PHPMailer;

    $Email -> isSMTP();

    $Email -> SMTPAuth = false;

    //$Email -> SMTPDebug = 2;

    $Email -> Host = 'a2plcpnl0920.prod.iad2.secureserver.net';

    $Email -> Username = 'Info@cursivehomenumbers.com';

    $Email -> Password = 'Password1!';

    $Email -> SMTPSecure = 'ssl';

    $Email -> Port = '465';


    $Email -> From = "Info@cursivehomenumbers.com";

    $Email -> FromName = "Shopper Media Inc.";

    $Email -> addReplyTo('shoppermediainc@gmail.com','Shopper Media Inc.');

    $Email -> AddAddress ('shoppermediainc@gmail.com','Shopper Media Inc.');


    $Email -> Subject = "Advertising Inquiry";

    $Email -> Body = "<div style='background-color: white;width: 100%;height: 100%;box-shadow: 0 -25px 40px 0 rgba(0,0,0,.12);margin-top: -16px;display: flex;justify-content: center;align-items: center;'>
    <div style='width: 90%;height: 90%;box-shadow: -1px 3px 4px rgba(0,0,0,0.22);background-color: #f2f2f2;padding: 1%;margin-top: 2%;font-family: calibri;border: 2px solid white;border-radius: 4px;font-size: 1.1em;'>
        <p>New Inquiry From ".$Name.",</p>
        <p><strong>Name: </strong>".$Name."</p>
        <p><strong>Business Name: </strong>".$business."</p>
        <p><strong>Telephone Number: </strong>".$Mobile_number."</p>
        <p><strong>Email Address: </strong><a href='".$Email_address."'>".$Email_address."</a></p>
        <p><strong>Message: </strong>".$Message.".</p>
    </div>
</div>";

    $Email -> AltBody = "Name: ".$Name."<br/>Business Name: ".$business."<br/>Telephone Number: ".$Mobile_number."<br/>Email: ".$Email_address."<br/>Message: ".$Message;

    //echo !extension_loaded('openssl')?"Not Available <br/>":"Available <br/>";

    if($Email->send()){
        echo 'ok';
    }else{
        echo 'error';
    }
?>