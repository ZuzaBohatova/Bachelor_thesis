/**
 * Soubor number-systems-game.js je spouštěn v number-systems-game.html
 * Ovládá hru, kde uživatel vyplňuje převody z desítkové do dvojkové soustavy
 * Na začátku má k dispozici také animaci, která zobrazuje, jak převod do dvojkové soustavy probíhá
 */

var mistakes = 0; // počet chyb, které již uživatel udělal
var lastEx = 0; // poslední cvičení, na kterém skončil
var animationStep = 0; // v kterém kroku animace se aktuálně nacházíme
var interval = 0; // interval animace
var division = [42,2,(42/2),(42%2)]; // kroky dělení 
var rules = "Postupně vyplň všechna políčka buď jedničkou nebo nulou. Pokud zezelenají, odpověděl jsi správně, naopak červená znamená chybu."; // pravidla hry
var mistakeText = "Někde máš chybku, zkus ji opravit!"; // text, který se zobrazuje, když uživatel udělá chybu

/**
 * Funkce, která vytvoří odkaz na zpátky na teorii
 * @returns {HTMLHeadingElement} element nadpisu, v němž je vložen odkaz
 */
function createBack(){
    var back = document.createElement("a");
    back.id = "backNumSysGame";
    back.href = "ciselne-soustavy";
    back.textContent = "Zpět na teorii";

    var heading = document.createElement("h4");
    heading.appendChild(back);
    return heading;
}

/**
 * Funkce vytvoří odstavec pouze s textovým obsahem
 * @param {string} text Text odstavce
 * @param {string} id ID odstavce
 * @returns {HTMLParagraphElement} nově vytvořený odstavec
 */
function createParagraph(text, id) {
    var paragraph = document.createElement("p");
    if(id != null){
        paragraph.id = id;
    }
    paragraph.textContent = text;
    return paragraph;
}

/**
 * Funkce vytvoří odstavec obsahující innerHTML
 * @param {innerHTML} htmlContent Obsah odstavce obsahující HTML elementy
 * @param {string} id ID odstavce
 * @returns {HTMLParagraphElement} nově vytvořený odstavec
 */
function createParagraphWithHTML(htmlContent, id) {
    var paragraph = document.createElement("p");
    if(id != null){
        paragraph.id = id;
    }
    paragraph.innerHTML = htmlContent;
    return paragraph;
}

/**
 * Funkce vytvoří nadpis Zvládáš převody mezi soustavami?
 * @returns {HTMLHeadingElement} nadpis "Zvládáš převody mezi soustavami?"
 */
function createTitle(){
    var heading = document.createElement("h3");
    heading.textContent = "Zvládáš převody mezi soustavami?";
    return heading;
}

/**
 * Funkce vytvoří tlačítko s daným id a textem, které spustí zadanou funkci při kliknutí
 * @param {string} id ID tlačítka
 * @param {string} text Text zobrazený na tlačítku
 * @param {function} clickHandler Funkce, která se spustí při kliknutí na tlačítko
 * @returns {HTMLButtonElement} Nově vytvořené tlačítko
 */
function createButton(id, text, clickHandler) {
    var button = document.createElement("button");
    button.id = id;
    button.textContent = text;
    button.addEventListener("click", clickHandler);
    return button;
}

/**
 * Funkce převede zadané číslo do dvojkové soustavy.
 * @param {number} dec Číslo, které chceme převést do dvojkové soustavy
 * @returns {string} Číslo v dvojkové soustavě jako řetězec
 */
function dec2bin(dec) {
    return (dec >>> 0).toString(2);
}

/**
 * Funcke převede string na list
 * @param {string} str String, který chceme převést na list
 * @returns {Array} Pole vytvořené ze stringu
 */
function string2list(str){
    return Array.from(str);
}

/**
 * Funkce zkontroluje zda element existuje a pokud ano, tak ho smaže
 * @param {string} id ID elementu, který chceme smazat 
 */
function ifExistsRemove(id){
    var element = document.getElementById(id);
    if(element != null) {
        element.remove();
    }
}

/**
 * Funkce vrátí náhodné celé číslo z daného rozsahu
 * @param {number} min Minimum z rozsahu
 * @param {number} max MAximum z rozsahu
 * @returns {number} náhodné číslo z rozsahu (min,max)
 */
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
}

