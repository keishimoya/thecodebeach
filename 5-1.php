<?php
$dsn = 'mysql:dbname=tb***db;host=localhost';
$user = 'tb-***';
$password = '***';
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

$sql = "CREATE TABLE IF NOT EXISTS keian"
." ("
. "id INT AUTO_INCREMENT PRIMARY KEY,"
. "name char(32),"
. "comment TEXT,"
. "date char(24),"
. "password TEXT"
.");";
$stmt = $pdo->query($sql);
$editname=null;
$editcomment=null;
$edit2=null;
$name=null;
$numbertodelete=null;
$editnumber=null;
$comment=null;
$namepassword=null;
$deletepassword=null;
$delete=null;
$editpassword=null;
$edit=null;
    /*    	if(!empty ($_POST["name"]) && ($_POST["comment"])) {
           $sql = $pdo -> prepare("INSERT INTO keian (name, comment, date) VALUES (:name, :comment, :date)");
        	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
        	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        	$sql -> bindParam(':date', $date, PDO::PARAM_STR);
        	$name = $_POST["name"];
        	$comment = $_POST["comment"];
        	$date = date("Y/m/d H:i:s");
        	$sql -> execute();
        }*/

 /*$sql = 'SELECT * FROM keian';
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      foreach ($results as $row){
      	echo $row['id'].',';
        	echo $row['name'].',';
        	echo $row['comment'].',';
        	echo $row['date'].',';
        	echo $row['password'].'<br>';
      }*/

/*	if(!empty ($_POST["numbertodelete"])) {
           $id = $_POST["numbertodelete"];

		$sql = 'delete from keian where id=:id';
           $stmt = $pdo->prepare($sql);
           $stmt->bindParam(':id', $id, PDO::PARAM_INT);
           $stmt->execute();
	}*/
	
/*	if(!empty ($_POST["editnumber"])) {
            $id = $_POST["editnumber"];
            $sql = 'SELECT * FROM keian WHERE id=:id ';
            $stmt = $pdo->prepare($sql);                  
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> execute();                            
            $results = $stmt->fetchAll();
            
            foreach ($results as $row) {
            	$edit_name = $row['name'];
                	$edit_comment = $row['comment'];
                	$edit_number2 = $id;
      	}
           }*/

/*if(!empty (($_POST["name"]) && ($_POST["comment"]) && ($_POST["edit2"]))) {
            $id = $_POST["edit2"];
            $name = $_POST["name"];
            $comment = $_POST["comment"];
            $date = date("Y/m/d H:i:s");
            $sql = 'UPDATE keian SET name=:name, comment=:comment, date=:date WHERE id=:id';
            $stmt = $pdo -> prepare($sql);
            $stmt -> bindParam(':name', $name, PDO::PARAM_STR);
            $stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt -> bindParam(':date', $date, PDO::PARAM_STR);
            $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
            $stmt -> execute(); 
        }*/

if(!empty ($_POST["name"]) && ($_POST["comment"]) && ($_POST["namepassword"]) && empty($_POST["edit2"])) {
           $sql = $pdo -> prepare("INSERT INTO keian (name, comment, date, password) VALUES (:name, :comment, :date, :password)");
        	$sql -> bindParam(':name', $name, PDO::PARAM_STR);
        	$sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
        	$sql -> bindParam(':date', $date, PDO::PARAM_STR);
        	$sql -> bindParam(':password', $password, PDO::PARAM_STR);
        	$name = $_POST["name"];
        	$comment = $_POST["comment"];
        	$date = date("Y/m/d H:i:s");
        	$password = $_POST["namepassword"];
        	$sql -> execute();
        }

if(!empty ($_POST["numbertodelete"]) && ($_POST["deletepassword"])) {
           $id = $_POST["numbertodelete"];
           $deletepassword = $_POST["deletepassword"];
           $sql = 'SELECT * FROM keian WHERE id=:id ';
           $stmt = $pdo->prepare($sql);                  
           $stmt -> bindParam(':id', $id, PDO::PARAM_INT);
           $stmt -> execute();                            
           $results = $stmt->fetchAll();
           foreach ($results as $row) {
          	$password = $row['password'];
           }

           if($deletepassword == $password) {
           	$sql = 'delete from keian where id=:id';
            	$stmt = $pdo->prepare($sql);
            	$stmt->bindParam(':id', $id, PDO::PARAM_INT);
            	$stmt->execute();
            } else {
                echo "password is not correct";  
            }
        }        	

if(!empty ($_POST["editnumber"]) && ($_POST["editpassword"])) {
$id = $_POST["editnumber"];
     	$edit_password = $_POST["editpassword"];
     	$sql = 'SELECT * FROM keian WHERE id=:id ';
     	$stmt = $pdo->prepare($sql);                  
     	$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
     	$stmt -> execute();                            
     	$results = $stmt->fetchAll();
foreach ($results as $row) {
$password = $row['password'];
}

           if($edit_password == $password) {
           	foreach ($results as $row) {
                		$editname = $row['name'];
                    	$editcomment = $row['comment'];
                    	$editnumber = $id;
                	}
            }
}

if(!empty ($_POST["name"]) && ($_POST["comment"]) && ($_POST["namepassword"]) && 
($_POST["edit2"])) {
$id = $_POST["edit2"];
     	$name = $_POST["name"];
     	$comment = $_POST["comment"];
     	$date = date("Y/m/d H:i:s");
     	$password = $_POST["namepassword"];
     	$sql = 'UPDATE keian SET name=:name, comment=:comment, date=:date, password=:password WHERE id=:id';
     	$stmt = $pdo -> prepare($sql);
     	$stmt -> bindParam(':name', $name, PDO::PARAM_STR);
     	$stmt -> bindParam(':comment', $comment, PDO::PARAM_STR);
     	$stmt -> bindParam(':date', $date, PDO::PARAM_STR);
     	$stmt -> bindParam(':password', $password, PDO::PARAM_STR);
     	$stmt -> bindParam(':id', $id, PDO::PARAM_INT);
     	$stmt -> execute(); 
}

$sql = 'SELECT * FROM keian';
      $stmt = $pdo->query($sql);
      $results = $stmt->fetchAll();
      foreach ($results as $row){
      	echo $row['id'].',';
        	echo $row['name'].',';
        	echo $row['comment'].',';
        	echo $row['date'].',';
        	echo $row['password'].'<br>';
      }
?>

<!DOCTYPE HTML>
<html lang = "ja">
    <head>
    	<meta charset = 'utf-8'>
    </head>
    <body>
        <form action="" method="post">
            <input type= "text" name="name" placeholder="名前"
            value= "<?php echo "$editname"; ?>">
            <input type= "comment" name="comment" placeholder="コメント"  
            value= "<?php echo "$editcomment"; ?>">
            <input type= "text" name="namepassword" placeholder="password">
            <input type="text" name="edit2" value = "<?php echo "$editnumber"; ?>" placeholder="edit number">
            <input type= "submit" name="submit"><br>
            <input type= "number" name="numbertodelete" placeholder="削除対象コメント番号">
            <input type= "text" name="deletepassword" placeholder="password">
            <input type= "submit" name="delete" value="Delete"><br>
            <input type= "number" name="editnumber" placeholder="編集対象コメント番号">
            <input type= "text" name="editpassword" placeholder="password">
            <input type= "submit" name="edit" value="edit">
        </form>
    </body>
</html>
