<script>

    let animation = null;

    document.addEventListener('keydown', (event) => {
        if (isNotEasterEggEvent(event.code)) {
            return;
        }

        if (animation === null) {
            animation = getAnimation(event.code);
        } else {
            if (isNewAnimationSameAsCurrent(event.code)) {
                animation = null
            } else {
                animation = getAnimation(event.code);
            }
        }

        removeAnimations();

        if (animation !== 'null') {
            applyAnimations(animation);
        }
    });

    function isNotEasterEggEvent(code) {
        return !isEasterEggEvent(code)
    }

    function isEasterEggEvent(code) {
        return ['Enter', 'ShiftLeft', 'ShiftRight', 'AltLeft', 'AltRight'].includes(code);
    }

    function getAnimation(code) {
        if (code === 'Enter') {
            return 'spin'
        } else if (code === 'ShiftLeft') {
            return 'bounce'
        } else if (code === 'ShiftRight') {
            return 'ping'
        } else if (code === 'AltLeft') {
            return 'pulse'
        } else if (code === 'AltRight') {
            return 'kaa'
        }
    }

    function isNewAnimationSameAsCurrent(code) {
        return (animation === 'spin' && code === 'Enter') ||
            (animation === 'bounce' && code === 'ShiftLeft') ||
            (animation === 'ping' && code === 'ShiftRight') ||
            (animation === 'pulse' && code === 'AltLeft');
    }

    function removeAnimations() {
        let animations = [
            'animate-bounce',
            'animate-ping',
            'animate-pulse',
            'animate-spin',
        ]

        animations.forEach(animation => {
            $('img').each(function () {
                $(this).removeClass(animation)
            });
        })
    }

    function applyAnimations(animation) {
        let images = $('img');

        if (animation === 'kaa') {
            images.each(function () {
                $(this).attr('src','/images/kaa.gif');
            })
        } else {
            images.each(function () {
                $(this).addClass('animate-' + animation)
            });
        }
    }

</script>
