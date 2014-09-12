<?php

class Setting {

    const TERMS_CONTENT_FILE_PATH = '/views/frontend/pages/html/terms_and_condition.php';

    public static $EMAIL_RECEIVE_NOTIFY = 'support@bravoindochinatour.com';

    public static function updateTermsContent($content) {
        create_file_if_not_exists(app_path() . self::TERMS_CONTENT_FILE_PATH);
        file_put_contents(self::TERMS_CONTENT_FILE_PATH, $content);
    }

    public static function getTermsContent() {
        create_file_if_not_exists(app_path() . self::TERMS_CONTENT_FILE_PATH);
        return file_get_contents(self::TERMS_CONTENT_FILE_PATH);
    }

}

?>
