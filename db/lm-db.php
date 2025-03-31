<?php
// Database connection for the lm system
require_once('DB.php');

/*
Do not change any of the above.
Instead, create a file, called local.php, containing any of
the variables listed above that are different for your
development environment.  This will protect you from
accidentally committing your username/password

For example:
cd <lm_dir>/db
cat >lm-db.inc <<EOF
<?php
\$host_lm   = 'myhost';
\$user_lm   = 'myuser';
\$pass_lm   = 'mypass';
\$dbs_lm    = 'mylm';
?>
EOF

*/

// Refer _DB_INI_ in configs/const.php.
$dataobject_setting=parse_ini_file(_DB_INI_, true);
$db_settings = $dataobject_setting['DB_DataObject']['database'];

// Data Source Name: This is the universal connection string.
$dsn="$db_settings";

//authentication to login,users is the tablename and user_name,password are the attributes.
$auth_params = array(
	"dsn" => $dsn,
	"table"=>"users",
	"usernamecol"=> "user_name",
	"passwordcol"=> "password"
);

// DB::connect will return a PEAR DB object on success or an PEAR DB Error object on error.
$db = DB::connect($dsn,true);

// With DB::isError you can differentiate between an error or a valid connection.
if (DB::isError($db)) {
    print $db->getMessage();
    exit;
}

// Forget db info so that malicious PHP may not get password etc.
//$db->disconnect();
?>
