<?php
/**
* Generic error reporting and handling class.
*
* Error is a generic error reporting and handling class written in PHP. It may be used for development and/or monitoring purposes.
*
* @version 0.1
* @author Alexander Serbe <alex@onlinetools.org>
* @copyright Copyright � 2003 by Alexander Serbe. All rights reserved.
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License (GPL)
*/
define('ERROR_HANDLER_LOADED', TRUE);
global $smarty;
class LogicmindError {
    /**
    * @var array $definitions Error definitions.
    * @access private
    */
    var $definitions;

    /**
    * @var array $definitions Error definitions.
    * @access private
    */
    var $errorDefinitions;

    /**
    * @var array errorStack Error stack. Errors (non-fatal) that occurred during the execution of the script.
    * @access private
    */
    var $errorStack;

    /**
    * @var string $errorLog The error log file.
    * @access private
    */
    var $errorLog;

    /**
    * @var boolean $logFatalErrors Determine whether to log fatal errors or not.
    * @access private
    */
    var $logFatalErrors;

    /**
    * @var string $tmpFatal Template for fatal errors.
    * @access private
    */
    var $tmpFatal;

    /**
    * @var string $tmpNonFatal Template for non-fatal errors.
    * @access private
    */
    var $tmpNonFatal;

    /**
    * Initializes a new Error object.
    * @access public
    * @return void
    */
    function __construct() {
        // Initialize object variables...
        $this->definitions = array();
        $this->errorStack = array();
        $this->errorLog = '';
        $this->tmpFatal = '';
        $this->tmpNonFatal = '';
        $this->logFatalErrors ( false );
        // Start output buffering
        ob_start();
    }
    
    /**
    * Checks if the passed error code exists in the list.
    * @access private
    * @return boolean
    * @param string $code The error code to be checked.
    */
    function checkErrorCode ( $code ) {
        if ( count ( $this->errorDefinitions ) <= 0 )
        return false;
            foreach ( $this->errorDefinitions as $error ){
                if ( $error['code'] == $code ){
                    return true;
                }
            }
        return false;
    }

    /**
    * Displays a fatal error.
    * @access private
    * @return boolean
    * @param string $code Error code.
    */
    function displayFatalError ( $code, $addInfo, $type) {
        // Check if error code exists
        if ( !$this->checkErrorCode ( $code ) )
            return false;

        // Get the error definition
        $x = $this->getErrorDefinition ( $code );

        // Check if error is really 'fatal'
        if ( $x['type'] != 'fatal' )
            return false;
            ob_clean();

        global $error_header,$smarty;
        // Get exact time
        $yA = explode ( " ", microtime() );
        $ms = $yA[0];
        $time = $yA[1];
        $yB = date ( 'd M Y H:i:s', $time );
        $yC = $yB . substr ( $ms, 1, 7 );
        if ( $this->tmpFatal ){
            $fp = fopen ( $this->tmpFatal, "r" );
            $tmp = fread ( $fp, filesize ( $this->tmpFatal ) );
            fclose ( $fp );

            $error_header = $tmp;
            $errorMessage = '<tr>';
            if (($type != '0')){
                $errorInfo = $addInfo;
            }
            else{
                $errorInfo = "";
            }

            $errorMessage .= '<td align="center" width="20%" align="left" valign="top">' . $x['code'] . '</i> </td>';

            if (($type == '0')){
                $errorMessage .= '<td  valign="top"> ' . $addInfo . " " .$x['user'] . " ". $addInfo;
            }
            else{
                $errorMessage .= '<td valign="top">' . $x['user'];
            }

            if ( strlen ( $x['suggestions'] ) > 0 ){
                $errorMessage .= '<br /><i>' . $x['suggestions'] . '</i>';
            }
            $errorInfo .= '</td>';
            $errorMessage .= '</td>';
            $smarty->assign('error_header',$error_header);
            $smarty->assign('error',$errorMessage);
            $smarty->assign('addInfo',$errorInfo);
            $smarty->assign('adminMsg',$x['admin']);
            $smarty->assign('error_template','error.tpl');
            $smarty->display("index.tpl");
            die;
        }
        return false;
    }

    /**
    * Clears the error stack and returns its contents. Stops the output buffering.
    * @access public
    * @return array
    */
    function flushErrors() {
        // Store the contents of the error stack in a temporary array
        $x = $this->errorStack;
        // Empty error stack
        $this->errorStack = array();
        // Return error stack
        return $x;
    }

    /**
    * Returns an error from the error stack.
    * @access private
    * @return array
    * @param integer $element Element number.
    */
    function getError ( $element ) {
        // Check if error stack has elements
        if ( count ( $this->errorStack ) <= 0 )
            return false;
        if ( is_array ( $this->errorStack[$element] ) )
            return $this->errorStack[$element];
        return false;
    }