/**
 * funkce spustí celou hru a zobrazí pravidla
 * @param {boolean} firstStart zda hru spouštíme poprvé, nebo se vracíme, po té co jsme udělali příliš mnoho chyb
 */
function startGame(firstStart){
    var bubble = document.getElementById("bubbleNumSysGame");
    bubble.classList.add("bubbleNumSys");
    bubble.classList.add("second");
    bubble.innerHTML = "";

    document.getElementById("robotNumSysGame").src = "../../pictures/number-systems/rob02.png";
    bubble.appendChild(createParagraph("Pravidla jsou jednoduchá. Dám ti číslo, které máš převést do dvojkové soustavy."
        +" Ty ho postupně převedeš, číslici po číslici."));
    document.getElementById("animationTable").remove();
    if(firstStart){
        document.getElementById("numberSystemGame").appendChild(createButton("buttonNext","Hrát",conversionGame1));
        document.getElementById("startGameButton").remove();
        document.getElementById("startAnimationButton").remove();
    }
    else {
        buttonNext.parentNode.replaceChild(createButton("buttonNext","Hrát",conversionGame1),buttonNext);
    }
}

/**
 * Funkce, která spouští animaci převodu z desítkové sousta do dvojkové soustavy 
 */
function animationFrom10To2() {
    mistakes = 0;
    animationStep = 0;
    division = [42,2,(42/2),(42%2)];

    bubbleNumSysGame.innerHTML = "";
    bubbleNumSysGame.appendChild(createParagraphWithHTML(`Základní krok převodu do dvojkové soustavy je <strong>dělení dvěma</strong> 
        a zapisování <span class="strong">zbytku po dělení</span>.`));

    ifExistsRemove("startGameButton");
    ifExistsRemove("startAnimationButton");
    ifExistsRemove("buttonNext");

    document.getElementById("robotNumSysGame").src = "../../pictures/number-systems/rob02.png";
    document.getElementById("bubbleNumSysGame").classList.add("second");
    bubbleNumSysGame.appendChild(createParagraphWithHTML(`My budeme do dvojkové soustavy převádět číslo <strong>`+division[0]+"</strong>"));
    
    interval = setInterval(animate, 5000);
}

/**
 * Funkce, která provádí jednotlivé kroky animace
 */
function animate(){
    switch (animationStep) {
        case 0: 
            divisionCalculation(division);
            break;
        case 1:
            division = changeParametersOfDivision(division);
            divisionCalculation(division);
            if(division[2]>0) {
                --animationStep;
            }
            break;
        case 2:
            bubbleNumSysGame.innerHTML = "";
            bubbleNumSysGame.appendChild(createParagraphWithHTML(`Když už nemáme kam dál dělit, podíváme se na zbytky, co jsme dostali: <strong>010101</strong>`));
            break;
        case 3:
            bubbleNumSysGame.appendChild(createParagraphWithHTML(`Zbytky přečtu odzadu a dostávám výsledek: <strong>101010</strong>`));
            break;
        case 4:
            bubbleNumSysGame.appendChild(createParagraphWithHTML(`<strong>42</strong> ve <strong>dvojkové soustavě</strong> se rovná <strong>101010</strong>`));
            bubbleNumSysGame.appendChild(createParagraph("A hurá na hru!"));
            break;
        case 6:
            document.getElementById("numberSystemGame").appendChild(createAfterAnimationButton(lastEx));
            clearInterval(interval);
            break;
    }
    ++animationStep;
}

/**
 * Funkce provede další krok dělení a vypíše potřebné informace
 * @param {Array} division Pole pro jednotlivé argumenty fělení
 */
function divisionCalculation(division) {
    var bubble = document.getElementById("bubbleNumSysGame");
    bubble.innerHTML = "";

    bubble.appendChild(createParagraphWithHTML("<strong>"+division[0]+"</strong> dělíme <strong>"+division[1]+"</strong>")); 
    bubble.appendChild(createParagraphWithHTML("Dostaneme <strong>"+division[2]+"</strong> a <strong>zbytek "+division[3]+"</strong>"));

    addRowToTable(division, document.getElementById("animationTable"));
}

/**
 * Funkce vytvoří buňku tabulky s daným obsahem
 * @param {string} text Text buňky
 * @returns {HTMLTableCellElement} buňka se zadaným obsahem
 */
function createCellOfTable(text){
    var cell = document.createElement("td");
    cell.textContent = text;
    return cell;
}

