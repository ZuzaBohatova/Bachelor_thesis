<style type="text/css">
    #menu {
        border: 5px solid #008b8b;
    }

    #game5 {  
        display:grid;
        grid-template-columns: 70% auto;
        grid-template-areas: "text robot";
        margin: auto;
        width: 90%;
    }

    #game5Bubble { 
        background: #96ded1;
        border-radius: 50px;
        text-align:center;
        padding: 10px 30px;
        font-size: 18px;
    }

    #game5Bubble:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 80px solid #96ded1;
        border-bottom: 13px solid transparent;
        margin: 40px -80px 50px 0px;
    }

    #game5text {
        grid-area:text;
    }

    #game5robot {
        grid-area:robot;
        width: 200px;
        margin: 20px auto;
    }

    #startGameBtn, #buttonAgain, #buttonNext, #buttonBackToDialogue, #buttonSubmit {
        background-color: #96ded1;
        border: 2px solid #96ded1;
        border-radius: 20px;
        color: #008b8b;
        float: right;
        font-size: 18px;
        font-weight: bold;
        margin: 20px 5px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #startGameBtn:hover, #buttonAgain:hover, #buttonNext:hover, #buttonBackToDialogue:hover, #buttonSubmit:hover  {
        border: 2px solid #008b8b;
    }

    #backToTheory {
        color: #008b8b;
    }

    #dialogue {
        display:grid;
        grid-template-columns: 20% 30% 30% 20%;
        grid-template-areas:
            "back . . ."
            "person1 bubble1 bubble2 person2"
            ". buttonPanel buttonPanel buttonPanel";
        width: 90%;
        margin: auto;
    }

    #dataTable {
        display:grid;
        grid-template-columns: 70% 30%;
        grid-template-areas:
            "back ."
            "bubble mechanic"
            "csvTable csvTable"
            "buttonPanel buttonPanel";
        width: 90%;
        margin: auto;
    }

    #robotDialogue {
        grid-area: person1;
        width: 180px;
        margin: 20px auto;
        border-radius: 50%;
        border: 1px solid black;
    }

    #phone {
        grid-area: person2;
        margin: 20px auto;
        width: 180px;
        content:url("../../pictures/information_systems/ringing_phone.gif");
    }

    #bubble1 {
        grid-area: bubble1;
        background: #96ded1;        
        padding: 10px 15px 10px 15px;
        border-radius: 30px;
        max-width: 70%;
        margin: auto;
        text-align:center;
    }

    #bubble1:before {
        content:"";
        float:left;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-right: 50px solid #96ded1;
        border-bottom: 13px solid transparent;
        margin: 20px 0px 0px -50px;
    }

    #bubble2 {
        grid-area: bubble2;
        background: #96ded1;
        padding: 10px 15px 10px 15px;
        border-radius: 30px;
        margin: auto;
        text-align:center;
        max-width: 65%;
    }

    #bubble2:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 50px solid #96ded1;
        border-bottom: 13px solid transparent;
        margin: 30px -50px 0px 0px;
    }
    
    #person2 {
        grid-area: person2;
        width: 180px;
        margin: auto;
        border: 1px solid black;
        border-radius: 50%;
        content:url("../../pictures/information_systems/mechanic_profile.png");
    }

    #timeTableDialogue {
        grid-area: bubble2;
        margin: auto;
        width: 300px;
        content:url("../../pictures/information_systems/time_table.png");
    }

    #buttonPanel  {
        grid-area: buttonPanel;
        margin-top: 20px;
    } 
    
    #bubble {
        grid-area: bubble;
        background: #96ded1;        
        padding: 10px 15px 10px 15px;
        border-radius: 30px;
        max-width: 70%;
        margin: auto;
        text-align:center;
    }

    #bubble:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 50px solid #96ded1;
        border-bottom: 13px solid transparent;
        margin: 30px -50px 0px 0px;
    }

    #mechanic {
        grid-area: mechanic;
        width: 150px;
        margin-bottom: 30px;
    }

    #csvTable td {
        border: 2px solid #008b8b;
        text-align: center;
    }

    #csvTable {
        border-collapse: collapse;
        margin: auto;
        grid-area: csvTable;
    }

    #csvTable input {
        width: 100%;
        font-size: 16px;
        box-sizing: border-box;
        border: none;     
        text-align: center;
        padding: 5px 0px;  
    }

    #csvTable select {
        width: 100%;
        font-size: 16px;
        box-sizing: border-box;
        border: none;      
        padding: 5px 0px;   
    }

    #buttonTablePanel {
        grid-area: buttonPanel;
    }

    #timeTable {
        margin: auto;
        width: 500px;
    }   
    
