<script>

    let imageSources = [];

    window.onload = function () {
        $("img[id^=screenshot]").each(function (index, element) {
            imageSources.push(element.src);
        });
    }

    function showModal(screenshot) {
        $('#modal-container').show();
        $('#modal-image').attr('src', screenshot.src);
    }

    function hideModal() {
        $('#modal-container').hide();
    }

    function nextModal() {
        let modal = $('#modal-image');
        let currentIndex = imageSources.indexOf(modal.attr('src'));
        modal.attr('src', imageSources[currentIndex + 1]);
    }

    function previousModal() {
        let modal = $('#modal-image');
        let currentIndex = imageSources.indexOf(modal.attr('src'));
        modal.attr('src', imageSources[currentIndex - 1]);
    }
</script>
