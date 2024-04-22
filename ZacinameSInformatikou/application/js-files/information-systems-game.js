/**
 * Soubor information-systems-game.js se spouští v information-systems-game.html 
 * Ovládá hru - rozhovor robota s mechanikem, následnou tabulku na vypnění dat z rozhovoru a obrázky grafů, které plynou z tabulky
 */

const textbubbleRobot = document.createElement("p"); // element paragraph pro text robota
const textbubbleMechanic = document.createElement("p"); // element paragraph pro text mechanika
var bubbleRobot = document.createElement("div"); // element div, který reprezentuje bublinu robota
var bubbleMechanic = document.createElement("div"); //element div, který reprezentuje bublinu mechanika
var robot = document.createElement("img"); // element image s obrázkem robota
var phonePickUp = true; //zda byl již zobraze zvonící telefon

const columnNames = ["vyrobni_cislo","datum_vyroby","datum_cas_navstevy","duvod_navstevy","akutni_problemy","datum_posledni_kontroly"]; // názvy sloupců tabulky
const rightAnswers = ["ZB25T","15.4.2010","12.6.2024 14:00","technická kontrola","ne","5.5.2023"]; // správné odpovědi do tabulky
const selectOptions = ["uvolněné šrouby", "technická kontrola","motor","pohyb ramene","prohnutý plech","přehřívání"]; // možnosti pro element select

/**
 * Pole obsahující slovníky s celou konverzací
 */
const conversation = [
    { speaker: "Mechanic", text: "Zdravím, servisní oddělení. Jak vám mohu pomoci?" },
    { speaker: "Robot", text: "Dobrý den, potřeboval bych se objednat na technickou kontrolu." },
    { speaker: "Mechanic", text: "Výborně, uveďte prosím své výrobní číslo. " },
    { speaker: "Robot", text: "ZB25T." },
    { speaker: "Mechanic", text: "Jaké je vaše datum výroby? " },
    { speaker: "Robot", text: "15. dubna 2010" },
    { speaker: "Mechanic", text: "Máte nějaké akutní problémy?" },
    { speaker: "Robot", text: "Nemám." },
    { speaker: "Mechanic", text: "Kdy jste byl na poslední technické kontrole?" },
    { speaker: "Robot", text: "Páteho května 2023." },
    { speaker: "Mechanic", text: "Výborně, vyhovoval by vám termín desátého června v deset hodin?" },
    { speaker: "TimeTable", text: ""},
    { speaker: "Robot", text: "Šlo by to spíš někdy odpoledne?" },
    { speaker: "Mechanic", text: "Hmm, ano, dvanáctého června ve dvě." },
    { speaker: "TimeTable", text: ""},
    { speaker: "Robot", text: "To by bylo skvělé, děkuji a nashledanou." },
    { speaker: "Mechanic", text: "Nashledanou." }
];

var conversationStep = 0; // krok konverzace

/**
 * Funkce, která vytvoří jednotlivé elementy dialogu
 * @param {HTMLDivElement} game Div element sloužící jako kontejner pro hru 
 */
function createElementsOfDialogue(game){
    robot.id = "robotDialogue";
    robot.src = "../../pictures/information-systems/rob05_profile_square.png";
    robot.alt = "Robot";
    robot.style.visibility = "hidden";

    bubbleRobot.id = "bubbleRobot";
    bubbleRobot.classList.add("bubble");
    bubbleRobot.style.visibility = "hidden";

    textbubbleRobot.id = "textbubbleRobot";
    bubbleRobot.appendChild(textbubbleRobot);

    bubbleMechanic.id = "bubbleMechanic";
    bubbleMechanic.classList.add("bubble");
    bubbleMechanic.classList.add("bubbleInfoSys");
    
    textbubbleMechanic.id = "textbubbleMechanic";
    textbubbleMechanic.textContent = "Crrr, crr...";
    bubbleMechanic.appendChild(textbubbleMechanic);

    var phone = document.createElement("img");
    phone.id = "phone";
    phone.alt = "Ringing phone";

    var buttonPanel = document.createElement("div");
    buttonPanel.id = "buttonPanel";

    var nextButton = document.createElement("button");
    nextButton.id = "dialogueNextButton";
    nextButton.textContent = "Zpět";
    nextButton.addEventListener("click", function() {
        animateConversation(false);
    });

    var backButton = document.createElement("button");
    backButton.id = "dialogueBackButton";
    backButton.textContent = "Další";
    backButton.addEventListener("click", function() {
        animateConversation(true);
    });

    buttonPanel.appendChild(backButton);
    buttonPanel.appendChild(nextButton);
    
    game.appendChild(robot);
    game.appendChild(bubbleRobot);
    game.appendChild(bubbleMechanic);
    game.appendChild(phone); 
    game.appendChild(buttonPanel);

    conversationStep = 0;
    phonePickUp = true;
}

