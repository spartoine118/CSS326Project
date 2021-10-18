<?php

include('D:\WORK\XAMP\htdocs\CSS325Project\Project\dbh.php');

function rename_win($oldfile,$newfile) {
    if (!rename($oldfile,$newfile)) {
        if (copy ($oldfile,$newfile)) {
            unlink($oldfile);
            return TRUE;
        }
        return FALSE;
    }
    return TRUE;
}

if (isset($_POST['reg_user'])) {
    $productsName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productsPrice = mysqli_real_escape_string($conn, $_POST['productsPrice']);
    $productsDetail = mysqli_real_escape_string($conn, $_POST['productsDetail']);
    $productsDate = date('Y-m-d');
        if (empty($productsName)) {
            array_push($_SESSION['error'], "Product name is empty");
        }       
        if (empty($productsPrice)) {
            array_push($_SESSION['error'], "Price is required");
        }
    $sqlcheck = "SELECT * FROM products WHERE productsName = '".$productsName."' AND userName ='".$_SESSION['username']."'";
    $resultcheck = mysqli_query($conn,$sqlcheck);
    $rowcheck = mysqli_fetch_assoc($resultcheck);
        if($rowcheck){
            array_push($_SESSION['error'], "You already have an item with this name");
        }

        if (count($_SESSION['error']) == 0) {
            $file = $_FILES['productImage'];
            $file_name = $file['name'];
            $fileTmpname = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            $file_Ext = explode('.',$file_name);
            $fileActualExt = strtolower(end($file_Ext));
            $allowed = array('jpg','jpeg','png');

            $sql = "INSERT INTO products (productsName, productsPrice, productsDetail, productsDate, userName) VALUES ('".$productsName."', '".$productsPrice."', '".$productsDetail."', '".$productsDate."', '".$_SESSION['username']."');";
            mysqli_query($conn, $sql);
            $sql2 = "SELECT productsID FROM products WHERE productsName = '".$productsName."' AND userName ='".$_SESSION['username']."'";
            $result2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_assoc($result2);
            if(in_array($fileActualExt, $allowed)){
                if($fileError === 0){
                    if($fileSize < 10000000){
                        $fileNameNew = $row['productsID'].".".$fileActualExt;
                        $fileDestination = 'Uploads/ProductsImage/'.$fileNameNew;
                        move_uploaded_file($fileTmpname, $fileDestination);
                        $sql3 = "INSERT INTO productimage(productName, productID, status, fileEXT) VALUES ('".$productsName."', '".$row['productsID']."', '1', '".$fileActualExt."');";
                        mysqli_query($conn, $sql3);
                    }
                    else{
                        $sql3 = "INSERT INTO productimage(productName, productID, status, fileEXT) VALUES ('".$productsName."', '".$row['productsID']."', '0', '".$fileActualExt."');";
                        mysqli_query($conn, $sql3);
                        echo "Your file is too big!";
                    }
                }
                else{
                    $sql3 = "INSERT INTO productimage(productName, productID, status, fileEXT) VALUES ('".$productsName."', '".$row['productsID']."', '0', '".$fileActualExt."');";
                    mysqli_query($conn, $sql3);
                    echo "There was an error uploading your file!";
                }
            }
            else{
                $sql3 = "INSERT INTO productimage(productName, productID, status, fileEXT) VALUES ('".$productsName."', '".$row['productsID']."', '0', '".$fileActualExt."');";
                mysqli_query($conn, $sql3);
                echo "You cannot upload files of this type!";
            }

            $header = "location:\CSS325Project\Project\ProductPage.php?name=" .$productsName. "&date=" .$productsDate."&pID=".$row['productsID'];   
            header($header);
        }
        else{
            header("location:\CSS325Project\Project\AddProductPage.php");
        }
    }


