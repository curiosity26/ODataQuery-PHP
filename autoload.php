<?php
/**
 * Created by PhpStorm.
 * User: alexboyce
 * Date: 12/21/14
 * Time: 11:05 AM
 */

function odata_query_autoload($class) {
    $file = __DIR__.DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, str_replace('-', '_', $class)).'.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
# Enable if composer autoload isn't available
#spl_autoload_register('odata_query_autoload');