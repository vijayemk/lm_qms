<div class="form-group">
    <div class="col-md-12">
        <label class="control-label  col-sm-2"> <i class="fa fa-user vd_grey btn menu-icon vd_bd-yellow"></i>  <span class="vd_red">*</span></label>
        <div id="first-name-input-wrapper"  class="controls col-sm-6">
            <input type="text" placeholder="Username" id="usr_username" name="usr_username" value="{$smarty.session.username}" title="Invalid Username" class="width-60 required" required readonly>
        </div>      
    </div>
</div>
<div class="form-group">
    <div class="col-md-12">
        <label class="control-label  col-sm-2"> <i class="fa fa-lock vd_grey btn menu-icon vd_bd-yellow"></i>  <span class="vd_red">*</span></label>
        <div id="first-name-input-wrapper"  class="controls col-sm-6">
            <input type="password" placeholder="Password" id="usr_password" name="usr_password" class="width-60 required" title="Enter Valid Password" required>
        </div>
        <div id="is_valid_pass"></div>
    </div>
</div>

{literal}
    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(document).ready(function () {
            $('#usr_password').on('keyup', function (e) {
                x_check_user_password(this.value, check_handle);
            });
        });
        function check_handle(result) {
            if (result) {
                $("#is_valid_pass").text("Valid");
                $("#is_valid_pass").css({'color': 'green'});
            } else {
                $("#is_valid_pass").text("InValid");
                $("#is_valid_pass").css({'color': 'red'});
            }
        }
    </script>
{/literal}