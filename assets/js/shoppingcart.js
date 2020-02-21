function remove(button, ID) {
    event.stopPropagation(); // no send to the top element
    event.preventDefault(); // no default action on submit

    var request = new XMLHttpRequest();
    var parent = button.parentNode;
    request.open(parent.getAttribute('method'), parent.getAttribute('action') + '&ajax=' + ID, true);
    request.send();
    request.onreadystatechange = function() {
        // request finished?
        if (this.readyState == 4) // XMLHttpRequest.DONE
        {
            // HTTP-Status-Code is OK?
            if (this.status == 200) {
                document.getElementById(ID).remove();
                var resJson = null;
                try {
                    resJson = JSON.parse(this.response);
                } catch (err) {
                    console.log("Json failed");
                }
                if (resJson !== null) {
                    if (resJson.shoppingcartContent !== null) {
                        if (resJson.shoppingcartContent <= 0) {
                            window.location = "index.php?c=account&a=shoppingcart";
                        }
                        document.getElementById("shoppingcartContent1").innerHTML = resJson.shoppingcartContent;
                        document.getElementById("shoppingcartContent2").innerHTML = resJson.shoppingcartContent; // TODO: Workaround until Nav was updated and is unique...
                    }
                    if (resJson.total) {
                        console.log(resJson.total);
                        document.getElementById('priceTotal').innerHTML = parseFloat(resJson.total);
                    }
                }
            } else {
                console.log('Wrong Status Code, because of: ' + this.statusText);
            }
        }
    }
}