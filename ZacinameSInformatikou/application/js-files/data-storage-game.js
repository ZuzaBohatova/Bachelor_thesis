/**
 * Soubor data-storage-game.js obsahuje veškeré funkce a proměnné používané v data-storage-game.html.
 * Funkce spouští a ovládají pexeso, které se skládá vždy z dvojice obrázek-popis.
 */

var flippedCard = 0; // Počet aktuálně otočených kartiček
var firstFlippedCardID = ""; // První otočená kartička
var actualCountOfCards = 12; // Počet aktuálně zbývajících karet

const cards = ["SDKarta_img", "HDD_text", "SSD_img", "USB_text","HDD_img", "USB_img", "MagPas_text", "MagPas_img","SSD_text", "CD_text", "CD_img", "SDKarta_text"]; // ID jednotlivých kartiček
var pexesoCards = []; // Pole pro pexeso 

/**
 * Slovník string:string obsahující vždy ID a pak hodnotu podle toho, zda je ID _text nebo _img.
 * Pro text je hodnota popis konkrétního zařízení.
 * Pro img je hodnota cesta k danému obrázku.
 */
const dictionary = {
    "SDKarta_text": "Uvnitř fotoaparátů a mobilní telefonů, Elektrický zápis dat",
    "SDKarta_img": "../../pictures/data-storage/sdCard.png",
    "HDD_text": "Skládá se z několika kotoučů, Zápis dat pomocí magnetického pole",
    "HDD_img": "../../pictures/data-storage/hdd.jpg",
    "SSD_text": "V notebooku, Elektrický zápis dat, Uložení většího množství dat",
    "SSD_img": "../../pictures/data-storage/ssd.jpg",
    "USB_text": "Malé datové úložiště, Uložení dat pomocí elektrických obvodů",
    "USB_img": "../../pictures/data-storage/usb.jpg",
    "CD_text": "Přehrání hudby, Zápis dat pomocí laserového paprsku",
    "CD_img": "../../pictures/data-storage/cd.png",
    "MagPas_text": "Magnetický zápis, Archivace velkého množství dat, Zastaralé",
    "MagPas_img": "../../pictures/data-storage/magPaska.png", 
};



/**
 * Funkce pro zamíchání ID
 * @param {Array} array Pole obsahující ID, která chceme zamíchat
 * @returns {Array} 
 */
