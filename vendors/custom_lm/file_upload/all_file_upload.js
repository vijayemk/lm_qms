//Dropzone.options.myDropzone = {
let upload_url = $("#upload_file_url").val();
let upload_file_max_size = $("#upload_file_max_size").val();
let maxTotalSize = upload_file_max_size; //Check the PHP.ini file
let file_attachment_towards = $("#file_attachment_towards").val(); 
Dropzone.autoDiscover = false;
if (upload_url) {
    var myDropzone = new Dropzone("div#mydropzone", {
        // Prevents Dropzone from uploading dropped files immediately
        autoProcessQueue: false,
        url: upload_url,
        parallelUploads: 25,
        method: "post",
        //acceptedFiles: "image/*, application/pdf, .docx,.zip,.dwg,application/*",
        //acceptedFiles: 'application/pdf,text/csv,text/html,text/plain,text/tab-separated-values,application/xls,application/excel,application/vnd.ms-excel,application/vnd.ms-excel; charset=binary,application/msexcel,application/x-excel,application/x-msexcel,application/x-ms-excel,application/x-dos_ms_excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        //acceptedFiles: "image/*, application/*, .docx,.zip,.dwgs",
        //acceptedFiles: "image/*",
        addRemoveLinks: true,
        maxFiles: 25,
        maxFilesize: maxTotalSize,
        params: {
            file_attachment_towards: file_attachment_towards
        },
        accept: function (file, done) {
            if (file.name.length > 80) {
                done("Filename exceeds 80 characters!");
            } else {
                done();
            }
        },
        init: function () {
            var submitButton = document.querySelector("#submit-all");
            myDropzone = this; // closure
            submitButton.addEventListener("click", function () {
                if (myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                } else {
                    alert('Invalid file attachment');
                }
            });
            // You might want to show the submit button only when 
            // files are dropped here:
            this.on("addedfile", function (file) {

            });
            this.on("success", function (file, response) {
                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                    loading.show();
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                }
                // console.log(response);
            });
        }
    });
}
