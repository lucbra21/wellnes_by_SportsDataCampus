function readJSONFile() {
    const file = './data/json/team.json'; // Ruta al archivo JSON en el servidor

    fetch(file)
    .then(response => response.json())
    .then(data => {
        // Asumiendo que la estructura del JSON es similar a la del XLSX
        // Es decir, un arreglo de objetos con las propiedades Id, Value, Abbreviation
        const teamInfo = data.reduce((acc, item) => {
            acc[item.Id] = item.Value || '';
            return acc;
        }, {});

        // Extrae los valores que necesitas
        const teamName = teamInfo['Name'];
        // const teamImage = teamInfo['Image'];
        const staffName = teamInfo['Staff'];
        const soccerTeam = teamInfo['Soccer team'];
        const category = teamInfo['Category'];

        // Actualiza el DOM
        document.getElementById('teamName').textContent = teamName;
        // document.getElementById('teamImage').src = teamImage;
        document.getElementById('staffName').textContent = staffName;
        document.getElementById('soccerTeam').textContent = soccerTeam;
        document.getElementById('categoria').textContent = category;
    })
    .catch(error => {
        console.error('Error al leer el archivo:', error);
    });
}

// Llama a la función cuando la página esté cargada
window.onload = readJSONFile;
