var ageCheck = function () {
    var drink = document.querySelector("select option:checked").value;
    var dateDisplay = document.querySelector("#bDay");
    if (drink == "2" || drink == "3") {
        dateDisplay.style.visibility = "visible";
    } else {
        dateDisplay.style.visibility = "hidden";
    }
}
var ageCalc = function () {
    var date = document.querySelector("#date").value;
    var bDay = moment(date);
    var min = moment().subtract("21", 'years');
    if (bDay.isAfter(min)) {
        document.querySelector("#output1").innerHTML = "Must be born before ";
        document.querySelector("#output2").innerHTML = min.format("dddd, MMMM, D, YYYY");
        document.querySelector("#output3").innerHTML = "to purchase this beverage.";
        document.querySelector("#receipt").style.visibility = "visible";
        document.querySelector("#receipt").style.background = 'red';
        return false;
    } else {
        return true;
    }
}
var prices = [
    [2.5, 4, 5],
    [2.5, 5.5, 7.5],
    [4, 7, 8],
    [6, 8, 9]
];
var beverages = ["Coffee", "Tea", "Beer", "Wine"];
var sizes = {
    0: "Small",
    1: "Medium",
    2: "Large"
};
var printReceipt = function () {
    var name = document.querySelector("#name").value;
    var drink = document.querySelector("select option:checked").value;
    var drinkName = beverages[drink];
    var size = document.querySelector('[type="radio"]:checked').value;
    var quantity = Number(document.querySelector("#amount").value);
    var price = prices[drink][size];
    var totalPrice = quantity * price;
    if (ageCalc()) {
        document.querySelector("#output1").innerHTML = "Customer: " + name;
        document.querySelector("#output2").innerHTML = quantity + " " + sizes[size] + " " + drinkName + " @ $" + price;
        document.querySelector("#output3").innerHTML = "TOTAL DUE: $" + totalPrice;
        document.querySelector("#receipt").style.visibility = "visible";
        document.querySelector("#receipt").style.background = 'white';
    }
}
window.onload = function () {
    document.querySelector("#bDay").style.visibility = "hidden";
    document.querySelector("#receipt").style.visibility = "hidden";
    var drop = document.querySelector("#dropdown");
    drop.onchange = ageCheck;
    document.querySelector("#btn").onclick = printReceipt;
}