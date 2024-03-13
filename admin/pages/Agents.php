  <?php include('functions.php'); ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
  <?php kheader(); ?>
  </head>
  <body>
  <div class="container-scroller">
  <!-- partial:../../partials/_navbar.html -->
  <?php knavbar(); ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
  <!-- partial:../../partials/_sidebar.html -->
  <?php sidebar(); ?>
  <!-- partial -->
  <div class="main-panel">
  <div class="content-wrapper">
  <div class="card card-default">
  <div class="card-header"><h1>AGENTS</h1></div>
  <div class="card-body">
  <?php 
  if(isset($_POST['submit_agents'])){
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $address = $_POST['address'];
  $agentimage = $_POST['agentimage'];
  $phonenumber1 = $_POST['phonenumber1'];
  $phonenumber2 = $_POST['phonenumber2'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $agenttitle = $_POST['agenttitle'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $insert_passwords = $conn->query("insert into passwords(rolenumber,username,password) values('$agenttitle','$username','$password')");
  if($insert_passwords){
  echo "<div class='alert alert-success'>Username & Password Submitted</div>";
  }

  if(!empty($_FILES['agentimage']['tmp_name'])){
  $img_name = str_replace(' ','_', date('i')."".date('s').$_FILES['agentimage']['name']);
  $destination = "public/".$img_name;
  $extension = pathinfo($img_name,PATHINFO_EXTENSION);
  $file = $_FILES['agentimage']['tmp_name'];
  $size = $_FILES['agentimage']['size'];
  if(!in_array($extension, ['png','jpg','jpeg','gif','PNG','JPG','JPEG','GIF'])){
  echo "Your file extension must be .png, .jpg, .jpeg, .gif, .PNG, .JPG, .JPEG .GIF ";
  }elseif ($_FILES['agentimage']['size'] > 1000000) {
  echo "Image shouldn't be larger than one megabyte";
  }else{
  $insert_property_images = $conn->query("INSERT INTO property_images(img1,fsize,prop_id) values('$img_name','$size','$prop_id')");
  if (move_uploaded_file($file, $destination)) {
  echo "<div class='alert alert-success'>Image Uploaded Successfully</div>";
  }
  }
  }
  $result_agents=$conn->query("select * from agents where autoid>0");
  $count_agents=$result_agents->rowCount();
  $row_agents=$result_agents->fetchObject();
  if($count_agents<=0){$agentid="agt1";}else{
    do{
      $agentid="agt".($row_agents->autoid+1);
    }while($row_agents=$result_agents->fetchObject());
  }

  $insert_agents = $conn->query("INSERT INTO agents(firstname,lastname,address,agentimage,phonenumber1,phonenumber2,email,gender,agenttitle,username,password,agentid) VALUES('$firstname','$lastname','$address','$agentimage','$phonenumber1','$phonenumber2','$email','$gender','$agenttitle','$username','$password','$agentid')");
  if($insert_agents){
  echo "<div class='alert alert-success'>Submission Successful</div>";
  }else echo "<div class='alert alert-warning'>Submission Failure</div>";
  }
  ?>
  <div class="row">
  <form method="POST" autocomplete="off">
  <div class="row">
  <div class="col-lg-3">
  <div class="form-group">
  <label>Firstname</label>
  <input type="text" placeholder="Firstname" class="form-control" name="firstname">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Lastname</label>
  <input type="text" placeholder="Lastname" class="form-control" name="lastname">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Address</label>
  <input type="text" placeholder="Address" class="form-control" name="address">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Agent Image</label>
  <input type="file" placeholder="Agent Image" class="form-control" name="agentimage">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Phonenumber1</label>
  <input type="number" placeholder="Phonenumber1" class="form-control" name="phonenumber1">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Phonenumber2</label>
  <input type="number" placeholder="Phonenumber2" class="form-control" name="phonenumber2">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Email</label>
  <input type="email" placeholder="Email" class="form-control" name="email">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Gender</label>
  <select class="form-control" name="gender">
  <option>Select Gender</option>
  <option>Female</option>
  <option>Male</option>
  </select>
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Agent Title</label>
  <input type="text" placeholder="Agent Title" class="form-control" name="agenttitle">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Username</label>
  <input type="text" placeholder="Username" class="form-control" name="username">
  </div>
  </div>
  <div class="col-lg-3">
  <div class="form-group">
  <label>Password</label>
  <input type="text" placeholder="Password" class="form-control" name="password">
  </div>
  </div>

  <div class="form-group">
  <input type="submit" value="Submit" class="btn btn-sm btn-primary" name="submit_agents">
  </div>

  </div>
  </form>
  </div>
  </div>
  </div>


  <div class="card card-default">
  <div class="card-header"></div>
  <div class="card-body">
  <table class="table table-striped table-bordered">
  <thead>
  <tr>
  <th>No.</th>
  <th>Firstname</th>
  <th>Lastname</th>
  <th>Address</th>
  <th>Phonenumber1</th>
  <th>Phonenumber2</th>
  <th>Email</th>
  <th>Gender</th>
  <th>Agent Title</th>
  </tr>
  </thead>
  <tbody>
  <?php 
  $result_agents = $conn->query("SELECT * from agents where status=1");
  $count_agents = $result_agents->rowCount();
  $row_agents = $result_agents->fetchObject();
  if($count_agents > 0){
  $r=1;
  do{
  echo "<tr>
  <td>".$r++."</td>
  <td>".$row_agents->firstname."</td>
  <td>".$row_agents->lastname."</td>
  <td>".$row_agents->address."</td>

  <td>".$row_agents->phonenumber1."</td>
  <td>".$row_agents->phonenumber2."</td>
  <td>".$row_agents->email."</td>
  <td>".$row_agents->gender."</td>
  <td>".$row_agents->agenttitle."</td>
  </tr>";
  }while($row_agents = $result_agents->fetchObject());
  }
  ?>
  </tbody>
  </table>
  </div>
  </div>


  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <?php footer(); ?>
  <!-- partial -->
  </div>
  <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <?php scripts(); ?>
  </body>
  </html>