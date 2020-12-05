<script>

    let imageSources = [];

    document.addEventListener('keydown', (e) => {
        if (e.code === 'ArrowRight') {
            nextModal();
        } else if (e.code === 'ArrowLeft') {
            previousModal();
        } else if (e.code === 'Escape') {
            hideModal();
        }
    });

    function initModalArray() {
        $("img[id^=screenshot_]").each(function (index, element) {
            imageSources.push(getHighResolutionSource(element.src));
        });
    }

    function getHighResolutionSource(sourceUrl) {
        return sourceUrl.replace('/media/crop/600/400/screenshots/','/media/screenshots/');
    }

    function showModal(screenshot) {
        initModalArray();

        $('#modal-container').show();
        $('#modal-image').attr('src', getHighResolutionSource(screenshot.src));
    }

    function hideModal() {
        $('#modal-container').hide();
    }

    function nextModal() {
        let modal = $('#modal-image');
        let currentIndex = imageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === imageSources.length - 1) {
            newIndex = 0;
        } else {
            newIndex = currentIndex + 1;
        }

        modal.attr('src', imageSources[newIndex]);
    }

    function previousModal() {
        let modal = $('#modal-image');
        let currentIndex = imageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === 0) {
            newIndex = imageSources.length - 1
        } else {
            newIndex = currentIndex - 1;
        }

        modal.attr('src', imageSources[newIndex]);
    }
</script>
