<?php
require_once('config.php');
mysqli_report(MYSQLI_REPORT_INDEX);
error_reporting(0);
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

    <title>Update Details</title>
</head>

<body>
    <div>
        <?php
        if (isset($_POST['submit'])) {
            $emailid = $_SESSION['email'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $mobileno = $_POST['mobileno'];
            $inputAddress = $_POST['inputAddress'];
            $inputAddress2 = $_POST['inputAddress2'];
            $inputCity = $_POST['inputCity'];
            $inputState = $_POST['inputState'];
            $inputZip = $_POST['inputZip'];
            if ($_SESSION['role'] == 'patient') {
                $sql = "UPDATE users1 SET firstname='$firstname', lastname='$lastname', mobileno='$mobileno', password='$password', inputAddress='$inputAddress', inputAddress2='$inputAddress2', inputCity='$inputCity', inputState='$inputState', inputZip='$inputZip' WHERE email='$emailid'";
            } elseif ($_SESSION['role'] == 'recep') {
                $add = $inputAddress . '' . $inputAddress2;
                $sql = "UPDATE recps SET firstname='$firstname', lastname='$lastname', mobileno='$mobileno', password='$password', address='$add', city='$inputCity', state='$inputState' WHERE email='$emailid'";
            } elseif ($_SESSION['role'] == 'doctor') {
                $add = $inputAddress . '' . $inputAddress2;
                $sql = "UPDATE doctors SET firstname='$firstname', lastname='$lastname', mobilenumber='$mobileno', password='$password', address='$add', city='$inputCity', state='$inputState' WHERE email='$emailid'";
            } else {
                $sql = "UPDATE admin SET firstname='$firstname', lastname='$lastname', mobileno='$mobileno', password='$password', address='$inputAddress', address2='$inputAddress2',  city='$inputCity', state='$inputState', pincode='$inputZip' WHERE email='admin@gmail.com'";
            }

            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo '<html><div class="alert alert-primary" role="alert"> Data is successfully saved.</div></html>';
            } else {
                echo '<html><div class="alert alert-danger" role="alert"> Data not saved to the database.</div></html>';
            }
        }
        ?>
    </div>
    <!--                 NAVBAR                -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
        <div class="container-fluid">
            <a class="navbar-brand text-success fs-4 fw-bold" href="#">
                <img src="Images/logo_g.png" alt="" width="30" height="24" class="d-inline-block align-text-top"> Cure&Care</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="homePage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="technology.php">Technology</a>
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
                            <li><a class="dropdown-item" href="Psychiatryphp">Psychiatry</a></li>
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
                <!-- window.location.href = 'Module_Patient.html';" -->
                <?php
                if (isset($_POST['back'])) {
                    if ($_SESSION['role'] == 'admin') {
                        header("Location: Admin_Profile.php");
                    } elseif ($_SESSION['role'] == 'doctor') {
                        header("Location: doctor.php");
                    } elseif ($_SESSION['role'] == 'recep') {
                        header("Location: Receptionist_Profile.php");
                    } else {
                        header("Location: Module_Patient.php");
                    }
                }
                ?>

                <form action="" method="POST">
                    <input class="btn btn-success" value='Back' name='back' type="submit" />
                </form>
            </div>
        </div>
    </nav>
    <!--                                 NAVBAR END                            -->

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="container">
            <form class="row g-3">
                <form class="row">
                    <Label>Name</Label>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="firstname">
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="lastname">
                    </div>
                </form>

                <div class="mt-2 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mt-2 col-md-6">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" class="form-control" name="mobileno">
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
                    <input type="text" class="form-control" id="inputCity" name="inputCity">
                </div>
                <div class="mt-2 col-md-4">
                    <label for="inputState" class="form-label">State</label>
                    <select id="inputState" class="form-select" name="inputState">
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
                    <input type="text" class="form-control" id="inputZip" name="inputZip">
                </div>
                <div class="mt-3 col-12">
                    <!-- <button type="submit" class="btn btn-success" name="update">Update</button> -->
                    <input class="btn btn-success" type="submit" name="submit" value="Update">
                </div>
            </form>
        </div>
    </form>

    <!-- JAVASCRIPT -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        // if correct email and pass
        function myFunction() {
            alert("You're details are updated successfully.");
        }

        function myFunction1() {
            confirm("Are you sure you want to return?");
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>