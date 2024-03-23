let flippedButtons = 0; // Proměnná pro uchování počtu aktuálně otočených tlačítek
let firstFlippedButtonID = ""; // Proměnná pro uchování ID prvního otočeného tlačítka
let countOfButtons = 12;

const cards = ["SDKarta_img", "HDD_text", "SSD_img", "USB_text","HDD_img", "USB_img", "MagPas_text", "MagPas_img","SSD_text", "CD_text", "CD_img", "SDKarta_text"];
const pexesoCards = [];

const dictionary = {
    "SDKarta_text": "Uvnitř fotoaparátů a mobilní telefonů, Elektronický zápis dat",
    "SDKarta_img": "../../pictures/data_storage/sdCard.png",
    "HDD_text": "Skládá se z několika kotoučů, Zápis dat pomocí magnetického pole",
    "HDD_img": "../../pictures/data_storage/hdd.jpg",
    "SSD_text": "Hlavně u notebooků, elektronický zápis dat, Uložení většího množství dat",
    "SSD_img": "../../pictures/data_storage/ssd.jpg",
    "USB_text": "Malé datové úložiště, Uložení dat pomocí elektrických obvodů",
    "USB_img": "../../pictures/data_storage/usb.jpg",
    "CD_text": "Přehrání hudby, Zápis dat pomocí laserového paprsku",
    "CD_img": "../../pictures/data_storage/cd.png",
    "MagPas_text": "Magnetický zápis, Archivace velkého množství dat, Zastaralé",
    "MagPas_img": "../../pictures/data_storage/magPaska.png", 
};

// Zamíchání pole cards
function shuffle(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function startGame(){
    var gameContainer = document.getElementById("dataStorageGame");
    gameContainer.innerHTML = "";
    gameContainer.id = "pexeso";
    gameContainer.classList.add("mainPage");

    var title = document.createElement("h2");
    title.textContent = "Pexeso";
    const shuffledCards = shuffle(cards);

    // Vytvoření pole pexesoCards jako 4x3 mřížky ze zamíchaného pole cards
    for (let i = 0; i < 3; i++) {
        const row = shuffledCards.slice(i * 4, (i + 1) * 4);
        pexesoCards.push(row);
    }

    gameContainer.appendChild(title);
    gameContainer.appendChild(loadpexeso());
    }

    function loadpexeso() {
    var table = document.createElement('table');
    table.id = "pexesoTable";

    for (let i = 0; i < 3; i++) {
        const row = table.insertRow();
        for (let j = 0; j < 4; j++) {
        const cell = row.insertCell();
        const button = document.createElement('button');
        button.id = pexesoCards[i][j];
        setDefaultButton(button);

        button.addEventListener('click', function () {
            if (button.dataset.clicked === "true") {
            setDefaultButton(button);
            button.dataset.clicked = "false";
            button.textContent = "";
            
            flippedButtons--; // Snížíme počet otočených tlačítek
            } 
            else {
            if(flippedButtons == 0){
                firstFlippedButtonID = button.id;
            }

            if (pexesoCards[i][j].includes("text")) {
                button.style.backgroundImage = "";
                button.textContent = dictionary[pexesoCards[i][j]];
            } 
            else {
                button.style.backgroundImage = "url(" + dictionary[pexesoCards[i][j]] + ")";
            }
            button.dataset.clicked = "true";
            flippedButtons++; // Zvýšíme počet otočených tlačítek
            }

            // Pokud jsou otočeny již dvě tlačítka, zablokujeme další klikání
            if(flippedButtons == 1){
                firstFlippedButtonID = button.id;
            }
            else if (flippedButtons === 2) {
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

function disableAllButtons() {
    const buttons = document.querySelectorAll('#pexesoTable button');
    buttons.forEach(button => {
        if (button.dataset.clicked !== "true") {
        button.disabled = true;
        }
    });
}

function enableAllButtons() {
    const buttons = document.querySelectorAll('#pexesoTable button');
    buttons.forEach(button => {
        button.disabled = false;
    });
}

function setDefaultButton(button) {
    button.style.background = "white";
    button.style.backgroundImage = 'url(../../pictures/data_storage/rob03mini.jpg)';
    button.style.backgroundSize = "contain";
    button.style.backgroundRepeat = "no-repeat";
    button.style.backgroundPosition = "center";
    button.dataset.clicked = "false"; // přidáváme data atribut pro uchování stavu tlačítka
}

function checkMatchingCards(secondButton) {
    const firstButtonIDParts = firstFlippedButtonID.split("_");
    const secondButtonIDParts = secondButton.id.split("_");

    if (firstButtonIDParts[0] === secondButtonIDParts[0]) {
        var firstButton = document.getElementById(firstFlippedButtonID);
        var secondButton = document.getElementById(secondButton.id);
        firstButton.style.border = "2px solid green";
        secondButton.style.border = "2px solid green";
        setTimeout(() => {
        firstButton.remove();
        secondButton.remove();
        enableAllButtons();
        countOfButtons = countOfButtons - 2;
        if(countOfButtons == 0){
            loadEvaluation();
            return;
        }
        flippedButtons = 0;
        }, 1500);    
    }
}

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
    imgElement.src = "../../pictures/data_storage/rob03.png";
    imgElement.alt = "Robot3";
    imgElement.classList.add("robotDataStorage");

    dataStorageGameDiv.appendChild(textDataStorageGame);
    dataStorageGameDiv.appendChild(imgElement);    
}