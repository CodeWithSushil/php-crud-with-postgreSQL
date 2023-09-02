<?php
require_once('config.php');
// INSERT PSQL Query
if(isset($_POST['submit'])){
  $name = $_POST['Name'];
  $email = $_POST['Email'];
  
  $sql="INSERT INTO test (Name, Email) VALUES ('$name', '$email')";
  $post = pg_query($con, $sql);
  
  if($post){
    echo "<br> Data Send Successfully. <br>";
    echo "<script>window.location.href='../index.php';</script>";
  } else {
    echo "<br> Data not send. <br>";
    echo pg_last_error($con);
  }
}

// SELECT PSQL Query
if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  
  $sql = "SELECT * FROM test WHERE id='$id'";
  $req = pg_query($con, $sql);

  if(pg_num_rows($req) > 0){
    $row = pg_fetch_assoc($req);
?>
<form method="POST" action="function.php">
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
<input type="text" name="Name" value="<?php echo $row['name'];?>"> <br><br>
<input type="email" name="Email" value="<?php echo $row['email'];?>"> <br><br>
<input type="submit" name="update" value="Update">
</form>
  <?php
  }
}

// Update PSQL Query
if(isset($_POST['update'])){
  $id = $_POST['id'];
  $name = $_POST['Name'];
  $email = $_POST['Email'];

  $sql = "UPDATE test SET Name='$name', Email='$email' WHERE id='$id'";
  $update = pg_query($con, $sql);

  if($update){
    echo "Data update Successfully.";
    echo "<script>window.location.href='../index.php';</script>";
  } else {
    echo pg_last_error($con);
    pg_close($con);
  }
}

// Delete PSQL Query
if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql = "DELETE FROM test WHERE id='$id'";
  $delete = pg_query($con, $sql);

  if($delete){
    echo "Data Delete Successfully.";
    echo "<script>window.location.href='../index.php';</script>";
  } else {
    echo pg_last_error($con);
    pg_close($con);
  }
}
