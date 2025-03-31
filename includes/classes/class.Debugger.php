<?php
define('DEBUGGER_LOADED', TRUE);
class Debugger {
    var $myTextColor = 'red';
    var $log;
    var $filelog;
    
    function __construct($params = null) {
        $this->color  = $params['color'];
        $this->prefix = $params['prefix'];
        $this->line = 0;
        $this->buffer_str = null;
        $this->buffer = $params['buffer'];
        $this->banner_printed = FALSE;

    }
    /**
    * Sets the error log.
    * @access public
    * @return void
    * @param string $file Log file.
    */
    function setLogFile ( $file ) {
        $this->filelog = $file;
    }
    function print_banner() {
        global $DEBUG;
        if ($this->banner_printed == TRUE) {
            return 0;
        }
        $out = "<br><br><font color='$this->myTextColor'>" .
               "<strong>Debugger started for $this->prefix</strong>" .
               "</font><br><hr>";
	if ($this->buffer == TRUE ) {
            $this->buffer_str .= $out;
        } else {
        if($DEBUG=="1")
            echo $out;
           $this->banner_printed = TRUE;
        }
        return 1;
    }

    function write($msg,$log='1') {
        global $DEBUG;
        if (!is_string($msg)) {
            $msg = print_r($msg);
        }
        if($log == "2")
            $out = sprintf("%03d :" ."%s", $this->line++, $msg);
        else
            $out = sprintf("<font color='%s'>%03d &nbsp;</font>" .
                           "<font color=%s>%s</font><br>\n",
                            $this->myTextColor,
                            $this->line++,
                            $this->color,
                            $msg);

        //if($DEBUG=="1" and $log == "1"){
        if($DEBUG=="1") {
            if ($this->buffer == TRUE ) {
                $this->buffer_str .= $out;
            } else {
		echo $out;
            }
        }
        if($DEBUG == "1" and $log == "2") {
            //print($log);
            if ( $this->filelog ){
                $this->log = fopen ( $this->filelog, "a" );
                //print("opened");
            }
            // Get exact time
            $x = explode ( " ", microtime() );
            $ms = $x[0];
            $time = $x[1];
            $y = date ( 'd M Y H:i:s', $time );
            //$z = $y . substr ( $ms, 1, 7 );
            /*if (!is_string($message)) {
            $message = print_r($message);
            }*/
            if ( $this->log ) {
                //print($out);
                fputs ( $this->log, "$y : $out\n" );
                fclose($this->log);
            }
        }
    }
    function writeLog($msg) {
        global $DEBUG;
        if (!is_string($msg)) {
            $msg = print_r($msg);
        }
        if ( $this->filelog ){
            $this->log = fopen ( $this->filelog, "a" );
        }
        // Get exact time
        $x = explode ( " ", microtime() );
        $ms = $x[0];
        $time = $x[1];
        $y = date ( 'd M Y H:i:s', $time );
        //$z = $y . substr ( $ms, 1, 7 );
        if ( $this->log ){
            //print($out);
            fputs ( $this->log, "$y : $msg\n" );
            fclose($this->log);
        }

    }
    function debug_array($hash = null) {
        while(list($k, $v) = each($hash)){
            $this->write("$k = $v");
        }
    }
    function set_buffer() {
        $this->buffer = TRUE;
    }
    function reset_buffer() {
       $this->buffer = FALSE;
       $this->buffer_str = null;
    }
    function flush_buffer() {
        global $DEBUG;
        $this->buffer = FALSE;
        $this->print_banner();
        if($DEBUG=="1")
            echo $this->buffer_str;
    }
}
?>