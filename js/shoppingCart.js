let cartButtons = document.querySelectorAll(".cartButton"); // Use class, not ID
let cartCounterElement = document.getElementById("cartCounter");
let cartValue =  document.getElementById("cartCounter").innerText;

cartValue = parseInt(cartValue);


cartButtons.forEach(button => {
    button.addEventListener("click", function(e) {
        console.log(cartValue)
           
        let src = button.getAttribute("data-src"); // Image src
        let price = button.getAttribute("data-price");
        price = parseFloat(price);
        
        console.log(price)
        if (src && price) {
            
            let data = {
                src: src,
                price: price
            }

            //when using fetch, php must send a response back, then exit() after so u can use ur other code below that.
            fetch("./php/cart.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(data) 
            })
            .then(response => {
                if (!response.ok) {
                    // If the response status code is not 2xx, throw an error
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json(); // Attempt to parse the JSON
            })
            .then(data => {
                console.log("Response from server:", data);
            })
            .catch(error => {
                console.error("Error:", error); // Log the error to the console
            });

            cartValue ++;
            cartCounterElement.innerText = cartValue;
        }
    });
});
