<div class="modal fade" id="modal-work_transfer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-wide-width">
        <div class="modal-content">
            <div class="modal-header vd_bg-blue vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel">Work Transfer Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="data-tables-status">
                    <thead>
                        <tr>

                            <th>{attribute_name module=admin attribute=transferred_from}</th>
                            <th>{attribute_name module=admin attribute=transferred_to}</th>
                            <th>{attribute_name module=admin attribute=reason}</th>
                            <th>{attribute_name module=admin attribute=transferred_by}</th>
                            <th>{attribute_name module=admin attribute=transferred_date}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach name=list item=item key=key from=$work_transfer_details}
                            <tr >
                                <td class="vd_red">{$item.transferred_from_name} {$item.ref_no}</td>
                                <td >{$item.transferred_to_name}</td>
                                <td >{$item.reason}</td>
                                <td class="vd_red">{$item.transferred_by_name}</td>
                                <td class="vd_red">{$item.transferred_time}</td>
                            </tr>
                        {/foreach}
                    </tbody>
                </table>
            </div>
            <div class="modal-footer background-login">

            </div>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<!-- /.modal -->       
