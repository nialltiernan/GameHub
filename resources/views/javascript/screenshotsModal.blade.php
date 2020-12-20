<script>

    let imageSources = [];

    document.addEventListener('keydown', (e) => {
        if (e.code === 'ArrowRight') {
            nextScreenshotModal();
        } else if (e.code === 'ArrowLeft') {
            previousScreenshotModal();
        } else if (e.code === 'Escape') {
            hideScreenshotModal();
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

    function showScreenshotModal(screenshot) {
        initModalArray();

        $('#screenshots-modal').show();
        $('#modal-image').attr('src', getHighResolutionSource(screenshot.src));
    }

    function hideScreenshotModal() {
        $('#screenshots-modal').hide();
    }

    function nextScreenshotModal() {
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

    function previousScreenshotModal() {
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
