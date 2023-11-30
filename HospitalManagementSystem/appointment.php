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
        // $appid = 0;
        if (isset($_POST['schedule'])) {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $contactno = $_POST['contactno'];
            $gender = $_POST['gender'];
            $department = $_POST['department'];
            $doctor = $_POST['doctor'];
            $date = $_POST['appdate'];
            $time = $_POST['apptime'];
            $comment = $_POST['comment'];


            $sql = "INSERT INTO `appointments` (`appid`, `firstname`, `lastname`, `address`, `city`, `state`, `contactno`, `gender`, `department`, `doctor`, `date`, `time`, `comment`) VALUES ('$appid', '$firstname', '$lastname', '$address', '$city', '$state', '$contactno', '$gender', '$department', '$doctor', '$date', '$time', '$comment')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo 'Successfully Saved.';
            } else {
                echo 'Data not saved.';
            }
        }

        include("nav.php");
        ?>
        <!-- schedule appointment -->
        <div class="container">
            <form action="appointment.php" method="post">

                <h1 style="margin-bottom: 30px">Schedule Appointment</h1>
                <div class="row align-items-start col-6" style="background-color: rgb(166, 172, 166)">
                    <div class="row g-3">
                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <input type="text" class="form-control" id="firstname" placeholder="First name" name="firstname" required>
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-bottom: 10px">
                                <input type="text" class="form-control" id="appaddress" placeholder="Address" name="address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <input type="text" class="form-control" placeholder="City" name="city" required>
                            </div>
                            <div class="col-md-6" style="margin-bottom: 10px">
                                <input type="text" class="form-control" placeholder="State" name="state" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" placeholder="Contact No. " name="contactno" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 col-md-6">
                                <label for="inputgender" class="form-label">Gender</label>
                                <select id="inputgender" class="form-select" name="gender" required>
                                <option selected>--</option>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Other</option>
                            </select>
                            </div>
                            <div class="mt-2 col-md-6">
                                <label for="departmentname" class="form-label">Department</label>
                                <select id="departmentname" class="form-select" name="department" required>
                                <option selected>--</option>
                                <option>Neurology</option>
                                <option>Cardiology</option>
                                <option>Other</option>
                            </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-2 col-md-6">
                                <label for="doctorname" class="form-label">Doctor</label>
                                <select id="doctorname" class="form-select" name="doctor" required>
                                <option selected>--</option>
                                <option>ABC (Neurology)</option>
                                <option>XYZ (Cardiology)</option>
                                <option>Other</option>
                            </select>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 10pxs">
                            <div class="mt-2 col-md-6" style="margin-bottom: 10px">
                                <label for="appdate" class="form-label">Appointment Date</label>
                                <input type="date" class="form-control" id="appdate" name="date" required>
                            </div>
                            <div class="mt-2 col-md-6" style="margin-bottom: 10px">
                                <label for="apptime" class="form-label">Appointment Time</label>
                                <input type="time" class="form-control" id="apptime" name="time" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-12">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                        </div>
                        <div class="row col-3" style="margin-top: 20px; margin-bottom: 10px; margin-left: 10px;">
                            <!-- <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">Schedule</button> -->
                            <input class="btn btn-success" type="submit" name="schedule" value="Schedule">
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </body>

    </html>