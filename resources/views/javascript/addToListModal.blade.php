<script>

    document.addEventListener('keydown', (e) => {
        if (e.code === 'Escape') {
            hideAddToListModal();
        }
    });

    function showAddToListModal() {
        $('#add-to-list-modal').show();
    }

    function hideAddToListModal() {
        $('#add-to-list-modal').hide();
    }
</script>
