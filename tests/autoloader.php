<?php
/**
 * AutoLoader
 * 
 * this is a autoloading class that I use to ease creating tests
 * 
 * @author Ricardo <ricardovxuk@gmail.com>
 */
class AutoLoader {
    static private $classNames = array();
    public static function registerDirectory($dirName) {
        $di = new DirectoryIterator($dirName);
        foreach ($di as $file) {
            if ($file->isDir() && !$file->isLink() && !$file->isDot()) {
                // recurse into directories other than a few special ones
                self::registerDirectory($file->getPathname());
            } elseif (substr($file->getFilename(), -10) === '.class.php') {
                // save the class name / path of a .php file found
                $className = ucfirst(substr($file->getFilename(), 0, -10));
                AutoLoader::registerClass($className, $file->getPathname());
            }
        }
    }
    public static function registerClass($className, $fileName) {
        AutoLoader::$classNames[$className] = $fileName;
    }
 
    public static function loadClass($className) {
        if (isset(AutoLoader::$classNames[$className])) {
            require_once(AutoLoader::$classNames[$className]);
        }
     }
}
spl_autoload_register(array('AutoLoader', 'loadClass'));