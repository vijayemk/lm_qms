{literal}
<script type="text/javascript">
function checkOnSubmit(formName, r) {
    document.getElementById(errorsdiv).className = '';
    document.getElementById(errorsdiv).style.display = 'none';
	var alertType="classic";
    //var alertType = document.getElementById('alertType').value;
    if (performCheck(formName, r, alertType)) {
       //alert('Form validated (you usually submit your form now)');
    } 
}

</script>
{/literal}