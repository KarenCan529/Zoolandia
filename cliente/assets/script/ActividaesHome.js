const isMobile = window.matchMedia("(max-width: 768px)").matches;
const videos = document.querySelectorAll('.video-control');

videos.forEach(video => {
    if (isMobile) {
        video.muted = true;
        video.play();
        video.addEventListener('ended', () => {
            video.play();
        });
    } else {
        video.addEventListener('mouseenter', () => {
            video.play();
        });
        video.addEventListener('mouseleave', () => {
            video.pause();
        });
    }
});
