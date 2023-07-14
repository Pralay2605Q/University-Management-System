<?php
    function submitAdmissionForm($data)
    {
        $first_name = $data['first_name'];
        $middle_name = $data['middle_name'];
        $last_name = $data['last_name'];
        $father_name = $data['father_name'];
        $email = $data['email'];
        $mobile_no = $data['mobile_no'];
        $course_code = $data['course_code'];
        $session = $data['session'];
        $current_address = $data['current_address'];
        $permanent_address = $data['permanent_address'];
        $dob = $data['dob'];
        $gender = $data['gender'];

        $profile_image = $_FILES['profile_image']['name'];
        $tmp_name=$_FILES['profile_image']['tmp_name'];
        $profile_image_path = "admissions/".$profile_image;
		move_uploaded_file($tmp_name, $profile_image_path);

        $signature = $_FILES['signature']['name'];
        $tmp_name=$_FILES['signature']['tmp_name'];
        $sign_path = "admissions/".$signature;
		move_uploaded_file($tmp_name, $sign_path);

        $thumb = $_FILES['thumb']['name'];
        $tmp_name=$_FILES['thumb']['tmp_name'];
        $thumb_path = "admissions/".$thumb;
		move_uploaded_file($tmp_name, $thumb_path);
        
        $conn = mysqli_connect("localhost","root","","university");

        $sql = "insert into admission_form(first_name, middle_name, last_name, father_name, email, mobileno, course_code, session, current_address, permanent_address, gender,dob, profile_image, signature, thumb) values('$first_name', '$middle_name', '$last_name', '$father_name', '$email', '$mobile_no', '$course_code', '$session', '$current_address', '$permanent_address', '$gender','$dob', '$profile_image', '$signature', '$thumb')";

        $res = mysqli_query($conn, $sql);

        if($res == 1)
        {
            return "Admission Form Submitted Successfully....!!!";
        }
        else{
            return "Somthing wrong, Try another time....!!!".mysqli_error($conn);
        }

    }
?>