<!DOCTYPE html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel = "stylesheet"  type = "text/css" href="assets/css/style.css" />
</head>
<body>
   
   <nav class="navbar navbar-expand-lg navbar-light bg-info">
       <div class="container">
        <a class="navbar-brand" href="#">Project <span style="">Test</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Student</a>
            </li>
            <li class="nav-item " style="float:right; color:red;">
                <a class="nav-link" href="#">Module</a>
            </li>
            </ul>
           
        </div>
      </div>
    </nav>

<div>
    <nav aria-label="breadcrumb" style="background-color: #e9ecef;     ">
        
            <div class="container">
                <ol class="breadcrumb " style="padding: 0.30rem 1rem;">
                   <li class="breadcrumb-item"><a href="#">Home</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Student</li>
                </ol>
            </div>
        
    </nav>  
</div>
<?php 



// ----------------------------------- read file


// $student = fopen('data/dat.csv','r');
// ----------------------------------- end read file


echo "start";
$errName = $errEmail= $errPrenom = "";
 if($_SERVER["REQUEST_METHOD"] == "POST") 
 {
     echo "post";

    //------------------------------------------------ Upload image

$target_dir = "./data/";
$target_file = $target_dir.basename($_FILES['picture']['name']);
$uploadOK = true;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    echo "type: ".$imageFileType;

    if($imageFileType == "png" || $imageFileType == "jpeg") {
        echo "format du fichier correct";
        $check = getimagesize($_FILES['picture']['tmp_name']);
        if($check !== false) {
            echo "Le fichier est une image".$check['mime'];
            $uploadOK = true;
            if(move_uploaded_file($_FILES['picture']['tmp_name'], $target_file)) {
                echo "Le upload de l'image ".basename( $_FILES["picture"]["name"])." s'est terminé avec succès";
            } else {
                echo "Le upload du fichier " .basename( $_FILES["picture"]["name"]). "s'est terminé en échec.";
            }
        } else {
            $uploadOK = false;
        }
    } 
    
    

//------------------------------------------------ end upload image


    if(!preg_match("/^[a-zA-Z ]*$/", $_POST['nom']))
    {
        $errName  ="vous avez pas saisie le bon nom";
    }
    if(!preg_match("/^[0-9]{10}$/", $_POST['prenom']))
    {
        $errPrenom  ="vous avez pas saisie le bon prenom";
    }
    $date = $_POST['date'];
 }

//  if(!empty($date)){
//      echo $date;
//      $d1= date('Y') - (date('Y',strtotime($date)));
//      echo  " -- " .$d1;
//  }

 if(!empty($errName) ){
    echo '<div class="container">
        <div class="alert alert-danger" role="alert">';
              echo $errName ;
     echo '</div></div>'; 
}

if(!empty($errPrenom) ){
    echo '<div class="container">
        <div class="alert alert-danger" role="alert">';
              echo $errPrenom ;
     echo '</div></div>'; 
}

//      function test($email=null,$name){
//         if($_SERVER["REQUEST_METHOD"] == "POST"){
//             if(!preg_match("^06|07[0-9]{8}",$name))
//             return  $test = 1;
            
//         }
//    }

//     if(!empty($_POST['nom']) )  echo "zzzz". test($_POST['nom']);
//    if(!empty($_POST['nom']) && test($_POST['nom']) == false )
//    echo "vous avez pas saisie le bon number";
?>
     
    <div class="container">
    
    <div class="card mt-4" >
        <div class="card-header bg-info " style="color:white; ">
         Students
        <span>
            <button class="btn btn-success" onclick="myFunction()" style="float:right;" >
                 Add new student
            </button>
        </span>

        </div>
        <div class="card-body">



        <!---------------------- form ------------------------------------->
       
        <form class="mb-4" id="forme" style="display:none" method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
       
          <div class="row">
            <div class="form-group col-md-4">
                <label for="cne">cne</label>
                <input type="text" class="form-control" id="cne"  name="cne"  placeholder="CNE">
            </div>
            <div class="form-group col-md-4">
                <label for="name">Last Name</label>
                <input type="text" class="form-control" id="name"  name="nom"  placeholder="Last name" >
                
            </div>
            <div class="form-group col-md-4">
                <label for="First_Name">First Name</label>
                <input type="text" class="form-control" id="First_Name"  name="prenom" placeholder="First name" >
            </div>

            <div class="form-group col-md-12">
                <label for="adresse">Adresse</label>
                <textarea class="form-control" id="adresse" rows="3" name="adresse" placeholder="Adresse"></textarea>
            </div>
            <div class="form-group col-md-4">
                <label for="First_Name">First Name</label>
                <input type="date" class="form-control" id="First_Name"  name="date" placeholder="First name" >
            </div>
            </div>

            <div class="form-group">
                <label for="file">Example file input</label>
                <input type="file" class="form-control-file" id="file" name="picture">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!---------------------- end form ------------------------------------->
        
        
            <table class="table table-striped table table-bordered">
            <thead class="thead-primary">
                <tr>
                <th scope="col">CNE</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Adresse</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include "student.php";
                    $herbie   = new Student("123456789","elmardi","zakaria","Avenu moukhtar jazoulite");
                    $herbie1  = new Student("123456789","el bahi","Mohamed","Avenu moukhtar jazoulite");
                    $herbie2  = new Student("123456789","jbilou", "Mohamed","Avenu moukhtar jazoulite");
                    $herbie3  = new Student("123456789","Hinos", "Hind","Avenu moukhtar jazoulite");
                    $students = array($herbie ,$herbie1 ,$herbie2,$herbie3 );
                    
                    if(!empty( $_POST['nom']))
                    array_push($students,  new Student($_POST['cne'],$_POST['nom'], $_POST['prenom'],$_POST['adresse']));
                    
                      for ($row = 0; $row < count($students); $row++) {
                        echo "<tr>";
                          echo "<th scope='row'> ".$students[$row]->cne."</th>";
                          echo "<td>".$students[$row]->nom."</td>";
                          echo "<td>".$students[$row]->prenom."</td>";
                          echo "<td>".$students[$row]->adresse."</td>";
                          echo '<td><a href=""> Edit   </a> / 
                                     <a href="">Delete </a> /
                                     <a href=""> Show  </a>
                                </td>';
                        echo "</tr>";
                      }
                ?>
                <a href=""></a>
               
            </tbody>
            </table>
            
            
         


            

        </div>
   </div>
            
          
    </div> 

    <!-- <div class="sidebar">
      ziko
    </div> -->

  
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>
<footer>
</footer>
</html>

