
function createAndDownloadJSONFile(data, filename) {
    var jsonStr = JSON.stringify(data);
    var element = document.createElement('a');
    element.setAttribute('href', 'data:text/json;charset=utf-8,' + encodeURIComponent(jsonStr));
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
}



function updateUITeamTab(data) {
    // Actualiza la tabla o cualquier otra parte de la UI con los datos de 'team'
}



