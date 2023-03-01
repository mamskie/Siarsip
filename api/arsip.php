<?php
require_once "method.php";
$arp = new arsip();
$request_method=$_SERVER["REQUEST_METHOD"];
switch ($request_method) {
   case 'GET':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $arp->get_arsip($id);
         }
         else
         {
            $arp->get_arsipp();
         }
         break;
   case 'POST':
         if(!empty($_GET["id"]))
         {
            $id=intval($_GET["id"]);
            $arp->update($id);
         }
         else
         {
            $arp->insert();
         }     
         break; 
   case 'DELETE':
          $id=intval($_GET["id"]);
            $arp->delete($id);
            break;
   default:
      // Invalid Request Method
         header("HTTP/1.0 405 Method Not Allowed");
         break;
      break;
}
 
 
 
 
?>