/**
 * Funkce přidá řádek do tabulky
 * @param {Array} division Pole s parametry dělení 
 * @param {HTMLTableElement} table Tabulka, do které řádky přidáváme
 */
function addRowToTable(division, table) {
    var cellContents = [division[0] + " : " + division[1] + " = ", division[2], "", "Zbytek", division[3]];
    var newRow = document.createElement("tr");

    for (var i = 0; i < cellContents.length; i++) {
        var cell = createCellOfTable(cellContents[i]);
        if (i === 4) {
            cell.classList.add("strong");
        }
        newRow.appendChild(cell);
    }
    table.appendChild(newRow);
}

/**
 * Funkce, která změní parametry dělení 
 * @param {Array} args Pole s parametry dělení
 * @returns {Array} pole s nově nastavenými parametry
 */
function changeParametersOfDivision(args) {
    args[0]=args[2];
    args[3]=args[0]%args[1];
    args[2]=(args[0]-args[3])/args[1];
    console.log(args[0],args[1],args[2],args[3]);
    return args;
} 

/**
 * Funkce vytvoří tlačítko po konci animace, podle toho z jakého stavu jsme animaci spustili
 * @param {number} gameType Číslo hry, na kterou se po konci animace vrátíme
 * @returns {function} Funkce, která se provede po stisknutí tlačítka
 */
function createAfterAnimationButton(gameType){
    switch (gameType) {
        case 1:
            return createButton("buttonNext", "Vrať se hru", conversionGame1);
        case 2:
            return createButton("buttonNext", "Vrať se hru", function() {
                backToGame();
                conversionGame2(0);
            });
        case 3:
            return createButton("buttonNext", "Vrať se hru", function() {
                backToGame();
                conversionGame3(0);
            });
        case 4:
            return createButton("buttonNext", "Vrať se hru", function() {
                backToGame();
                conversionGameBirthday(0);
            });
        default:
            return createButton("buttonNext", "Začni hru", function () {
                startGame(false)
            });
    }
}

/**
 * Funkce, kterou vrátí uživatel zpátky na hru, tam kde skončil
 */
function backToGame(){
    document.getElementById("animationTable").remove();
    var textNumSysGame = document.getElementById("textNumSysGame");
    textNumSysGame.innerHTML = "";

    textNumSysGame.appendChild(createBack());
    textNumSysGame.appendChild(createTitle());
    textNumSysGame.appendChild(createParagraph("","gameQuestion"));
    textNumSysGame.appendChild(createParagraph("","gameMistake"));
}

/**
 * Funkce spustí první převod do dvojkové soustavy
 */
function conversionGame1(){
    var num = getRandomInt(16, 31);
    var rest = num % 2;
    var result = (num - (num % 2))/2;

    textNumSysGame.innerHTML = "";
    textNumSysGame.appendChild(createBack());
    textNumSysGame.appendChild(createTitle());
    
    textNumSysGame.appendChild(createParagraphWithHTML(`Převeď číslo <span class="strong">`+num+`</span> do <span class="strong">dvojkové soustavy</span>`,"gameQuestion"));
    textNumSysGame.appendChild(createParagraph(rules,"gameRules"));
    textNumSysGame.appendChild(createParagraphWithHTML(`<i>Hint: děl dvojkou a zbytky doplňuj odzadu - `+num+` : 2 = `+result+` a zbytek je `+rest+`</i>`,"hint"));

    var rigthAns = string2list(dec2bin(num));
    var id = "conversionForm"+num.toString();
    textNumSysGame.appendChild(addConversionForm(5,rigthAns,id));
    document.getElementById(id+"5").placeholder = rest;
    textNumSysGame.appendChild(createParagraph("","gameMistake"));
    lastEx = 1;
    buttonNext.parentNode.replaceChild(createButton("buttonNext","Pokračuj dál",function (){
        conversionGame2(num)
    }),buttonNext);

}

/**
 * Funkce přidá formulář, do kterého uživatel zadává kroky převodu
 * @param {number} count Počet míst, které má výsledné číslo ve dvojkové soustavě
 * @param {Array} correctAns Správná odpověď
 * @param {string} id ID formuláře
 * @returns {HTMLFormElement} vytvořený formulář pro převod
 */ 
