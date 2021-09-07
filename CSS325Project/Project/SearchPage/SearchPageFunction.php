<?php
require_once 'D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php';

$GLOBALS['FilterArrayName'] = array();
$GLOBALS['shownitems'] = array();


function getItems($conn){
  if(($_POST['ItemSearch'] == "" or trim($_POST['ItemSearch']) == " ") && ($_POST['invisVar1'] == "" or trim($_POST['invisVar1']) == " ")){
        header("Location: http://localhost/CSS325Project/Project/MainPage.php");
        exit();
  }
  else if(isset($_POST['filterConfirm'])){
    $search = mysqli_real_escape_string($conn, $_POST['ItemSearch']);
    foreach($GLOBALS['FilterArrayName'] as $filterArrayname2){
        foreach($GLOBALS[$filterArrayname2] as $filter){
            if(isset($_POST[strtolower($filter)])){ 
                $sql = "SELECT * FROM products WHERE productsID IN (SELECT productsID FROM products WHERE productsName LIKE '%" . $search. "%') AND  ". rtrim($filterArrayname2,"xxxx") . " LIKE '%" . $filter ."%';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);
                if($resultCheck > 0){
                    displayNewItem($result);
                }
            }
        }
    }
}
  else{
    $search = mysqli_real_escape_string($conn, $_POST['ItemSearch']);
    $sql = "SELECT * FROM products WHERE productsName LIKE '%" . trim($search). "%';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    if($resultCheck > 0){
        displayNewItem($result);
    }
  }
}


 

function displayNewItem($result){
    if($result != null){
        while($row = mysqli_fetch_assoc($result)){
            if(in_array($row['productsName'], $GLOBALS['shownitems'])){
            }
            else{
                echo "<div class='NewItemsTest' id='NewItemsTest'>
                <img width='256' height='256'>
                <a href='ProductPage.php?name=".$row['productsName']."&date=".$row['productsDate']. "&pID=".$row['productsID']."'>" . $row['productsName'] . " </a>"
                . $row['productsPrice'] . "
                </div>";
                array_push($GLOBALS['shownitems'], $row['productsName']);
            }
        }
    }
}

function createFilterList($conn){
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
