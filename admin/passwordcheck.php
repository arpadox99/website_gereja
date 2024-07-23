<?php

// Start output buffering
ob_start();

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve the username from POST data
  $username = filter_var($_POST['username'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  if (empty($username)) {
    echo "<script>
            alert('Data Tidak Boleh Kosong');
            window.location.href = 'index.php?page=password';
          </script>";
  } else {
    // Prepare and execute the query to verify the username
    $query = "SELECT * FROM user WHERE username = :username";
    $stmt = $con->prepare($query);

    if ($stmt === false) {
      die('Prepare failed: ' . $con->errorInfo()[2]);
    }

    // Bind the parameter
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if any row matches the username
    if (count($result) > 0) {
      // If verification is successful, store the username in the session
      $_SESSION['username'] = $username;
      echo "<script>
              window.location.href = 'index.php?page=passwordnew';
            </script>";
      // header('Location: index.php?page=passwordnew');
      exit(); // Make sure to exit after a header redirect
    } else {
      echo "Data tidak valid. Silakan coba lagi.";
    }

    // Close the statement
    $stmt->closeCursor();
  }
}

// End output buffering and flush the buffer
ob_end_flush();

// Close the database connection
$con = null;
