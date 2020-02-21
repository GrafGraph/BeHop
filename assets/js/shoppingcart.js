function remove(button, ID) {
    event.stopPropagation(); // no send to the top element
    event.preventDefault(); // no default action on submit

    // var form = document.getElementById('form-date');
    // alert("I " + ID + " got clicked");
    var request = new XMLHttpRequest();
    var parent = button.parentNode;
    // console.log(parent.getAttribute('method'));
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

    // var formData = new FormData(form);
    // formData.append('textsubmit', '1');
    // request.send(formData);
}

// function shoppingcartContent() {
//     console.log("In der Funktion!")
//     var request2 = new XMLHttpRequest();
//     request2.open(parent.getAttribute('method'), '?c=functions&a=shoppingcartContent&ajax=1', true);
//     request2.send();
//     request2.onreadystatechange = function() {
//         // request finished?
//         if (this.readyState == 4) // XMLHttpRequest.DONE
//         {
//             // HTTP-Status-Code is OK?
//             if (this.status == 200) {
//                 var resJson = null;
//                 try {
//                     resJson = JSON.parse(this.response);
//                 } catch (err) {
//                     console.log("Json failed");
//                 }

//                 if (resJson !== null) {
//                     if (resJson.error === null) {
//                         console.log(resJson.shoppingcartContent);
//                         return resJson.shoppingcartContent;
//                     }
//                 }
//             } else {
//                 console.log('Wrong Status Code, because of: ' + this.statusText);
//             }
//         }
//     }
// }