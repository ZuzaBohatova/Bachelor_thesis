var graph = [];

function createDiv(id){
    var div = document.createElement("div");
    div.id = id;    
    return div;
}

//Vytvoří všechna tlačítka, která navigují na jednotlivé obtížnosti grafu
function loadGraphsButtons(){
    var div = createDiv("graphButtonsDiv");
    div.appendChild(createGraphButton("Lehký","./../../json-files/easy_graph.json"));
    div.appendChild(createGraphButton("Střední","./../../json-files/middle_graph.json"));
    div.appendChild(createGraphButton("Těžký","./../../json-files/hard_graph.json"));
    div.appendChild(createGraphButton("Extrém","./../../json-files/extreme_graph.json"));

    var space = document.createElement("br");

    var ownGraphButton = document.createElement("button");
    ownGraphButton.id = "ownGraphButton";
    ownGraphButton.textContent = "Vytvoř si vlastní graf";
    ownGraphButton.addEventListener("click", function() {
        // Přesměrování na adresu "hra1-vlastni-graf" po kliknutí na tlačítko
        location.href = 'grafy-vlastni-graf';
    });
    div.appendChild(space);
    div.appendChild(ownGraphButton);

    document.body.appendChild(div);
}

//vytvoří tlačítko, které načítá z json souboru data o grafu a přípraví hru 
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

//načte a otevře graf, pokud je zadán v parametrech url
function loadGraphFromParams(){
    var urlParams = new URLSearchParams(window.location.search);
    var jsonDataParam = urlParams.get('json');

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

//připraví document pro hru a spustí ji 
function prepareAndPlayGame(){
    document.getElementById("graphButtonsDiv").remove();
    var backGraphs = document.getElementById("backGraphs");
    playGraphGame(backGraphs);
}

//načte data grafu ze souboru
function loadGraph(path){
    return fetch(path)
        .then((res) => res.json())
        .then((data) => data);
}

//připraví hru - vytvoří tlačítka, načte daný obrázek
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

//připraví jméno obrázku, aby podle něj mohl být nalezena cesta k souboru
function editNameToAddress(text){
    var editedName = text;
    editedName = editedName.toLowerCase();
    //smažeme diakritiku
    editedName = editedName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    //mezery nahradíme podtržítky
    editedName = editedName.replace(/\s+/g, "_");
    return editedName;
}

//zkontroluje, zda obrázek s daným jménem existuje
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

//změní pozici v grafu po stisknutí tlačítka směru
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

//vytvoří tlačítka směru podle počtu cest z daného vrcholu
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
        button.addEventListener('click', function(){
            changePosition(actualPosition, direction);
        });
        navigationButtons.appendChild(button);
    }
    position.appendChild(navigationButtons);
}

//vytvoří tlačítka na konečné vyhodnocovací stránce - další hry a vybrat si jiný graf
function createEndButtons(buttonDiv){
    var nextGameButton = document.createElement("button");
    nextGameButton.id = "nextGameButton";
    nextGameButton.textContent = "Zahraj si jinou hru";
    nextGameButton.addEventListener('click', function() {
        window.location.href = 'hry';
    });

    var nextGraphsButton = document.createElement("button");
    nextGraphsButton.id = "nextGraphsButton";
    nextGraphsButton.textContent = "Vybrat jiný graf";
    nextGraphsButton.addEventListener('click', function() {
        window.location.href = 'grafy-hra';
    });
    buttonDiv.appendChild(nextGraphsButton);
    buttonDiv.appendChild(nextGameButton);
}