{literal}
<script type="text/javascript">
function isValid(string) {

   if (!string) return false;
   var iChars = "!@#$%^&*+=[]\\\';,/{}|\":<>?";
//    var iChars = "!@#$%^&*()+=[]\\\';,./{}|\":<>?";

   for (var i = 0; i < string.length; i++) {
      if (iChars.indexOf(string.charAt(i)) != -1)
         return false;
   }
   return true;
}
</script>
{/literal}