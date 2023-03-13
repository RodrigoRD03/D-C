const desplegar = document.querySelector(".Desplegar-Aside")
const aside = document.querySelector(".Aside-Content")

desplegar.addEventListener('click', () =>{
        aside.classList.toggle('Desplegar')
        desplegar.classList.toggle("Desplazar")
})

const seccion = document.querySelector('.Section-Inputs');
seccion.innerHTML += `<p>Registro Exitoso</p>`;