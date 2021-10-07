<?php
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

$GLOBALS['FilterArrayName'] = array();
$GLOBALS['shownitems'] = array();



function filterfunction(){
    $search = mysqli_real_escape_string($conn, $_POST['ItemSearch']);
    foreach($GLOBALS['FilterArrayName'] as $filterArrayname2){
        foreach($GLOBALS[$filterArrayname2] as $filter){
            if(isset($_POST[strtolower($filter)])){ 
                $sql = "SELECT * FROM products WHERE productsID IN (SELECT productsID FROM products WHERE productsName LIKE '%" . $search. "%') AND  ". rtrim($filterArrayname2,"xxxx") . " LIKE '%" . $filter ."%';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    displayNewItem($result,$conn);
                }
            }
        }
    }
}


function getItems($conn){
    if(isset($_GET['ItemSearch'])){
        if(($_GET['ItemSearch'] == null or $_GET['ItemSearch'] == "" or trim($_GET['ItemSearch']) == " ") && ($_POST['invisVar1'] == "" or trim($_POST['invisVar1']) == " ")){
            header("Location: http://localhost/CSS325Project/Project/MainPage.php");
            exit();
        }
        else if(isset ($_POST['filterConfirm'])){
          $sql ="";
          $search = mysqli_real_escape_string($conn, $_POST['ItemSearch']);
          if(empty($_POST['minPrice']) && empty($_POST['maxPrice'])){
              $sql = "SELECT * FROM products WHERE productsName LIKE '%" . trim($search). "%';";
          }
          else if(!empty($_POST['minPrice'])){
              if(!empty($_POST['maxPrice'])){
                  $sql = "SELECT * FROM `products` WHERE productsName LIKE '%" . trim($search). "%' AND productsPrice >= ".$_POST['minPrice']." AND productsPrice <= ".$_POST['maxPrice'].";";
              }
              else{
                  $sql = "SELECT * FROM `products` WHERE productsName LIKE '%" . trim($search). "%' AND productsPrice >= ".$_POST['minPrice'].";";
              }
          }
          else if(!empty($_POST['maxPrice'])){
                  $sql = "SELECT * FROM `products` WHERE productsName LIKE '%" . trim($search). "%' AND productsPrice <= ".$_POST['maxPrice'].";";
              }
          $result = mysqli_query($conn, $sql);
          displayNewItem($result,$conn);
      }
        else{
          $search = mysqli_real_escape_string($conn, $_GET['ItemSearch']);
          $sql = "SELECT * FROM products WHERE productsName LIKE '%Phone%' LIMIT 20 OFFSET ".(($_GET['page']-1)*(20)).";";
          $result = mysqli_query($conn, $sql);
          $resultCheck = mysqli_num_rows($result);
          if($resultCheck > 0){
              displayNewItem($result,$conn);
                  }
              }
    }
    else{
        header("Location: http://localhost/CSS325Project/Project/MainPage.php");
        exit();
    }
}


 

function displayNewItem($result,$conn){
    if($result != null){
        while($row = mysqli_fetch_assoc($result)){
            if(in_array($row['productsName'], $GLOBALS['shownitems'])){
            }
            else{
                $sql2 = "SELECT * FROM  productimage WHERE productName='".$row['productsName']."' AND productID ='".$row['productsID']."'";
                $result2 = mysqli_query($conn,$sql2);
                $queryResults2 = mysqli_num_rows($result2);
                if($queryResults2 > 0){
                    while($row2 = mysqli_fetch_assoc($result2)){
                        if($row2['status'] == 1){
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='AddProductPage/Uploads/ProductsImage/".$row2['productName']."_".$row2['productID'].".".$row2['fileEXT']."' alt='picture of product' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                        else{
                            echo "<div class='NewItemsTest' id='NewItemsTest'>
                            <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                            <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                            . $row['productsPrice'] . "$
                            </div>";
                        }
                    } 
                } 
                else{
                    echo "<div class='NewItemsTest' id='NewItemsTest'>
                    <img src='images/abyd9viyvwf71.png' width='256' height='256'>
                    <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                    . $row['productsPrice'] . "$
                    </div>";
                array_push($GLOBALS['shownitems'], $row['productsName']);
                }
            }
        }
    }
}

function createFilterList($conn){
    echo "<input type='text' name='minPrice' placeholder='min price'>
    <input type='text' name='maxPrice' placeholder='max price'>
    ";  
}

function usedinthecreatefilerlist(){
    $sql = "SELECT column_name FROM information_schema.columns WHERE table_name='products';";
    $result = mysqli_query($conn, $sql);
    $x = 0;
    while($row = mysqli_fetch_assoc($result)){
        $filterArray = array();
        $x += 1;
        if($x > 4){
            echo "" . $row['column_name'] . "<br>";
            $search = mysqli_real_escape_string($conn, $_POST['ItemSearch']);
            $sql2 = "SELECT " . $row['column_name'] . " FROM products WHERE productsID IN (SELECT productsID FROM products WHERE productsName LIKE '%" . $search. "%')";
            $result2 = mysqli_query($conn, $sql2);
            $GLOBALS[$row['column_name']. "xxxx"] = array();
            array_push($GLOBALS['FilterArrayName'], $row['column_name']. "xxxx");
            while($row2 = mysqli_fetch_assoc($result2)){
                if($row2[$row['column_name']] == null){

                }
                else if(in_array($row2[$row['column_name']], $filterArray)){

                }
                else{
                    echo "<input type='checkbox' name=" . strtolower($row2[$row['column_name']]) . " value=" . strtolower($row2[$row['column_name']]) . ">
                    <label for=" . strtolower($row2[$row['column_name']]) . "> " . $row2[$row['column_name']] . " </label><br>";
                    array_push($filterArray, $row2[$row['column_name']]);
                    array_push($GLOBALS[$row['column_name']. "xxxx"], ($row2[$row['column_name']]));
                }
            }
        }   
    }
}

function getTotalPage($conn){
    if(isset($_GET['ItemSearch'])){
        $search = mysqli_real_escape_string($conn, $_GET['ItemSearch']);
        $sql = "SELECT COUNT(*) FROM products WHERE productsName LIKE '%" . trim($search). "%';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck > 0){
            $row = mysqli_fetch_assoc($result);
            $pages = ceil($row['COUNT(*)']/20);
            echo 
            "<div class='pagecnt' id='pagecnt'>
               <a href='SearchPage.php?page=1&ItemSearch=".$_GET['ItemSearch']."'><<</a>&emsp; <a href='SearchPage.php?page=".($_GET['page']-1)."&ItemSearch=".$_GET['ItemSearch']."'><</a>&emsp; ";
            for ($x = $_GET['page']-2; $x <= 3+$_GET['page'] AND $x <= $pages; $x++) {
                if($x>0){
                    echo "<a href='SearchPage.php?page=".$x."&ItemSearch=".$_GET['ItemSearch']."'>".$x."</a>&nbsp;";
                }
            } 
            echo "&emsp;<a href='SearchPage.php?page=".($_GET['page']+1)."&ItemSearch=".$_GET['ItemSearch']."'>></a>&emsp; <a href='SearchPage.php?page=".$pages."&ItemSearch=".$_GET['ItemSearch']."'>>></a>&emsp; ";
                }
            }   
    }