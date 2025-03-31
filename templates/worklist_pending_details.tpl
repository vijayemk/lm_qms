<div class="modal fade" id="modal-worklist" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header vd_bg-dark-green vd_white">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times vd_white"></i></button>
                <h4 class="modal-title" id="myModalLabel">Pending Details</h4>
            </div>
            <div class="modal-body pd-15">
                <table class="table table-bordered table-striped mgbt-md-10" id="data-tables-status">
                    <thead>
                        <tr>

                            <th>{attribute_name module=admin attribute=user_name}</th>
                            <th>{attribute_name module=admin attribute=plant_name}</th>
                            <th>{attribute_name module=admin attribute=department}</th>
                            <th>{attribute_name module=admin attribute=pending_from}</th>
                            <th>{attribute_name module=admin attribute=pending_days}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {foreach name=list item=item key=key from=$worklist_pending_details}
                            <tr >
                                <td class="vd_red">{$item.user_name}</td>
                                <td >{$item.plant}</td>
                                <td >{$item.dept}</td>
                                <td class="vd_red">{display_datetime var=$item.pending_from}</td>
                                <td class="vd_red">{$item.pending_days}</td>
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
