<?php
namespace Project\Helpers;

class DownloadHelper extends \A365\Core\Abstracts\Helper
{

    public static function getDownloadFile($id) {
         return wp_get_attachment_url($id);
    }

    public static function getDownloadFileSize($id) {
         return number_format(filesize( get_attached_file($id)) / 1048576, 2);
    }
}