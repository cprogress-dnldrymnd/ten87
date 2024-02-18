<!-- Draw everything relative to a 200x200 canvas, this will then scale to any resolution -->
<div class="blob-box <?= $settings['blob_class'] ?   $settings['blob_class'] : '' ?>">
    <svg viewBox="0 0 200 200">
        <defs>

            <radialGradient id="gradient" gradientTransform="translate(-0.5 -0.5) scale(2, 2)">
                <stop offset="0%" stop-color="#ff5932"></stop>
                <stop offset="10%" stop-color="rgba(255, 89, 50, 0.75)"></stop>
                <stop offset="20%" stop-color="rgba(255, 89, 50, 0.5)"></stop>
                <stop offset="40%" stop-color="rgba(255, 89, 50, 0)"></stop>
            </radialGradient>
        </defs>
        <path d="" fill="url('#gradient')"></path>
    </svg>

</div>