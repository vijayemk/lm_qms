<!-- Specific CSS -->
<link href="plugins/dataTables/css/dataTables.bootstrap.css" rel="stylesheet" type="text/css">
<link href="vendors/custom_lm/htmldiff/htmldiff_custom.css" rel="stylesheet" type="text/css">

<div class="vd_head-section clearfix">
    <div class="vd_panel-header">
        <ul class="breadcrumb">
            <li><a href="index.php?module=dash&action=default_dashboard">Home</a> </li>
        </ul>
        <div class="vd_panel-menu hidden-sm hidden-xs" data-intro="<strong>Expand Control</strong><br/>To expand content page horizontally, vertically, or Both. If you just need one button just simply remove the other button code." data-step=5  data-position="left">
            <div data-action="remove-navbar" data-original-title="Remove Navigation Bar Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-navbar-button menu"> <i class="fa fa-arrows-h"></i> </div>
            <div data-action="remove-header" data-original-title="Remove Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="remove-header-button menu"> <i class="fa fa-arrows-v"></i> </div>
            <div data-action="fullscreen" data-original-title="Remove Navigation Bar and Top Menu Toggle" data-toggle="tooltip" data-placement="bottom" class="fullscreen-button menu"> <i class="glyphicon glyphicon-fullscreen"></i> </div>
        </div>
    </div>
</div>

<div class="vd_content-section clearfix">
    <div class="row">
        <div class="col-md-12">
            <div class="panel light-widget widget">
                <div class="panel-heading no-title"> </div>
                <div class="panel-body">
                    <textarea name="old_doc_html" id="old_doc_html" style="display: none">{$old_doc_html}</textarea>
                    <textarea name="new_doc_html" id="new_doc_html" style="display: none">{$new_doc_html}</textarea>
                    <form name="compare_doc-form" method="post" action="{$smarty.server.REQUEST_URI}" class="form-horizontal" role="form" id="compare_doc-form" autocomplete="off" >
                        <div class="container">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <h4>Past</h4>
                                        <select class="width-100" name="object_id1" id="object_id1" onchange = addList('object_id1',this.options[this.selectedIndex].value);>
                                            <option value="">Select</option>
                                            {foreach name=list item=item key=key from=$rs_list}
                                                <option value="{$item.object_id}" {if $object_id1 eq $item.object_id} selected {/if}>{$item.rs_no} - [{$item.revision}]</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                    <div class="col">
                                        <h4>New</h4>
                                        <select class="width-100" name="object_id2" id="object_id2" onchange = addList('object_id2',this.options[this.selectedIndex].value);>
                                            <option value="">Select</option>
                                            {foreach name=list item=item key=key from=$rs_list}
                                                <option value="{$item.object_id}" {if $object_id2 eq $item.object_id} selected {/if}>{$item.rs_no} - [{$item.revision}]</option>
                                            {/foreach}
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="card">
                                <div class="row">
                                    <div class="col">
                                        <h4>Past</h4>
                                        <div class="card" id="outputOriginal"></div>
                                    </div>
                                    <div class="col">
                                        <h4>Changes</h4>
                                        <div class="card" id="output"></div>
                                    </div>
                                    <div class="col">
                                        <h4>New</h4>
                                        <div class="card" id="outputNew"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{literal}
    <script type="text/javascript" src="vendors/custom_lm/htmldiff/htmldiff_custom.js"></script>
    <script>
        let originalHTML = document.getElementById('old_doc_html').value;
        let newHTML = document.getElementById('new_doc_html').value;;

        // Diff HTML strings
        let output = htmldiff(originalHTML, newHTML);
        
        // Show HTML diff output as HTML (crazy right?)!
        document.getElementById("output").innerHTML = output;
        document.getElementById("outputOriginal").innerHTML = originalHTML;
        document.getElementById("outputNew").innerHTML = newHTML;
    </script>
    <script>
        function addList(text,value) {
            loc = window.location.href;
            var str = window.location.href;
            ind = str.lastIndexOf(text);
            //lastIndexOf funtion gives the position of the Last occurance of a string.
            if (value == "null") {
                match_position = loc.search(text); 
                mainurl = location.href.substring(0,match_position-1);
                location.href = mainurl
            } else {
                if (ind != -1) {	
                    match_position = loc.search(text); 
                    //Search funtion gives the position of the first occurance of a string.
                    mainurl=location.href.substring(0,match_position);
                    location.href = mainurl +   text + "="+value ;
                } else {
                    location.href = loc + "&" +  text + "="+value ;
                }
            }	
        }
    </script>
{/literal}
