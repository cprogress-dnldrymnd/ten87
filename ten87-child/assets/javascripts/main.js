// our <path> element
import { spline } from '../../node_modules/@georgedoescode/spline/spline.js';
import SimplexNoise from '../../node_modules/simplex-noise/dist/esm/simplex-noise.js';
const path = document.querySelector(".blob-holder path");
const path2 = document.querySelector(".blob-holder-2 path");

let noiseStep = 0.005;

const simplex = new SimplexNoise();

const points = createPoints();

(function animate() {
    path.setAttribute("d", spline(points, 1, true));
    path2.setAttribute("d", spline(points, 1, true));

    // for every point...
    for (let i = 0; i < points.length; i++) {
        const point = points[i];

        // return a pseudo random value between -1 / 1 based on this point's current x, y positions in "time"
        const nX = noise(point.noiseOffsetX, point.noiseOffsetX);
        const nY = noise(point.noiseOffsetY, point.noiseOffsetY);
        // map this noise value to a new value, somewhere between it's original location -20 and it's original location + 20
        const x = map(nX, -1, 1, point.originX - 20, point.originX + 20);
        const y = map(nY, -1, 1, point.originY - 20, point.originY + 20);

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
}

function hero_cursor() {

    let FollowBox = ".home-cursor";
    gsap.set(FollowBox, {
        xPercent: -50,
        yPercent: -50,
        scale: 0
    });

    window.addEventListener("mousemove", (e) => {
        gsap.to(FollowBox, {
            duration: 0.5,
            overwrite: "auto",
            x: e.clientX,
            y: e.clientY,
            stagger: 0.15,
            ease: "none"
        });

        let TL = gsap.timeline({
            defaults: { duration: 0.5, ease: "none" }
        });
        TL.to(FollowBox, {
            scale: 0,
            overwrite: "auto",
            stagger: { amount: 0.15, from: "start", ease: "none" }
        });
        TL.to(FollowBox, {
            scale: 1,
            overwrite: "auto",
            stagger: { amount: 0.15, from: "end", ease: "none" }
        });
    });


}