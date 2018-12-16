function itemadded(fieldId, fieldprice, currentprc) {
    console.log(fieldId);
    var currentQty = parseInt(document.getElementById(fieldId).innerHTML, 10);
    document.getElementById(fieldId).innerHTML = currentQty + 1;

    var currentprice = parseInt(document.getElementById(fieldprice).innerHTML, 10);
    document.getElementById(fieldprice).innerHTML = currentprice + currentprc;
}


function itemdeleted(fieldId, fieldprice, currentprc) {
    // $('#'+fieldId).value($('#'+fieldId).value + 1);
    console.log(fieldId);
    var currentQty = parseInt(document.getElementById(fieldId).innerHTML, 10);
    document.getElementById(fieldId).innerHTML = currentQty - 1;

    var currentprice = parseInt(document.getElementById(fieldprice).innerHTML, 10);
    document.getElementById(fieldprice).innerHTML = currentprice - currentprc;
}
