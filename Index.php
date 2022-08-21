<?php

use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;

include "./DatabaseConnection/Connection.php";


$Select = "SELECT * FROM `listitems` ";
$Order  = mysqli_query($Connection, $Select);
$count = mysqli_num_rows($Order);



if (isset($_POST['Delete'])) {

    header("Location:./ProductList.php");
    $cnt = array();
    $cnt = count($_POST['checkbox']);
    for ($i = 0; $i < $cnt; $i++) {
        $del_id = $_POST['checkbox'][$i];
        $query = "DELETE FROM `listitems` WHERE ID =" . $del_id;
        mysqli_query($Connection, $query);
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
    <link rel="stylesheet" href="./Css/Productlist/Product.ListCss.css">
    <link rel="stylesheet" href="./Css/normalize.css" />
    <link rel="stylesheet" href="./Css/all.min.css">
    <title>Product List</title>
</head>

<body>


    <header>
        <form method="POST" id="deleteForm">
            <div class="container">
                <h1>Product List</h1>
                <ul>
                    <li><a href="./ProductAdd.php"> Add </a></li>
                    <li><button type="submit" class="Deletebutton" id="DeleteProductBtn" name="Delete" value="Delete"> Mass Delete </button> </li>
                </ul>
            </div>
    </header>

    <div class="products">
        <div class="container">
            <?php while ($rows = mysqli_fetch_array($Order)) {
                if ($rows['Type'] === 'Weight') {
                    $KG = "KG";
            ?>
                    <div class="box">
                        <input type="checkbox" name="checkbox[]" class="delete-checkbox" value="<?php echo $rows['ID']; ?>" />

                        <div class="data">
                            <p>
                                <?php echo $rows['SKU'] . "<br>", $rows['Name'] . "<br>", $rows['Price'], ".00 $" . "<br>", $rows['Type'], ":  ", $rows['Value'], " ", $KG ?>
                            </p>
                        </div>
                    </div>
                <?php      } elseif ($rows['Type'] === 'Size') {
                    $MB = "MB";
                ?>
                    <div class="box">
                        <input type="checkbox" name="checkbox[]" class="delete-checkbox" value="<?php echo $rows['ID']; ?>" />

                        <div class="data">
                            <p>
                                <?php echo $rows['SKU'] . "<br>", $rows['Name'] . "<br>", $rows['Price'], ".00 $" . "<br>", $rows['Type'], ":  ", $rows['Value'], " ", $MB ?>
                            </p>


                        </div>
                    </div>

                <?php  } else { ?>
                    <div class="box">
                        <input type="checkbox" name="checkbox[]" class="delete-checkbox" value="<?php echo $rows['ID']; ?>" />

                        <div class="data">
                            <p>
                                <?php echo $rows['SKU'] . "<br>", $rows['Name'] . "<br>", $rows['Price'], ".00 $" . "<br>", $rows['Type'], ":  ", $rows['Value'] ?>
                            </p>


                        </div>
                    </div>
            <?php
                }
            } ?>

        </div>
    </div>
    </form>



    <footer>

        <hr class="separator">
        <p> Scandiweb Test assignment</p>

    </footer>
</body>

</html>