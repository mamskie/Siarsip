<?php
require_once "koneksi.php";
class arsip 
{
 
   public  function get_arsipp()
   {
      global $mysqli;
      $query="SELECT * FROM arsip";
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get List Arsip Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
   }
 
   public function get_arsip($id=0)
   {
      global $mysqli;
      $query="SELECT * FROM arsip";
      if($id != 0)
      {
         $query.=" WHERE id=".$id." LIMIT 1";
      }
      $data=array();
      $result=$mysqli->query($query);
      while($row=mysqli_fetch_object($result))
      {
         $data[]=$row;
      }
      $response=array(
                     'status' => 1,
                     'message' =>'Get Arsip Successfully.',
                     'data' => $data
                  );
      header('Content-Type: application/json');
      echo json_encode($response);
        
   }
 
   public function insert()
      {
         global $mysqli;
         $arrcheckpost = array('nomor' => '', 'kategori' => '', 'judul' => '', 'tgl_arsip' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
               $result = mysqli_query($mysqli, "INSERT INTO arsip SET
               nomor = '$_POST[nomor]',
               kategori = '$_POST[kategori]',
               judul = '$_POST[judul]',
               tgl_arsip = '$_POST[tgl_arsip]'");
                
               if($result)
               {
                  $response=array(
                     'status' => 1,
                     'message' =>'Arsip Added Successfully.'
                  );
               }
               else
               {
                  $response=array(
                     'status' => 0,
                     'message' =>'Arsip Addition Failed.'
                  );
               }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function update($id)
      {
         global $mysqli;
         $arrcheckpost = array('nomor' => '', 'kategori' => '', 'judul' => '', 'tgl_arsip' => '');
         $hitung = count(array_intersect_key($_POST, $arrcheckpost));
         if($hitung == count($arrcheckpost)){
          
              $result = mysqli_query($mysqli, "UPDATE arsip SET
              nomor = '$_POST[nomor]',
              kategori = '$_POST[kategori]',
              judul = '$_POST[judul]',
              tgl_arsip = '$_POST[tgl_arsip]'
              WHERE id='$id'");
          
            if($result)
            {
               $response=array(
                  'status' => 1,
                  'message' =>'Arsip Updated Successfully.'
               );
            }
            else
            {
               $response=array(
                  'status' => 0,
                  'message' =>'Arsip Updation Failed.'
               );
            }
         }else{
            $response=array(
                     'status' => 0,
                     'message' =>'Parameter Do Not Match'
                  );
         }
         header('Content-Type: application/json');
         echo json_encode($response);
      }
 
   function delete($id)
   {
      global $mysqli;
      $query="DELETE FROM arsip WHERE id=".$id;
      if(mysqli_query($mysqli, $query))
      {
         $response=array(
            'status' => 1,
            'message' =>'Arsip Deleted Successfully.'
         );
      }
      else
      {
         $response=array(
            'status' => 0,
            'message' =>'Arsip Deletion Failed.'
         );
      }
      header('Content-Type: application/json');
      echo json_encode($response);
   }
}
 
 ?>