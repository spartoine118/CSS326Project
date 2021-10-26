function openNav() {
    document.getElementById("MenuSideBar").style.width = "10%";
}

function closeNav() {
    document.getElementById("MenuSideBar").style.width = "0px";
    document.getElementById("sidebarbtn").style.marginLeft = "0px";
}

function changeValue(x) {
    document.getElementById("demo").innerHTML = x;
}