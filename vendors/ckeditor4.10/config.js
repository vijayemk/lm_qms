/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    // Modofied by anand 04Sep2018
    // config.width = 740;
    config.height = 650;
    config.skin = 'office2013';
    //config.skin = 'kama';

    /** https://github.com/ckeditor/ckeditor-docs-samples/tree/master/editors && https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-bodyClass */
    //config.bodyClass = 'document-editor';

    /** https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-contentsCss && https://ckeditor.com/docs/ckeditor4/latest/guide/dev_example_setups.html#document-editor
     *  Make the editing area bigger than default.
     *  Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
     *  An array of stylesheets to style the WYSIWYG area.
     *  contentsCss: [ 'https://cdn.ckeditor.com/4.8.0/full-all/contents.css', 'mystyles.css' ],
     * */
    //config.contentsCss = 'vendors/ckeditor4.10/samples/mystyles.css';

    /**Enabling extra plugins, available in the full-all preset: http://ckeditor.com/presets-all */
    config.extraPlugins = 'tableresize,lineheight';
    // Sometimes applications that convert HTML to PDF prefer setting image width through attributes instead of CSS styles.
    // For more information check:
    //  - About Advanced Content Filter: http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_advanced_content_filter
    //  - About Disallowed Content: http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_disallowed_content
    //  - About Allowed Content: http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_allowed_content_rules
    config.extraAllowedContent = 'img[width,height,align]';
    config.disallowedContent = 'img{width,height,float}',
        config.line_height = '1;2;3;4;5;6;7;8;9;10;11;12;13;14;15;16;17;18;19;20;21;22;23;24;25;26;27;28;29;30;31;32;33;34;35;36;37;38;39;40;41;42;43;44;45;46;47;48;49;50;51;52;53;54;55;56;57;58;59;60;61;62;63;64;65;66;67;68;69;70;71;72';

    // Toobatr config ref https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#basic and https://ckeditor.com/latest/samples/toolbarconfigurator/index.html#advanced
    //    config.toolbar = [
    //		{ name: 'document', items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
    //		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    //		{ name: 'editing', items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    //		{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    //		'/',
    //		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
    //		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
    //		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    //		{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
    //		'/',
    //		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    //		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    //		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    //		{ name: 'about', items: [ 'About' ] }
    //	];

    config.toolbar = [
        {name: 'document', items: ['Save', '-', ]},
        {name: 'clipboard', items: ['Cut', 'Copy', '-', 'Undo', 'Redo']},
        {name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']},
        {name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']},
        {name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl']},
        {name: 'links', items: ['Link', 'Unlink', 'Anchor']},
        {name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak']},
        {name: 'lineheight', items: ['LineHeight', 'lineheight']},
        {name: 'styles', items: ['Styles', 'Format', 'FontSize']},
        {name: 'colors', items: ['TextColor', 'BGColor']},
        {name: 'tools', items: ['ShowBlocks']},
    ];
    /** Responsive file manager support */
    config.filebrowserBrowseUrl = 'responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        config.filebrowserUploadUrl = 'responsive_filemanager/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        config.filebrowserImageBrowseUrl = 'responsive_filemanager/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
        /**Remove dialog tabs .Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases. https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html#cfg-removeDialogTabs*/
        config.removeDialogTabs = 'flash:advanced;image:Link;image:advanced;link:advanced;link:target;link:upload;';
    config.specialChars = [
        '!', '&quot;', '#', '$', '%', '&amp;', "'", '(', ')', '*', '+', '-', '.', '/',
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', ':', ';',
        '&lt;', '=', '&gt;', '?', '@',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O',
        'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
        '[', ']', '^', '_', '`',
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p',
        'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
        '{', '|', '}', '~',
        '&euro;', '&lsquo;', '&rsquo;', '&ldquo;', '&rdquo;', '&ndash;', '&mdash;', '&iexcl;', '&cent;', '&pound;',
        '&curren;', '&yen;', '&brvbar;', '&sect;', '&uml;', '&copy;', '&ordf;', '&laquo;', '&not;', '&reg;', '&macr;',
        '&deg;', '&sup2;', '&sup3;', '&acute;', '&micro;', '&para;', '&middot;', '&cedil;', '&sup1;', '&ordm;', '&raquo;',
        '&frac14;', '&frac12;', '&frac34;', '&iquest;', '&Agrave;', '&Aacute;', '&Acirc;', '&Atilde;', '&Auml;', '&Aring;',
        '&AElig;', '&Ccedil;', '&Egrave;', '&Eacute;', '&Ecirc;', '&Euml;', '&Igrave;', '&Iacute;', '&Icirc;', '&Iuml;',
        '&ETH;', '&Ntilde;', '&Ograve;', '&Oacute;', '&Ocirc;', '&Otilde;', '&Ouml;', '&times;', '&Oslash;', '&Ugrave;',
        '&Uacute;', '&Ucirc;', '&Uuml;', '&Yacute;', '&THORN;', '&szlig;', '&agrave;', '&aacute;', '&acirc;', '&atilde;',
        '&auml;', '&aring;', '&aelig;', '&ccedil;', '&egrave;', '&eacute;', '&ecirc;', '&euml;', '&igrave;', '&iacute;',
        '&icirc;', '&iuml;', '&eth;', '&ntilde;', '&ograve;', '&oacute;', '&ocirc;', '&otilde;', '&ouml;', '&divide;',
        '&oslash;', '&ugrave;', '&uacute;', '&ucirc;', '&uuml;', '&yacute;', '&thorn;', '&yuml;', '&OElig;', '&oelig;',
        '&#372;', '&#374', '&#373', '&#375;', '&sbquo;', '&#8219;', '&bdquo;', '&hellip;', '&trade;', '&#9658;', '&bull;',
        '&rarr;', '&rArr;', '&hArr;', '&diams;', '&asymp;', '&#8804;', '&#8805;', '&pm;', '&#8486;', '&#8734;', '&Sqrt;'
    ];


};
CKEDITOR.on('dialogDefinition', function (ev) {
    var dialogName = ev.data.name;
    var dialogDefinition = ev.data.definition;
    if (dialogName === 'table') {
        var infoTab = dialogDefinition.getContents('info');
        var cellSpacing = infoTab.get('txtCellSpace');
        cellSpacing['default'] = "0";
        var cellPadding = infoTab.get('txtCellPad');
        cellPadding['default'] = "0";
        var border = infoTab.get('txtBorder');
        border['default'] = "1";
    }
});
