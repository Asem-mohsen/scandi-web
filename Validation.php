<?php

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $NameErr = $SKUErr = $PriceErr = $TypeErr = "";
    $Name = $SKU = $Price = $Type = $KG = $MB= $W =$L = $H =  "";

    if (empty($_POST["Name"])) {
      $NameErr = "Name is required";
    } else {
      $Name = test_input($_POST["Name"]);
    }
  
    $Name = $_POST["Name"];
    $NamePattern= "/^[a-zA-Z]+$/i";
    if (!preg_match($NamePattern, $Name)) {
      $ErrNameValidaterMsg = "Only alphabets and whitespace are allowed.";
    } else {
      $Name = test_input($_POST["Name"]);
    }
  
    if (empty($_POST["SKU"])) {
      $SKUErr = "SKU is requierd Or it may be exists ";
    } else {
      $SKU = test_input($_POST["SKU"]);
    }
  
    $SKU = $_POST["SKU"];
    if (!preg_match("/[[:alnum:]]/", $SKU)) {
      $ErrSKUValidaterMsg = "Must Start with Numbers then followed by alphabets.";
    } else {
      $SKU = test_input($_POST["SKU"]);
    }
  
    if (empty($_POST["Price"])) {
      $PriceErr = "Price is Requierd";
    } else {
      $Price = test_input($_POST["Price"]);
    }
    $Price = $_POST["Price"];
    if (!preg_match("/^[0-9]/", $Price)) {
      $ErrPriceValidaterMsg = "Only Numbers";
    } else {
      $Price = test_input($_POST["Price"]);
    }
  
    if (empty($_POST["Type"])) {
      $TypeErr = "Must Select a Type";
    } else {
      $Type = test_input($_POST["Type"]);
    }

    if (empty($_POST["MB"])) {
      $MBErr = "you must type a value";
    } else{
      $MB  = test_input($_POST["MB"]);
    }
    
    if(empty($_POST["KG"])) {
      $KGErr = "you must type a value";
    } else {
      $KG = test_input($_POST["KG"]);
    } 

    if(empty($_POST["H"])) {
      $HErr = "you must type a value";
    } else {
      $H = test_input($_POST["H"]);
    } 
    if(empty($_POST["L"])) {
      $LErr = "you must type a value";
    } else {
      $L = test_input($_POST["L"]);
    } 
    if(empty($_POST["W"])) {
      $WErr = "you must type a value";
    } else {
      $W = test_input($_POST["W"]);
    }

    $Validate2 = $KG || $MB == true;
    $Validate3 = $H && $W && $L ==true; 
    $validateOR = $Validate2 || $Validate3;

    $Validate = $Name == true && $SKU ==true && $Price == true && $Type == true && $validateOR ==true ;

  }


?>