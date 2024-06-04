document.addEventListener('DOMContentLoaded', function() {
    // Obtener los parámetros de la URL
    const urlParams = new URLSearchParams(window.location.search);
    // Obtener todos los valores del parámetro 'coches[]' de la URL (los índices de los coches seleccionados)
    const selectedCars = urlParams.getAll('coches[]');

    // Realizar una solicitud HTTP para obtener los datos del archivo JSON
    fetch('../json/coches.json')
        // Convertir la respuesta a un objeto JSON
        .then(response => response.json())
        .then(data => {
            // Si hay al menos un coche seleccionado
            if (selectedCars.length > 0) {
                // Obtener el primer coche seleccionado utilizando su índice en el archivo JSON
                const coche1 = data[selectedCars[0]];
                // Llenar la tabla del primer coche con sus datos
                llenarTabla(document.getElementById('tablaCoche1').getElementsByTagName('tbody')[0], coche1);
            }
            // Si hay al menos dos coches seleccionados
            if (selectedCars.length > 1) {
                // Obtener el segundo coche seleccionado utilizando su índice en el archivo JSON
                const coche2 = data[selectedCars[1]]; 
                // Llenar la tabla del segundo coche con sus datos
                llenarTabla(document.getElementById('tablaCoche2').getElementsByTagName('tbody')[0], coche2);
            }
        });
});

// Función para llenar una tabla con los datos de un coche
function llenarTabla(tabla, coche) {
    // Definir las propiedades que se mostrarán en la tabla
    const propiedades = ['marca', 'modelo', 'pais', 'precio', 'caballos', 'maletero', 'puertas'];
    // Recorrer cada propiedad para crear una fila en la tabla
    propiedades.forEach(prop => {
        // Insertar una nueva fila en la tabla
        const fila = tabla.insertRow();
        // Insertar una celda para el nombre de la propiedad
        const celdaPropiedad = fila.insertCell(0);
        // Insertar una celda para el valor de la propiedad
        const celdaValor = fila.insertCell(1);
        // Establecer el texto de la celda de la propiedad
        celdaPropiedad.innerHTML = prop.toUpperCase();
        // Establecer el texto de la celda del valor con el valor de la propiedad del coche
        celdaValor.innerHTML = coche[prop];
    });
}


