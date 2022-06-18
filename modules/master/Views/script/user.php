<script>

var album_image_galeri;
var viewer_image_galeri;

function instance_viewer(elem_id){
    if($('#'+elem_id).length){
        album_image_galeri = document.getElementById(elem_id);
        viewer_image_galeri = new Viewer(album_image_galeri, {
            url: 'src',
        }); 
    }
}
function destroy_viewer(){
    viewer_image_galeri.destroy();
}

$( document ).ready(function() {
    instance_viewer('kartu_keluarga_list');
});


<?php if(isset($message_info)) :?>
$( document ).ready(function() {
    $('#modal_message_info').modal('toggle');
});
<?php endif; ?>

function create_option(data, elem){
    let opt_elem  = '<option value="">Pilih</option>';
    data.forEach(function(item) {
        opt_elem += '<option value="'+item['kode_wilayah']+'">'+item['nama_wilayah'].toUpperCase()+'</option>';
    });
    $(elem).html(opt_elem);
}

function get_provinsi() { 

    let url = "<?= base_url() ?>/data-wilayah?list_wilayah=provinsi";
    $.ajax({
        type: 'get',
        url: "<?= base_url() ?>/data-wilayah",
        data: 'list_wilayah=provinsi',
        contentType: "application/json; charset=utf-8",
        cache: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if(response.length){
                create_option(response, '#provinsi');
            } else {
                $("select[id='provinsi']").html('');
            }
            $("select[id='kab_kota']").html('');
            $("select[id='kecamatan']").html('');
            $("select[id='kel_desa']").html('');
           
        },
        error: function() {
            $("select[id='kab_kota']").html('');
            $("select[id='kecamatan']").html('');
            $("select[id='kel_desa']").html('');
            console.log("data wilayah error occured.");
        },
        complete: function() {
            
        }
    });
}

$( document ).ready(function() {
    if($("select[id='provinsi']").val() == null){
        get_provinsi();
    } else {
        console.log('provinsi not empty');
    }
});

function get_kab_kota() { 
    if($("select[id='provinsi']").val() != null){
        $.ajax({
            type: "get",
            url: "<?= base_url() ?>/data-wilayah",
            data: 'list_wilayah=kab_kota&provinsi='+$("select[id='provinsi']").val(),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if(response.length){
                    create_option(response, '#kab_kota');
                } else {
                    $("select[id='kab_kota']").html('');
                }
                $("select[id='kecamatan']").html('');
                $("select[id='kel_desa']").html('');
               
            },
            error: function() {
                $("select[id='kecamatan']").html('');
                $("select[id='kel_desa']").html('');
                console.log("data wilayah error occured.");
            },
            complete: function() {
                
            }
        });
    }   
}

$("select[id='provinsi']").on('change', function(){
    get_kab_kota();
});

function get_kecamatan() { 
    if($("select[id='kab_kota']").val() != null){
        $.ajax({
            type: "get",
            url: "<?= base_url() ?>/data-wilayah",
            data: 'list_wilayah=kecamatan&kab_kota='+$("select[id='kab_kota']").val(),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(response) {
                if(response.length){
                    create_option(response, '#kecamatan');
                } else {
                    $("select[id='kecamatan']").html('');
                }
                $("select[id='kel_desa']").html('');
               
            },
            error: function() {
                $("select[id='kel_desa']").html('');
                console.log("data wilayah error occured.");
            },
            complete: function() {
                
            }
        });
    }   
}

$("select[id='kab_kota']").on('change', function(){
    get_kecamatan();
});

function get_kel_desa() { 
    if($("select[id='kecamatan']").val() != null){
        $.ajax({
            type: "get",
            url: "<?= base_url() ?>/data-wilayah",
            data: 'list_wilayah=kel_desa&kecamatan='+$("select[id='kecamatan']").val(),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "JSON",
            success: function(response) {
                if(response.length){
                    create_option(response, '#kel_desa');
                } else {
                    $("select[id='kel_desa']").html('');
                }
               

            },
            error: function() {
                console.log("data wilayah error occured.");
            },
            complete: function() {
                
            }
        });
    }   
}

$("select[id='kecamatan']").on('change', function(){
    get_kel_desa();
});

</script>