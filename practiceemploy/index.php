<?php

include "./util/dbhelper.php";

$db = new DbHelper;

$employees = $db->getAllRecords("employees");

$allEmployees = $db->join_employee_details_leave();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="./logic/addEmployee.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>
            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required>
            <label for="age">Age</label>
            <input type="text" id="age" name="age" required>
            <label for="position">Position</label>
            <input type="text" id="position" name="position" required>

            <input type="submit" value="Add Employee" name="submit">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td>
                        <?php echo $employee["id"] ?>
                    </td>
                    <td>
                        <?php echo $employee["fname"] ?>
                    </td>
                    <td>
                        <?php echo $employee["lname"] ?>
                    </td>
                    <td>
                        <?php echo $employee["age"] ?>
                    </td>
                    <td>
                        <?php echo $employee["position"] ?>
                    </td>
                    <td>
                        <a href="editEmployee.php?id=<?php echo $employee["id"] ?>">&#9998;</a>
                        <a href="./logic/deleteEmployee.php?id=<?php echo $employee["id"] ?>">&times;</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>