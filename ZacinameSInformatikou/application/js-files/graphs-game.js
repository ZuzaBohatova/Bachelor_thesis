
/**
 * Soubor graphs-game.js používáme na stránce graphs-game.html
 * Nachází se zde funkce, které tvoří a ovládají hru s grafy - máme několi obtížností grafů, které procházíme a snažíme se dostat do cíle
 */

var graph = []; // proměnná, do které se načtou data grafu

/**
 * Funkce vytvoří div se zadaným id
 * @param {string} id zadané id divu
 * @returns {HTMLDivElement} Nově vytvořený div s daným id 
 */
function createDiv(id){
    var div = document.createElement("div");
    div.id = id;    
    return div;
}

/**
 * Funkce, která vytvoří všechna tlačítka, která navigují na jednotlivé obtížnosti grafu
 */
function loadGraphsButtons(){
    var div = createDiv("graphButtonsDiv");
    div.appendChild(createGraphButton("Lehký","./../../json-files/easy-graph.json"));
    div.appendChild(createGraphButton("Střední","./../../json-files/middle-graph.json"));
    div.appendChild(createGraphButton("Těžký","./../../json-files/hard-graph.json"));
    div.appendChild(createGraphButton("Extrém","./../../json-files/extreme-graph.json"));

    var space = document.createElement("br");

    var ownGraphButton = document.createElement("button");
    ownGraphButton.id = "ownGraphButton";
    ownGraphButton.textContent = "Vytvoř si vlastní graf";
    ownGraphButton.addEventListener("click", function() {
        location.href = "grafy-vlastni-graf"; // Přesměrování na stránku "grafy-vlastni-graf" po kliknutí na tlačítko
    });
    div.appendChild(space);
    div.appendChild(ownGraphButton);

    document.body.appendChild(div);
}

/**
 * Funkce, kter vytvoří tlačítko, které načítá z json souboru data o grafu a přípraví hru
 * @param {string} text Text tlačítka
 * @param {string} path Cesta k json soboru, v kterém je uložený graf
 * @returns {HTMLButtonElement} nově vytvořené tlačítko
 */
function createGraphButton(text, path){
    var button = document.createElement("button");
    button.textContent = text;
    button.style.width = "150px";
    button.addEventListener("click", function() {
        loadGraph(path)
            .then((graphData) => {
                graph = graphData;
                prepareAndPlayGame();
            })
            .catch((error) => {
                console.error("Error loading graph:", error);
            });
    });
    return button;
}

/**
 * Funkce, která načte a otevře graf, pokud je zadán v parametrech url
 */
function loadGraphFromParams(){
    var urlParams = new URLSearchParams(window.location.search);
    var jsonDataParam = urlParams.get("json");

    if (jsonDataParam) {
        try {
            var jsonData = JSON.parse(atob(decodeURIComponent(jsonDataParam)));
            graph = jsonData;
            prepareAndPlayGame();
        } catch (error) {
            console.error("Chyba při parsování JSON:", error);
        }
    } else {
        console.log("Parametr 'jsonData' nenalezen v URL.");
    }
}

/**
 * Funkce, která připraví document pro hru a spustí ji 
 */
function prepareAndPlayGame(){
    document.getElementById("graphButtonsDiv").remove();
    var backGraphs = document.getElementById("backGraphs");
    playGraphGame(backGraphs);
}

/**
 * Asynchronní funkce, která načte data grafu ze souboru
 * @param {string} path Cesta k json souboru s grafem
 * @returns {Promise<Object>} Objekt reprezentující data grafu načtená ze souboru
 */
async function loadGraph(path){
    const res = await fetch(path);
    const data = await res.json();
    return data;
}

/**
 * Funkce připraví hru pro vrchol, v kterém se právě nacházíme - vytvoří tlačítka pro cesty z daného vrcholu, načte daný obrázek
 * @param {HTMLLinkElement} backGraphs odkaz backGraphs, který vrací ze hry zpět na teorii
 */
function playGraphGame(backGraphs){
    var gameEnd = graph.end;
    var nameOfEnd = graph[gameEnd].name;
    var actualPosition = graph.start;

    var game = document.getElementById("graphsGame");
    game.innerHTML = "";
    game.id = "graphGame";
    game.classList.add("mainPage");

    var h4Back = document.createElement("h4");
    h4Back.append(backGraphs);
    game.appendChild(h4Back);

    var pElement = document.createElement("p");
    pElement.id = "graphGoal";
    pElement.textContent = "Tvým cílem je: " + nameOfEnd;
    game.appendChild(pElement);

    var position = createDiv("position");

    var editedName = editNameToAddress(graph[actualPosition].name);

    var imgElement = document.createElement("img");
    imgElement.id = "obrGraf";
    imgElement.src = "../../pictures/graphs/"+editedName+".png";
    imgElement.alt = editedName;
    imgElement.width = "270";

    checkIfImageExists(imgElement.src, (exists) => {
        if (!exists) {
            imgElement.src = "../../pictures/graphs/domov.png";
        } 
    });

    position.appendChild(imgElement);

    var h4Position = document.createElement("h4");
    h4Position.id = "nameOfPosition";
    h4Position.textContent = graph[actualPosition].name;
    position.appendChild(h4Position);

    createWayButtons(position, actualPosition);
    game.appendChild(position);

    var footer = document.getElementsByTagName("footer")[0];
    document.body.append(game);

    if(footer != null){
        footer.remove();
        document.body.append(footer);
    }
    
}

