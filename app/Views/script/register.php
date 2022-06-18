<script>
$( document ).ready(function() {
    $('#lihat-kata-sandi').on('click', function(){
        var password_state_type = $('#password').attr('type');
        if(password_state_type == 'password'){
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    });
<?php if(isset($message_info)) :?>
    $('#modal_message_info').modal('toggle');
<?php endif; ?>
});
</script>