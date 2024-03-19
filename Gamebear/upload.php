<?php
if (isset($_FILES['fileToUpload'])) {
    $errors = [];
    $file = $_FILES['fileToUpload'];
    // File properties
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];

    // Work on the file extension
    $file_ext = explode('.', $file_name);
    $file_ext = strtolower(end($file_ext));

    // Specify allowed file types
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];

    // Validate the file...

    // Check for errors
    if ($file_error === 0) {
        if ($file_size <= 2097152) { // 2MB
            if (in_array($file_ext, $allowed)) {
                // File is valid, and you can continue processing
            } else {
                $errors[] = 'Invalid file type.';
            }
        } else {
            $errors[] = 'File size must be under 2MB.';
        }
    } else {
        $errors[] = 'Error uploading your file.';
    }

    // Check for errors before moving the file...

    if (empty($errors)) {
        $file_name_new = uniqid('', true) . '.' . $file_ext;
        $file_destination = 'uploads/' . $file_name_new;

        if (move_uploaded_file($file_tmp, $file_destination)) {
            echo 'File uploaded successfully';
        } else {
            $errors[] = 'Error moving the file.';
        }
    } else {
        // Output each error
        foreach ($errors as $error) {
            echo $error . '\n';
        }
    }
}
?>