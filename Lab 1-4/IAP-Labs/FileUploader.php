<?php

class FileUploader
{
    // MEMBER VARIABLES
    private static $target_directory = "uploads/";
    private static $size_limit = 50000; //size given in bytes
    private $uploadOk = false;
    private $file_original_name;
    private $file_type;
    private $file_size;
    private $final_file_name;
    private $target_file;
    // GENERATE GETTERS AND SETTERS

    public function setOriginalName($original_name)
    {
        $this->file_original_name = $original_name;
    }
    public function getOriginalName()
    {
        return $this->file_original_name;
    }
    public function setFileType($type)
    {
        $this->file_type = $type;
    }
    public function getFileType()
    {
        return $this->file_type;
    }
    public function setFileSize($size)
    {
        $this->file_size = $size;
    }
    public function getFileSize()
    {
        return $this->file_size;
    }
    public function setFinalFileName($final_name)
    {
        $this->final_file_name = $final_name;
    }
    public function getFinalFileName()
    {
        return $this->final_file_name;
    }

    // METHODS
    public function uploadFile()
    {
        if ($this->fileWasSelected()) {
            $this->target_file = self::$target_directory . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($this->target_file, PATHINFO_EXTENSION));
            if ($this->fileTypeIsCorrect()) {
                if ($this->fileSizeIsCorrect()) {
                    if (!$this->fileAlreadyExists()) {
                        return $this->saveFilePathTo();
                    }
                }
            }
        } else {
            return false;
        }
    }
    public function fileAlreadyExists()
    {
        if (file_exists($this->target_file)) {
            session_start();
            $_SESSION['form_errors'] = "Image file Already exists";
            // header("Refresh:0");
            die();
            return true;
        } else {
            return false;
        }
    }
    public function saveFilePathTo()
    {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $this->target_file)) {
            return true;
        } else {
            session_start();
            $_SESSION['form_errors'] = "Error occured with the image";
            // header("Refresh:0");
            die();
            return false;
        }
    }
    public function moveFile()
    {
    }
    //Checks if image file is a actual image or fake image file
    public function fileTypeIsCorrect()
    {

        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            return true;
        } else {
            session_start();
            $_SESSION['form_errors'] = "File is not an image";
            // header("Refresh:0");
            die();
            return false;
        }
    }
    public function fileSizeIsCorrect()
    {
        $this->file_size = $_FILES["fileToUpload"]["size"];
        if ($this->getFileSize() > self::$size_limit) {
            session_start();
            $_SESSION['form_errors'] = "Image is too large";
            // header("Refresh:0");
            die();
            return false;
        } else {
            return true;
        }
    }
    public function fileWasSelected()
    {
        if (empty($_FILES["fileToUpload"])) {
            session_start();
            $_SESSION['form_errors'] = "Select a profile image ";
            // header("Refresh:0");
            die();
            return false;
        } else {
            return true;
        }
    }
}
