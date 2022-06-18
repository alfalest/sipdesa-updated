
<script>
$(".is-invalid").on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
    $(this).removeClass("is-invalid");
    if($(this).hasClass("border-danger")){
        $(this).removeClass("border-danger");
    }
    if($(this).hasClass("border-primary")){
        $(this).removeClass("border-primary");
    }
    $(this).addClass("border-primary");
});




</script>
<script>

$( document ).ready(function() {
        $('#compose-textarea').summernote({
            placeholder: 'Buat informasi tata cara atau persyaratan yang diperlukan untuk proses pelayanan',
            height: 450,
            toolbar: [
                [ 'group1' ,['style', 'fontsize', 'forecolor','undo', 'redo', 'ul', 'ol','strikethrough']],
                [ 'group2' ,['backcolor', 'fontsize', 'paragraph', 'bold','italic','underline','clear', 'hr']],
                [ 'group3' ,['fontname','height', 'table', 'superscript','subscript', 'help']],
                [ 'group4', ['picture', 'link', 'fullscreen', 'codeview']],
                [ 'group5', ['masukan_gambar']],
            ],
            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '20', '22', '24', '26', '28', '36', '48', '72'],
            fontSizeUnits: ['pt'],
            lineHeights: ['1.0', '1.2', '1.4', '1.5', '1.6', '1.8', '2.0', '2.5', '3.0'],
            fontNames: [
                'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                'Helvetica Neue', 'Helvetica', 'Impact', 'Lucida Grande',
                'Tahoma', 'Times New Roman', 'Verdana',
                ],
            historyLimit: 300,
            spellCheck: false,
            tabsize: 4,
            followingToolbar: true,

            callbacks: {
                onImageLinkInsert: function(url) {
                    if( $('#modal_insert_image_url').hasClass('show') ){
                        $('#modal_insert_image_url').modal('hide');
                    }
                $('#text_insert_image_url').html('Menambahkan gambar dengan Image URL tidak dianjurkan. Sebaiknya pilih gambar dari perangkat Anda. gambar dengan format jpg atau png dengan ukuran tidak lebih dari 200Kb');
                $('#modal_insert_image_url').modal('show');
                },

                onImageUpload: function(files) {
                    if( $('#modal_insert_image_img').hasClass('show') ){
                        $('#modal_insert_image_img').modal('hide');
                    }
                    if(files[0]){
                        console.log(files[0]);
                        var text_insert_image_img = "";
                        var file_sesuai = true;
                        var sizeKb = Math.ceil(parseInt(files[0]['size']) / 1000);
                        var tipeGambar = files[0]['type'];

                        if(sizeKb > 220){
                            text_insert_image_img += 'Ukuran gambar yang Anda pilih '+ ( sizeKb + 1 ).toString()+'Kb melebihi ukuran dari 220Kb<br>';
                            file_sesuai = false;
                        }

                        if(tipeGambar != 'image/jpeg' && tipeGambar != 'image/png' && tipeGambar != 'image/jpg'){
                            text_insert_image_img += 'File yand Anda unggah '+tipeGambar+' Format file gambar yang di izinkan hanya png dan jpg<br>';
                            file_sesuai = false;
                        }

                        if(file_sesuai){
                            var reader = new FileReader();
                            reader.onload = function() {
                                var dataURL = reader.result;
                                var image_nodes = $('<img>').attr({ src: dataURL, style: 'width:100px;' });
                                $('#compose-textarea').summernote("insertNode", image_nodes[0]);
                            };
                            reader.readAsDataURL(files[0]);
                        } else {
                            $('#text_insert_image_img').html(text_insert_image_img);
                            $('#modal_insert_image_img').modal('show');
                        }
                    }
                }
            }
        });



<?php if(isset($message_info)) :?>
    $('#modal_message_info').modal('toggle');
<?php endif; ?>
});

</script>