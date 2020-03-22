const productsButtons = document.querySelectorAll('.product__button');

productsButtons.forEach(button => {
    button.addEventListener('click', event => {
        const productContainer = event.target.parentElement;
        const productMainImg = productContainer.querySelector('.product__img');
        const productDetails = productContainer.querySelector('.product__details');

        productContainer.classList.toggle('product--open');
        productMainImg.classList.toggle('product__hidden');
        productDetails.classList.toggle('product__hidden');
        button.innerText = button.innerText === `MEHR INFO` ? `ZURÜCK` : `MEHR INFO`;
        productContainer.scrollIntoView(true);
    });
});