function shuffle(array) {
    for (var i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

/**
 * Funkce spustí hru - rozdá kartičky pexesa
 */
function startGame(){
    var backToTheory = document.getElementById("backToTheory");
    var h4 = document.createElement("h4");
    h4.appendChild(backToTheory);

    var gameContainer = document.getElementById("dataStorageGame");
    gameContainer.innerHTML = "";
    gameContainer.id = "pexeso";
    gameContainer.classList.add("mainPage");

    var title = document.createElement("h2");
    title.textContent = "Pexeso";
    const shuffledCards = shuffle(cards);

    // Vytvoření pole pexesoCards jako 4x3 mřížky ze zamíchaného pole cards
    for (var i = 0; i < 3; i++) {
        const row = shuffledCards.slice(i * 4, (i + 1) * 4);
        pexesoCards.push(row);
    }

    gameContainer.appendChild(h4);
    gameContainer.appendChild(title);
    gameContainer.appendChild(loadAndManagePexeso());
}

/**
 * Funkce načte kartičky a řídí celou hru - mazání kartiček, nalezení dvojic, otáčení kartiček zpět
 * @returns {HTMLTableElement} Tabulka obsahující pexeso
 */
function loadAndManagePexeso() {
    var table = document.createElement("table");
    table.id = "pexesoTable";

    for (let i = 0; i < 3; i++) {
        const row = table.insertRow();
        for (let j = 0; j < 4; j++) {
            const cell = row.insertCell();
            const button = document.createElement("button");
            button.id = pexesoCards[i][j];
            setDefaultButtonStyle(button);

            button.addEventListener("click", function () {
                if (button.dataset.clicked === "true") {
                    setDefaultButtonStyle(button);
                    button.dataset.clicked = "false";
                    button.textContent = "";
                    flippedCard--; // Snížíme počet otočených tlačítek
                } 
                else {
                    if(flippedCard == 0){
                        firstFlippedCardID = button.id;
                    }
                    
                    if (pexesoCards[i][j].includes("text")) {
                        button.style.backgroundImage = "";
                        button.textContent = dictionary[pexesoCards[i][j]];
                    } 
                    else {
                        button.style.backgroundImage = "url(" + dictionary[pexesoCards[i][j]] + ")";
                    }
                    button.dataset.clicked = "true";
                    flippedCard++; // Zvýšíme počet otočených tlačítek
                }

                // Pokud jsou otočeny již dvě tlačítka, zablokujeme další klikání
                if(flippedCard == 1){
                    firstFlippedCardID = button.id;
                }
                else if (flippedCard === 2) {
                    checkMatchingCards(button);
                    disableAllButtons();
                }
                else {
                    enableAllButtons()
                }
            });
        cell.appendChild(button);
        }
    }
    return table;
}

/**
 * Funkce nastaví všechna neotočná tlačítka (kartičky) na disable true, nelze je otočit
 */
function disableAllButtons() {
    const buttons = document.querySelectorAll("#pexesoTable button");
    buttons.forEach(button => {
        if (button.dataset.clicked !== "true") {
            button.disabled = true;
        }
    });
}


/**
 * Funkce zpřístupní všechna tlačítka (kartičky), tak že je lze opět otáčet - lze na ně kliknout
 */
function enableAllButtons() {
    const buttons = document.querySelectorAll("#pexesoTable button");
    buttons.forEach(button => {
        button.disabled = false;
    });
}

/**
 * Funkce nastaví defaultní styl tlačítka - styl neotočené kartičky pexesa
 * @param {HTMLButtonElement} button Tlačítko, pro které daný styl nastavujeme
 */
function setDefaultButtonStyle(button) {
    button.style.background = "white";
    button.style.backgroundImage = "url(../../pictures/data-storage/rob03mini.png)";
    button.style.backgroundSize = "contain";
    button.style.backgroundRepeat = "no-repeat";
    button.style.backgroundPosition = "center";
    button.dataset.clicked = "false"; // přidáváme data atribut pro uchování stavu tlačítka
}

/**
 * Funkce zkontroluje, zda tlačítka (kartičky), která jsou otočena, jsou pár,
 * v případě, že jsou pár, tak se zeleně zarámují a poté smažou
 * @param {HTMLButtonElement} secondButton Druhé otočené tlačítko (kartička)
 */
function checkMatchingCards(secondButton) {
    const firstButtonIDParts = firstFlippedCardID.split("_");
    const secondButtonIDParts = secondButton.id.split("_");

    if (firstButtonIDParts[0] == secondButtonIDParts[0] && firstButtonIDParts[1] != secondButtonIDParts[1]) {
        var firstButton = document.getElementById(firstFlippedCardID);
        firstButton.style.border = "2px solid green";
        secondButton.style.border = "2px solid green";
        setTimeout(()=> {
            firstButton.remove();
            secondButton.remove();
            enableAllButtons();
            actualCountOfCards = actualCountOfCards - 2;
            if(actualCountOfCards == 0){
                loadEvaluation();
                return;
            }
            flippedCard = 0;
        },1000);
    }
}

/**
 *  Funkce načte vyhodnocení celé hry, zruší kontejner pro hru a načte robota s bublinou 
 *  a tlačítka, odkazující na další hry nebo na zopakování hry
 */
function loadEvaluation(){
    document.getElementById("pexesoTable").remove();
    var dataStorageGameDiv = document.getElementById("pexeso");
    dataStorageGameDiv.id = "dataStorageGame";
    dataStorageGameDiv.innerHTML = "";

    var textDataStorageGame = document.createElement("div");
    textDataStorageGame.id = "textDataStorageGame";

    var h4Element = document.createElement("h4");
    var aElement = document.createElement("a");
    aElement.id = "backToTheory";
    aElement.href = "ukladani-dat";
    aElement.textContent = "Zpět na teorii";
    h4Element.appendChild(aElement);

    var bubble = document.createElement("div");
    bubble.id = "bubbleDataStorageGame";
    bubble.classList.add("bubble");
    bubble.classList.add("bubbleDataStorage");

    var h4BubbleUvod = document.createElement("h4");
    h4BubbleUvod.textContent = "Výborně, tohle jsi zvládnul velmi dobře!";

    var pElement = document.createElement("p");
    pElement.textContent = "Můžeš se vydat prozkoumat další hry.";

    bubble.appendChild(h4BubbleUvod);
    bubble.appendChild(pElement);

    var gameAgainButton = document.createElement("button");
    gameAgainButton.id = "gameAgainButton";
    gameAgainButton.textContent = "Začít znovu";
    gameAgainButton.addEventListener("click", function() {
        window.location.href = "ukladani-dat-hra";
    });

    var otherGamesButton = document.createElement("button");
    otherGamesButton.id = "otherGamesButton";
    otherGamesButton.textContent = "Další hry";
    otherGamesButton.addEventListener("click", function() {
        window.location.href = "hry";
    });

    textDataStorageGame.appendChild(h4Element);
    textDataStorageGame.appendChild(bubble);
    textDataStorageGame.appendChild(otherGamesButton);
    textDataStorageGame.appendChild(gameAgainButton);

    var imgElement = document.createElement("img");
    imgElement.id = "robotDataStorageGame";
    imgElement.src = "../../pictures/data-storage/rob03.png";
    imgElement.alt = "Robot3";
    imgElement.classList.add("robotDataStorage");

    dataStorageGameDiv.appendChild(textDataStorageGame);
    dataStorageGameDiv.appendChild(imgElement);    
}