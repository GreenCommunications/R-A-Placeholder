<?php
$action = $_GET["action"]; # Grab action from "get" list

function throwError(message) # Error function; prints json output to client params: message>
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
        $dataFile = fopen("joined.json", "r+") or die throwError("unable_fopen");
        $setData = json_decode(fread($dataFile, filesize("joined.json")));

        $duplicate = false;
        foreach($setData as $data => $key)
        {
            if(getRealIpAddr() == $data)
            {
                $duplicate = true;
            }
        }

        if(!$duplicate)
        {
            $setData[sizeof($setData) + 1] = array("IP"=>getRealIpAddr(), "email"=>$_POST["email_addr"], "name"=>$_POST["name"]);
            
            fwrite($dataFile, json_encode($setData, true));
            fclose($dataFile);
        }
        else
        {
            throwError("duplicate");

            fclose($dataFile);
        }

        break;
    case default:
        error("inval_opr");    

        break;
}
?>