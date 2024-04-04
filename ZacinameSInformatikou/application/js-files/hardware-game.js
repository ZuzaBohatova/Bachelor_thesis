/**
 * Soubor hradware-game.js se spouští na stránce hardware-game.html
 * Ovládá hru - přiřazování správných názvů ke správným konektorům/místům na základní desce 
 */

var lastClick = null;   //poslední zakliknuté políčko - ať už na základní desce nebo mezi názvy
var lastIsLabel = false;    //zda je poslední zakliknutý název
var answers = [];   //již přiřazené odpovědi
const buttonIds = [70, 10, 20, 50, 60, 40, 30]; // ID jednotlivých labelů pro talčítka s názvy, která přiřazujeme na základní desku
const buttonNames = ['Ethernet, USB, ...', 'Síťové, zvukové, grafické karty', 'Procesor (CPU)', 'North-South bridge chipset', 'RAM', 'HDD nebo SSD', 'Bios']; // texty jednotlivých tlačítek

var colors = ["blue", "green", "red", "black", "dodgerblue", "yellow", "mediumvioletred"]; // barvy pro jednotlivé rámce zaškrtnutí

/**
 * Funkce, která vytvoří div 
 * @param {string} id ID divu
 * @param {string} divClass Class, do které chceme div přiřadit
 * @returns {HTMLDivElement} Nově vytvořený div
 */
function createDiv(id, divClass){
    var div = document.createElement("div");
    if(id != null){
       div.id = id; 
    }
    if(divClass != null){
        div.classList.add(divClass);
    }
    return div;
}

/**
 * Funkce, která vytvoří obrázek se zadanými parametry 
 * @param {string} id ID obrázku 
 * @param {string} src Cesta k obrázku
 * @param {string} alt Alternativní název, pokud se obrázek nezobrází
 * @returns {HTMLImageElement} nově vytvořený obrázek
 */
function createImage(id, src, alt){
    var image = document.createElement('img');
    image.id = id;
    image.src = src;
    image.alt = alt;
    return image;
}

/**
 * Funkce, která načte a spustí hru - smaže elementy z úvodní stránky a načte nové pro hru
 */
function startGame(){
    document.getElementById("bubbleHardware").remove();
    document.getElementById("startGameButton").remove();
    document.getElementById("robotHardwareGame").remove();

    var gameContainer = createDiv(null,"gameContainer");

    var img = createImage("drawnMotherboard","../../pictures/hardware/drawn_motherboard.png","Motherboard");

    var labelButtons = generateLabelButtons();

    gameContainer.appendChild(img);
    gameContainer.innerHTML += labelButtons;

    document.getElementById('textHardwareGame').appendChild(gameContainer);
    document.getElementById('textHardwareGame').appendChild(document.createElement('div')).setAttribute('id', 'mistake');

    var sidebar = createDiv(null,"components");

    for (var i = 0; i < 7; i++) {
        var button = createItemButton(i);
        sidebar.appendChild(button);
    }

    document.getElementById('sidebar').appendChild(sidebar);

    var checkButton = document.createElement('button');
    checkButton.id = 'checkGame';
    checkButton.textContent = 'Zkontroluj';
    checkButton.setAttribute('onclick', 'check()');
    document.getElementById('sidebar').appendChild(checkButton);

    document.getElementById("sidebar").style.margin = "50px 20px 0px 0px ";
}

/**
 * Funkce vygeneruje tlačítka s labely, abychom mohli klikat na základní desku a označovat dané komponenty
 * @returns {innerHTML} innerHTML s vytvořenými tlačítky
 */
function generateLabelButtons(){
    var buttons = "";
    for(var i = 1; i < 8; i++){
        buttons += `<button id="hra4`+i+`" onclick="choose(`+i+`)">`+i+`</buttons>`;
    }
    return buttons;
}

/**
 * Funkce, která vytvoří tlačítko pro sidebar, s názvem, a id podle indexu 
 * @param {number} index Index, který určuje, jaké tlačítko se má vytvořit
 * @returns {HTMLButtonElement} Nově vytvořené tlačítko pro sidebar
 */
function createItemButton(index){
    var button = document.createElement('button');
    button.id = "hra4"+buttonIds[index];
    button.textContent = buttonNames[index];
    button.setAttribute('onclick', 'choose(' + buttonIds[index] + ')');
    return button;
}

/**
 * Funkce, která provede odpovídající reakci podle toho, na jaké jsme klikli tlačítko
 * @param {string} choice ID tlačítka, na které jsme klikli
 */