function addConversionForm(count, correctAns, id){
    var form = document.createElement("form");
    form.id = id;
    form.classList.add("conversionForm");

    for (var i = 1; i <= count; i++) {
        var idAns = id+i;
        form.innerHTML += `<input type="text" id=`+idAns+` onkeyup="checkConversion(`+correctAns[i-1]+`,'`+idAns+`')">`;
    }
    return form;
}

/**
 * Funkce, která zkontroluje, zda byl převod proveden správně
 * @param {string} correctAns Správná odpověď
 * @param {string} id ID inputu, který testujeme
 */
function checkConversion(correctAns, id) {
    var value = document.getElementById(id).value;
    
    if(value == correctAns) {
        createCheckedStyle(id,"2px solid green","darkgreen");
    }
    else {
        createCheckedStyle(id,"2px solid red","darkred");
        ++mistakes;
        if(mistakes <= 7){
            document.getElementById("robotNumSysGame").src = "../../pictures/number-systems/rob02"+mistakes+".png";
        }
        else {
            penalty();
        }
    }
}

/**
 * Funkce vytvoří styl pro políčka převodu - podle zadaných parametrů
 * @param {string} id ID elementu, kterému chceme měnit style
 * @param {string} border Rámeček, který chceme nastavit
 * @param {string} color Barva, kterou chceme nastavit
 */
function createCheckedStyle(id, border, color){
    var element = document.getElementById(id);
    element.style.border = border;
    element.style.fontWeight = "bold";
    element.style.color = color;
}

/**
 * Funkce spustí druhý převod do dvojkové soustavy
 * @param {string} lastNum Poslední krok
 */
function conversionGame2(lastNum) {
    var ans = true;
    if(lastNum != "0"){
        ans = canContinue("conversionForm"+lastNum, 5);
    }
    if(!ans) {
        gameMistake.textContent = mistakeText;
    }
    else{
        gameMistake.textContent = "";            
        gameQuestion.textContent = "Nyní tě čekají těžší převody.";
        lastEx = 2;
        var num = getRandomInt(64, 127);
        var rigthAns = string2list(dec2bin(num));
        var id = "conversionForm"+num.toString();
        gameQuestion.appendChild(createParagraphWithHTML(`<span class="strong">Převeď `+num+` do dvojkové soustavy</span>`));
        gameQuestion.appendChild(addConversionForm(7,rigthAns,id));

        ifExistsRemove("conversionForm"+lastNum);
        ifExistsRemove("hint");
        ifExistsRemove("gameRules");
        
        buttonNext.parentNode.replaceChild(createButton("buttonNext","Pokračuj dál", function(){
            conversionGame3(num);
        }),buttonNext);
    }
}

/**
 * Funkce, která zkontroluje, zda jsou všechna políčka vyplněna správně a pokud ano, můžeme pokračovat
 * @param {string} id ID inputu
 * @param {number} count Délka čísla ve dvojkové soustavě
 * @returns {boolean} true, pokud můžeme pokračovat (pokud je vše správně), false pro opak
 */
function canContinue(id, count){
    var ans = true;
    for(var i = 1; i<=count; i++){
        if(document.getElementById(id+i).style.color != "darkgreen") {
            ans = false;
        }
    }
    return ans;
}

/**
 * Funkce spustí třetí převod do dvojkové soustavy
 * @param {string} lastNum Poslední krok
 */
function conversionGame3(lastNum) {
    var ans = true;
    if(lastNum != "0"){
        ans = canContinue("conversionForm"+lastNum, 7);    
    }
    if(!ans) {
        gameMistake.textContent = mistakeText;
    }
    else{
        gameMistake.textContent = "";            
        gameQuestion.textContent = "Tak teď se ukáže, zda opravdu všemu rozumíš. Tento převod už je opravdu těžký!";
        lastEx = 3;
        var num = getRandomInt(128,255);
        var rigthAns = string2list(dec2bin(num));
        var id = "conversionForm"+num.toString();
        gameQuestion.appendChild(createParagraphWithHTML(`<span class="strong">Převeď `+num+` do dvojkové soustavy</span>`));
        gameQuestion.appendChild(addConversionForm(8,rigthAns,id));
        
        buttonNext.parentNode.replaceChild(createButton("buttonNext","Pokračuj dál", function(){
            conversionGameBirthday(num);
        }),buttonNext);
    }
    
}

