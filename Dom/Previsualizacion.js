const archivo = document.querySelector(".SeleccionarImagen"),
    previsualizacion = document.querySelector(".previsulizacion");

archivo.addEventListener("change", () => {
    const archivos = archivo.files;

    if (!archivos || !archivos.length) {
        previsualizacion.src = "";
        return;
    }

    const primerArchivo = archivos[0];

    const objectUrl = URL.createObjectURL(primerArchivo);

    previsualizacion.src = objectUrl;
})
