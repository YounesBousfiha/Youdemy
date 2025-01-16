<?php

namespace Younes\Youdemy\Helpers;

use Exception;

class Validator
{
    public static function ValidateData($data) {

        if(empty($data)) {
            throw new Exception("Variable is Empty");
        }
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function ValidateImage($file) {
        $allowedEXT = ['png', 'jpg', 'webp'];
        $allowedSize = 2 * 1024 * 1024;

        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $fileTmpName = $file['tmp_name'];

        if(!in_array($fileType, $allowedEXT)) {
            throw new Exception("File type invalid");
        }

        if($fileSize > $allowedSize) {
            throw new Exception("File size exceed the limit");
        }
        $uploadDir = 'images/';

        if(!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777,true);
        }

        $randomFileName = uniqid() . '.' . $fileType;
        $uploadPath = $uploadDir . $randomFileName;

        if (!move_uploaded_file($fileTmpName, $uploadPath)) {
            throw new Exception("Failed to move uploaded file");
        }

        return $uploadPath;
    }

    public static function ValidateEmail($email) {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email Format");
        }
        return $email;
    }
}