//funkce pro validaci formuláře na vytvoření vlastního grafu
function validateForm() {
    var countVert = parseInt(document.getElementById('countVert').value);
    var start = parseInt(document.getElementById('start').value);
    var end = parseInt(document.getElementById('end').value);

    if (start > countVert || end > countVert) {
        alert('Počáteční a konečný vrchol nemůžou mít větší číslo než je počet vrcholů!');
        return false; // Prevent form submission
    }

    return true; // Allow form submission
}

function createJSONLink() {
    // Získáme obsah JSON z textarea
    var jsonString = document.getElementById("jsonInput").value;
    try {
        // Zakódování řetězce do URL-safe formátu
        var encodedData = jsonValidation(jsonString);
        // Vytvoření URL
        var url = "https://www.ms.mff.cuni.cz/~bohatovz/bohatova/ZacinameSInformatikou/aplikace/index.php/hra1?json=" + encodedData;
        if(url.length > 2000){
            throw new Error(`Váš graf je bohužel příliš veliký, nezvládneme ho zpracovat`);
        }
        return url;
    } catch (error) {
        // Pokud parsování selže, JSON není platný
        alert("Chyba při zpracování JSON: " + error.message);
    }
    return null;
}

function viewGraphLink(url){
    if(url){
        var infoText = document.getElementById("infoText");
        infoText.innerHTML = "";

        // Vytvoření prvního <p> elementu
        var paragraph1 = document.createElement('p');
        paragraph1.textContent = 'Odkaz na váš graf: ';

        // Vytvoření druhého <p> elementu pro URL
        var paragraph2 = document.createElement('p');
        paragraph2.id = "url";
        paragraph2.style.overflowWrap = "break-word";
        var link = document.createElement('a');
        link.href = url; // Předpokládám, že 'url' je proměnná, která obsahuje URL
        link.textContent = url;
        paragraph2.appendChild(link);

        // Vložení vytvořených elementů do kontejneru
        infoText.appendChild(paragraph1);
        infoText.appendChild(paragraph2);
        document.getElementById("jsonForm").remove();

        var button = document.getElementById("saveButton");
        button.textContent = "Hrát";
        button.addEventListener('click', function() {
            window.location.href = url; 
        });

    }
}

function jsonValidation(jsonString){
    // Zkusíme zparsovat JSON
    var jsonData = JSON.parse(jsonString);
    // Další kontroly
    if (typeof jsonData.countVert !== 'number' || typeof jsonData.countEdges !== 'number' || typeof jsonData.start !== 'number' || typeof jsonData.end !== 'number') {
        throw new Error("Některé hodnoty nejsou čísla.");
    }

    if (jsonData.countVert <= 0 || jsonData.countEdges <= 0 || jsonData.start <= 0 || jsonData.end <= 0) {
        throw new Error("Všechny hodnoty musí být kladná čísla.");
    }

    if (jsonData.start > jsonData.countVert || jsonData.end > jsonData.countVert) {
        throw new Error("Hodnoty 'start' a 'end' nesmí být větší než 'countVert'.");
    }

    for (var i = 1; i <= jsonData.countVert; i++) {
        var vertex = jsonData[i];
        if (!vertex){
            throw new Error("Chybně zadaný počet vrcholů.");
        }
        if( typeof vertex.name !== 'string') {
            throw new Error("Každý vrchol musí mít vlastnost 'name' typu string.");
        }

        for (var j = 0; j < jsonData.countEdges; j++) {
            var edgeKey = String.fromCharCode('A'.charCodeAt(0) + j);
            if (!vertex.hasOwnProperty(edgeKey) || typeof vertex[edgeKey] !== 'number') {
                throw new Error(`Vrchol ${i} musí mít vlastnost '${edgeKey}' typu number.`);
            }
        }
    }

    console.log("JSON je platný:", jsonData);
    var jsonString = JSON.stringify(jsonData);

    // Zakódování řetězce do URL-safe formátu
    var encodedData = btoa(unescape(encodeURIComponent(jsonString)));;
    return encodedData;
}