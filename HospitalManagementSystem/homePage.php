<?php
require_once('config.php');
//error_reporting(0);
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

    <?php
    include("navbar.php");
    ?>
    <!--                    CAROUSEL START                    -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Images/Carousel3.jpg" class="d-block w-100" height=500px; alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/Carousel2.jpg" class="d-block w-100" height=500px; alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/Carousel1.jpg" class="d-block w-100" height=500px; alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/Carousel4.jpg" class="d-block w-100" height=500px; alt="...">
            </div>
            <div class="carousel-item">
                <img src="Images/Carousel5.jpg" class="d-block w-100" height=500px; alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--                     CAROUSEL END                 -->

    <!--                     TEXT PART                    -->
    <p class="mt-4 text-center fs-1 font-sans-serif fw-bold">Welcome To Cure&Care - A Union of Compassion + Healthcare</p>

    <p class="lh-base fs-5 text text-center mt-4 text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi eligendi, placeat alias eos optio ex. Provident blanditiis, harum sapiente vel itaque cum maxime optio in sint maiores rem, deserunt excepturi eaque nobis earum aliquam modi odio inventore.
        Iusto, commodi cupiditate!</p>

    <!--                     BUTTON                         -->
    

    <!--                     CARDS START                    -->
    <div class="container my-4">
        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-info">Checkup</strong>
                        <h3 class="mb-0">Free Campaign</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, omnis. Dignissimos consequuntur repellat maxime, optio omnis vero. Voluptatibus delectus dolorum porro accusamus suscipit ea?</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="Images/ThumbN5.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-secondary">Medical</strong>
                        <h3 class="mb-0">Research</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, omnis. Dignissimos consequuntur repellat maxime, optio omnis vero. Voluptatibus delectus dolorum porro accusamus suscipit ea?</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="Images/ThumbN4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success">Hospital</strong>
                        <h3 class="mb-0">Doctors</h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis, blanditiis aut. Voluptatem laborum ab amet. Nobis animi voluptate ipsa sit inventore eaque, saepe temporibus.</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="Images/ThumbN6.jpg" alt="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-danger">Hospital</strong>
                        <h3 class="mb-0">Policies</h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="mb-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam, omnis. Dignissimos consequuntur repellat maxime, optio omnis vero. Voluptatibus delectus dolorum porro accusamus suscipit ea?</p>
                        <a href="#" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <img class="bd-placeholder-img" width="200" height="250" src="Images/ThumbN2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--                                  CARDS END                       -->



    <!-- Queries Section -->
    <section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4">Answer and Queries</h2>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</p>
    </section>
    <div class="container my-4">
        <section style="background-color:lightgray;">
            <div class="row-sm-6">
                <div class="col-sm-8" style="margin-left: 200px;">
                        <?php
                        $sql = "SELECT * FROM queries WHERE 1";
                        $result = mysqli_query($conn, $sql);
                        $num = mysqli_num_rows($result);
                        $arr = mysqli_fetch_array($result);
                        while ($arr = mysqli_fetch_array($result)) {
                            if ($arr['status'] == 1) {
                        ?>
                         <div class="card mb-2" style="margin-bottom: 50px;">
                                <div class="card-body mb-3 my-2">
                                    <div class="row-lg-9">
                                        <div class="col-sm-3">
                                            <p class="mb-0"><strong>Query</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"></p><?php echo $arr['queri']; ?>
                                        </div>
                                    </div>
                                    <div class="row-sm-9">
                                        <div class="col-sm-3">
                                            <p class="mb-0"><strong>Answer</strong></p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0"></p><?php echo $arr['answer']; ?>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <?php
                            }
                        }
                        ?>

                </div>
            </div>
        </section>
    </div>







    <!-- Queries Section end -->



    <div>
        <?php
        include("footer.php");
        ?>
    </div>

    <!-- JAVASCRIPT -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        // if correct email and pass
        function myFunction1() {
            alert("You are logged in successfully.");
        }

        function myFunction2() {
            alert("You are registered successfully.");
        }
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>