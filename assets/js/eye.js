const inputPass= document.querySelectorAll('.input-pass');
const iconPass = document.querySelectorAll('.icon-pass');

console.log(inputPass);

iconPass.forEach((element, i)=>{
    element.addEventListener('click', ()=>{
        
            if(inputPass[i].getAttribute('type')=== 'password'){
                inputPass[i].setAttribute('type', 'text')
            }else{
                inputPass[i].setAttribute('type', 'password')
            }
        
        
    })
})

