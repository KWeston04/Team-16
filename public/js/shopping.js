document.addEventListener("DOMContentLoaded", function () {
    const dropdownBtn = document.querySelector(".category-btn");
    const dropdownMenu = document.querySelector(".dropdown-menu");
    const categories = document.querySelector(".categories");

    let timeout;

    dropdownBtn.addEventListener("mouseenter", function () {
        dropdownMenu.style.opacity = "1";
        dropdownMenu.style.visibility = "visible";
        categories.style.paddingBottom = "80px"; 
    });

    dropdownBtn.addEventListener("mouseleave", function () {
        timeout = setTimeout(() => {
            dropdownMenu.style.opacity = "0";
            dropdownMenu.style.visibility = "hidden";
            categories.style.paddingBottom = "20px"; 
        }, 200);
    });

    dropdownMenu.addEventListener("mouseenter", function () {
        clearTimeout(timeout); 
        dropdownMenu.style.opacity = "1";
        dropdownMenu.style.visibility = "visible";
        categories.style.paddingBottom = "80px";
    });

    dropdownMenu.addEventListener("mouseleave", function () {
        dropdownMenu.style.opacity = "0";
        dropdownMenu.style.visibility = "hidden";
        categories.style.paddingBottom = "20px"; 
    });
});



function redirectToProduct(productId) {
    window.location.href = `product_page.html?product=${productId}`;
}




