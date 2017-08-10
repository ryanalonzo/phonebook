<?php

require_once('../vendor/autoload.php');

if(isset($_POST['add'])) {
    $new = [
        'first_name'    => $_POST['first_name'],
        'last_name'     => $_POST['last_name'],
        'middle_name'   => $_POST['middle_name'],
        'birthdate'     => $_POST['birthdate'],
        'address_line1' => $_POST['address_line1'],
        'address_line2' => $_POST['address_line2'],
        'city'          => $_POST['city'],
        'province'      => $_POST['province'],
        'mobile_number' => $_POST['mobile_number'],
        'home_number'   => $_POST['home_number']
    ];

    $vivid = new Vivid('localhost', 'phonebook', 'root', 'password');
    $vivid->table('users')
          ->create($new);
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Contact</title>
</head>
<body>
    <form action = "#" method = "POST">
        <table>
            <tr>
                <td><input type = "text" name = "first_name" placeholder = "First Name"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "last_name" placeholder = "Last Name"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "middle_name" placeholder = "Middle Name"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "birthdate" placeholder = "Birthdate"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "address_line1" placeholder = "Address Line 1"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "address_line2" placeholder = "Address Line 2"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "city" placeholder = "City"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "province" placeholder = "Province"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "mobile_number" placeholder = "Mobile Number"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "home_number" placeholder = "Home Number"></td>
            </tr>
            <tr>
                <td><input type = "submit" name = "add" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>