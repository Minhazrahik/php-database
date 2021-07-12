<!DOCTYPE html>

<?php

if (isset($_POST['user'])) {

    require_once 'dbQuery.php';

    $keys = ['user', 'password', 'email', 'gender', 'dob', 'religion'];

    $res = [];

    foreach ($keys as $key => $value) {
        if (!isset($_POST[$value]) or empty($_POST[$value])) {
            echo $value . " Required field <br/><br/>";
        }

        $res[$value] = $_POST[$value];
    }

    if (getData('user', $res['email']))
        echo "Email already exists";

    else if (saveData('user', $res['email'], $res)) {

        $user1 = fetchData('user1');
        if (!$user1) $user1 = [];

        unset($res['password']);

        array_push($user1, $res);

        saveDataToFile('user1', $user1);

        echo "Registered Successfully!";
        header("Location: index.php");

        return;
    } else
        echo "Something went wrong!";
}


?>

<head>
    <title>Register Form</title>
    <style>
       
        form {
            text-align: left;
            width: 90%;
            margin: 0 auto;
        }

        legend {
            margin: 0 auto;
            color: teal;
        }

        input {
            margin: 5px 0;

        }

        p {
            text-align: center;
        }

        button {
            background-color: teal;
            color: white;
            padding: 5px 10px;
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <form action="" method="POST">
            <h2><legend>1. Basic Information:</legend></h2>

            <label>First Name</label><br>
            <input type="text" name="firstname" required><br>
            
            <label>Last Name</label><br>
            <input type="text" name="lastname" required><br>
            
            <label>Gender</label><br>
            <input type="radio" name="gender" value="male" required>
            <label for="male">Male</label><br>
            <input type="radio" name="gender" value="female" required>
            <label for="female">Female</label><br><br>

            <label>Date of Birth</label><br>
            <input type="date" name="dob" required><br><br>

            <label for="religion">Religion</label><br>
            <select name="religion" required>
                <option value="Islam">Islam</option>
                <option value="Hinduism">Hinduism</option>
                <option value="Christianity">Christianity</option>
                <option value="Buddhism">Buddhism</option>
            </select>
            <br><br>

            <h2><legend>2. Contact Information:</legend></h2>

            <label>Present Address</label><br>
            <input type="textarea" name="presentaddress"><br>

            <label>Permanent Address</label><br>
            <input type="textarea" name="permanentaddress"><br>
            
            <label>Phone</label><br>
            <input type="tel" name="phone"><br>

            <label>E-mail</label><br>
            <input type="email" name="email" required><br>

            <label>Personal Website Link</label><br>
            <input type="url" name="weblink"><br>

            <h2><legend>3. Account Information:</legend></h2>

            <label>Username</label><br>
            <input type="text" name="uname" required><br>

            <label>Password</label><br>
            <input type="password" name="password" required><br>


            <button type="submit" value="Register">Register</button><br>

        <p>Already Registered? <a href="index.php">Login</a></p>

    </form>
    <br>
</body>

</html>