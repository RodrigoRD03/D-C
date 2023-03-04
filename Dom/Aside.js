const desplegar = document.querySelector(".Desplegar-Aside")
const aside = document.querySelector(".Aside-Content")

desplegar.addEventListener('click', () =>{
        aside.classList.toggle('Desplegar')
        desplegar.classList.toggle("Desplazar")
})