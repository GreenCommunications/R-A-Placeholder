<?php
$action = $_GET["action"]; # Grab action from "get" list

function throwError($message) # Error function; prints json output to client params: message>
{
    print(json_encode(array("type"=>"error", "message"=>$message))); # Do the printing 
}

function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

switch($action)
{
    case "addEmailToList":
	$dir = dirname(__FILE__) . "/../../usrstore/joined.json";
        $dataFile = fopen($dir, "r") or throwError("unable_fopen");
        $setData = json_decode(fread($dataFile, filesize($dir)), true);
        fclose($dataFile);

        $duplicate = false;
        foreach($setData as $value)
        {
            if(getRealIpAddr() == $value["IP"])
            {
                $duplicate = true;
            }
        }

        if(!$duplicate)
        {
            $dataFile = fopen($dir, "w") or throwError("unable_fopen");
            
            $setData[sizeof($setData) + 1] = array("IP"=>getRealIpAddr(), "email"=>$_POST["email_addr"], "name"=>$_POST["name"]);
            
            fwrite($dataFile, json_encode($setData, true));
            fclose($dataFile);

            print(json_encode(array("type" => "value", "value" => "done")));
        }
        else
        {
            throwError("duplicate");
        }

        break;
    default:
        throwError("inval_opr");    

        break;
}
?>
