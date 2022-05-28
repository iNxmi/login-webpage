window.onload = function () {
    initEasterEgg();
};

function initEasterEgg() {
    var nums = [7];
    for (var i = 0; i < 7; i++)
        nums[i] = Math.floor(Math.random() * 3);

    var title = document.title;

    document.title = nums.toString().replaceAll(",", "-");

    window.addEventListener("mousedown", onWindowClick)
    window.addEventListener("contextmenu", e => { e.preventDefault() })

    var secret = document.getElementById("secret");
    var video = document.getElementById("background-video");
    secret.addEventListener('click', onSecretClick);
    function onSecretClick(e) {
        video.pause();
        video.currentTime = 0;
        secret.style.display = "none";
        document.title = nums.toString().replaceAll(",", "-");
    };

    var count = 0;
    function onWindowClick(e) {
        var button = e.button;

        if (nums[count] != button) {
            count = 0;
            return;
        }

        count++;

        if (count == 7) {
            secret.style.display = "block";
            video.play();
            document.title = title;
            count = 0;
        }
    }
};