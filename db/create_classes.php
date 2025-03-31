#!/usr/bin/php -q
<?php
    echo "Creating LM DB classes. It will take a while. Please wait...\n";

    // Get the current include path for adding a new path to it
    $current_path=ini_get('include_path');
    // Get the current directory of this source file and add the pear (sibling) directory
    // to the include path
    ini_set('include_path', dirname(__FILE__).'/../pear:'.$current_path);

    // Check if the db_classes directory does exist. If it does not, it is automatically created.
    $dir=dirname(getcwd());
    $db_includes_dir = "$dir/includes/";
    if (!is_dir($db_includes_dir)) {
        echo "The directory: $db_includes_dir is absent. Please create and run this script again!\n";
        exit;
    }

    $db_classes_dir = $db_includes_dir . "db_classes/";
    if (!is_dir($db_classes_dir)) {
        echo "$db_classes_dir directory was absent. Creating it for you...\n";
        mkdir($db_classes_dir);
    } 

    // As we just added the pear directory to the include path, execute PEAR.php from
    // the newly added directory. This contains the base PEAR class for use by other 
    // PEAR classes.
    require_once('PEAR.php');
    // Manually maniputlate the argv[] and set the db_lm_dataobject.ini as
    // the first argument for initializing the LM database 
    $_SERVER['argv'][1] = 'db_lm_dataobject.ini';

    // Execute the createTables.php and create LM DB Classes from the database
    require_once('DB/DataObject/createTables.php');

    $created_class_count = shell_exec("ls -l $db_classes_dir/*.php | wc -l");
    $created_class_count = trim($created_class_count);
    
    echo "\nCreated $created_class_count LM DB classes have been created in the directory: $db_classes_dir \n";
    echo "\nPlease verify whether all the classes are created correctly from the following output.\n";
    echo "\nThe content of the directory: $db_classes_dir are:\n";
    system("ls -l $db_classes_dir");
?>
