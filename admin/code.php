<?php
// session_start();
include('../config/dbcon.php');



if (isset($_POST['add-user'])) {
    $fullname = mysqli_real_escape_string($con, $_POST['full_name']);
    $username = mysqli_real_escape_string($con, $_POST['user_name']);
    $type = mysqli_real_escape_string($con, $_POST['type']);
    $location = mysqli_real_escape_string($con, $_POST['location']);

    $sql = "INSERT INTO user_list (full_name, user_name, type, location) VALUES ('$fullname', '$username', '$type', '$location' )";
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {
        $_SESSION['message'] = "Add user succesfully";
        header('Location: ./users.php');
    } else {
        $_SESSION['message'] = "something went wrong";
        header('Location: ./users.php');
    }
} else if (isset($_POST['save-changes'])) {
    $data_id = $_POST['data_id'];
    $fullname = $_POST['full_name'];
    $username = $_POST['user_name'];
    $option_type = $_POST['type'];
    $option_location = $_POST['location'];

    $update_query = "UPDATE user_list SET full_name = '$fullname', user_name = '$username', type='$option_type', location = '$option_location' WHERE id='$data_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if (isset($update_query_run)) {
        $_SESSION['message'] = 'Updated succesfully';
        header("Location: ./users.php");
    }
} else if (isset($_POST['delete-btn'])) {
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);

    $delete = "DELETE FROM user_list WHERE id='$data_id' ";
    $delete_query = mysqli_query($con, $delete);

    if ($delete_query) {
        $_SESSION['message'] = 'Deleted succesfully';
        header('Location: ./users.php');
    }

} else if (isset($_POST['add-location'])) {
    $location = mysqli_real_escape_string($con, $_POST['location']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $sql = "INSERT INTO location_list (location, status) VALUES ('$location', '$status')";
    $sql_run = mysqli_query($con, $sql);
    if ($sql_run) {
        $_SESSION['message'] = "Add Location succesfully";
        header('Location: ./main.php');
    } else {
        $_SESSION['message'] = "something went wrong";
        header('Location: ./main.php');
    }
} else if (isset($_POST['save-details'])) {
    $data_id = $_POST['data_id'];
    $location = $_POST['location'];
    $status = $_POST['status'];


    $update_query = "UPDATE location_list SET location = '$location', status = '$status' WHERE id='$data_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if (isset($update_query_run)) {
        $_SESSION['message'] = 'Updated succesfully';
        header("Location: ./main.php");
    }
} else if (isset($_POST['delete-detail'])) {
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);

    $delete = "DELETE FROM location_list WHERE id='$data_id' ";
    $delete_query = mysqli_query($con, $delete);

    if ($delete_query) {
        $_SESSION['message'] = 'Deleted succesfully';
        header('Location: ./main.php');
    }

} else if (isset($_POST['add-route-list'])) {
    $data_id = $_POST['data_id'];
    $departlocation = mysqli_real_escape_string($con, $_POST['departLocation']);
    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $normal = mysqli_real_escape_string($con, $_POST['normalPrice']);
    $student = mysqli_real_escape_string($con, $_POST['studentPrice']);
    $senior = mysqli_real_escape_string($con, $_POST['seniorPrice']);
    $status = mysqli_real_escape_string($con, $_POST['status']);

    $update_query = "INSERT INTO routes_price_list ( departLocation, destination, normalPrice, studentPrice, seniorPrice, status) VALUES ('$departlocation', '$destination', '$normal', '$student', '$senior', '$status')";
    $update_query_run = mysqli_query($con, $update_query);

    if (isset($update_query_run)) {
        $_SESSION['message'] = 'Updated succesfully';
        header("Location: ./routes-price-list.php");
    }

} else if (isset($_POST['save-route-list'])) {
    $data_id = $_POST['data_id'];
    $departlocation = $_POST['departLocation'];
    $destination = $_POST['destination'];
    $normal = $_POST['normalPrice'];
    $student = $_POST['studentPrice'];
    $senior = $_POST['seniorPrice'];
    $status = $_POST['status'];


    $update_query = "UPDATE routes_price_list SET departLocation = '$departlocation', destination = '$destination', normalPrice = '$normal', studentPrice = '$student', seniorPrice = '$senior', status = '$status' WHERE id='$data_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if (isset($update_query_run)) {
        $_SESSION['message'] = 'Updated succesfully';
        header("Location: ./routes-price-list.php");
    }
} else if (isset($_POST['delete-route-list'])) {
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);

    $delete = "DELETE FROM routes_price_list WHERE id='$data_id' ";
    $delete_query = mysqli_query($con, $delete);

    if ($delete_query) {
        $_SESSION['message'] = 'Deleted succesfully';
        header('Location: ./routes-price-list.php');
    }
} else if (isset($_POST['save-ticket'])) {
    $data_id = mysqli_real_escape_string($con, $_POST['data_id']);
    // $selected = $_POST['option'];
    $departlocation = mysqli_real_escape_string($con, $_POST['depart_location']);
    $destination = mysqli_real_escape_string($con, $_POST['destination']);
    $normal = mysqli_real_escape_string($con, $_POST['normal']);
    $student = mysqli_real_escape_string($con, $_POST['student']);
    $senior = mysqli_real_escape_string($con, $_POST['senior']);

    // $amount = $amounts[$departlocation . "-" . $destination];
    // $total = $normal * $amount + $student * $amount * 0.8 + $senior * $amount * 0.6;
    // $totalPrice = number_format($total);
    // $totalPrice = mysqli_real_escape_string($con, $_POST['totalPrice']);

    

    $sql = "INSERT INTO ticketing (depart_location, destination, normal, student, senior, totalPrice ) VALUES ('$departlocation', '$destination', '$normal', '$student', '$senior', '$totalPrice')";
    $sql_run = mysqli_query($con, $sql);

    if ($sql_run) {
        $_SESSION['message'] = "Transcation succesfully saved";
        header('Location: ./ticketing.php');
    } else {
        $_SESSION['message'] = "something went wrong";
        header('Location: ./ticketing.php');
    }
}

?>