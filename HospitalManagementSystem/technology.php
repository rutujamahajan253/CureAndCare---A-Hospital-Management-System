<?php
require_once('config.php');
error_reporting(0);
mysqli_report(MYSQLI_REPORT_INDEX);
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Cure&Care</title>
</head>

<body>
<div>
        <?php
        if (isset($_POST['register'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $mobileno = $_POST['mobileno'];
            $inputAddress = $_POST['inputAddress'];
            $inputAddress2 = $_POST['inputAddress2'];
            $inputCity = $_POST['inputCity'];
            $inputState = $_POST['inputState'];
            $inputZip = $_POST['inputZip'];
            
            $sql = "INSERT INTO `users1` (`firstname`, `lastname`, `email`, `password`,'mobileno', `inputAddress`, `inputAddress2`, `inputCity`, `inputState`, `inputZip`, `date`) VALUES ('$firstname', '$lastname', '$email', '$password','$mobileno', '$inputAddress', '$inputAddress2', '$inputCity', '$inputState', '$inputZip', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<html><div class="alert alert-primary" role="alert">
               Data is successfully saved.
              </div></html>';
            } else {
                echo '<html><div class="alert alert-danger" role="alert">
                Data not saved to the database.
               </div></html>';
            }
        }

        ?>
        <?php
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $email_search = "SELECT * FROM users1 WHERE email='$email' AND password='$password'";
            $query = mysqli_query($conn, $email_search);
            $email_count = mysqli_num_rows($query);
            $_SESSION['email']=$email;
            $_SESSION['status']=1;
            echo '<a href="get_session.php">see session</a>';
            if (mysqli_num_rows($query) != 0) {
                // echo "<script language='javascript' type='javascript'> window.location.href='Module_Patient.php' </script>";
                header("Location: Module_Patient.php");
            } else {
                echo '<script>alert("Invalid Email Or Password.")</script>';
            }
        }
        ?>
    </div>


    <!--                 NAVBAR                -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container-fluid">
            <a class="navbar-brand text-success fs-4 fw-bold" href="#">
                <img src="Images/logo_g.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> Cure&Care
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="homePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="technology.php">Technology</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Departments
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Cardiology.php">Cardiology</a></li>
                            <li><a class="dropdown-item" href="Dental.php">Dental</a></li>
                            <li><a class="dropdown-item" href="Dermatology.php">Dermatology</a></li>
                            <li><a class="dropdown-item" href="Gyanaecology.php">Gyanaecology & Obstetrics</a></li>
                            <li><a class="dropdown-item" href="neurology.php">Neurology</a></li>
                            <li><a class="dropdown-item" href="Opthalmology.php">Ophthalmology</a></li>
                            <li><a class="dropdown-item" href="Orthopedics.php">Orthopedics</a></li>
                            <li><a class="dropdown-item" href="Pediatric.php">Pediatric</a></li>
                            <li><a class="dropdown-item" href="Psychiatry.php">Psychiatry</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="pathology.php">Pathology</a></li>
                            <li><a class="dropdown-item" href="Pharmacy.php">Pharmacy</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>

                </ul>

                <!-- <div class="mx-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Login
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">As Patient</a></li>
                            <li><a class="dropdown-item" href="#">As Staff</a></li>
                        </ul>
                    </div>

                    <-- <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Sign Up
                    </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">As Patient</a></li>
                            <li><a class="dropdown-item" href="#">As Staff</a></li>
                        </ul>
                    </div> -->

                <div class="mx-2">
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
                </div>
            </div>
        </div>
    </nav>
    <!--                                 NAVBAR END                            -->
    <!-- Sign Up Modal-->
    <form action="homePage.php" method="post" name="signin">
        <div class="modal" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Don't have any account ! No worries, create one HERE!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="row g-3">
                            <form class="row g-3">
                                <Label>Name</Label>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname" required>
                                </div>
                            </form>
                            <div class="mt-2 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mt-2 col-12">
                                <label for="mobileno" class="form-label">Mobile Number</label>
                                <input type="text" class="form-control" id="mobileno" name="mobileno">
                            </div>
                            <div class="mt-2 col-12">
                                <label for="inputAddress" class="form-label">Address</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" name="inputAddress">
                            </div>
                            <div class="mt-2 col-12">
                                <label for="inputAddress2" class="form-label">Address 2</label>
                                <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor" name="inputAddress2">
                            </div>
                            <div class="mt-2 col-md-6">
                                <label for="inputCity" class="form-label">City</label>
                                <input type="text" class="form-control" id="inputCity" name="inputCity" required>
                            </div>
                            <div class="mt-2 col-md-4">
                                <label for="inputState" class="form-label">State</label>
                                <select id="inputState" class="form-select" name="inputState" required>
                                    <option selected>Choose</option>
                                    <option>Maharashtra</option>
                                    <option>Gujrat</option>
                                    <option>Rajasthan</option>
                                    <option>Delhi</option>
                                    <option>Goa</option>
                                    <option>Himachal Pradesh</option>
                                    <option>Madhya Pradesh</option>
                                </select>
                            </div>
                            <div class="mt-2 col-md-2">
                                <label for="inputZip" class="form-label">Pincode</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip" required>
                            </div>
                            <div class="mt-3 col-12">
                                <button type="submit" class="btn btn-success" name="register" onclick="myFunction2()">Register Me</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- Login Modal -->
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Here !</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Login">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container-fluid">
        <div class="row">
            <img src="Images/Tech_img1.jpg" height=500px;>
        </div>
    </div>
    <div class="card-group container my-4">
        <div class="card" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title">AI</h5>
                <h6 class="card-subtitle mb-2 text-muted">Medical Equipments</h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, animi modi fuga vitae cupiditate accusamus iure magnam. Repudiandae sit molestiae non alias temporibus. Blanditiis eos repudiandae perspiciatis reiciendis ducimus architecto.</p>
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Learn More</button>
            </div>
        </div>
        <div class="card" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title">3d-Printing</h5>
                <h6 class="card-subtitle mb-2 text-muted">Parts</h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, animi modi fuga vitae cupiditate accusamus iure magnam. Repudiandae sit molestiae non alias temporibus. Blanditiis eos repudiandae perspiciatis reiciendis ducimus architecto.</p>
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Learn More</button>
            </div>
        </div>
        <div class="card" style="width: 14rem;">
            <div class="card-body">
                <h5 class="card-title">Nanomedicine</h5>
                <h6 class="card-subtitle mb-2 text-muted">Nanotechnology</h6>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, animi modi fuga vitae cupiditate accusamus iure magnam. Repudiandae sit molestiae non alias temporibus. Blanditiis eos repudiandae perspiciatis reiciendis ducimus architecto.</p>
                <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Learn More</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card mb-3 py-4" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="Images/Tech_img4.jpg" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">AI in medical field</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis doloribus dolorum tempore cum! Esse similique dignissimos illum odio, culpa nam dolore assumenda saepe aliquid hic ipsum nisi doloribus quibusdam a molestias autem
                            cum aut? Laboriosam magnam doloremque hic ducimus obcaecati quo possimus illo eligendi sint earum dolorem facilis explicabo provident tenetur maxime consectetur facere, nostrum vero eos! Cupiditate possimus nihil velit mollitia
                            eum, cumque dicta voluptas eos nesciunt aperiam veritatis unde rem, neque repellendus. Cum modi, soluta dolor dolorem ipsum sapiente error placeat dolorum quasi voluptatum suscipit quod hic quos tempore eligendi incidunt temporibus
                            nisi voluptas qui nobis. Ab, quaerat blanditiis similique a maiores aliquam iste, iure nam eos earum cupiditate exercitationem assumenda. Sint, quos unde at repellat aliquam maiores!</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3 my-4 py-4" style="max-width: 100%;">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">Robotic Surgery</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero omnis voluptas esse mollitia voluptatibus sequi. Sed esse voluptatem perspiciatis excepturi! Omnis odit laboriosam commodi repudiandae deleniti, consequatur eius quis
                            nam at facilis, doloribus, exercitationem deserunt! Harum illum autem itaque eius, provident necessitatibus. Natus laboriosam autem, labore maxime deserunt perferendis? Exercitationem, animi. Quis doloribus consequatur soluta
                            incidunt explicabo hic facere nam excepturi enim, perferendis itaque minus! Animi unde minus natus soluta sed numquam voluptatem dolor cumque modi voluptate voluptas necessitatibus recusandae magnam, consectetur perspiciatis.
                            Aliquid vel quo incidunt sit, voluptatibus quod, eum voluptas autem eos magnam harum delectus, nemo laborum saepe? Debitis ducimus, dicta, atque possimus tempora molestias ex non, mollitia ullam velit blanditiis illum obcaecati
                            nisi facere! Distinctio, impedit sint!
                        </p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="Images/Tech_img5.jpg" class="img-fluid rounded-start" alt="...">
                </div>
            </div>
        </div>
    </div>

    <?php
            include("footer.php");
        ?>
    <!--                                     FOOTER END                       -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>