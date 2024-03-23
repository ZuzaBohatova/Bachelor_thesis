
const textbubbleRobot = document.createElement("p");
const textbubbleMechanic = document.createElement("p");
var bubbleRobot = document.createElement("div");
var bubbleMechanic = document.createElement("div");
var robot = document.createElement("img");
let phonePickUp = true;

const columnNames = ["vyrobni_cislo","datum_vyroby","datum_cas_navstevy","duvod_navstevy","akutni_problemy","datum_posledni_kontroly"];
const rightAnswers = ["ZI05T","15.4.2010","12.6.2024 14:00","technická kontrola","ne","5.5.2023"];
const selectOptions = ["uvolněné šrouby", "technická kontrola","motor","pohyb ramene","prohnutý plech","přehřívání"];

const conversation = [
    { speaker: 'Mechanic', text: 'Zdravím, servisní oddělení. Jak vám mohu pomoci?' },
    { speaker: 'Robot', text: 'Dobrý den, potřeboval bych se objednat na technickou kontrolu.' },
    { speaker: 'Mechanic', text: 'Výborně, uveďte prosím své výrobní číslo. ' },
    { speaker: 'Robot', text: 'ZI05T.' },
    { speaker: 'Mechanic', text: 'Jaký je váš roky výroby? ' },
    { speaker: 'Robot', text: '15. dubna 2010' },
    { speaker: 'Mechanic', text: 'Máte nějaké akutní problémy?' },
    { speaker: 'Robot', text: 'Nemám.' },
    { speaker: 'Mechanic', text: 'Kdy jste byl na poslední technické kontrole?' },
    { speaker: 'Robot', text: 'Minulý rok páteho května.' },
    { speaker: 'Mechanic', text: 'Výborně, vyhovoval by vám termín desátého června v deset hodin?' },
    { speaker: "TimeTable", text: ""},
    { speaker: 'Robot', text: 'Šlo by to spíš někdy odpoledne?' },
    { speaker: 'Mechanic', text: 'Hmm, ano, dvanáctého června ve dvě.' },
    { speaker: "TimeTable", text: ""},
    { speaker: 'Robot', text: 'To by bylo skvělé, děkuji a nashledanou.' },
    { speaker: 'Mechanic', text: 'Nashledanou.' }
];

let index = 0;
let intervalId = 0;

function createElementsOfDialogue(game){
    robot.id = "robotDialogue";
    robot.src = "../../pictures/information_systems/rob05_profile_square.png";
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
    
    game.appendChild(robot);
    game.appendChild(bubbleRobot);
    game.appendChild(bubbleMechanic);
    game.appendChild(phone);

    index = 0;
    phonePickUp = true;
    intervalId = setInterval(animateConversation, 5000);
}

function animateConversation() {
    const { speaker, text } = conversation[index % conversation.length];
    if(phonePickUp == true) {
        var mechanic = document.getElementById("phone");
        mechanic.id = "person2";
        mechanic.alt = "Mechanik";
        phonePickUp = false;
    }
    if (speaker === 'Robot') {
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
    index++;
    if (index === conversation.length) {
        clearInterval(intervalId);
        createDialogueButtons();
    }
}

function addBackToTheory(){
    var back = document.getElementById("backToTheory");
    back.style.gridArea = "back";
    var h4 = document.createElement("h4");
    h4.appendChild(back);

    return h4;
}

function startGame(id){
    var game = document.getElementById(id);
    game.id = "dialogue";
    game.classList.add("mainPage");
    var back = addBackToTheory();
    game.innerHTML = "";
    game.appendChild(back);
    
    createElementsOfDialogue(game);
}

function createDialogueButtons(){
    var dialogue = document.getElementById("dialogue");
    var buttonPanel = document.createElement("div");
    buttonPanel.id = "buttonPanel";
    
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
        var table = loadCsvAndCreateTable("../../csv-files/IS_objednani.csv", dialogue);
    });

    buttonPanel.appendChild(buttonNext);
    buttonPanel.appendChild(buttonAgain);

    dialogue.appendChild(buttonPanel);
}

function addMechanicBubble(dataTable){
    var bubble = document.createElement("div");
    bubble.id = "bubbleDataTable";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleInfoSys");

    const textBubble = document.createElement("p");
    textBubble.id = "textBubble";
    textBubble.textContent = "Bohužel jsem ztratil formulář, kde jsem měl uvedené údaje o zákazníkovi z předchozího rozhovoru. Pomůžeš mi je správně doplnit do tabulky?";
    bubble.appendChild(textBubble);

    var mechanic = document.createElement("img");
    mechanic.id = "mechanic";
    mechanic.src = "../../pictures/information_systems/mechanic.png";
    mechanic.alt = "Mechanik";
    
    dataTable.appendChild(bubble);
    dataTable.appendChild(mechanic);
}

function loadCsvAndCreateTable(path, dataTable){
    addMechanicBubble(dataTable);

    fetch(path)
        .then(response => response.text())
        .then(csvText => {
            const csvRows = csvText.split('\n');
            var table = document.createElement('table');
            table.id = "csvTable";

            csvRows.forEach((row, rowIndex) => {
                const columns = row.split(',');
                const tr = document.createElement('tr');

                columns.forEach(column => {
                    const td = document.createElement('td');
                    td.textContent = column;
                    tr.appendChild(td);
                });

                table.appendChild(tr);
            });
            addInputRow(table);
            dataTable.appendChild(table);
            createTableButtons(dataTable);

        })
        .catch(error => console.error('Error loading CSV:', error));
}

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

