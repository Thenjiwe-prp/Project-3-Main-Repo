let cartButtons = document.querySelectorAll(".cartButton"); // Use class, not ID

cartButtons.forEach(button => {
    button.addEventListener("click", function(e) {
        alert("click");

        let parent = button.parentElement; // Get the parent div
        let image = parent.querySelector("img"); // Find the image inside the same div
        let cost = parent.querySelector("h2");  // Find the price inside the same div

        if (image && cost) {
            let src = image.src;
            let price = cost.innerText;

            alert("Image URL: " + src);
            alert("Price: " + price);

           
            
        }
    });
});
