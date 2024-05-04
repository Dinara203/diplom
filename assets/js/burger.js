// меню выпадающее
function burgerMenu(selector) {
  

    const button = document.querySelector('.burger-menu_button');
    const close = document.querySelector('.burger-menu_close');
    const nav = document.querySelector('.burger-menu_nav');
   
    
    button.addEventListener('click', () => {
        nav.classList.toggle('burger-menu_button_active');

    })

    close.addEventListener('click', () => {
        nav.classList.toggle('burger-menu_button_active');
    })


}
  
  burgerMenu('.burger-menu');