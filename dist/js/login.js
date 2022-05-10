var nums = [7];
for (var i = 0; i < 7; i++)
    nums[i] = Math.floor(Math.random() * 3);

document.title = nums.toString().replaceAll(",", "-");

window.addEventListener("mousedown", onWindowClick)
window.addEventListener("contextmenu", e => { e.preventDefault() })

var count = 0;
function onWindowClick(e) {
    var button = e.button;

    if (nums[count] != button) {
        count = 0;
        return;
    }

    count++;

    if (count == 7) {
        alert("penis");
        count = 0;
    }
}