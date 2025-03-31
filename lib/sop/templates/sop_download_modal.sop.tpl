<!-- Modal -->
<div class="modal fade" id="pdf_download_modal" tabindex="-1" role="dialog" aria-labelledby="pdf_download_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="pdf_download_modalLabel">Download</h4>
            </div>
            <form name="pdf_download_modal_form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="pdf_download_modal-form" autocomplete="off">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2">{attribute_name module="sop" attribute="reason"} <span class="vd_red">*</span></label>
                            <div id="first-name-input-wrapper"  class="controls col-sm-10">
                                <input type="text" placeholder="Min 3 - Max 200" class="width-100 required" name="download_reason" id="download_reason" maxlength="200" required title="Enter Valid Reason">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="control-label  col-sm-2"></label>
                            <div id="exist_error_message" class="controls col-sm-10"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer background-login">
                    <input type="hidden" id="sop_download_url">
                    <input type="hidden" id="sop_download_ref_id">
                    <input type="hidden" id="sop_download_sop_id">
                    <button type="button" class="btn vd_btn vd_bg-grey" data-dismiss="modal">Close</button>
                    <button type="button" class="btn vd_btn vd_bg-green" name="download_pdf" id="download_pdf"><i class="fa fa-download"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
{literal}
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script>
        function add_sop_download_history(sop_object_id, ref_id, url) {
            $('#sop_download_sop_id').val("");
            $('#sop_download_ref_id').val("");
            $('#sop_download_url').val("");
            $('#sop_download_sop_id').val(sop_object_id);
            $('#sop_download_ref_id').val(ref_id);
            $('#sop_download_url').val(url);
        }

        $("#download_pdf").click(function () {
            if ($('#download_reason').val().length <= 4) {
                alert("Pls enter valid Reason");
            } else {
                x_add_sop_download_history($('#sop_download_sop_id').val(), $('#sop_download_ref_id').val(), $('#download_reason').val(), history_result);
            }
        });
        function history_result(result) {
            if (result == '') {
                var msg = '<p class="fa fa-times-circle-o" style="font-size: 30px; float:left;margin-top: 5px;margin-right: 5px;"></p> Invalid Request Called';
                $.notific8(msg, {theme: 'ruby'});
            } else {
                var access_url = $('#sop_download_url').val() + '&access_id=' + result;
                window.open(access_url, 'myWindow', 'resizable=0');
                location.reload();
            }
        }
    </script>
{/literal}