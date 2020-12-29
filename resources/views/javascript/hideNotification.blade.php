<script>

    window.onload = function() {
        setTimeout(function () {
            $('#notification-container').addClass('opacity-0');
            setTimeout(function () {
                $('#notification-container').hide();
            }, 1000)
        }, 3000);
    };

</script>
