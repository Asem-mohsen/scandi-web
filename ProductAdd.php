<?php
include "./DatabaseConnection/Connection.php";



if (isset($_POST['Save'])) {


  $arr1 = array($_POST['H'], $_POST['W'], $_POST['L']);
  $arr2 = array($_POST['KG'], $_POST['MB']);

  include "./Validation.php";



  if ($Validate) {
    $SKU = $_POST['SKU'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Type = $_POST['Type'];
    $arr1;
    $arr2;

    if ($arr2 = $_POST['KG']) {
      $insertValue1 = $arr2;
      $insert1 = "INSERT INTO `listitems` VALUES( NULL ,'$SKU' ,'$Name', $Price , '$Type', '$insertValue1' )";
      $or1 = mysqli_query($Connection, $insert1);
    } elseif ($arr2 = $_POST['MB']) {
      $insertValue2 = $arr2;
      $insert2 = "INSERT INTO `listitems` VALUES( NULL ,'$SKU' ,'$Name', $Price , '$Type', '$insertValue2' )";
      $or2 = mysqli_query($Connection, $insert2);
    } else {
      $insertValue3 = implode('x', $arr1);
      $insert3 = "INSERT INTO `listitems` VALUES( NULL ,'$SKU' ,'$Name', $Price , '$Type', '$insertValue3' )";
      $or3 = mysqli_query($Connection, $insert3);
    }
    header("Location:./ProductList.php");
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Add</title>
  <link rel="stylesheet" href="./Css/ProductAdd/Product.AddCss.css">
  <link rel="stylesheet" href="./Css/normalize.css">
  <link rel="stylesheet" href="./Css/all.min.css">


</head>

<body>
  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <header>
      <div class="container">

        <h1>Product Add</h1>
        <ul>
          <li><button type="submit" id="Save" name="Save" class="save-button"> Save </button></li>
          <li><a href="./ProductList.php"> Cancel </a></li>
        </ul>
      </div>
    </header>


    <div class="text">
      <p> SKU </p>
      <p> Name </p>
      <p> Price ( <span> $ </span> )</p>
    </div>
    <input type="text" name="SKU" id="sku" placeholder="Type Your SKU" /> <span class="error"> <?php if (isset($SKUErr)) echo "* ", $SKUErr;
                                                                                                if (isset($ErrSKUValidaterMsg))  echo $ErrSKUValidaterMsg; ?></span>
    <input type="text" name="Name" id="name" placeholder="Type The Name" /> <span class="error"> <?php if (isset($NameErr)) echo "* ", $NameErr;
                                                                                                  if (isset($ErrNameValidaterMsg))  echo $ErrNameValidaterMsg; ?></span>
    <input type="number" name="Price" id="price" placeholder="Type The Price" /> <span class="error"> <?php if (isset($PriceErr)) echo "* ", $PriceErr;
                                                                                                      if (isset($ErrPriceValidaterMsg))  echo $ErrPriceValidaterMsg; ?></span>

    <div class="Switcher" id="productType">
      <label>Type Switcher</label>
      <select name="Type" required onchange="showDiv(this)"><span class="error"> <?php if (isset($TypeErr)) echo "* ", $TypeErr;
                                                                                  ?></span>
        <option value="none">Type Switcher</option>
        <option id="Book" value="Weight">BOOK</option>
        <option id="DVD" value="Size">DVD</option>
        <option id="Furniture" value="Dimension">Furniture</option>
      </select>
      <div class="hidden">
        <div id="hidden_div1">
          <p> Weight (KG) </p>

          <input type="number" placeholder="Weight" name="KG"> <span class="error2"> <?php if (isset($KGErr)) echo "* ", $KGErr;
                                                                                      ?></span>
          <p>
            Please Provide Weigh In KG.
          </p>
        </div>

        <div id="hidden_div2">
          <p> Size (MB) </p>

          <input type="number" placeholder="Size" name="MB"> <span class="error2"> <?php if (isset($MBErr)) echo "* ", $MBErr;
                                                                                    ?></span>
          <p>
            Please Provide Size In Mega Bites.
          </p>
        </div>

        <div id="hidden_div3">
          <p style="text-align: center; top: 50px; left: -89px;"> Dimensions (H*W*L) </p>
          <div class="text">
            <p>Hight (CM)</p>
            <p>Width (CM)</p>
            <p>Length (CM)</p>
          </div>
          <div class="inputs" style=" position: relative; bottom: 58px;top: -94px;">
            <input type="number" placeholder="Hight" id="hight" name="H"><span class="error3"> <?php if (isset($HErr)) echo "* ", $HErr;
                                                                                                ?></span>
            <input type="number" placeholder="Width" id="width" name="W"><span class="error3"> <?php if (isset($WErr)) echo "* ", $WErr;
                                                                                                ?></span>
            <input type="number" placeholder="Length" id="length" name="L"><span class="error3"> <?php if (isset($LErr)) echo "* ", $LErr;
                                                                                                  ?></span>
          </div>
          <div class="text2">
            <p>
              Please Provide Weight In KG.
            </p>
          </div>
        </div>
      </div>
    </div>
  </form>

  <footer>
    <hr class="separator">
    <p> Scandiweb Test assignment</p>

  </footer>

  <script src="./JS/Products.js">
  </script>

</body>

</html>