function checkAnswers(graf){
    var allRight = true;
    var visitFalse = null;
    for(let i = 0; i < columnNames.length; i++){
        var input = document.getElementById(columnNames[i]);
        if(input.value == rightAnswers[i]){
            input.style.backgroundColor = "lightgreen";
        }
        else {
            input.style.backgroundColor = "#ffc6c4";
            allRight = false;
            var bubble = document.getElementById("textBubble");
            var robotTable = document.getElementById("mechanic");
            robotTable.src = "../../pictures/information_systems/rob05_move_profile.png";
            robotTable.alt = "Robot";
            robotTable.style.width = "200px";
            if(input.id == "duvod_navstevy"){
                visitFalse = input.value;
            }
        }
    }

    if(allRight) {
        var back = addBackToTheory();
        graf.innerHTML = "";
        graf.id = "graf";
        graf.classList.add("mainPage");
        graf.appendChild(back);

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
        timeTable.src = "../../pictures/information_systems/time_table_changed.png";
        timeTable.alt = "Časový rozvrh";
        imgDiv.appendChild(timeTable);

        
        var buttonNext = document.createElement("button");
        buttonNext.id = "buttonNext";
        buttonNext.innerText = "Další";
        buttonNext.addEventListener("click", function() {
            title.textContent = "Graf průměrné návštěvnosti";
            assignment.textContent = `Z každé tabulky jsme schopni vytvořit plno různých grafů, ty nám mohou pomoci se lépe orientovat v datech.
                Zde můžeme vidět graf průměrné návštěvnosti na jednotlivý den v týdnu. Takový graf nám ukáže, kdy je lepší navštívit např. danou restauraci nebo obchod.`;
            var grafImg = timeTable;
            grafImg.id = "grafNumbersOfVisitors";
            grafImg.src = "../../pictures/information_systems/graph_numberOfVisits.png";
            grafImg.alt = "Graf průměrné návštěvnosti";
            grafImg.style.width = "600px";     
            buttonNext.addEventListener("click", function() {
                graf.remove();
                createEndPage();
            });                   
        });         

        graf.appendChild(title);
        graf.appendChild(assignment);
        graf.appendChild(imgDiv);
        graf.appendChild(buttonNext);                    
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

function createEndPage(){
    var game = document.createElement('div');
    game.id = 'infoSysGame';
    game.classList.add("mainPage");

    var textDiv = document.createElement('div');
    textDiv.id = 'textInfoSysGame';

    var heading = document.createElement('h4');
    var backToTheoryLink = document.createElement('a');
    backToTheoryLink.id = 'backToTheory';
    backToTheoryLink.href = 'informacni-systemy';
    backToTheoryLink.textContent = 'Zpět na teorii';
    heading.appendChild(backToTheoryLink);

    var bubble = document.createElement('div');
    bubble.id = 'bubbleInfoSysGame';
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleInfoSys")
    var bubbleHeading = document.createElement('h4');
    bubbleHeading.textContent = 'Výborně, zvládl jsi to na jedničku!';
    var bubbleParagraph = document.createElement('p');
    bubbleParagraph.innerHTML = 'Spolu jsme si prošli, co jsou to informační systémy. Doufám, že teď už máš lepší představu, jak takový informační systém může fungovat. Teď si můžeš zkusit třeba další hry.';
    bubble.appendChild(bubbleHeading);
    bubble.appendChild(bubbleParagraph);

    var anotherGameButton = document.createElement('button');
    anotherGameButton.id = 'anotherGameButton';
    anotherGameButton.textContent = 'Další hry';
    anotherGameButton.addEventListener('click', function() {
        window.location.href = "hry";
    });

    var gameAgainButton = document.createElement('button');
    gameAgainButton.id = 'gameAgainButton';
    gameAgainButton.textContent = 'Začni znovu';
    gameAgainButton.addEventListener('click', function() {
        window.location.href = "informacni-systemy-hra";
    });

    textDiv.appendChild(heading);
    textDiv.appendChild(bubble);
    textDiv.appendChild(anotherGameButton);
    textDiv.appendChild(gameAgainButton);
    game.appendChild(textDiv);

    var robotImg = document.createElement('img');
    robotImg.id = 'robotInfoSysGame';
    robotImg.src = '../../pictures/information_systems/rob05_move.png';
    robotImg.alt = 'Robot5';
    robotImg.classList.add("robotInfoSys");
    game.appendChild(robotImg);

    document.body.appendChild(game);
}

function addInputRow(table) {
    const rowCount = table.rows.length;
    const newRow = table.insertRow(rowCount);

    for (let i = 0; i < table.rows[0].cells.length; i++) {
        const newCell = newRow.insertCell(i);
        if(columnNames[i] == "duvod_navstevy"){
            var select = document.createElement("select");
            select.id = columnNames[i];
            for (var j = 0; j <= selectOptions.length; j++) {
                var option = document.createElement("option");
                option.text = selectOptions[j];
                option.value = selectOptions[j];
                select.appendChild(option);
            }
            newCell.appendChild(select);
        }
        else{
            const input = document.createElement('input');
            input.type = 'text';
            input.placeholder = 'Zadejte text';
            input.id = columnNames[i];
            newCell.appendChild(input);
        }
    }
}
