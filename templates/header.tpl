<style>
    #fix-right-scroll {    	  
        position:fixed;  
        width:100px;
        right:10px;
        top:90px;/*header height*/     
    }
        
    #fix-right-stable {
    	position:absolute;
    	width:100px;
    	right:10px;
    	top:90px;/*header height*/
	}
</style>
{if $list gt 0}
    <div id="fix-right-scroll" ><!--sits outside of wrapper div-->	
        <li id="workflow">
            <a href="index.php?module=admin&action=user_pending_worklist"><font color="red">Pendinglist:{$list}</font></a>
        </li>
    </div>
{else}
    <div id="fix-right-stable" ><!--sits outside of wrapper div-->	
        <li id="workflow">
            <a href="index.php?module=admin&action=user_pending_worklist">Pendinglist:{$list}</a>
        </li>
    </div>
{/if}