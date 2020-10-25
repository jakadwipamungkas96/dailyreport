<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * url in parameter.
 * @return void
 */
if ( ! function_exists('myUrlEncode'))
{   
    function myUrlEncode($string) {
        $entities = array('%21', '%2A', '%27', '%28', '%29', '%3B', '%3A', '%40', '%26', '%3D', '%2B', '%24', '%2C', '%2F', '%3F', '%25', '%23', '%5B', '%5D', '%E2%80%99');
        $replacements = "-";
        return str_replace('+', '-', str_replace($entities, $replacements, urlencode(strtolower($string))));
    }
}

if( ! function_exists('setEncrypt'))
{
    function setEncrypt($psswd) {
        
        // A higher "cost" is more secure but consumes more processing power
        $cost = 8;

        // Create a random salt
        $salt = strtr(base64_encode(bin2hex(random_bytes($cost))), '+', '.');

        // Prefix information about the hash so PHP knows how to verify it later.
        // "$2a$" Means we're using the Blowfish algorithm. The following two digits are the cost parameter.
        $salt = sprintf("$2a$%02d$", $cost) . $salt;

        // Hash the password with the salt
        $hash = crypt($psswd, $salt);

        return $hash;

    }

}

if( ! function_exists('setDecrypt'))
{
    function setDecrypt($hash, $psswd) {

        if (hash_equals($hash, crypt($psswd, $hash))) {
           return true;
        }else
            return false;

    }
}

?>