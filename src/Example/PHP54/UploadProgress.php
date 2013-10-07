<?php
namespace Example\PHP54;

class UploadProgress
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function getKey()
    {
        if (!isset($_POST[ini_get('session.upload_progress.name')])) {
            return false;
        }

        return ini_get('session.upload_progress.prefix') .
            $_POST[ini_get('session.upload_progress.name')];
    }

    public function getUploadProgressStuff()
    {
        $key = $this->getKey();
        if (!$key) {
            return array();
        }

        return $_SESSION[$key];
    }
}

$isAjax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
$uploader = new UploadProgress();
if ($isAjax) {
//    echo json_encode($uploader->getUploadProgressStuff());
    echo json_encode($_SESSION);
    exit;
}
$_SESSION['foo'] = 'bar';
echo json_encode($_POST); exit;

include realpath(__DIR__) . '/../../../src/views/upload.php';
