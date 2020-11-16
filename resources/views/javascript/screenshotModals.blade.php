<script>

    let imageSources = [];

    window.onload = function () {
        $("img[id^=screenshot]").each(function (index, element) {
            imageSources.push(getHighResolutionSource(element.src));
        });
    }

    function getHighResolutionSource(sourceUrl) {
        return sourceUrl.replace('t_720p','t_1080p');
    }

    function showModal(screenshot) {
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
