// @author Michael Hopp
function remove(button, ID) {
    event.stopPropagation(); // no send to the top element
    event.preventDefault(); // no default action on submit

    var request = new XMLHttpRequest();
    var parent = button.parentNode;
    request.open(parent.getAttribute('method'), parent.getAttribute('action') + '&ajax=' + ID, true); // Passing Product ID via URL to identify it
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
                        if (resJson.shoppingcartContent <= 0) { // Set new Quantity for Shoppingcart-Icon
                            window.location = "index.php?c=account&a=shoppingcart";
                        }
                        document.getElementById("shoppingcartContent1").innerHTML = resJson.shoppingcartContent;
                        document.getElementById("shoppingcartContent2").innerHTML = resJson.shoppingcartContent; // WORKAROUND: Workaround until Multiple-Nav was updated and is unique...
                    }
                    if (resJson.total) { // Set new Total
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

// @author Anton Bespalov
src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"

$(document).ready(function() {
    $("#InputSearchFieldForFilter").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".shoppingcart-container-inner").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
var inputBoxSearch = document.getElementById('InputSearchFieldForFilter');
inputBoxSearch.style.display = "block";
// AJAX for Updating the Quantity of Products in Shopping Cart won't be featured in this release.
/* 
 function update(button, id) {
     event.stopPropagation(); // no send to the top element
     event.preventDefault(); // no default action on submit
     var request = new XMLHttpRequest();
     var prev = button.previousSibling;
     var quantity = prev.value;
     var parent = button.parentNode;
     request.open(parent.getAttribute('method'), parent.getAttribute('action') + '&ajax=update' + id + '&quantity=' + quantity, true);
     request.send();
     request.onreadystatechange = function() {
         // request finished?
         if (this.readyState == 4) // XMLHttpRequest.DONE
         {
             // HTTP-Status-Code is OK?
             if (this.status == 200) {
                 var resJson = null;
                 try {
                     resJson = JSON.parse(this.response);
                 } catch (err) {
                     console.log("Json failed");
                 }
                 if (resJson !== null) {
                     if (resJson.shoppingcartContent !== null) {
                         // if (resJson.shoppingcartContent <= 0) {
                         //     window.location = "index.php?c=account&a=shoppingcart";
                         // }
                         document.getElementById("shoppingcartContent1").innerHTML = resJson.shoppingcartContent;
                         document.getElementById("shoppingcartContent2").innerHTML = resJson.shoppingcartContent; // WORKAROUND: Workaround until Nav was updated and is unique...
                     }
                     if (resJson.total !== null) {
                         document.getElementById('priceTotal').innerHTML = parseFloat(resJson.total).toFixed(2);
                     }
                     if (resJson.quantity !== null) {
                         if (resJson.quantity <= 0) {
                             document.getElementById(id).remove();
                         }
                         prev.value = parseInt(resJson.quantity);
                     }
                     // Create Error Boxes if needed
                 }
             } else {
                 console.log('Wrong Status Code, because of: ' + this.statusText);
             }
         }
     }
 }
 */