{literal}
<script language="javascript">

function FormData (form)
{
  this.form  = form;
  this.toString = FormData_toString;
  this.toQueryString = FormData_toQueryString;
  this.toHiddenFields = FormData_toHiddenFields ;
  this.toAssignParent = FormData_toAssignParent ;
  var fields = this.fields = new Object();
  var types = this.types = new Object();
  for (var e = 0; e < form.elements.length; e++) {
    var field = form.elements[e];
    types[field.name] = field.type.toLowerCase();
    if (field.name) {
      if ((field.type.toLowerCase() == 'text'
          || field.type.toLowerCase() == 'textarea'
          || field.type.toLowerCase() == 'password'
          || field.type.toLowerCase() == 'file')
          && field.value)
        fields[field.name] = field.value;
      else if ((field.type.toLowerCase() == 'checkbox'
               || field.type.toLowerCase() == 'radio')
               && field.checked){
        fields[field.name] = field.value;
	   }
      else if (field.type.toLowerCase() == 'select-one'
               && field.selectedIndex != -1)
        //fields[field.name] =  field.options[field.selectedIndex].value;
         fields[field.name] =  field.selectedIndex;
      else if (field.type.toLowerCase() == 'select-multiple'
               && field.selectedIndex != -1) {
        fields[field.name] = new Array();
        for (var i = 0; i < field.options.length; i++)
          if (field.options[i].selected)
            fields[field.name][fields[field.name].length] =
              field.options[i].value;
      }
    }
  }
}
function FormData_toString ()
{
  var r = '';
  for (var field in this.fields)
    r += field + ': ' + this.fields[field] + '\n';
  return r;
}

function urlEncode (string)
{
  string = string.replace(/ /g, '+');
  //return string;
  return escape(string);
}

function FormData_toQueryString ()
{
  var r = '';
  for (var field in this.fields)
    if (typeof this.fields[field] != 'string')
      for (var i = 0; i < this.fields[field].length; i++)
        r += urlEncode(field) + '=' + urlEncode(this.fields[field][i])+ '&';
    else
      r += urlEncode(field) + '=' + urlEncode(this.fields[field]) + '&';
  r = r.substring(0, r.length - 1);
  return r;
}

function FormData_toAssignParent ()
{
  var r = '';
  //alert("Inside assignparent");
  var fname=this.form.name;
  //alert("formname"+fname);
  //alert(window.opener.change.marketing_opinion.value);
  for (var field in this.fields)
  {	    //alert("inside for loop, field:"+field);
		f =  this.fields[field];
        //alert(f);
		type = this.types[field];
		//alert('type'+this.types[field]);
		if ( type == 'text' || type == 'textarea'
          || type == 'password'
          || type == 'file')
		r = "window.opener."+ fname + "." + field + ".value='" + f + "'";
		 else if (type == 'select-one')
        //fields[field.name] =  field.options[field.selectedIndex].value;
        //document.test.test2.options[0].selected
     		r = "window.opener."+ fname + "." + field + ".options[" + f + "].selected = true";		
		 else if (type == 'checkbox' || type == 'radio')
        //fields[field.name] =  field.options[field.selectedIndex].value;
        //document.test.test2.options[0].selected
     		r = "window.opener."+ fname + "." + field + ".checked =  true";		
		//alert(r);
		eval(r);
  	}
  	return r;
}

function getField (form, fieldName)
{
  if (!document.all)
    return form[fieldName];
  else  // IE has a bug not adding dynamically created field
        // as named properties so we loop through the elements array
    for (var e = 0; e < form.elements.length; e++)
      if (form.elements[e].name == fieldName)
        return form.elements[e];
  return null;
}


function FormData_toHiddenFields ()
{
  var r = '';
  for (var field in this.fields)
    if (typeof this.fields[field] != 'string')
      for (var i = 0; i < this.fields[field].length; i++)
        r += "<input type='hidden' name='" +urlEncode(field) + "' value='" + urlEncode(this.fields[field][i]) + "'>";
    else
	    r += "<input type='hidden' name='"+urlEncode(field) + "' value='" +  urlEncode(this.fields[field]) + "'>";
    // r += urlEncode(field) + '=' + urlEncode(this.fields[field]) + '&';
  	r = r.substring(0, r.length - 1);
  	return r;
}
</script>  
{/literal}
  