/**
 * Funkce, která připraví jméno obrázku, aby podle něj mohl být nalezena cesta k souboru
 * @param {string} text Text, který chceme editovat
 * @returns {string} upravený text
 */
function editNameToAddress(text){
    var editedName = text;
    editedName = editedName.toLowerCase();
    editedName = editedName.normalize("NFD").replace(/[\u0300-\u036f]/g, ""); //smažeme diakritiku
    editedName = editedName.replace(/\s+/g, "_"); //mezery nahradíme podtržítky
    return editedName;
}

/**
 * Funkce, která zkontroluje, zda obrázek s daným URL existuje.
 * @param {string} url URL obrázku, který se má ověřit
 * @param {function} callback Funkce zpětného volání, která obdrží true, pokud obrázek existuje, a false, pokud ne
 */
function checkIfImageExists(url, callback) {
    const img = new Image();
    img.src = url;
    
    if (img.complete) {
        callback(true);
    } else {
        img.onload = () => {
            callback(true);
        };
        img.onerror = () => {
            callback(false);
        };
    }
}

/**
 * Funkce, která změní pozici v grafu po stisknutí tlačítka směru
 * @param {string} actualPosition Aktuální pozice v grafu
 * @param {string} direction Směr, kterým chceme jít
 */
function changePosition(actualPosition, direction){
    var nameOfPosition = document.getElementById("nameOfPosition");
    actualPosition = graph[actualPosition][direction];
    nameOfPosition.textContent = graph[actualPosition].name;

    var editedName = editNameToAddress(graph[actualPosition].name);

    var image = document.getElementById("obrGraf");
    image.src = "../../pictures/graphs/"+editedName+".png";
    image.alt = editedName;

    checkIfImageExists(image.src, (exists) => {
        if (!exists) {
            image.src = "../../pictures/graphs/domov.png";
        } 
    });

    var buttonDiv = document.getElementById("navigationButtons");
    buttonDiv.innerHTML = "";
    
    if(graph.end == actualPosition){
        document.getElementById("graphGoal").innerHTML = "<strong>Gratulace, jsi v cíly!</strong>";
        createEndButtons(buttonDiv);
        return;
    }
    createWayButtons(position, actualPosition);
}

/**
 * Funkce, která vytvoří tlačítka směru podle počtu cest z daného vrcholu
 * @param {HTMLDivElement} position Div, do kterého chceme vkládat tlačítka
 * @param {string} actualPosition Aktuální pozice v grafu
 */
function createWayButtons(position, actualPosition){
    var ways = ["A","B","C"];
    var navigationButtons = document.getElementById("navigationButtons");
    if(!navigationButtons){
        navigationButtons = document.createElement("div");
        navigationButtons.id = "navigationButtons";
    }
    
    var count = graph.countEdges;
            
    for(var i = 0; i < count; i++){
        var button = document.createElement("button");
        button.id = "butt"+ways[i];
        button.textContent = "Cesta "+ways[i];
        const direction = ways[i];
        button.addEventListener("click", function(){
            changePosition(actualPosition, direction);
        });
        navigationButtons.appendChild(button);
    }
    position.appendChild(navigationButtons);
}

/**
 * Funkce, která vytvoří tlačítka na konečné vyhodnocovací stránce - další hry a vybrat si jiný graf
 * @param {HTMLDivElement} buttonDiv Div, do kterého chceme tlačítka vkládat
 */
function createEndButtons(buttonDiv){
    var nextGameButton = document.createElement("button");
    nextGameButton.id = "nextGameButton";
    nextGameButton.textContent = "Zahraj si jinou hru";
    nextGameButton.addEventListener("click", function() {
        window.location.href = "hry";
    });

    var nextGraphsButton = document.createElement("button");
    nextGraphsButton.id = "nextGraphsButton";
    nextGraphsButton.textContent = "Vybrat jiný graf";
    nextGraphsButton.addEventListener("click", function() {
        window.location.href = "grafy-hra";
    });
    buttonDiv.appendChild(nextGraphsButton);
    buttonDiv.appendChild(nextGameButton);
}