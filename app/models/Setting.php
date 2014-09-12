<?php

class Setting {

    const TERMS_CONTENT_FILE_PATH = '/views/frontend/pages/html/terms_and_condition.php';

    public static $EMAIL_RECEIVE_NOTIFY = 'support@bravoindochinatour.com';

    public static function fullPathTermsContentFile() {
        return app_path() . self::TERMS_CONTENT_FILE_PATH;
    }
    
    public static function updateTermsContent($content) {
        $file_path = self::fullPathTermsContentFile();
        create_file_if_not_exists($file_path);
        file_put_contents($file_path, $content);
    }

    public static function getTermsContent() {
        $file_path = self::fullPathTermsContentFile();
        create_file_if_not_exists($file_path);
        return file_get_contents($file_path);
    }

}

?>