    /**
    * Returns an error definition.
    * @access private
    * @return array
    * @param string $code The error code to be returned.
    */
    function getErrorDefinition ( $code ) {
            // Check if code exists
        if ( !$this->checkErrorCode ( $code ) )
            return false;
        foreach ( $this->errorDefinitions as $error ) {
            if ( $error['code'] == $code )
            return $error;
        }
        return false;
    }
    /**
    * Imports error definitions from a text file.
    * @access public
    * @return boolean
    * @param string $file The text file, the error definitions reside in.
    */
    function importDefinitions ( $file ) {
        // Check if passed file exists an is not empty
        if ( !file_exists ( $file ) || filesize ( $file ) <= 0 )
            return false;

        // Initialize counters
        $cnt = 0;
        $lineCnt = 0;

        // Open file
        $fp = fopen ( $file, "r" );

        // Loop through file content and extract error definitions
        while ( !feof ( $fp ) ) {
            $lineCnt++;
            $line = fgets ( $fp );
            $x = split ( ";", $line );
            $y = $this->setError ( @$x[0], @$x[1], @$x[2], 'fatal', @$x[3] );
                ( $y ) ? $cnt++ : $cnt = $cnt;
        }
        // Close file
        fclose ( $fp );
        return ( $cnt != $lineCnt ) ? false : true;
    }
    /**
    * Determine whether fatal errors should be logged or not. (Log file has to be specified manually using the setLogFile method!)
    * @access public
    * @return boolean
    * @param boolean $flag True = log fatal errors; false = do not log fatal errors.
    */
    function logFatalErrors ( $flag ) {
        if ( !is_bool ( $flag ) )
        return false;
        $this->logFatalErrors = $flag;
        return true;
    }

    /**
    * Adds an error to the error stack.
    * @access public
    * @return boolean
    * @param string $code Error code.
    * @param string $addInfo Additional information on the error (e.g. SQL errors etc.)
    */
    function raiseError ( $code, $addInfo='', $type='') {
        // Check error code
        if ( !$this->checkErrorCode ( $code ) ){
            return false;
        }
        // Get exact time
        $x = explode ( " ", microtime() );
        $ms = $x[0];
        $time = $x[1];
        $y = date ( 'd M Y H:i:s', $time );
        $z = $y . substr ( $ms, 1, 7 );

        $error_def = $this->getErrorDefinition ( $code );
        if ( $error_def['type'] == 'fatal' ) {
            if ( $this->logFatalErrors && $this->errorLog ) {
                $fp = fopen ( $this->errorLog, "a" );
                $errorString = "$z;" . $error_def['code'] . ";" . $error_def['admin'] . ";" . $error_def['type'] . ";$addInfo\n";
                fputs ( $fp, $errorString );
                fclose ( $fp );
            }
            $this->displayFatalError ( $code, $addInfo, $type);
            return true;
        }
        $newError = array (
                'time' => $z,
                'code' => $error_def['code'],
                'user' => $error_def['user'],
                'admin' => $error_def['admin'],
                'type' => $error_def['type'],
                'suggestions' => $error_def['suggestions'],
                'info' => $addInfo
            );

        $this->errorStack[] = $newError;
        print("Error stack");
        print_r($this->errorStack);die;
        return true;
    }
    /**
    * Alerts an error .
    * @access public
    * @return void
    * @param string $code Error code.
    * @param string $flag Additional information on the error
    */
    function alert($code = null, $flag = null) {
        $err = $this->getErrorDefinition($code);
        $msg = $err['user'];
        if (!strlen($msg)) {
           $msg = $code;
        }
        if ($flag == null) {
           echo "<script>alert(\"$msg\");history.go(-1);</script>";

        } else if (!strcmp($flag,'close')){
           echo "<script>alert(\"$msg\");window.close();</script>";
        } else {
           echo "<script>alert('$msg');</script>";
        }
    }

    /**
    * Adds an error definition to the list.
    * @access public
    * @return boolean
    * @param string $code Error code.
    * @param string $userMessage The error message for the "normal" user.
    * @param string $adminMessage The error message for administrators and/or developers.
    * @param string $type The error type (fatal, non-fatal)
    * @param string $suggestions Suggestions how to avoid the error.
    */
    function setError ( $code, $userMessage, $adminMessage='', $type='fatal', $suggestions='' ) {
        // Check if error code exists already in error list.
        if ( $this->checkErrorCode ( $code ) )
            return false;

        // Check if error type is either 'fatal' or 'non-fatal'
        if ( $type != 'fatal' && $type != 'non-fatal' )
            return false;

        $this->errorDefinitions[] = array (
                'code' => $code,
                'user' => $userMessage,
                'admin' => $adminMessage,
                'type' => $type,
                'suggestions' => $suggestions
        );
        return true;
    }

    /**
    * Sets the error log.
    * @access public
    * @return void
    * @param string $file Log file.
    */
    function setLogFile ( $file ) {
        $this->errorLog = $file;
    }

    /**
    * Sets the templates for the output of errors.
    * @access public
    * @return boolean
    * @param string $fatal Template for fatal errors
    * @param string $nonFatal Template for non-fatal errors
    */
    function setTemplates ( $fatal, $nonFatal='' ) {
        $check = false;
        if ( strlen ( $fatal ) > 0 && file_exists ( $fatal ) ) {
            $check = true;
            $this->tmpFatal = $fatal;
        }
        if ( strlen ( $nonFatal ) > 0 && file_exists ( $nonFatal ) ) {
            $check = true;
            $this->tmpNonFatal = $nonFatal;
        }
        return $check;
    }

    /**1
    * Writes the contents of the error stack into a log file.
    * @access public
    * @return boolean
    */
    function writeLog() {
        // Check if any errors were recorded
        if ( count ( $this->errorStack ) <= 0 )
            return false;
        $fp = fopen ( $this->errorLog, "a" );
        for ( $i=0; $i<count ( $this->errorStack ); $i++ ) {
            $x = $this->getError ( $i );
            $logString = $x['time'] . ";" . $x['code'] . ";" . $x['admin'] . ";" . $x['type'] . ";" . $x['info'] . "\n";
            fputs ( $fp, $logString );
        }
        fclose ( $fp );
    }
}
?>
