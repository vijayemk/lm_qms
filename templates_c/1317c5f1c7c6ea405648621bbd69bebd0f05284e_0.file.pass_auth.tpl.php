<?php
/* Smarty version 3.1.30, created on 2024-11-13 14:24:49
  from "/var/www/html/lm_qms/templates/pass_auth.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_67346959066a57_48336663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1317c5f1c7c6ea405648621bbd69bebd0f05284e' => 
    array (
      0 => '/var/www/html/lm_qms/templates/pass_auth.tpl',
      1 => 1717762530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67346959066a57_48336663 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="panel widget panel-bd-left light-widget">
    <div class="panel-body pd-0">
        <div class="lm_e-sign mgl-10 form-group">
            <label class="vd_white">e-Sign</label>
        </div> 
        <div class="col-md-9 form-group pd-0">
            <label class="control-label  col-md-1 pd-0 mgtp-5"> <i class="fa fa-user vd_green btn menu-icon vd_bd-green"></i>  <span class="vd_red">*</span></label>
            <div id="first-name-input-wrapper"  class="controls col-md-4 pdlr-10">
                <input type="text" placeholder="Username" name="usr_username" value="<?php echo $_SESSION['username'];?>
" title="Invalid Username" class="usr_username required" required readonly>
            </div>      
        </div>
        <div class="col-md-9 form-group pd-0">
            <label class="control-label  col-md-1 pd-0  mgtp-5"> <i class="fa fa-lock vd_green btn menu-icon vd_bd-green"></i>  <span class="vd_red">*</span></label>
            <div id="first-name-input-wrapper"  class="controls col-md-4 pdlr-10">
                <input type="password" placeholder="Password" name="usr_password" class="usr_password required" title="Enter Valid Password" required>
            </div>
            <div class="is_valid_pass label vd_white"></div>
        </div>
    </div>
</div>

    <?php echo '<script'; ?>
>
        $(document).ready(function () {
            $('.usr_password').on('keyup', function (e) {
                let is_valid_pass = $(this).closest("form").find(".is_valid_pass");
                x_check_user_password(this.value, function (result) {
                    (result) ? is_valid_pass.text("Valid").addClass("vd_bg-dark-green").removeClass("vd_bg-red").closest("form").find(':submit').removeAttr("disabled") : is_valid_pass.text("InValid").addClass("vd_bg-red").removeClass("vd_bg-dark-green").closest("form").find(':submit').attr("disabled", "true");
                });
            });
        });
    <?php echo '</script'; ?>
>


<?php }
}
