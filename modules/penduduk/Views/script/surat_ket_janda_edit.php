<script>
    //-------
    $(".is-invalid").on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        $(this).removeClass("is-invalid");
        if ($(this).hasClass("border-danger")) {
            $(this).removeClass("border-danger");
        }
        if ($(this).hasClass("border-primary")) {
            $(this).removeClass("border-primary");
        }
        $(this).addClass("border-primary");
    });

    $('#tombol_simpan').on("click", function() {
        $('#surat_ket_janda').submit();
        $(this).attr('disabled', 'disabled');
        $(this).html('LOADING <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
    });

    //-----------

    <?php if (isset($message_info)) : ?>
        $(document).ready(function() {
            $('#modal_message_info').modal('toggle');
        });
    <?php endif; ?>

    function create_option(data, elem) {
        let opt_elem = '<option value="">Pilih</option>';
        data.forEach(function(item) {
            opt_elem += '<option value="' + item['kode_wilayah'] + '">' + item['nama_wilayah'].toUpperCase() + '</option>';
        });
        $(elem).html(opt_elem);
    }

    function get_provinsi(postfix = '') {

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
                if (response.length) {
                    create_option(response, '#provinsi' + postfix);
                } else {
                    $("select[id='provinsi" + postfix + "']").html('');
                }
                $("select[id='kab_kota" + postfix + "']").html('');
                $("select[id='kecamatan" + postfix + "']").html('');
                $("select[id='kel_desa" + postfix + "']").html('');

            },
            error: function() {
                $("select[id='kab_kota" + postfix + "']").html('');
                $("select[id='kecamatan" + postfix + "']").html('');
                $("select[id='kel_desa" + postfix + "']").html('');
                console.log("data wilayah " + postfix + " error occured.");
            },
            complete: function() {

            }
        });
    }
    var arr_postfix = ['_anak', '_ayah', '_ibu'];

    $(document).ready(function() {
        for (let i = 0; i < arr_postfix.length; i++) {
            if ($("select[id='provinsi" + arr_postfix[i] + "']").val() == null) {
                get_provinsi(arr_postfix[i]);
            } else {
                console.log('provinsi not empty');
            }
        }
    });

    function get_kab_kota(postfix = '') {
        if ($("select[id='provinsi" + postfix + "']").val() != null) {
            $.ajax({
                type: "get",
                url: "<?= base_url() ?>/data-wilayah",
                data: 'list_wilayah=kab_kota&provinsi=' + $("select[id='provinsi" + postfix + "']").val(),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.length) {
                        create_option(response, "#kab_kota" + postfix);
                    } else {
                        $("select[id='kab_kota" + postfix + "']").html('');
                    }
                    $("select[id='kecamatan" + postfix + "']").html('');
                    $("select[id='kel_desa" + postfix + "']").html('');

                },
                error: function() {
                    $("select[id='kecamatan" + postfix + "']").html('');
                    $("select[id='kel_desa" + postfix + "']").html('');
                    console.log("data wilayah " + postfix + " error occured.");
                },
                complete: function() {

                }
            });
        }
    }

    for (let i = 0; i < arr_postfix.length; i++) {
        $("select[id='provinsi" + arr_postfix[i] + "']").on('change', function() {
            get_kab_kota(arr_postfix[i]);
        });
    }

    function get_kecamatan(postfix = '') {
        if ($("select[id='kab_kota" + postfix + "']").val() != null) {
            $.ajax({
                type: "get",
                url: "<?= base_url() ?>/data-wilayah",
                data: 'list_wilayah=kecamatan&kab_kota=' + $("select[id='kab_kota" + postfix + "']").val(),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    if (response.length) {
                        create_option(response, '#kecamatan' + postfix);
                    } else {
                        $("select[id='kecamatan" + postfix + "']").html('');
                    }
                    $("select[id='kel_desa" + postfix + "']").html('');

                },
                error: function() {
                    $("select[id='kel_desa" + postfix + "']").html('');
                    console.log("data wilayah " + postfix + " error occured.");
                },
                complete: function() {

                }
            });
        }
    }


    for (let i = 0; i < arr_postfix.length; i++) {
        $("select[id='kab_kota" + arr_postfix[i] + "']").on('change', function() {
            get_kecamatan(arr_postfix[i]);
        });
    }

    function get_kel_desa(postfix = '') {
        if ($("select[id='kecamatan" + postfix + "']").val() != null) {
            $.ajax({
                type: "get",
                url: "<?= base_url() ?>/data-wilayah",
                data: 'list_wilayah=kel_desa&kecamatan=' + $("select[id='kecamatan" + postfix + "']").val(),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    if (response.length) {
                        create_option(response, '#kel_desa' + postfix);
                    } else {
                        $("select[id='kel_desa" + postfix + "']").html('');
                    }


                },
                error: function() {
                    console.log("data wilayah " + postfix + " error occured.");
                },
                complete: function() {

                }
            });
        }
    }

    for (let i = 0; i < arr_postfix.length; i++) {
        $("select[id='kecamatan" + arr_postfix[i] + "']").on('change', function() {
            get_kel_desa(arr_postfix[i]);
        });
    }
</script>