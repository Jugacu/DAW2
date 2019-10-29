(
    () => {
        const video = document.querySelector('video');
        const playBtn = document.querySelector('#play');
        const pauseBtn = document.querySelector('#pause');
        const stopBtn = document.querySelector('#stop');
        const muteBtn = document.querySelector('#mute');
        const volume = document.querySelector('#volume');
        const progress = document.querySelector('progress');


        playBtn.addEventListener('click', async () => {
            await video.play();
        });

        pauseBtn.addEventListener('click', async () => {
            await video.pause();
        });

        stopBtn.addEventListener('click', async () => {
            await video.pause();
            video.currentTime = 0;
        });

        muteBtn.addEventListener('click', async () => {
            video.muted = !video.muted;

            muteBtn.innerText = video.muted ? 'unmute' : 'mute';
        });

        video.addEventListener('timeupdate', () => {
            progress.value = video.currentTime * 100 / video.duration;
        });

        volume.addEventListener('change', () => {
            video.volume = volume.value / 100;
        })
    }
)();
