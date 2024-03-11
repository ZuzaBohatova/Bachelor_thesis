<script>
document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";

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
  var gameContainer = document.getElementById("hra3");
  gameContainer.innerHTML = "";
  gameContainer.id = "pexeso";

  var title = document.createElement("h2");
  title.textContent = "Pexeso";
  


  const shuffledCards = shuffle(cards);

  // Vytvoření pole pexesoCards jako 4x3 mřížky ze zamíchaného pole cards
  for (let i = 0; i < 3; i++) {
    const row = shuffledCards.slice(i * 4, (i + 1) * 4);
    pexesoCards.push(row);
  }

  console.log(pexesoCards);


  gameContainer.appendChild(title);
  gameContainer.appendChild(loadPexeso());
}

function loadPexeso() {
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
  var hra3Div = document.getElementById("pexeso");
  hra3Div.id = "hra3";
  hra3Div.innerHTML = "";

  // Vytvoření elementu <div id="hra3text">
  var hra3TextDiv = document.createElement("div");
  hra3TextDiv.id = "hra3text";

  // Vytvoření elementu <h4> s odkazem
  var h4Element = document.createElement("h4");
  var aElement = document.createElement("a");
  aElement.id = "zpetUD";
  aElement.href = "ukladani-dat";
  aElement.textContent = "Zpět na teorii";
  h4Element.appendChild(aElement);

  // Vytvoření elementu <div id="hra3bubbleUvod">
  var hra3BubbleUvodDiv = document.createElement("div");
  hra3BubbleUvodDiv.id = "hra3bubbleUvod";

  // Vytvoření elementu <h4>
  var h4BubbleUvod = document.createElement("h4");
  h4BubbleUvod.textContent = "Výborně, tohle jsi zvládnul velmi dobře!";

  // Vytvoření elementu <p>
  var pElement = document.createElement("p");
  pElement.textContent = "Můžeš se vydat prozkoumat další hry.";

  // Vložení elementů do <div id="hra3bubbleUvod">
  hra3BubbleUvodDiv.appendChild(h4BubbleUvod);
  hra3BubbleUvodDiv.appendChild(pElement);


  // Vytvoření elementu <button id="hra3zacniHru">
  var buttonElement = document.createElement("button");
  buttonElement.id = "dalsiHryButton";
  buttonElement.textContent = "Další hry";
  buttonElement.addEventListener("click", function() {
    // Přejdi na jinou stránku
    window.location.href = "hry";
  });

  // Vložení elementů do <div id="hra3text">
  hra3TextDiv.appendChild(h4Element);
  hra3TextDiv.appendChild(hra3BubbleUvodDiv);
  hra3TextDiv.appendChild(buttonElement);

  // Vytvoření elementu <div id="hra3sidebar">
  var hra3SidebarDiv = document.createElement("div");
  hra3SidebarDiv.id = "hra3sidebar";

  // Vytvoření elementu <img id="hra3robot">
  var imgElement = document.createElement("img");
  imgElement.id = "hra3robot";
  imgElement.src = "../../pictures/data_storage/rob03.png";
  imgElement.alt = "Robot3";

  // Vložení elementů do <div id="hra3sidebar">
  hra3SidebarDiv.appendChild(imgElement);

  // Vložení elementů do <div id="hra3">
  hra3Div.appendChild(hra3TextDiv);
  hra3Div.appendChild(hra3SidebarDiv);    
}

</script>
<style type="text/css">
#hra3 {  
  display:grid;
  grid-template-columns: 60% 10% 30%;
  grid-template-areas: "text . robot";
}

#hra3bubbleUvod { 
  background: #A7C7E7;
  border-radius: 50px;
  text-align:center;
  padding: 1px 25px 1px 10px;
  font-size: 18px;
}

#hra3bubbleUvod:before {
  content:"";
  float:right;
  width: 0;
  height: 0;
  border-top: 13px solid transparent;
  border-left: 130px solid #A7C7E7;
  border-bottom: 13px solid transparent;
  margin: 70px -130px 50px 0px;
}

#hra3text {
  grid-area:text;
}

#hra3robot {
  grid-area:robot;
  width: 250px;
}

#pexeso {
  margin-top: 20px;
}

#pexesoTable {
  margin-top: 20px;
  display: flex;
  justify-content: center;
  background-image: "../../pictures/data_storage/rob03.png";
}

td button {
  width: 150px;
  height: 150px;
  background-image: "../../pictures/data_storage/rob03.png";
}

td {
  width: 150px;
  height: 150px;
}

#hra3zacniHru, #dalsiHryButton {
  background-color: #A7C7E7;
  border: 2px solid #A7C7E7;
  border-radius: 20px;
  color: navy;
  float: right;
  font-size: 18px;
  font-weight: bold;
  margin-top: 20px;
  padding: 15px 25px;
  text-align: center;
  width: 200px;
}

#hra3zacniHru:hover, #dalsiHryButton:hover {
  border: 2px solid navy;
}

</style>

<div id="hra3">
  <div id="hra3text">
    <h4><a id="zpetUD" href="ukladani-dat">Zpět na teorii</a></h4>
    <div id="hra3bubbleUvod">
      <h4>Orientuješ se ve vnějších pamětích?</h4>
      <p>V následujícím cvičení tě čeká pexeso na téma pamětí.
      Tvým úkolem bude ke každému popisu vybrat správný obrázek.</p> 
    </div>
    <button id="hra3zacniHru" onclick="startGame()">Začni hru</button>
  </div>
  <div id="hra3sidebar">
    <img id="hra3robot" src="../../pictures/data_storage/rob03.png" alt="Robot3">
  </div>
</div>