/**
 * Funkce, která řídí průběh dialogu
 * @param {boolean} goForward Zda pokračujeme dopředu nebo dozadu
 * @returns 
 */
function animateConversation(goForward) {
    if(goForward){
        ++conversationStep;
    }
    else {
        if(conversationStep > 0){
            --conversationStep;
        }
        else {
            return;
        }
        
    }
    const { speaker, text } = conversation[conversationStep % conversation.length];
    if(phonePickUp == true) {
        var mechanic = document.getElementById("phone");
        mechanic.id = "person2";
        mechanic.alt = "Mechanik";
        phonePickUp = false;
    }
    if (speaker === "Robot") {
        robot.style.visibility = "visible";
        textbubbleRobot.textContent = text;
        bubbleRobot.style.visibility = "visible";
        bubbleMechanic.style.visibility = "hidden";
    } else if(speaker == "Mechanic") {
        var timeTable = document.getElementById("timeTableDialogue"); 
        if(timeTable != null){
            timeTable.id = "person2";
            timeTable.alt = "Mechanik";
        }
        textbubbleMechanic.textContent = text;
        bubbleMechanic.style.visibility = "visible";
        bubbleRobot.style.visibility = "hidden";
    } else {
        bubbleMechanic.style.visibility = "hidden";
        bubbleRobot.style.visibility = "hidden";
        var timeTableDialogue = document.getElementById("person2");
        timeTableDialogue.id = "timeTableDialogue";
        timeTableDialogue.alt = "Rozvrh";
    }
    if (conversationStep === conversation.length - 1) {
        createDialogueButtons();
    }
}

/**
 * Funkce, která načte link element "Zpět na teorii" a vloží ho do nadpisu 
 * @returns {HTMLHeadingElement} Element nadpisu "Zpět na teorii"
 */
function addBackToTheory(){
    var back = document.getElementById("backToTheory");
    back.style.gridArea = "back";
    var h4 = document.createElement("h4");
    h4.appendChild(back);

    return h4;
}

/**
 * Funkce spustí hru 
 * @param {string} id ID divu, z kterého chceme hru spustit
 */
function startGame(id){
    var game = document.getElementById(id);
    game.id = "dialogue";
    game.classList.add("mainPage");
    var back = addBackToTheory();
    game.innerHTML = "";
    game.appendChild(back);
    
    createElementsOfDialogue(game);
}

/**
 * Funkce, která vytvoří tlačítka na konci dialogu
 */
function createDialogueButtons(){
    var buttonPanel = document.getElementById("buttonPanel");
    buttonPanel.innerHTML = "";

    var dialogue = document.getElementById("dialogue");

    var buttonAgain = document.createElement("button");
    buttonAgain.id = "buttonAgain";
    buttonAgain.innerText = "Zopakovat";
    buttonAgain.addEventListener("click", function() {
        createElementsOfDialogue(dialogue);
        buttonPanel.remove();
        document.getElementById("person2").remove();
        robot.style.visibility = "hidden";
    });

    var buttonNext = document.createElement("button");
    buttonNext.id = "buttonNext";
    buttonNext.innerText = "Jít dál";
    buttonNext.addEventListener("click", function() {
        dialogue.id = "dataTable";
        dialogue.classList.add("mainPage");
        var back = addBackToTheory();
        dialogue.innerHTML = "";
        dialogue.appendChild(back);
        loadCsvAndCreateTable("../../csv-files/IS-objednani.csv", dialogue);
    });

    buttonPanel.appendChild(buttonNext);
    buttonPanel.appendChild(buttonAgain);

    dialogue.appendChild(buttonPanel);
}

/**
 * Funkce přidá mechanika jeho bublinu s textem
 * @param {HTMLDivElement} dataTable Div element jako kontejner pro část hry s tabulkou
 */
function addMechanicBubble(dataTable){
    var bubble = document.createElement("div");
    bubble.id = "bubbleDataTable";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleInfoSys");

    const textBubble = document.createElement("p");
    textBubble.id = "textBubble";
    textBubble.textContent = "Bohužel jsem ztratil papír, kam jsem si zapsal údaje o zákazníkovi z předchozího rozhovoru. Pomůžeš mi je správně doplnit do tabulky?";
    bubble.appendChild(textBubble);

    var mechanic = document.createElement("img");
    mechanic.id = "mechanic";
    mechanic.src = "../../pictures/information-systems/mechanic.png";
    mechanic.alt = "Mechanik";
    
    dataTable.appendChild(bubble);
    dataTable.appendChild(mechanic);
}

/**
 * Funkce načte data z csv souboru a vytvoří tabulku
 * @param {string} path Cesta k csv souboru
 * @param {HTMLDivElement} dataTable Div element obsahující část hry s tabulkou 
 */
