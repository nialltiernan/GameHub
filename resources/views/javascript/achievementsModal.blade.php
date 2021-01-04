<script>

    let achievementImageSources = [];

    document.addEventListener('keydown', (e) => {
        if (e.code === 'ArrowRight') {
            nextAchievementModal();
        } else if (e.code === 'ArrowLeft') {
            previousAchievementModal();
        } else if (e.code === 'Escape') {
            hideAchievementModal();
        }
    });

    function initAchievementModalArray() {
        $("img[id^=achievement_]").each(function (index, element) {
            achievementImageSources.push(element.src);
        });
    }

    function showAchievementModal(achievement) {
        initAchievementModalArray();

        $('#achievements-modal').show();
        $('#achievement-modal-image').attr('src', achievement.src);
    }

    function hideAchievementModal() {
        $('#achievements-modal').hide();
    }

    function nextAchievementModal() {
        let modal = $('#achievement-modal-image');
        let currentIndex = achievementImageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === achievementImageSources.length - 1) {
            newIndex = 0;
        } else {
            newIndex = currentIndex + 1;
        }

        modal.attr('src', achievementImageSources[newIndex]);
    }

    function previousAchievementModal() {
        let modal = $('#achievement-modal-image');
        let currentIndex = achievementImageSources.indexOf(modal.attr('src'));
        let newIndex;

        if (currentIndex === 0) {
            newIndex = achievementImageSources.length - 1
        } else {
            newIndex = currentIndex - 1;
        }

        modal.attr('src', achievementImageSources[newIndex]);
    }
</script>
