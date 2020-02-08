const productsButtons = document.querySelectorAll('.product__button');

productsButtons.forEach(button => {
    button.addEventListener('click', event => {
        const productContainer = event.target.parentElement;
        const productMainImg = productContainer.querySelector('.product__img');
        const productDetails = productContainer.querySelector('.product__details');
        const buttonText = productContainer.querySelector('.product__button-text');
        
        productContainer.classList.toggle('product--open');
        productMainImg.classList.toggle('hide');
        productDetails.classList.toggle('show');
        buttonText.innerText = buttonText.innerText === `MEHR INFO` ? `ZURÜCK` : `MEHR INFO`;
        productContainer.scrollIntoView(true);
    });
});
