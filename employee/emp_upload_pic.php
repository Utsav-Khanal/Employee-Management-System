<?php
// Check if a file is uploaded
  if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Get the uploaded file information
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_type = $_FILES['image']['type'];

    // Check if the file is an image
    $allowed_types = array('image/jpeg', 'image/png', 'image/gif');
    if (in_array($image_type, $allowed_types)) {
      // Read the image data
      $img_data = file_get_contents($image_tmp);
      
      // Escape special characters in the image data
      $img_data = $conn->real_escape_string($img_data);

      // Insert the image data into the database
      $sql = "INSERT INTO register (image_name, image_data) VALUES ('$image_name', '$img_data')";
      if ($conn->query($sql) === TRUE) {
        echo "Image uploaded and inserted successfully.";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "Invalid file format. Only JPG, PNG, and GIF images are allowed.";
    }
  } else {
    echo "Error uploading the image.";
  }
  
?>