function loadCsvAndCreateTable(path, dataTable){
    addMechanicBubble(dataTable);

    fetch(path)
        .then(response => response.text())
        .then(csvText => {
            const csvRows = csvText.split("\n");
            var table = document.createElement("table");
            table.id = "csvTable";

            csvRows.forEach((row, rowIndex) => {
                const columns = row.split(",");
                const tr = document.createElement("tr");

                columns.forEach(column => {
                    const td = document.createElement("td");
                    td.textContent = column;
                    tr.appendChild(td);
                });

                table.appendChild(tr);
            });
            addInputRow(table);
            dataTable.appendChild(table);
            createTableButtons(dataTable);

        })
        .catch(error => console.error("Error loading CSV:", error));
}

/**
 * Vytvoří tlačítka pro tabulku a vloží je do divu
 * @param {HTMLDivElement} dataTable 
 */
function createTableButtons(dataTable) {
    var buttonSubmit = document.createElement("button");
    buttonSubmit.id = "buttonSubmit";
    buttonSubmit.innerText = "Zkontrolovat";
    buttonSubmit.addEventListener("click", function() {
        checkAnswers(dataTable);
    });

    var buttonBackToDialogue = document.createElement("button");
    buttonBackToDialogue.id = "buttonBackToDialogue";
    buttonBackToDialogue.innerText = "Zpět na rozhovor";
    buttonBackToDialogue.addEventListener("click", function() {
        startGame("dataTable");
    });

    var buttonPanel = document.createElement("div");
    buttonPanel.id = "buttonTablePanel";
    buttonPanel.appendChild(buttonSubmit);
    buttonPanel.appendChild(buttonBackToDialogue);

    dataTable.appendChild(buttonPanel);
}

/**
 * Funkce zkontroluje, zda jsou data zadaná do tabulky správně
 * Pokud jsou všechny správně, posune hru dál
 * Pokud jsous právně jen některé, označí je zeleně a červeně označí chyby
 * @param {HTMLDivElement} graph Div element pro graf
 */
function checkAnswers(graph){
    var allRight = true;
    var visitFalse = null;
    for(var i = 0; i < columnNames.length; i++){
        var input = document.getElementById(columnNames[i]);
        if(input.value == rightAnswers[i]){
            input.style.backgroundColor = "lightgreen";
        }
        else {
            input.style.backgroundColor = "#ffc6c4";
            allRight = false;
            var bubble = document.getElementById("textBubble");
            var robotTable = document.getElementById("mechanic");
            robotTable.src = "../../pictures/information-systems/rob05_move_profile.png";
            robotTable.alt = "Robot";
            robotTable.style.width = "200px";
            if(input.id == "duvod_navstevy"){
                visitFalse = input.value;
            }
        }
    }
    if(allRight) {
        createGraphFromTable(graph);                   
    }
    else {
        if(visitFalse != null){
            switch(visitFalse) {
                case "uvolněné šrouby":
                    bubble.textContent = "Jejda, to jsi mě moc dobře neposlouchal, moje šroubky drží jako přibité!"; 
                    break;
                case "motor":
                    bubble.textContent = "Ale ale, to se pleteš, můj motor šlape jako hodinky!"; 
                    break;
                case "pohyb ramene":
                    bubble.textContent = "Fuuu, já mám tedy pocit, že moje ruka je naprosto v pořádku."; 
                    break;
                case "prohnutý plech":
                    bubble.textContent = "No to nee, můj plech je krásně rovný a lesklý. "; 
                    break;
                case "přehřívání":
                    bubble.textContent = "Tak to není, kamaráde. Já a přehřívat se? Tak to rozhodně ne."; 
                    break;
            }
        }
        else {
            bubble.textContent = "Ale ale, někde se ti vloudila chybička! Zkusíš to opravit?"; 
        }
    }
}

/**
 * Funkce posune hru o kapitolu dál a zobrazí obrázek grafu z dat tabulky
 * @param {HTMLDivElement} graph Div element
 */
