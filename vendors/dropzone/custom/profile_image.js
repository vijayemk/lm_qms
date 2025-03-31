/** Ref Link: https://github.com/enyo/dropzone/wiki/FAQ#reject-images-based-on-image-dimensions 
 *  https://www.sitepoint.com/file-upload-form-express-dropzone-js/
 *  */
var maxImageWidth = 128,
    maxImageHeight = 128;
var maxTotalSize = 2097152; // 2MB

Dropzone.options.myDropzone = {
// Prevents Dropzone from uploading dropped files immediately
    paramName: "file",
    autoProcessQueue: false,
    parallelUploads:1,
    acceptedFiles: ".png,.jpg,.jpeg",
    addRemoveLinks:true,
    maxFiles:1,
    maxFilesize:2,
    accept: function(file, done) {
        if (file.name.length > 40) {
            done("Filename exceeds 40 characters!");
        }
        else { done(); }
    },
    // Make sure only images are accepted
    //acceptedFiles: "image/*",

  init: function() {
    var submitButton = document.querySelector("#submit-all")
    myDropzone = this; // closure
    submitButton.addEventListener("click", function() {
        myDropzone.processQueue(); // Tell Dropzone to process all queued files.
    });
    // You might want to show the submit button only when files are dropped here:
    this.on("addedfile", function(file) {
        // Show submit button here and/or inform user to click it.
        var total_size = 0;
        var total_file_count = []
        total_file_count.push(file.size);
        for(var i=0;i<this.files.length;i++){
            total_size += total_file_count.reduce(getSum);
        }
        if(total_size <= maxTotalSize){
            //alert("Less Than "+maxTotalSize);
            $( "#submit-all" ).show();
        }
        if(total_size >= maxTotalSize){
            // alert("Greater Than "+maxTotalSize);
            this.removeFile(file);
            //alert("File size Exceeded");
            //alert(this.files.length);
            var total_mb = bytesToSize(maxTotalSize);
            bootbox.alert({title: "<span class=text-red><b> Error ! </b></span>", message: "<span class=text-red><b>File size limit exceeded.MaxToalSize : </span> <span class=text-green>"+ total_mb +"</b></span>"});
            //$( "#submit-all" ).hide();
        }
        
    });
    
    // Register for the thumbnail callback.
    // When the thumbnail is created the image dimensions are set.
    this.on("thumbnail", function(file) {
      // Do the dimension checks you want to do
     
      if (file.width > maxImageWidth || file.height > maxImageHeight) {
        file.rejectDimensions();
      }
      else {
        file.acceptDimensions();
      }
      
    });
    
  },

  // Instead of directly accepting / rejecting the file, setup two
  // functions on the file that can be called later to accept / reject
  // the file.
  accept: function(file, done) {
    file.acceptDimensions = done;
    file.rejectDimensions = function() {
      done('The image should be 128 x 128px')
    };
    // Of course you could also just put the `done` function in the file
    // and call it either with or without error in the `thumbnail` event
    // callback, but I think that this is cleaner.
  }
};
function getSum(total, num) {
    return total + num;
}
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};