if (isset($_POST['ModifyItem2'])) {
    $productsName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productsPrice = mysqli_real_escape_string($conn, $_POST['productsPrice']);
    $productsDetail = mysqli_real_escape_string($conn, $_POST['productsDetail']);
    $productsDate = date('Y-m-d');
    $header = "location:\CSS325Project\Project\ProductPage.php?name=" .$productsName. "&date=" .$productsDate."&pID=".$_POST['productID'];  
        if (empty($productsName)) {
            array_push($_SESSION['error'], "Product name is empty");
        }       
        if (empty($productsPrice)) {
            array_push($_SESSION['error'], "Price is required");
        }
        if (count($_SESSION['error']) == 0){
            $sql = "UPDATE products SET productsName = '".$productsName."', productsPrice = '".$productsPrice."', productsDetail = '".$productsDetail."' WHERE `products`.`productsID` = ".$_POST['productID'].";";
            mysqli_query($conn, $sql);
            if(isset($_FILES['productImage'])){
                $file = $_FILES['productImage'];
                $file_name = $file['name'];
                $fileTmpname = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
    
                $file_Ext = explode('.',$file_name);
                $fileActualExt = strtolower(end($file_Ext));
                $allowed = array('jpg','jpeg','png');
                if(in_array($fileActualExt, $allowed)){
                    if($fileError === 0){
                        if($fileSize < 10000000){
                            $fileNameNew = $_POST['productID'].".".$fileActualExt;
                            $newFileDestination = 'Uploads/ProductsImage/'.$fileNameNew;
                            if(isset($_POST['productPicture'])){
                                $fileDestination = 'Uploads/ProductsImage/'.$_POST['productPicture'];
                                unlink($fileDestination);
                                move_uploaded_file($fileTmpname, $newFileDestination);
                                $sql3 = "UPDATE productimage SET productName = '".$productsName."', productID = '".$_POST['productID']."', status = '1', fileEXT= '".$fileActualExt."' WHERE productID = ".$_POST['productID'].";";
                                mysqli_query($conn, $sql3);
                                header($header);
                            }
                            else{
                                $fileNameNew = $_POST['productID'].".".$fileActualExt;
                                $fileDestination = 'Uploads/ProductsImage/'.$fileNameNew;
                                move_uploaded_file($fileTmpname, $fileDestination);
                                $sql3 = "UPDATE productimage SET productName = '".$productsName."', productID = '".$_POST['productID']."', status = '1', fileEXT= '".$fileActualExt."' WHERE productID = ".$_POST['productID'].";";
                                mysqli_query($conn, $sql3);
                                header($header); 
                            }
                        }
                        else{
                            $sql3 = "UPDATE productimage SET productName = '".$productsName."', productID = '".$_POST['productID']."', status = '0', fileEXT= '".$fileActualExt."' WHERE productID = ".$_POST['productID'].";";
                            mysqli_query($conn, $sql3);
                            header($header);
                        }
                    }
                    else{
                        $sql3 = "UPDATE productimage SET productName = '".$productsName."', productID = '".$_POST['productID']."', status = '0', fileEXT= '".$fileActualExt."' WHERE productID = ".$_POST['productID'].";";
                        mysqli_query($conn, $sql3);
                        header($header);
                    }
                }
                else{
                    if(isset($_POST['productPicture'])){
                        $sql3 = "UPDATE productimage SET productName = '".$productsName."', status = '1' WHERE productID = ".$_POST['productID'].";";
                        mysqli_query($conn, $sql3);
                        header($header);
                    }
                    else{
                        $sql3 = "UPDATE productimage SET productName = '".$productsName."', productID = '".$_POST['productID']."', status = '0', fileEXT= '".$fileActualExt."' WHERE productID = ".$_POST['productID'].";";
                        mysqli_query($conn, $sql3);
                        $header = "location:\CSS325Project\Project\ProductPage.php?name=" .$productsName. "&date=" .$productsDate."&pID=".$_POST['productID'];
                        header($header);   
                    }
            }
        }
    }
    else{
        header("location:\CSS325Project\Project\AddProductPage.php");
    }
}