function createGraphFromTable(graph){
    var back = addBackToTheory();
    graph.innerHTML = "";
    graph.id = "graf";
    graph.classList.add("mainPage");
    graph.appendChild(back);

    var title = document.createElement("h3");
    title.id = "title";
    title.textContent = "Tabulka obsazenosti mechanika robotů";
    var assignment = document.createElement("p");
    assignment.id = "assignment";
    assignment.textContent = `Z dat uložených v předchozí tabulce jsme vygenerovali grafické znázornění obsazenosti. 
        Ukládání dat do tabulky a jejich následné zpracování nám tak může pomoci lépe porozumět datům, která máme k dispozici.`;

    var imgDiv = document.createElement("div");
    imgDiv.style.textAlign = "center";
    var timeTable = document.createElement("img");
    timeTable.id = "timeTable";
    timeTable.src = "../../pictures/information-systems/time_table_add_robot.png";
    timeTable.alt = "Časový rozvrh";
    imgDiv.appendChild(timeTable);
    
    var buttonNext = document.createElement("button");
    buttonNext.id = "buttonNext";
    buttonNext.innerText = "Další";
    buttonNext.addEventListener("click", function() {
        title.textContent = "Graf průměrné návštěvnosti";
        assignment.textContent = `Z každé tabulky jsme schopni vytvořit plno různých grafů, ty nám mohou pomoci se lépe orientovat v datech.
            Zde můžeme vidět graf průměrné návštěvnosti na jednotlivý den v týdnu. Takový graf nám ukáže, kdy je lepší navštívit např. danou restauraci nebo obchod.`;
        var graphImg = timeTable;
        graphImg.id = "grafNumbersOfVisitors";
        graphImg.src = "../../pictures/information-systems/graph_numberOfVisits.png";
        graphImg.alt = "Graf průměrné návštěvnosti";
        graphImg.style.width = "600px";     
        buttonNext.addEventListener("click", function() {
            graph.remove();
            createEndPage();
        });                   
    });         

    graph.appendChild(title);
    graph.appendChild(assignment);
    graph.appendChild(imgDiv);
    graph.appendChild(buttonNext); 
}

/**
 * Funkce vytvoří koncovou stránku hry s obrázkem robota, bublinou a tlačítky odkazujícími na další hry a zopakování hry
 */
function createEndPage(){
    var game = document.createElement("div");
    game.id = "infoSysGame";
    game.classList.add("mainPage");

    var textDiv = document.createElement("div");
    textDiv.id = "textInfoSysGame";

    var heading = document.createElement("h4");
    var backToTheoryLink = document.createElement("a");
    backToTheoryLink.id = "backToTheory";
    backToTheoryLink.href = "informacni-systemy";
    backToTheoryLink.textContent = "Zpět na teorii";
    heading.appendChild(backToTheoryLink);

    var bubble = document.createElement("div");
    bubble.id = "bubbleInfoSysGame";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleInfoSys")
    var bubbleHeading = document.createElement("h4");
    bubbleHeading.textContent = "Výborně, zvládl jsi to na jedničku!";
    var bubbleParagraph = document.createElement("p");
    bubbleParagraph.innerHTML = "Spolu jsme si prošli, co jsou to informační systémy. Doufám, že teď už máš lepší představu, jak takový informační systém může fungovat. Teď si můžeš zkusit třeba další hry.";
    bubble.appendChild(bubbleHeading);
    bubble.appendChild(bubbleParagraph);

    var anotherGameButton = document.createElement("button");
    anotherGameButton.id = "anotherGameButton";
    anotherGameButton.textContent = "Další hry";
    anotherGameButton.addEventListener("click", function() {
        window.location.href = "hry";
    });

    var gameAgainButton = document.createElement("button");
    gameAgainButton.id = "gameAgainButton";
    gameAgainButton.textContent = "Začni znovu";
    gameAgainButton.addEventListener("click", function() {
        window.location.href = "informacni-systemy-hra";
    });

    textDiv.appendChild(heading);
    textDiv.appendChild(bubble);
    textDiv.appendChild(anotherGameButton);
    textDiv.appendChild(gameAgainButton);
    game.appendChild(textDiv);

    var robotImg = document.createElement("img");
    robotImg.id = "robotInfoSysGame";
    robotImg.src = "../../pictures/information-systems/rob05_move.png";
    robotImg.alt = "Robot5";
    robotImg.classList.add("robotInfoSys");
    game.appendChild(robotImg);

    document.body.appendChild(game);
}

/**
 * Funkce přidá do tabulky řádek, do kterého vkládá uživatel své odpovědi
 * @param {HTMLTableElement} table Tabulka, do které vkládáme input řádek
 */
function addInputRow(table) {
    const rowCount = table.rows.length;
    const newRow = table.insertRow(rowCount);

    for (var i = 0; i < table.rows[0].cells.length; i++) {
        const newCell = newRow.insertCell(i);
        if(columnNames[i] == "duvod_navstevy"){
            var select = document.createElement("select");
            select.id = columnNames[i];
            for (var j = 0; j < selectOptions.length; j++) {
                var option = document.createElement("option");
                option.text = selectOptions[j];
                option.value = selectOptions[j];
                select.appendChild(option);
            }
            newCell.appendChild(select);
        }
        else{
            const input = document.createElement("input");
            input.type = "text";
            input.placeholder = "Zadejte text";
            input.id = columnNames[i];
            input.autocomplete = "off";
            newCell.appendChild(input);
        }
    }
}
