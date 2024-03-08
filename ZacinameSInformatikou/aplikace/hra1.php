<script>
    document.getElementById("menu").style.border = "5px solid indigo";
    var graph = [];

    function createDifficultnessButtons(){
        var div = document.createElement("div");
        div.setAttribute("id", "graphButt");
        div.appendChild(createGraphButton("Lehký","./../../json-files/easy_graph.json"));
        div.appendChild(createGraphButton("Střední","./../../json-files/middle_graph.json"));
        div.appendChild(createGraphButton("Těžký","./../../json-files/hard_graph.json"));
        div.appendChild(createGraphButton("Extrém","./../../json-files/extreme_graph.json"));
        return div;
    }

    function loadGraphFromParams(){
        var urlParams = new URLSearchParams(window.location.search);
        var jsonDataParam = urlParams.get('json');

        if (jsonDataParam) {
            // jsonDataParam obsahuje hodnotu parametru jsonData
            try {
                var jsonData = JSON.parse(atob(decodeURIComponent(jsonDataParam)));
                graph = jsonData;
                console.log("JSON nalezen v URL:", jsonData);
                prepareGame();
            } catch (error) {
                console.error("Chyba při parsování JSON:", error);
            }
        } else {
            console.log("Parametr 'jsonData' nenalezen v URL.");
        }
    }

    function createGraphButton(text, path){
        var button = document.createElement("button");
        button.textContent = text;
        button.classList.add("difficultnessButtons");
        button.addEventListener("click", function() {
            loadGraph(path)
                .then((graphData) => {
                    graph = graphData;
                    prepareGame();
                })
                .catch((error) => {
                    console.error("Error loading graph:", error);
                });
        });
        return button;
    }

    function prepareGame(){
        document.getElementById("graphButt").remove();
        document.getElementById("ownGraphButtDiv").remove();
        playGraphGame();
    }

    function loadGraph(path){
        return fetch(path)
            .then((res) => res.json())
            .then((data) => data);
    }
    
    function playGraphGame(){
        var game = document.getElementById("grafyHra");
        game.innerHTML = "";
        game.id = "graphGame";

        // Append the new element to the body
        document.body.appendChild(game);
        var gameEnd = graph.end;
        var nameOfEnd = graph[gameEnd].name;
        var actualPosition = graph.start;
        createBackToTheory(game);

        // Create a <p> element for the goal
        var pElement = document.createElement("p");
        pElement.id = "graphGoal";
        pElement.textContent = "Tvým cílem je: " + nameOfEnd;
        game.appendChild(pElement);

        // Create a <div> element for the position
        var position = document.createElement("div");
        position.id = "position";

        let editedName = graph[actualPosition].name;
        editedName = editedName.toLowerCase();
    
        // Nahradit diakritiku
        editedName = editedName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    
        // Nahradit mezery podtržítky
        editedName = editedName.replace(/\s+/g, "_");

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

    function changePosition(actualPosition, direction){
        var nameOfPosition = document.getElementById("nameOfPosition");
        actualPosition = graph[actualPosition][direction];
        nameOfPosition.textContent = graph[actualPosition].name;

        let editedName = graph[actualPosition].name;
        editedName = editedName.toLowerCase();
        // Nahradit diakritiku
        editedName = editedName.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        // Nahradit mezery podtržítky
        editedName = editedName.replace(/\s+/g, "_");

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
            var nextGamesButt = document.createElement("button");
            nextGamesButt.id = "nextGamesButt";
            nextGamesButt.textContent = "Zahraj si jinou hru";
            nextGamesButt.addEventListener('click', function() {
                window.location.href = 'hry';
            });

            var nextGrahpsButt = document.createElement("button");
            nextGrahpsButt.id = "nextGrahpsButt";
            nextGrahpsButt.textContent = "Vybrat jiný graf";
            nextGrahpsButt.addEventListener('click', function() {
                window.location.href = 'hra1';
            });
            buttonDiv.appendChild(nextGrahpsButt);
            buttonDiv.appendChild(nextGamesButt);
            return;
        }
        createWayButtons(position, actualPosition);
    }

    function createWayButtons(position, actualPosition){
        var ways = ["A","B","C"];
        var navigationButtons = document.getElementById("navigationButtons");
        if(!navigationButtons){
            navigationButtons = document.createElement("div");
            navigationButtons.id = "navigationButtons";
        }
        
        var count = graph.countEdges;
                
        for(i = 0; i < count; i++){
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

    function createBackToTheory(game){
        var h4Element = document.createElement("h4");
        var linkElement = document.createElement("a");
        linkElement.id = "zpetGrafy";
        linkElement.href = "grafy";
        linkElement.textContent = "Zpět na teorii";
        h4Element.appendChild(linkElement);
        game.appendChild(h4Element);
    }
</script>
<style type="text/css">
    #grafyHra
    {
        display:grid;
        grid-template-columns: 60% 5% auto;
        grid-template-areas: 
            "text . sidebar"
            "buttons buttons buttons";
        font-size: 18px;
        margin-left: 10px;
    }

    #graphGame
    {
        font-size: 18px;
        margin-left: 10px;
    }

    #textGrafyHra {
        grid-area: text;
    }

    #sidebar {
        grid-area: sidebar;
        margin-top: 20px;
    }
    
    #position {
        text-align: center;
    }
    #graphButt {
        text-align: center;
        margin-top: 10px;
    }

    #bubbleGrafyHra { 
        background: #e3ccfc ;
        padding: 15px 25px 15px 25px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #bubbleGrafyHra:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #e3ccfc ;
        border-bottom: 13px solid transparent;
        margin: 55px -100px 25px 0px;
    }

    #zpetGrafy {
        color: indigo;
        font-weight: bold;
        margin-top: 10px;
    } 


    #difficultnessButtons {
        text-align: center;
    }

    button {
        background-color: #e3ccfc ;
        border: 2px solid #e3ccfc ;
        border-radius:20px;
        color: indigo;
        font-size: 16px;
        font-weight: bold;
        margin: 5px 10px;
        padding: 10px 15px;
        width: 230px;
    }
    
    button:hover {
        border: 2px solid indigo;
    }

    #ownGraphButtDiv {
        text-align: center;
       
    }

    .difficultnessButtons {
        width: 150px;
        margin: 5px 5px;
        padding: 10px 10px;
    }
