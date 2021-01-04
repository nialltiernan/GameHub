<script>

    let screenshotImageSources = [];

    document.addEventListener('keydown', (e) => {
        if (e.code === 'ArrowRight') {
            nextScreenshotModal();
        } else if (e.code === 'ArrowLeft') {
            previousScreenshotModal();
        } else if (e.code === 'Escape') {
            hideScreenshotModal();
        }
    });

    function initScreenshotModalArray() {
        console.log('initScreenshotModalArray');
        $("img[id^=screenshot_]").each(function (index, element) {
            screenshotImageSources.push(getHighResolutionSource(element.src));
        });
        console.log(screenshotImageSources);
    }

    function getHighResolutionSource(sourceUrl) {
        return sourceUrl.replace('/media/crop/600/400/screenshots/','/media/screenshots/');
    }

    function showScreenshotModal(screenshot) {
        initScreenshotModalArray();

        $('#screenshots-modal').show();
        $('#screenshot-modal-image').attr('src', getHighResolutionSource(screenshot.src));
    }

    function hideScreenshotModal() {
        $('#screenshots-modal').hide();
    }

    function nextScreenshotModal() {
        let modal = $('#screenshot-modal-image');
        let currentIndex = screenshotImageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === screenshotImageSources.length - 1) {
            newIndex = 0;
        } else {
            newIndex = currentIndex + 1;
        }

        modal.attr('src', screenshotImageSources[newIndex]);
    }

    function previousScreenshotModal() {
        let modal = $('#screenshot-modal-image');
        let currentIndex = screenshotImageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === 0) {
            newIndex = screenshotImageSources.length - 1
        } else {
            newIndex = currentIndex - 1;
        }

        modal.attr('src', screenshotImageSources[newIndex]);
    }
</script>
