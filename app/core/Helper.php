<?php

class Helper
{
    public static function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }

    public static function upload_foto($ft, $name)
    {
        $target_dir = "../public/img/";
        $ext = pathinfo($ft['name'], PATHINFO_EXTENSION);
        $target_file = $target_dir . basename($name . "." . $ext);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $uploadOk = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            $error = "Sorry, file already exists.";

            $uploadOk = 0;
        }

        // Check file size
        if ($ft["size"] > 500000) {
            $error = "Sorry, your file is too large.";

            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            $error =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // echo "Sorry, your file was not uploaded.";
            // Flasher::setFlash('imgError', 'Sorry, your file was not uploaded. ' . $error . '', 'danger');
            // header("location: " . BASEURL . "pages/daftarProduk");
            // return $error = 'Sorry, your file was not uploaded. ' . $error . '';
            // if everything is ok, try to upload file
            return false;
        } else {
            if (move_uploaded_file($ft["tmp_name"], $target_file)) {
                //echo "The file ". htmlspecialchars( basename( $_FILES["foto"]["name"])). " has been uploaded.";
                return true;
            } else {
                //echo "Sorry, there was an error uploading your file.";
                return false;
            }
        }
    }
}
