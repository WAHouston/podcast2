<?php 
require 'head.php';
require 'header.php';
?>
<main>
    <h1>Upload</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <span>Select image to upload:</span>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</main>
<?php
require 'footer.php';
?>