<script>
    function showModal(screenshot) {
        $('#modal-container').show();
        $('#modal-image').attr('src', screenshot.src);
    }

    function hideModal(modal) {
        let selector = '#' + modal.id;
        $('#modal-container').hide();
    }
</script>
