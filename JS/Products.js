
function showDiv(select) {
    if (select.value == "none") {
        document.getElementById('hidden_div1').style.display = "none";
        document.getElementById('hidden_div2').style.display = "none";
        document.getElementById('hidden_div3').style.display = "none";
    }
    if (select.value == "Weight") {
        document.getElementById('hidden_div1').style.display = "block";
        document.getElementById('hidden_div2').style.display = "none";
        document.getElementById('hidden_div3').style.display = "none";

    }
    if (select.value == "Size") {
        document.getElementById('hidden_div2').style.display = "block";
        document.getElementById('hidden_div1').style.display = "none";
        document.getElementById('hidden_div3').style.display = "none";
    }
    if (select.value == "Dimension") {
        document.getElementById('hidden_div3').style.display = "block";
        document.getElementById('hidden_div2').style.display = "none";
        document.getElementById('hidden_div1').style.display = "none";
    }
}
