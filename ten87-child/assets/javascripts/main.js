// our <path> element
import { spline } from '../../node_modules/@georgedoescode/spline/spline.js';
import SimplexNoise from '../../node_modules/simplex-noise/dist/esm/simplex-noise.js';
const path = document.querySelector(".blob-holder path");
const path2 = document.querySelector(".blob-holder-2 path");
const path3 = document.querySelector(".blob-holder-3 path");
const path4 = document.querySelector(".blob-holder-4 path");
const path5= document.querySelector(".blob-footer path");

let noiseStep = 0.005;

const simplex = new SimplexNoise();

const points = createPoints();

(function animate() {
    path.setAttribute("d", spline(points, 1, true));
    path2.setAttribute("d", spline(points, 3, true));
    path3.setAttribute("d", spline(points, 3, true));
    path4.setAttribute("d", spline(points, 3, true));
    path5.setAttribute("d", spline(points, 3, true));

    // for every point...
    for (let i = 0; i < points.length; i++) {
        const point = points[i];

        // return a pseudo random value between -1 / 1 based on this point's current x, y positions in "time"
        const nX = noise(point.noiseOffsetX, point.noiseOffsetX);
        const nY = noise(point.noiseOffsetY, point.noiseOffsetY);
        // map this noise value to a new value, somewhere between it's original location -20 and it's original location + 20
        const x = map(nX, -1, 1, point.originX - 5, point.originX + 5);
        const y = map(nY, -1, 1, point.originY - 5, point.originY + 5);

        // update the point's current coordinates
        point.x = x;
        point.y = y;

        // progress the point's x, y values through "time"
        point.noiseOffsetX += noiseStep;
        point.noiseOffsetY += noiseStep;
    }

    requestAnimationFrame(animate);
})();

function map(n, start1, end1, start2, end2) {
    return ((n - start1) / (end1 - start1)) * (end2 - start2) + start2;
}

function noise(x, y) {
    return simplex.noise2D(x, y);
}

function createPoints() {
    const points = [];
    // how many points do we need
    const numPoints = 6;
    // used to equally space each point around the circle
    const angleStep = (Math.PI * 2) / numPoints;
    // the radius of the circle
    const rad = 75;

    for (let i = 1; i <= numPoints; i++) {
        // x & y coordinates of the current point
        const theta = i * angleStep;

        const x = 100 + Math.cos(theta) * rad;
        const y = 100 + Math.sin(theta) * rad;

        // store the point's position
        points.push({
            x: x,
            y: y,
            // we need to keep a reference to the point's original point for when we modulate the values later
            originX: x,
            originY: y,
            // more on this in a moment!
            noiseOffsetX: Math.random() * 1000,
            noiseOffsetY: Math.random() * 1000
        });
    }

    return points;
}
/*
document.querySelector(".home-hero").addEventListener("mouseover", () => {
    noiseStep = 0.01;
});

document.querySelector(".elementor-column").addEventListener("mouseleave", () => {
    noiseStep = 0.005;
});
*/
jQuery(document).ready(function () {
    anim();
    hero_cursor();
});
function anim() {
    let $banner = document.getElementById('home-hero');

    if ($banner) {
        $banner.addEventListener("mousemove", e => {
            let x = e.clientX;
            let y = e.clientY;
            gsap.to('.home-hero .blob-holder-absolute .blob-box', {
                x: x * 0.08,
                y: y * 0.16,
                duration: 1
            })
        })
    }

    let $about_us = document.getElementById('about-us');

    if ($about_us) {
        $about_us.addEventListener("mousemove", e => {
            let x = e.clientX;
            let y = e.clientY;
            gsap.to('#about-us .blob-box', {
                x: x * 0.08,
                y: y * 0.16,
                duration: 1
            })
        })
    }


    let $our_community = document.getElementById('our-community-home');

    if ($our_community) {
        $our_community.addEventListener("mousemove", e => {
            let x = e.clientX;
            let y = e.clientY;
            gsap.to('#our-community-home .blob-box', {
                x: x * 0.08,
                y: y * 0.16,
                duration: 1
            })
        })
    }

    let $body = document.getElementsByTagName('body');

    if ($body) {
        $body.addEventListener("mousemove", e => {
            let x = e.clientX;
            let y = e.clientY;
            gsap.to('#blob-footer-holder .blob-box', {
                x: x * 0.08,
                y: y * 0.16,
                duration: 1
            })
        })
    }
    
}

function hero_cursor() {
    var $circle = jQuery('.home-cursor');
    if ($circle.length > 0) {
        function moveCircle(e) {
            TweenLite.to($circle, 0.3, {
                css: {
                    left: e.pageX,
                    top: e.pageY
                }
            });
        }
        jQuery(window).on('mousemove', moveCircle);

        jQuery(".home-hero").hover(
            function () {
                jQuery('.home-cursor').addClass('show-cursor');
            }, function () {
                jQuery('.home-cursor').removeClass('show-cursor');
            }
        );
    }
}


