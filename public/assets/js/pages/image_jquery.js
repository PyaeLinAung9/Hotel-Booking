
    // Image File Upload

    function chooseFile() {
        $("#thumb-file").click();
    }
    function uploadImage() {
        const fileInput  = $("#thumb-file")[0].files[0];

        const fileName      = fileInput.name;
        const fileExtension = fileName.split('.').pop().toLowerCase();
        const allowExtension= ['jpg','jpeg','png'];
        if(allowExtension.includes(fileExtension)) {
            $(".vertical-center").hide();
            const previewImage  = $("#thumb-image");
            const reader        = new FileReader();
            reader.onload       = function(e) {
                previewImage.attr( "src", e.target.result)
            }
            reader.readAsDataURL(fileInput)
            $(".button-center").show();
            $("#thumb-image").show();
        } else {
            alert('Invalid image file extension. Allowed extensions are: ' + allowExtension.join(', '));
        }
    }
    function changeImage() {
        $("#thumb-file").click();
    }