</style>
<script>
    const textBubble1 = document.createElement("p");
    const textBubble2 = document.createElement("p");
    var bubble1 = document.createElement("div");
    var bubble2 = document.createElement("div");
    var robot = document.createElement("img");
    let phonePickUp = true;
    
    const columnNames = ["vyrobni_cislo","datum_vyroby","datum_cas_navstevy","duvod_navstevy","akutni_problemy","datum_posledni_kontroly"];
    const rightAnswers = ["ZI05T","15.4.2010","12.6.2024 14:00","technická kontrola","ne","5.5.2023"];
    
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

        bubble1.id = "bubble1";
        bubble1.style.visibility = "hidden";

        textBubble1.id = "textBubble1";
        bubble1.appendChild(textBubble1);

        bubble2.id = "bubble2";
        
        textBubble2.id = "textBubble2";
        textBubble2.textContent = "Crrr, crr...";
        bubble2.appendChild(textBubble2);

        var phone = document.createElement("img");
        phone.id = "phone";
        phone.alt = "Ringing phone";
        
        game.appendChild(robot);
        game.appendChild(bubble1);
        game.appendChild(bubble2);
        game.appendChild(phone);

        index = 0;
        phonePickUp = true;
        intervalId = setInterval(animateConversation, 100);
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
            textBubble1.textContent = text;
            bubble1.style.visibility = "visible";
            bubble2.style.visibility = "hidden";
        } else if(speaker == "Mechanic") {
            var timeTable = document.getElementById("timeTableDialogue"); 
            if(timeTable != null){
                timeTable.id = "person2";
                timeTable.alt = "Mechanik";
            }
            textBubble2.textContent = text;
            bubble2.style.visibility = "visible";
            bubble1.style.visibility = "hidden";
        } else {
            bubble2.style.visibility = "hidden";
            bubble1.style.visibility = "hidden";
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
        bubble.id = "bubble";

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

    function checkAnswers(dialogue){
        var allRight = true;
        for(let i = 0; i < columnNames.length; i++){
            var input = document.getElementById(columnNames[i]);
            if(input.value == rightAnswers[i]){
                input.style.backgroundColor = "lightgreen";
            }
            else {
                input.style.backgroundColor = "#ffc6c4";
                allRight = false;
            }
        }

        if(allRight) {
            document.getElementById("csvTable").remove();
            document.getElementById("buttonTablePanel").remove();
            var title = document.getElementById("title");
            title.textContent = "Tabulka obsazenosti mechanika robotů";
            var assignment = document.getElementById("assignment");
            assignment.textContent = `Z dat uložených v předchozí tabulce jsme vygenerovali grafické znázornění obsazenosti. 
                Ukládání dat do tabulky a jejich následné zpracování nám tak může pomoci lépe porozumět datům, která máme k dispozici.`;

            var imgDiv = document.createElement("div");
            imgDiv.style.textAlign = "center";
            var timeTable = document.createElement("img");
            timeTable.id = "timeTable";
            timeTable.src = "../../pictures/information_systems/time_table_changed.png";
            timeTable.alt = "Časový rozvrh";
            imgDiv.appendChild(timeTable);


            dialogue.appendChild(imgDiv);                    
        }
        else {
            //document.getElementById("assignment").textContent = "!!! Někde se ti vloudila chybka, zkontroluj si znovu tabulku, případně se vrať zpět na rozhovor.";
        }

    }

    function addInputRow(table) {
        const selectOptions = ["výměna oleje","dotažení šroubů", "technická kontrola","problémy s motorem","nefunkční kolo","prohnutý plech","přehřívání"];
        const rowCount = table.rows.length;
        const newRow = table.insertRow(rowCount);

        for (let i = 0; i < table.rows[0].cells.length; i++) {
            const newCell = newRow.insertCell(i);
            if(columnNames[i] == "duvod_navstevy"){
                var select = document.createElement("select");
                select.id = columnNames[i];
                for (var j = 1; j <= selectOptions.length; j++) {
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


</script>
<div id="game5">
    <div id="game5text">
        <h4><a id="backToTheory" href="informacni-systemy">Zpět na teorii</a></h4>
        <div id="game5Bubble">
            <h4>Informační systémy nejsou žádná věda!</h4>
            <p>
                Potřeboval bych se objednat na kontrolu technického stavu. 
                Poslechni si můj rozhovor s pracovníkem servisu a zkus si vypsat informace, které jsou podle tebe důležité. 
                <br>
                Pak si spolu ukážeme, jak takový informační systém pracuje.
            </p> 
        </div>
        <button id="startGameBtn" onclick="startGame('game5')">Začni hru</button>
    </div>
    <img id="game5robot" src="../../pictures/information_systems/rob05_move.png" alt="Robot5">
</div>