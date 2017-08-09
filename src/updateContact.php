<?php

require_once('../vendor/autoload.php');
$vivid = new Vivid('localhost', 'phonebook', 'root', 'password');

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $info = $vivid->table('users')
                   ->getByID($id);
    foreach($info as $result) {
        $firstName    = $result->first_name;
        $lastName     = $result->last_name;
        $middleName   = $result->middle_name;
        $birthdate    = $result->birthdate;
        $address1     = $result->address_line1;
        $address2     = $result->address_line2;
        $city         = $result->city;
        $province     = $result->province;
        $mobileNumber = $result->mobile_number;
        $homeNumber   = $result->home_number;
    }
}

if(isset($_POST['save'])) {
    $id = $_POST['id'];
    $updated = [
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

    $vivid->table('users')
          ->update($updated, $id);
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
    <form action="#" method="POST">
        <table>
            <tr>
                <td><input type = "text" name = "first_name" placeholder = "First Name" value = "<?php echo $firstName;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "last_name" placeholder = "Last Name" value = "<?php echo $lastName;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "middle_name" placeholder = "Middle Name" value = "<?php echo $middleName;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "birthdate" placeholder = "Birthdate" value = "<?php echo $birthdate;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "address_line1" placeholder = "Address Line 1" value = "<?php echo $address1;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "address_line2" placeholder = "Address Line 2" value = "<?php echo $address2;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "city" placeholder = "City" value = "<?php echo $city;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "province" placeholder = "Province" value = "<?php echo $province;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "mobile_number" placeholder = "Mobile Number" value = "<?php echo $mobileNumber;?>"></td>
            </tr>
            <tr>
                <td><input type = "text" name = "home_number" placeholder = "Home Number" value = "<?php echo $homeNumber;?>"></td>
            </tr>
            <tr>
                <td>
                    <input type = "submit" name = "save" value="Save">
                    <input type = "hidden" name = "id" value = "<?php echo $id; ?>">

                    <button><a href="index.php">Cancel</a></button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>