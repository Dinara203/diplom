const menu = document.querySelector('.filter')
const menuList = document.querySelector('.menuList')

menu.addEventListener('click', () => {
    menuList.classList.toggle('show')
})