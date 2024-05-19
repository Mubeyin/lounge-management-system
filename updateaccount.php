<?php
include 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    
</head>
<body>
    <div class="container">
        <h2>Update Account</h2>
        <form  method="post">
        <label for="username">Old Username:</label>
            <input type="text" id="username" name="o_username" required>

            <label for="password">Old Password:</label>
            <input type="password" id="username" name="o_password" required>


            <label for="username">New Username:</label>
            <input type="text" id="username" name="N_username" required>

            <label for="password">New Password:</label>
            <input type="password" id="password" name="N_password" required>

            <input type="submit" value="Update" name="update">
        </form>
    </div>
    <?php
if (isset($_POST['update'])) {
    // Retrieve form data
    $oldUsername = $_POST['o_username'];
    $oldPassword = $_POST['o_password'];
    $newUsername = $_POST['N_username'];
    $newPassword = $_POST['N_password'];

    // Validate old username and password (you can add more validation here)
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $oldUsername, $oldPassword);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update the username and password
        $updateSql = "UPDATE users SET username = ?, password = ? WHERE username = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("sss", $newUsername, $newPassword, $oldUsername);

        if ($updateStmt->execute()) {
            echo "Account updated successfully!";
        } else {
            echo "Error updating account: " . $updateStmt->error;
        }

        $updateStmt->close();
    } else {
        echo "Invalid old username or password.";
    }

    $stmt->close();
}

// Close the database connection
$conn->close();
?>

</body>
</html>