/**
 * Funkce spustí převod narozenin uživatele do dvojkové soustavy
 * @param {string} lastNum Poslední krok
 */
function conversionGameBirthday(lastNum){
    var ans = true;
    if(lastNum != "0"){
        ans = canContinue("conversionForm"+lastNum, 8);
    }
    if(!ans) {
        gameMistake.textContent = mistakeText;
    }
    else{
        lastEx = 4;
        gameMistake.textContent = "";
        gameQuestion.textContent = "To nejtěžší máš za sebou, teď si spolu spočítáme, jak vypadají tvé narozeniny ve dvojkové soustavě.";
        var form = document.createElement("form");
        form.id = "formBirthday";
        form.innerHTML = `<input type="number" id="birthDay" min="1" max="31" placeholder="den" required>.
            <input type="number" id="birthMonth" min="1" max="12" placeholder="měsíc" required>. zapíšeš ve dvojkové soustavě jako: </p>
            <input type="text" id="day" placeholder="den" pattern="[0-1]+" required>.
            <input type="text" id="month" placeholder="měsíc" pattern="[0-1]+" required>.`;
        textNumSysGame.appendChild(form);
            
        buttonNext.parentNode.replaceChild(createButton("buttonNext","Zkontroluj", checkBirthdayConversion),buttonNext);
    }
}

/**
 * Funkce zkontroluje, zda převod narozenin byl proveden správně
 */
function checkBirthdayConversion(){
    var day = dec2bin(document.getElementById("birthDay").value);
    var month = dec2bin(document.getElementById("birthMonth").value);
    var correct = true;
    if(document.getElementById("day").value == day){
        createCheckedStyle("day","2px solid darkgreen","darkgreen");
    }
    else {
        createCheckedStyle("day","2px solid red","darkred");
        correct = false;
    }
    if(document.getElementById("month").value == month){
        createCheckedStyle("month","2px solid darkgreen","darkgreen");
    }
    else {
        createCheckedStyle("month","2px solid red","darkred");
        correct = false;
    }
    if(correct) {
        createLastPage();
    }
    else {
        gameMistake.textContent = mistakeText;
    }
}

/**
 * Funkce, která pokud uživatel udělal moc chyb, spustí se funkce penalty, která ho donutí pustit si znovu animaci
 */
function penalty(){
    var textNumSysGame = document.getElementById("textNumSysGame");
    textNumSysGame.innerHTML = ""; 

    var bubble = document.createElement("div");
    bubble.id = "bubbleNumSysGame";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleNumSys");
    
    var heading = document.createElement("h4");
    heading.textContent = "To je škoda!";
    bubble.appendChild(heading);
    
    bubble.appendChild(createParagraph(" Protože jsi v převodech nadělal moc chyb a nakonec mě úplně vymazal, " +
                            "tak se musíš podívat znovu na animaci. Příště ti to jistě půjde lépe!"));

    var table = document.createElement("table");
    table.id = "animationTable";

    textNumSysGame.appendChild(createBack());
    textNumSysGame.appendChild(bubble);
    textNumSysGame.appendChild(table);
    document.getElementById("buttonNext").parentNode.replaceChild(createButton("buttonNext", "Animace", function() {
        animationFrom10To2();
    }), buttonNext);

    document.getElementById("robotNumSysGame").src = "../../pictures/number-systems/rob02.png";
}

/**
 * Funkce zobrazí poslední stránku hry, s odkazy kam dál
 */
function createLastPage(){
    var textNumSysGame = document.getElementById("textNumSysGame");
    textNumSysGame.innerHTML = "";
    textNumSysGame.appendChild(createBack());

    var bubble = document.createElement("div");
    bubble.id = "bubbleNumSysGame";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleNumSys");

    textNumSysGame.appendChild(bubble);

    var heading = document.createElement("h4");
    heading.textContent ="Výborně, vedl sis dobře!";

    bubble.appendChild(heading);
    bubble.appendChild(createParagraph("Prošel jsi všemi úkoly na převody do dvojkové soustavy."));
    bubble.appendChild(createParagraph("Vzhůru na další téma!"));

    textNumSysGame.appendChild(createButton("gameAgainButton","Začít znovu",function() {
        location.href = "ciselne-soustavy-hra";
    }));
    textNumSysGame.appendChild(createButton("anotherGameButton","Další hry",function() {
        location.href = "hry";
    }));
}