</style>

<div id="grafyHra">
    <div id="textGrafyHra">
        <h4><a id="zpetGrafy" href="grafy">Zpět na teorii</a></h4>
        <div id="bubbleGrafyHra">
            <h3>Dokážeš najít cestu k cíly?</h3>
            <p>V této hře si vyzkoušíme vizualizaci grafů. Budeš potřebovat tužku a papír.</p>
            <p>Hra je <strong>cesta městem</strong> (grafem), na které se chceme dostat třeba z domu do cukrárny. 
                Z každého místa vede několik cest, ty je budeš postupně procházet 
                a vznikající graf si zakreslovat na papír.</p>
            <p>Mám tu na výběr několik obtížností, pokud se s grafy vídíš prvně, ideální bude začít od nejlehčí.</p>
            <p><strong>Jsem zvědavý, jak rychle se dostaneš do cíle!</strong></p>
        </div>
    </div>
    <div id="sidebar">
        <img id="robGrafy" src="../../pictures/graphs/rob01.png" alt="Robot1" width="280">
    </div>
</div>      
<script>
    document.body.appendChild(createDifficultnessButtons());
</script>
<div id="ownGraphButtDiv">
    <button id="createOwnGraphButt" onclick="location.href = 'hra1-vlastni-graf'">Vytvoř si vlastní graf</button>
</div>
<script>loadGraphFromParams()</script>
