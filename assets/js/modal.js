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
let modalDelete = document.querySelector('[data-modal="delete"]')
modalDeleteBtn.forEach(item=>{
    item.addEventListener('click', (event) => {
        addClassName(event, modalDelete, 'modal_active')
    })
})


let modalUpdateBtn = document.querySelectorAll('.update')
let modalUpdate = document.querySelector('[data-modal="update"]')

modalUpdateBtn.forEach(item=>{
    item.addEventListener('click', (event) => {
        addClassName(event, modalUpdate, 'modal_active')
    })
})