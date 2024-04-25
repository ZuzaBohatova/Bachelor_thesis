/**
 * Soubor graphs-creating-own-graph.js se spouští na stránce graphs-creating-own-graph.html nebo v souboru graphs-write-json.php
 * Slouží pro vytvoření vlastního grafu a vygenerování odkazu pro spuštění hry s tímto nově vytvořeným grafem 
 */

/**
 * Funkce pro validaci formuláře na vytvoření vlastního grafu
 * Kontroluje, zda byly správně zadány počáteční a koncové vrcholy
 * @returns {boolean} true (pokud je vše v pořádku) / false (pokud jsou špatně zadány vrcholy)
 */
function validateForm() {
    var countVert = parseInt(document.getElementById("countVert").value);
    var start = parseInt(document.getElementById("start").value);
    var end = parseInt(document.getElementById("end").value);

    if (start > countVert || end > countVert) {
        alert("Počáteční a konečný vrchol nemůžou mít větší číslo než je počet vrcholů!");
        return false; 
    }
    return true; 
}

/**
 * Funkce, která vytvoří odkaz na hru s nově vytvořeným grafem
 * Přidáme zakódovaný json do url
 * @returns {string|null} URL odkaz na hru s nově vytvořeným grafem nebo null, pokud došlo k chybě
 */
function createJSONLink() {
    var jsonString = document.getElementById("jsonInput").value;
    try {
        var encodedData = jsonValidation(jsonString);
        var currentUrl = window.location.href;
        var baseUrl = currentUrl.replace('grafy-napis-json', 'grafy-hra');
        var url = baseUrl + "?json=" + encodedData;
        if(url.length > 2000){
            throw new Error(`Váš graf je bohužel příliš veliký, nezvládneme ho zpracovat`);
        }
        return url;
    } catch (error) {
        alert("Chyba při zpracování JSON: " + error.message);
    }
    return null;
}

/**
 * Funkce, která zobrazí na stránce link pro odkaz na hru s nově vytvořeným grafem
 * @param {string} url URL adresa na hru, kterou cheme zobrazit
 */
function viewGraphLink(url){
    if(url){
        var infoText = document.getElementById("infoText");
        infoText.innerHTML = "";

        var paragraph1 = document.createElement("p");
        paragraph1.textContent = "Odkaz na váš graf: ";

        var paragraph2 = document.createElement("p");
        paragraph2.id = "url";
        paragraph2.style.overflowWrap = "break-word";
        var link = document.createElement("a");
        link.href = url;
        link.textContent = url;
        paragraph2.appendChild(link);

        infoText.appendChild(paragraph1);
        infoText.appendChild(paragraph2);
        document.getElementById("jsonForm").remove();

        var button = document.getElementById("saveButton");
        button.textContent = "Hrát";
        button.addEventListener("click", function() {
            window.location.href = url; 
        });
    }
}

/**
 * Funkce, která validuje JSON vygenerovaný z části programem a z části doplněný uživatelem
 * Kontrolujeme, zda:
 *  - byl správně zadán název vrcholu
 *  - všechny zadané cesty, jsou kladná čísla (čísla vrcholů)
 *  - hodnoty start a end nesmí být větší než celkový počet vrchol
 *  - je správně zadaný počet vrcholů
 *  - každý vrchol má název
 *  - je JSON validní
 * V případě, že je JSON validní, tak ho zakódujeme do url
 * @param {string} jsonString 
 * @returns {string} Zakódovaný JSON řetězec v URL-safe formátu
 * @throws {Error} Pokud JSON není validní nebo neodpovídá očekávaným kritériím
 */
function jsonValidation(jsonString){
    var jsonData = JSON.parse(jsonString);
    if (typeof jsonData.countVert !== "number" || typeof jsonData.countEdges !== "number" || typeof jsonData.start !== "number" || typeof jsonData.end !== "number") {
        throw new Error("Některé hodnoty nejsou čísla.");
    }

    if (jsonData.countVert <= 0 || jsonData.countEdges <= 0 || jsonData.start <= 0 || jsonData.end <= 0) {
        throw new Error("Všechny hodnoty musí být kladná čísla.");
    }

    if (jsonData.start > jsonData.countVert || jsonData.end > jsonData.countVert) {
        throw new Error("Hodnoty "+start+" a "+end+" nesmí být větší než "+countVert+".");
    }

    for (var i = 1; i <= jsonData.countVert; i++) {
        var vertex = jsonData[i];
        if (!vertex){
            throw new Error("Chybně zadaný počet vrcholů.");
        }
        if( typeof vertex.name !== "string") {
            throw new Error("Každý vrchol musí mít vlastnost "+vertex.name+" typu string.");
        }

        for (var j = 0; j < jsonData.countEdges; j++) {
            var edgeKey = String.fromCharCode("A".charCodeAt(0) + j);
            if (!vertex.hasOwnProperty(edgeKey) || typeof vertex[edgeKey] !== "number") {
                throw new Error(`Vrchol ${i} musí mít vlastnost ${edgeKey} typu number.`);
            }
        }
    }

    console.log("JSON je platný:", jsonData);
    var jsonString = JSON.stringify(jsonData);

    // Zakódování řetězce do URL-safe formátu
    var encodedData = btoa(unescape(encodeURIComponent(jsonString)));
    return encodedData;
}