function choose(choice){
    if(lastClick == null){
        if(choice < 10){
            if(answers[choice] == null){
                lastIsLabel = true;
                document.getElementById("hra4"+choice).style.border = "3px solid #FFCC99"; 
                lastClick = choice;
            }
            else {
                removeColor(choice);
            }
        }
        else {
            if(answers.includes(choice)){
                removeColor(choice);
            }
            else{
                lastClick = choice;
                document.getElementById("hra4"+choice).style.border = "3px solid #FF4F00"; 
            }
        }
    }
    else{
        if(lastIsLabel){
            if(choice < 10){
                removeColor(choice);
                removeColor(lastClick);
                document.getElementById("hra4"+choice).style.border = "3px solid #FFCC99"; 
                lastClick = choice;
            }
            else {
                removeColor(choice);
                removeColor(lastClick);
                answers[lastClick] = choice;
                setColors();
                lastIsLabel = false;
                lastClick = null;
            }
        }
        else {
            if(choice < 10){
                removeColor(choice);
                removeColor(lastClick);
                answers[choice] = lastClick;
                setColors();
                lastIsLabel = false;
                lastClick = null;
            }
            else{
                removeColor(choice);
                removeColor(lastClick);
                document.getElementById("hra4"+choice).style.border = "3px solid #FF4F00"; 
                lastClick = choice;
                lastIsLabel = false;
            }
        }
    }     
}

/**
 * Funkce, která nastaví barvu písma a rámečky u zadaných tlačítek
 */
function setColors(){
    for(var i = 1; i < answers.length; i++){
        if(answers[i] != null){
            document.getElementById("hra4"+i).style.border = "2px solid "+colors[i-1];
            document.getElementById("hra4"+answers[i]).style.border = "2px solid "+colors[i-1];
            document.getElementById("hra4"+answers[i]).style.color = colors[i-1];
        }
    }

}

/**
 * Funkce, která nastaví barvy a rámečky do defaultního modu
 * @param {string} choice ID stisknutého tlačítka
 */
function removeColor(choice){
    if(choice < 10){
        document.getElementById("hra4"+choice).style.border = "none";
        if(answers[choice] != null){
            document.getElementById("hra4"+answers[choice]).style.border = "2px solid #FFCC99";
            document.getElementById("hra4"+answers[choice]).style.color = "#FF4F00";
            answers[choice] = null;
        }
    }
    else {
        document.getElementById("hra4"+choice).style.border = "2px solid #FFCC99";
        document.getElementById("hra4"+choice).style.color = "#FF4F00";
        if(answers.includes(choice)){
            document.getElementById("hra4"+answers.indexOf(choice)).style.border = "none";
            answers[answers.indexOf(choice)] = null;
        }
    }
}

/**
 * Funkce, která zkontroluje, zda uživatel vytvořil správné páry, případně vyřadí chybné páry
 */
function check(){
    var right = true;
    for(var i = 1; i < 8; ++i){
        if((answers[i]/10) != i){
            removeColor(i);
            right = false;
        }
    }
    if(!right){
        mistake.innerHTML = `<p>Chybička se vloudila, zkus ji opravit!</p>`;
    }
    else {
        vyhodnoceni();
    }
}

/**
 * Zobrazí stránku s vyhodnocením celé hry - robota s bublinoua  tlačítka s přechodem na další hry a zopakovaní celé hry od začátku
 */
function vyhodnoceni(){
    var hardwareContainer = document.getElementById('hardwareGame');
    hardwareContainer.innerHTML = '';

    var textHardwareGame = createDiv("textHardwareGame", null);

    var backToTheoryLink = document.createElement('a');
    backToTheoryLink.id = 'backToTheory';
    backToTheoryLink.textContent = 'Zpět na teorii';
    backToTheoryLink.href = 'hardware';
    var backToTheoryHeading = document.createElement('h4');
    backToTheoryHeading.appendChild(backToTheoryLink);
    textHardwareGame.appendChild(backToTheoryHeading);

    var bubble = createDiv("bubbleHardware",null);
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleHardware");

    var heading = document.createElement('h4');
    heading.textContent = 'Výborně!';
    bubble.appendChild(heading);

    var bubbleText = document.createElement('p');
    bubbleText.textContent = 'To se ti povedlo.';
    bubble.appendChild(bubbleText);

    textHardwareGame.appendChild(bubble);

    var hra4kamDalDiv = createDiv("hra4kamDal",null);

    var resetButton = createLocationButton("resetButton","Začít znovu","hardware-hra");
    var anotherGamesButton = createLocationButton("anotherGamesButton","Další hry","hry");

    textHardwareGame.appendChild(anotherGamesButton);
    textHardwareGame.appendChild(resetButton);

    var sidebarDiv = createDiv("sidebar", null);
    var robotHardwareGameImg = createImage("robotHardwareGame", "../../pictures/hardware/rob04.png", "Robot4");
    sidebarDiv.appendChild(robotHardwareGameImg);

    hardwareContainer.appendChild(textHardwareGame);
    hardwareContainer.appendChild(sidebarDiv);
}

/**
 * Funkce, která vytvoří tlačítko, které odkazuje na jinou stránku
 * @param {string} id ID tlačítka
 * @param {string} text Text tlačítka 
 * @param {string} location URL, na kterou odkazujeme 
 * @returns {HTMLButtonElement} nově vytvořené tlačítko
 */
function createLocationButton(id,text,location){
    var locationButton = document.createElement('button');
    locationButton.id = id;
    locationButton.textContent = text;
    locationButton.addEventListener('click', function() {
        window.location.href = location;
    });
    return locationButton;
}