<?php

class FileUploadClass {

    var $uploadFilename;

    public function FileUploadClass() {

         //Make a note of the current working directory, relative to root.
        $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
        $uploadsDirectory = 'assets/images/rss_feed/'; //Make a note of the directory that will recieve the uploaded file
        $uploadForm = 'http://' . $_SERVER['HTTP_HOST'] . $directory_self . 'collection.php '; //Make a note of the location of the upload form in case we need it
        $fieldname = 'newsImage';  //Fieldname used within the file <input> of the HTML form

        //Possible PHP upload errors
        $errors = array(1 => 'php.ini max file size exceeded',
            2 => 'html form max file size exceeded',
            3 => 'file upload was only partial',
            4 => 'no file was attached');

         //Check the upload form was actually submitted else print the form
        isset($_POST['submit']);
//                or $this->error('the upload form is neaded', $uploadForm);
        
         //Check for PHP's built-in uploading errors
        ($_FILES[$fieldname]['error'] == 0);
//                or $this->error($errors[$_FILES[$fieldname]['error']], $uploadForm);

         //Check that the file we are working on really was the subject of an HTTP upload
        @is_uploaded_file($_FILES[$fieldname]['tmp_name']);
//                or $this->error('not an HTTP upload', $uploadForm);

         //getimagesize() returns false if the file tested is not an image.
        @getimagesize($_FILES[$fieldname]['tmp_name']);
//                or $this->error('only image uploads are allowed', $uploadForm);

         //Make a unique filename for the uploaded file and check it is not already
         //taken... if it is already taken keep trying until we find a vacant one
         //i.e: 1140732936-filename.jpg
        $now = time();
        while (file_exists($this->uploadFilename = $uploadsDirectory . $now . '-' . $_FILES[$fieldname]['name'])) {
            $now++;
        }

         //Move the file to its final location and allocate the new filename to it
        @move_uploaded_file($_FILES[$fieldname]['tmp_name'], $this->uploadFilename);
//                or $this->error('receiving directory insuffiecient permission', $uploadForm);               

         //If you got this far, everything has worked and the file has been successfully saved.
         //We are now going to redirect the client to a success page.
         
        // header('Location: ' . $uploadSuccess);
    }

    public function error($error, $location, $seconds = 5) {
        header("Refresh: $seconds; URL=\"$location\"");
        echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"' . "\n" .
        '"http://www.w3.org/TR/html4/strict.dtd">' . "\n\n" .
        '<html lang="en">' . "\n" .
        '    <head>' . "\n" .
        '        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1">' . "\n\n" .
        '        <link rel="stylesheet" type="text/css" href="stylesheet.css">' . "\n\n" .
        '    <title>Upload error</title>' . "\n\n" .
        '    </head>' . "\n\n" .
        '    <body>' . "\n\n" .
        '    <div id="Upload">' . "\n\n" .
        '        <h1>Upload failure</h1>' . "\n\n" .
        '        <p>An error has occured: ' . "\n\n" .
        '        <span class="red">' . $error . '...</span>' . "\n\n" .
        '         The upload form is reloading</p>' . "\n\n" .
        '     </div>' . "\n\n" .
        '</html>';
  
         //end error handler
        exit;
    }
    
    //@return type 

    public function getFileImageName() {
        return $this->uploadFilename;
    } 
}
?>