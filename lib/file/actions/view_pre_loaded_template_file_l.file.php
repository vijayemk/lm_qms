<?php
/**
 * Project:     Logicmind
 * File:        view_pre_loaded_template_file.file.php
 * @author Ananthakumar .V
 * @since 09/03/2019
 * @package file
 * @version 1.0
*/
ini_set("pcre.backtrack_limit", "10000000");
//ini_set ('max_execution_time', 1200);

error_reporting(E_ALL & ~E_NOTICE );
if(!check_access($username,'preloaded_template', 'yes')) {
    $error_handler->raiseError("preloaded_template");
}
require_once('includes/mpdf/vendor/autoload.php');
require_once ('lib/sop/functions/Sop_Processor.func.php');

$appName = explode("/", $_SERVER['REQUEST_URI'])[1];
$server_addr = "http://www.{$_SERVER['SERVER_NAME']}/$appName/";

$template_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;

$createtime = date('d/m/Y G:i:s');
$lm_contact_obj = get_lm_contact_obj();
$lm_web = $lm_contact_obj->website;
$org_web_obj = getActiveOrganizationObj();
$org_web = $org_web_obj->website;
$sop_process = new Sop_Processor();
$usr_id=$_SESSION['user_id'];
$dept_id = getDeptId($usr_id);
$usr_plant_id = getUserPlantId($usr_id);
$usr_dept = getDepartment($dept_id);
$usr_name = getUserName($usr_id);
$usr_full_nmae = getFullName($usr_id);
$pre_loaded_temp_acronym = 'PRE LOADED TEMPLATE';

$template_id = (isset($_REQUEST['object_id']))? $_REQUEST['object_id']:null;
$pre_loaded_tempalte_obj = $sop_process->get_pre_loaded_template_obj($template_id);
if($pre_loaded_tempalte_obj->is_moved=="no" && $pre_loaded_tempalte_obj->orientation=="L") {
    $org_name = getActiveOrganizationName();
    $tempalte_name = $pre_loaded_tempalte_obj->name;
    $plant_logo = getPlantLogo($usr_plant_id);
    
    $pdf_lang = $pre_loaded_tempalte_obj->lang;
    if($pdf_lang=="en"){
        $rfont = 'arial.ttf';
        $bfont = 'arialb.ttf';
    }elseif($pdf_lang=="guj" || $pdf_lang=="hin" || $pdf_lang=="kan"|| $pdf_lang=="mal"|| $pdf_lang=="mar" ){
        $rfont = 'Nirmala.ttf';
        $bfont = 'NirmalaB.ttf';
    }else{
        $rfont = 'arial.ttf';
        $bfont = 'arialb.ttf';
    }
    /**MPDF Font Configuration **/
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    /**MPDF Object **/
    $mpdf = new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [__DIR__]),
            'fontdata' => $fontData + ['arial' => [
                    'R' => $rfont,
                    'B' => $bfont,
                    
            ]],
            'mode'=>'utf-8',
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 15,
            'margin_header' => 3,
            'margin_footer' => 1,
            'format'=>'B4-L',
            'default_font' => 'arial',
            'watermarkAngle' => 45,
    ]);
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->SetCreator("LogicMind");
    $mpdf->SetAuthor('Logicmind');
    $mpdf->SetTitle('LogicMind Digitally Signed PDF');
    $mpdf->SetSubject('Pre Laoded Template Details');
    $mpdf->SetKeywords('Pre Laoded Template Details');
    $mpdf->SetWatermarkText("PRE LOADED TEMPLATE",0.08);
    $mpdf->showWatermarkText = true;
    
    /** Define the Header/Footer**/
    $mpdf->SetHTMLHeader('
    <table width="100%" style="border: 1px solid #000000;">
        <tr>
            <td width="100%" style="font-size: 13px;font-family: arial;font-weight: bold;color:#000000;text-align:center;padding-top:10px;">'.$pre_loaded_temp_acronym.'</td>
        </tr>
        <tr>
            <td style="font-size: 10px;font-family: arial;font-weight: bold;color:#000000;text-align:left;"><a href=http://'.$org_web.'><img alt="logo" src="'.$plant_logo.'" style="float:left; padding-left:5px;height:50px; width:170px";/></a></td>
        </tr>
        <tr>
            <td width="100%" style="font-size: 13px;font-family: arial;font-weight: bold;color:#000000;text-align:center;padding-bottom:5px;">'.$tempalte_name.'</td>
        </tr>
    </table>
    ');
    $mpdf->SetHTMLFooter('
    <table width="100%" style="margin: 7px 0px 5px 0px;border-bottom: 1px solid #000000;padding-bottom:5px;">
        <tr>
            <td width="100%" colspan="6" style="font-size: 10px;font-family: arial;font-weight: bold;color:#000080;"></td>
        </tr>
    </table>
    <table width="100%" style="margin: 5px 0px 0px 0px;padding:1px;">
        <tr>
            <td width="15%" style="font-size: 12px;font-family: arial;font-weight: bold;">'.$pre_loaded_temp_acronym.'</td>
            <td width="75%" style="text-align: center;font-size: 12px;font-family: arial;font-weight: bold;color: #ffc3c3;">Downloaded By ['.$usr_full_nmae.'] ['.$usr_dept.'] ['.$createtime.']</td>
            <td width="10%" align="right" style="font-size: 12px;font-family: arial;">Page {PAGENO}/{nbpg}</td>
        </tr>
    </table>
    <div style="width: 100%; text-align:center;font-size: 7px;font-family: arial;padding:2px;"> <span >CONFIDENTIAL : Do not copy, print or transmit in electronic and any other format without the permission of the authorities of '.$org_name.'</span><span ><a href=http://'.$lm_web.'><img src="img/logo_pdf.jpg" style="float:right; height:7px; width:55px;"></a></span><br>
    </div>
    ');
    $mpdf->AddPage();
    if(!empty($pre_loaded_tempalte_obj->content)){
        $mpdf->WriteHTML($pre_loaded_tempalte_obj->content);
    }
    $mpdf->Output("$tempalte_name.pdf", 'I');

}else{
    $error_handler->raiseError("INVALID REQUEST");
}
?>
