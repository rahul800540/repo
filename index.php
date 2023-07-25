
<?php
  include '_dbconnect.php';
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
    
  include '_dbconnect.php';
  $title = $_POST['title'];
  $expl = $_POST['expl'];
  $sql = "INSERT INTO `notes` ( `title`, `title_desc`, `date`) VALUES ( '$title', ' $expl', current_timestamp())";
  $result = mysqli_query($conn, $sql);
  if($result)
  {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> your iNotes submitted  .
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';

  }
  else{
    //echo "<br>some problem occur";
  }
  //echo"<br>";
  //echo $title;
  //echo"<br>";
  //echo $expl;
   }
  ?>

<!doctype html>
<html lang="eg" dir="ltr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" integrity="sha384-PJsj/BTMqILvmcej7ulplguok8ag4xFTPryRq8xevL7eBYSmpXKcbNVuy+P0RMgq" crossorigin="anonymous">

    <title>Online notes storage</title>
  </head>
  <body>
  
   <?php

    include '_header.php';?>

    <div class="container">

      <h2 class="text-center text-primary my-4" >Create your iNotes here</h2>
      <form action="notes.php" method = "post">
        <div class="mb-3  my-3">
      <label for="title" class="form-label"><b> iNotes Title</b></label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Start here">
    </div>
    <div class="mb-3 my-3">
      <label for="expl" class="form-label"><b>Title Explanation</b></label>
      <textarea class="form-control" id="expl" name="expl" rows="8"></textarea>
      <button type="submit" class="btn btn-primary btn-lg my-3">Add Notes</button>
      <button type="reset" class="btn btn-warning btn-lg my-3">Reset Notes</button>
    </div>
</form>

    </div>
    <?php
 // $sql = " Select title, expl from `notes`";
    $sql = "SELECT * FROM `notes` LIMIT 10"; 
  $result = mysqli_query($conn, $sql);
  
  $num = mysqli_num_rows($result);
  $sno = 0;
  
    
  
  

?>
    
    <div class="container">

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Sno</th>
      <th scope="col">Title</th>
      <th scope="col">Explanation</th>
      <th scope="col">Date</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <?php
  if($num>0)
  {
    while($row = mysqli_fetch_assoc($result))
    {
     // echo "sno".$sno." title" .$row['title']." desc".$row['title_desc'].$row['date']."<br>";
      $sno++;
    
 echo' <tbody>
    <tr>
      <th scope="row">' . $sno . '</th>
      <td>' . $row["title"] . '</td>
      <td>' . $row["title_desc"] . '</td>
      <td>' . $row["date"] . '</td>
      <td> <div class="btn-group" role="group" aria-label="Basic mixed styles example">
      
      <button type="button" class="btn btn-success">Edit</button>
      <button type="submit" class="btn btn-warning id="delete" name="delete">Delete</button>
      
    </div> </td>

    </tr>
    
  </tbody>';
    }
  }
?>

</table>

    </div>
    <div class="container">

    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>


    </div>

  
   <?php include '_footer.php';?>
    
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    -->
  </body>

</html>

