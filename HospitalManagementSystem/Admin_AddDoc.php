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

    <link rel="stylesheet" href="module.css">
    <link rel="stylesheet" href="Profile_Pic.css">
    <title>Add Doctor</title>
</head>

<body>
    <div>
        <?php
        $docid=0;
        if (isset($_POST['submit'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $mobilenumber = $_POST['mobilenumber'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $salary = $_POST['salary'];
            $other = $_POST['other'];
            
            if($department == 'other')
            {
                $other = $department;
            }

            $sql = "INSERT INTO `doctors` (`docid`,`firstname`, `lastname`,`email`, `password` ,`address`, `city`, `state`, `mobilenumber`, `gender`, `department`,`salary`) VALUES ('$docid','$firstname', '$lastname','$email', '$password' ,'$address', '$city', '$state', '$mobilenumber', '$gender', '$department','$salary')";
            
            // $result = mysqli_query($conn, $sql);
            $result = mysqli_query($conn, $sql);
            // $num = mysqli_num_rows($result);

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
                <button class="btn btn-success" onclick="window.location.href = 'logout.php';">Log Out</button>
            </div>
        </div>
    </nav>
    <!--                                 NAVBAR END                            -->


    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <div class="media-body">
                    <h4 class="m-0 fs-2">Admin</h4>
                    <p class="font-weight-normal text-muted mb-0">Module</p>
                </div>
            </div>
        </div>
        <hr>
        <ul class="nav flex-column bg-white mb-0 fs-6">
            <li class="nav-item">
                <a href="Admin_Profile.php" class="nav-link text-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a href="Admin_AddDoc.php" class="nav-link active text-dark" style="background-color:rgb(187, 187, 187);">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i> Add Doctor
                </a>
            </li>
            <li class="nav-item">
                <a href="Admin_AddRecp.php" class="nav-link text-dark">
                    <i class="fa fa-cubes mr-3 text-primary fa-fw"></i> Add Receptionist
                </a>
            </li>
        </ul>
    </div>
    <!-- End vertical navbar -->


    <!-- Page content holder -->
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-success  rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Dashboard</small></button>
        </h1>
        <!-- Bootstrap table and table-dark classes -->
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">srno</th>
                    <th scope="col">firstname</th>
                    <th scope="col">lastname</th>
                    <th scope="col">email</th>
                    <th scope="col">address</th>
                    <th scope="col">city</th>
                    <th scope="col">state</th>
                    <th scope="col">mobilenumber</th>
                    <th scope="col">gender</th>
                    <th scope="col">department</th>
                    <th scope="col">other</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * FROM doctors WHERE 1";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                $arr = mysqli_fetch_array($result);
                ?>

                    <tr class=" ">
                        <td><?php echo $arr['docid'];  ?></td>
                        <td><?php echo $arr['firstname'];  ?></td>
                        <td><?php echo $arr['lastname']; ?></td>
                        <td><?php echo $arr['email']; ?></td>
                        <td><?php echo $arr['address']; ?></td>
                        <td><?php echo $arr['city']; ?></td>
                        <td><?php echo $arr['state']; ?></td>
                        <td><?php echo $arr['mobilenumber']; ?></td>
                        <td><?php echo $arr['gender']; ?></td>
                        <td><?php echo $arr['department']; ?></td>
                        <td><?php echo $arr['other']; ?></td>
                    </tr>
                <?php
                while ($arr = mysqli_fetch_array($result)) {
                ?>

                    <tr class=" ">
                        <td><?php echo $arr['docid'];  ?></td>
                        <td><?php echo $arr['firstname'];  ?></td>
                        <td><?php echo $arr['lastname']; ?></td>
                        <td><?php echo $arr['email']; ?></td>
                        <td><?php echo $arr['address']; ?></td>
                        <td><?php echo $arr['city']; ?></td>
                        <td><?php echo $arr['state']; ?></td>
                        <td><?php echo $arr['mobilenumber']; ?></td>
                        <td><?php echo $arr['gender']; ?></td>
                        <td><?php echo $arr['department']; ?></td>
                        <td><?php echo $arr['other']; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Page content holder -->
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="page-content p-5" id="content">
            <section style="background-color: #eee;">
                <div class="row">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-md-6" style="margin-bottom: 10px">
                                        <input type="text" class="form-control" id="firstname" placeholder="First name" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-md-6" style="margin-bottom: 10px">
                                        <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 10px">
                                    <input type="text" class="form-control" id="appaddress" placeholder="Address" name="address" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="col-md-6" style="margin-bottom: 10px">
                                        <input type="text" class="form-control" placeholder="City" name="city" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="col-md-6" style="margin-bottom: 10px">
                                        <input type="text" class="form-control" placeholder="State" name="state" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="inputmobilenumber" class="form-label">Mobile Number</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobilenumber" required>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-2 col-md-6">
                                        <label for="inputgender" class="form-label">Gender</label>
                                        <select id="inputgender" class="form-select" name="gender" required>
                                            <option selected>--</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mt-2 col-md-6">
                                        <label for="departmentname" class="form-label">Department</label>
                                        <select id="departmentname" class="form-select" name="department" required>
                                            <option selected>--</option>
                                            <option>Cardiology</option>
                                            <option>Dental</option>
                                            <option>Dermatology</option>
                                            <option>Gyanaecology & Obsterics</option>
                                            <option>Neurology</option>
                                            <option>Opthalmology</option>
                                            <option>Orthopedics</option>
                                            <option>Pediatric</option>
                                            <option>Psychiatry</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mt-2 col-md-6">
                                        <label for="inputother" class="form-label">Specify Other Department</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="other">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="col-sm-6">
                                    <div class="mt-2 col-md-6">
                                        <label for="salary" class="form-label">Salary</label>
                                        <input class="form-control" id="exampleFormControlTextarea1" rows="1" name="salary">
                                    </div>
                                </div>
                            <br>
                            <div class="row">
                                <div class="col-sm-5">
                                </div>
                                <div class="col-sm-6">
                                    <input class="btn btn-outline-success" type="submit" name="submit" value="Add Doctor">
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="main.js"></script>

    <script>
        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });

        function myFunction() {
            alert("Doctor added successfully.");
        }
    </script>

</body>

</html>