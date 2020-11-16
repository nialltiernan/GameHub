<script>
    function showModal(screenshot) {
        $('#modal-container').show();
        $('#modal-image').attr('src', screenshot.src);
    }

    function hideModal() {
        $('#modal-container').hide();
    }
</script>
