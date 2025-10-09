var computed = false;
var decimal = 0;
function convert(entryform, from, to) {
    convertfrom = from.selectedIndex;
    convertto = to.selectedIndex;
    entryform.display.value = (entryform.input.value * from[convertfrom].value / to[convertto].value);
}
function addChar(input, character) {
    if ((character == '.' && decimal == 0) || character != '.') {
        if (input.value == "" || input.value == "0")
            input.value = character;
        else
            input.value += character;
        convert(input.form, input.form.measure1, input.form.measure2);
        computed = true;
        if (character == '.') {
            decimal = 1;
        }
    }
}
function openVothcom() {
    window.open("", "Display window", "toolbar=no,directories=no,menubar=no");
}
function clear(form) {
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
}
function changeBackground(hexNumber) {
    document.bgColor = hexNumber;
}


function getTheDate() {
    Todays = new Date();
    TheDate = "" + Todays.getDate() + "." + (Todays.getMonth() + 1) + "." + (Todays.getYear() + 1900);
    document.getElementById("data").innerHTML = TheDate;
}
var timerID = null;
var timerRunning = false;
function stopclock() {
    if (timerRunning) {
        clearTimeout(timerID);
        timerRunning = false;
    }
}
function startclock() {
    stopclock();
    getTheDate();
    showtime();
}
function showtime() {
    var now = new Date();
    var hours = now.getHours();
    var minutes = now.getMinutes();
    var seconds = now.getSeconds();
    var timeValue = "" + hours;
    timeValue += ((minutes < 10) ? ":0" : ":") + minutes;
    timeValue += ((seconds < 10) ? ":0" : ":") + seconds;
    document.getElementById("zegarek").innerHTML = timeValue;
    timerID = setTimeout("showtime()", 1000);
    timerRunning = true;
}