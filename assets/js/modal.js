// модальное окно удаления
let modalShowButton = document.querySelectorAll('.btn-click')
let modalHideButton = document.querySelectorAll('.close-button')
let modal = document.querySelector('[data-modal="modal"]')


modalHideButton.forEach(item => {
    item.addEventListener('click', (e) => {
        e.target.closest('.modal').classList.remove('modal_active')
        
    })
})

modalShowButton.forEach(item=>{
    item.addEventListener('click', (event) => {
        addClassName(event, modal, 'modal_active')
    })
})
function addClassName(e, modal, className)  {
    e.preventDefault()
    modal.classList.add(className)
}


let modalDeleteBtn = document.querySelectorAll('.delete')
let modalDelete = document.querySelectorAll('[data-modal="delete"]')
modalDeleteBtn.forEach((item,i)=>{
    item.addEventListener('click', (event) => {
        event.preventDefault()
        modalDelete[i].classList.add('modal_active')
    })
})


let modalUpdateBtn = document.querySelectorAll('.update')
let modalUpdate = document.querySelectorAll('[data-modal="update"]')

modalUpdateBtn.forEach((item,i)=>{
    item.addEventListener('click', (event) => {
        event.preventDefault()
        modalUpdate[i].classList.add('modal_active')
    })
})