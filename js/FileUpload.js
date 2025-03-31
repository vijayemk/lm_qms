{literal}
<script type="text/javascript">
//Don't change any code in javascript add attach and remove_attach.It is common for all module for file upload
	var form_count = 0;
	//add file attachment form and associated elements
	function add_attach()
	{
		var new_img = document.createElement('img');
		new_img.setAttribute('id', 'child_attachment_img_' + form_count);
		new_img.setAttribute('src','file.png');
		new_img.setAttribute('alt',' ');
		new_img.setAttribute('style', 'float: left;');
		document.getElementById('content').appendChild(new_img);

		var new_attachment = document.createElement('input');
		new_attachment.setAttribute('id', 'child_attachment_' + form_count);
		new_attachment.setAttribute('name', 'file_upload_'+form_count);
		new_attachment.setAttribute('type', 'file');
		new_attachment.setAttribute('size', '48');
		document.getElementById('content').appendChild(new_attachment);

		var new_text = document.createElement('span');
		new_text.setAttribute('id','child_attachment_text_' + form_count);
		new_text.innerHTML = ' <span class="remove" onclick="remove_attach(' + form_count + ');">Remove</span><br />';
		document.getElementById('content').appendChild(new_text);
		form_count++;
		document.getElementById('more').innerHTML = 'Attach another file';
		document.getElementById('filecount').value=form_count;
		//document.authorization.filecount.value=form_count;	
	}
	//remove file attachment form and associated elements
	function remove_attach(remove_form_num)
	{
		form_count--;
		document.getElementById('content').removeChild(document.getElementById('child_attachment_' + remove_form_num));
		document.getElementById('content').removeChild(document.getElementById('child_attachment_text_' + remove_form_num));
		document.getElementById('content').removeChild(document.getElementById('child_attachment_img_' + remove_form_num));
		if (form_count == 0)
		{
        	document.getElementById('more').innerHTML = 'Attach a file';
		}
		document.getElementById('filecount').value=form_count;
		//document.authorization.filecount.value=form_count;
	}
</script>
{/literal}	
