<?php

class FileUploader{
    // MEMBER VARIABLES
    private static $target_directory = "uploads/";
    private static $size_limit = 50000;//size given in bytes
    private $uploadOk = false;
    private $file_original_name;
    private $file_type;
    private $file_size;
    private $final_file_name;
    private $username;
    public static $extensions = array("jpeg","jpg","png", "jpeg");

    // GENERATE GETTERS AND SETTERS
    public function setUsername($username){
        $this->username = $username;
   }

    public function setOriginalName($original_name) {
        $this->file_original_name = $original_name;
    }
    public function getOriginalName(){
        return $this->file_original_name;
    }
    public function setFileType($type) { 
        $this->file_type = $type;
    }
    public function getFileType(){
        return $this->file_type;
    }
    public function setFileSize($size){
        $this->file_size = $size;
    }
    public function getFileSize(){
        return $this->file_size;
    }
    public function setFinalFileName($final_name) {
        $this->final_file_name = $final_name;
    }
    public function getFinalFileName() {
        return $this->final_file_name;
    }

    // METHODS
    public function uploadFile() {
        $connection = new DBConnector();
        $this->moveFile();
  
        $img_name = $this->getOriginalName();
        $username = $_SESSION['username'];
  
        //Send a post to the database if the file has been moved
        if($this->uploadOk){
  
          $result_set = mysqli_query($connection->connection, 
          "UPDATE users SET img_name='$img_name' WHERE username='$username'") or die("Error".mysqli_error($connection));
  
          /* 
             We unset the short session instantiation since
             to distinguish which user is uploading an image
          */
  
          unset($_SESSION['username']);
        }

    }
    public function fileAlreadyExists() {
        $this->saveFilePathTo();

        $exists_in_dir = false;
        
        //Perform check on whether it resides in the file path
        if(file_exists($this->file_path)){
           $exists_in_dir = true;
        }
   
        return $exists_in_dir;
    }
    public function saveFilePathTo() {
             //Gets the parent directory holding all files
      $trgt_dir  = self::$target_directory;

      //Fuse the directory to that particular filename
      $trgt_file = $trgt_dir . basename($this->file_original_name);
      
      $this->file_path = $trgt_file;
    }
    public function moveFile() {
        $result_set = move_uploaded_file($this->final_file_name, $this->file_path);

        if($result_set){
          $this->uploadOk=true;
        }
  
        return $this->uploadOk;
  
    }
    public function fileTypeIsCorrect() {
        $extensions = array("jpeg","jpg","png", "jpeg");

        $type_extensions = false;
  
        $type = $this->file_type;
  
        if(in_array($type, $extensions)){
          $type_extensions = true;
        }
  
        return $type_extensions;
    }
    public function fileSizeIsCorrect() {
        $sizeOK = false;
        $limit = self::$size_limit;
  
        if($this->file_size < 5000000000){
          $sizeOK = true;
  
          return $sizeOK;
        }
  
        return $sizeOK;
    }
    public function fileWasSelected() {
        $selected = false;

        if($this->file_original_name){
          $this->uploadOk = true;
          $selected  = true; 
          return $selected;
        }
  
        return $selected;
    }

}