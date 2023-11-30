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
    <title>Ask Queries</title>
</head>

<body>
    <div>
        <?php
        $srno=0;
        
            if (isset($_POST['query'])) {
                $comments = $_POST['comments'];
                $email = $_SESSION['email'];
                $recepid='id';
                $answer='Not yet answered.';
                $sql = "INSERT INTO `queries` (`srno`, `userid`, `date`, `queri`, `answer`, `recepid`) VALUES ('$srno', '$email', current_timestamp(), '$comments', NULL, '')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo '<html><div class="alert alert-primary" role="alert">
                    Successfully Saved Query.
              </div></html>';
                } else {
                    echo '<html><div class="alert alert-danger" role="alert">
                    Query not saved.
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
                    <h4 class="m-0 fs-2">Patient</h4>
                    <p class="font-weight-normal text-muted mb-0">Module</p>
                </div>
            </div>
        </div>
        <hr>
        <ul class="nav flex-column bg-white mb-0 fs-6">
            <li class="nav-item">
                <a href="Module_Patient.php" class="nav-link text-dark">
                    <i class="fa fa-th-large mr-3 text-primary fa-fw"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a href="Patient_SchAppointment.php" class="nav-link text-dark">
                    <i class="fa fa-address-card mr-3 text-primary fa-fw"></i> Schedule Appointment
                </a>
            </li>
            <li class="nav-item">
                <a href="Patient_ViewPresc.php" class="nav-link text-dark">
                    <i class="fa fa-cubes mr-3 text-primary fa-fw"></i> View Appointment
                </a>
            </li>
            <li class="nav-item">
                <a href="Patient_AskQueries.php" class="nav-link active text-dark" style="background-color:rgb(187, 187, 187);">
                    <i class="fa fa-picture-o mr-3 text-primary fa-fw"></i> Ask Queries
                </a>
            </li>
        </ul>
    </div>
    <!-- End vertical navbar -->


    <!-- Page content holder -->
    <form action="Patient_AskQueries.php" method="post">
    <div class="page-content p-5" id="content">
        <!-- Toggle button -->
        <button id="sidebarCollapse" type="button" class="btn btn-success  rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Dashboard</small></button>

        <section style="background-color: #eee;">
            <div class="row">
                <!-- <div class="col-lg-8"> -->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <p class="mb-0">Do you have any query related to our system, service or any other problems. Feel free to ask.</p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Ask your query here</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- <textarea class="form-control" id="comments" rows="3"></textarea> -->
                                <label for="floatingTextarea2" name="comments"></label>
                                <input name="comments" id="comments" class="form-control" type="textarea" rows="3">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-outline-success" name="query" href="#">Post query</button>
                            </div>
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
                alert("Details updated successfully.");
            }
        </script>

</body>

</html>