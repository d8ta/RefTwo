<?php
namespace Project\Ajax\Actions;

use A365\Core\Logger;
use A365\Wordpress\Ajax\Action;
use Project\Helpers\StringHelper;

class UploadFile extends Action
{
    const KEY_FILE = 'file';

    private $_destinationFolder;

    public function __construct()
    {
        $this->_destinationFolder = ABSPATH . 'temp/uploads/';
    }

    protected function _action()
    {
        $result = [
            'success' => false,
        ];

        try {

            if (!array_key_exists(self::KEY_FILE, $_FILES)) {
                throw new \Exception('No file uploaded');
            }

            $file = $_FILES[self::KEY_FILE];

            if ($file['error']) {
                throw new \Exception('Upload error');
            }

            if (!is_dir($this->_destinationFolder)) {
                mkdir($this->_destinationFolder, 0755, true);
            }

            $uploaded = move_uploaded_file(
                $file['tmp_name'],
                $this->_destinationFolder . $this->_createUniqueFilename($file['name'])
            );

            if (!$uploaded) {
                throw new \Exception('Cant move file');
            }

            $result['success'] = true;

        } catch (\Exception $e) {
            $result['error'] = $e->getMessage();
        }

        return $result;
    }

    private function _createUniqueFilename($name)
    {

        $prefix = 'upload_';
        $suffix = '.' . pathinfo($name, PATHINFO_EXTENSION);
        $helper = StringHelper::getInstance();

        do {
            $name = $prefix . $helper->generateRandomString() . $suffix;

        } while (file_exists($this->_destinationFolder . $name));


        return $name;
    }
}
