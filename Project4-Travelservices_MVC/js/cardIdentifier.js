function getCardVendor(number) {

    // visa
    var re = new RegExp("^4");
    if (number.match(re) != null){
        document.getElementById("mastercard").style.visibility = "hidden";
        document.getElementById("amex").style.visibility = "hidden";
        document.getElementById("discover").style.visibility = "hidden";
        return "visa";
    }

    // Mastercard
    re = new RegExp("^5[1-5]");
    if (number.match(re) != null){
        document.getElementById("visa").style.visibility = "hidden";
        document.getElementById("amex").style.visibility = "hidden";
        document.getElementById("discover").style.visibility = "hidden";
        return "mastercard";
    }

    // AMEX
    re = new RegExp("^3[47]");
    if (number.match(re) != null){
        document.getElementById("mastercard").style.visibility = "hidden";
        document.getElementById("visa").style.visibility = "hidden";
        document.getElementById("discover").style.visibility = "hidden";
        return "amex";
    }

    // Discover
    re = new RegExp("^6");
    if (number.match(re) != null){
        document.getElementById("mastercard").style.visibility = "hidden";
        document.getElementById("visa").style.visibility = "hidden";
        document.getElementById("amex").style.visibility = "hidden";
        return "discover";
    }

    document.getElementById("mastercard").style.visibility = "visible";
    document.getElementById("visa").style.visibility = "visible";
    document.getElementById("discover").style.visibility = "visible";
    document.getElementById("amex").style.visibility = "visible";
}