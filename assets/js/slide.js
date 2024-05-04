// слайдер
const sliderEl = document.querySelector('.slider')
const slideEl = document.querySelectorAll('.slide')
let currentIndex = 0



function showSlide(){
    for(var i =0; i<slideEl.length; i++){
        slideEl[i].style.display = "none";  
    }
    
    currentIndex++
    if(currentIndex> slideEl.length){
        currentIndex = 1
    }
    slideEl[currentIndex-1].style.display = "block"; 
    setTimeout(showSlide, 5000);
    
}
showSlide()
// слайдер


// акордеон

const acordeons = document.querySelectorAll('.acordeon')

acordeons.forEach(element => {
    element.addEventListener('click', () => {
        acordeonBody = element.querySelector('.acordeon-content')
        img = element.querySelector('.plus')
        
        acordeonBody.classList.toggle('acordeon-content-active')
        img.classList.toggle('img_active')
    })
})
// акордеон