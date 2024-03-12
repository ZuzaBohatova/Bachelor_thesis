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
    var gameContainer = document.getElementById("Game3");
    gameContainer.innerHTML = "";
    gameContainer.id = "Pexeso";

    var title = document.createElement("h2");
    title.textContent = "Pexeso";
    const shuffledCards = shuffle(cards);

    // Vytvoření pole pexesoCards jako 4x3 mřížky ze zamíchaného pole cards
    for (let i = 0; i < 3; i++) {
      const row = shuffledCards.slice(i * 4, (i + 1) * 4);
      pexesoCards.push(row);
    }

    gameContainer.appendChild(title);
    gameContainer.appendChild(loadPexeso());
  }

  function loadPexeso() {
    var table = document.createElement('table');
    table.id = "PexesoTable";

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
    const buttons = document.querySelectorAll('#PexesoTable button');
    buttons.forEach(button => {
      if (button.dataset.clicked !== "true") {
        button.disabled = true;
      }
    });
  }

  function enableAllButtons() {
    const buttons = document.querySelectorAll('#PexesoTable button');
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
    document.getElementById("PexesoTable").remove();
    var Game3Div = document.getElementById("Pexeso");
    Game3Div.id = "Game3";
    Game3Div.innerHTML = "";

    // Vytvoření elementu <div id="Game3text">
    var Game3TextDiv = document.createElement("div");
    Game3TextDiv.id = "Game3text";

    // Vytvoření elementu <h4> s odkazem
    var h4Element = document.createElement("h4");
    var aElement = document.createElement("a");
    aElement.id = "BackToTheory";
    aElement.href = "ukladani-dat";
    aElement.textContent = "Zpět na teorii";
    h4Element.appendChild(aElement);

    // Vytvoření elementu <div id="Game3Bubble">
    var Game3BubbleDiv = document.createElement("div");
    Game3BubbleDiv.id = "Game3Bubble";

    // Vytvoření elementu <h4>
    var h4BubbleUvod = document.createElement("h4");
    h4BubbleUvod.textContent = "Výborně, tohle jsi zvládnul velmi dobře!";

    // Vytvoření elementu <p>
    var pElement = document.createElement("p");
    pElement.textContent = "Můžeš se vydat prozkoumat další hry.";

    // Vložení elementů do <div id="Game3Bubble">
    Game3BubbleDiv.appendChild(h4BubbleUvod);
    Game3BubbleDiv.appendChild(pElement);


    // Vytvoření elementu <button id="StartGameBtn">
    var buttonElement = document.createElement("button");
    buttonElement.id = "OtherGamesBtn";
    buttonElement.textContent = "Další hry";
    buttonElement.addEventListener("click", function() {
      // Přejdi na jinou stránku
      window.location.href = "hry";
    });

    // Vložení elementů do <div id="Game3text">
    Game3TextDiv.appendChild(h4Element);
    Game3TextDiv.appendChild(Game3BubbleDiv);
    Game3TextDiv.appendChild(buttonElement);

    // Vytvoření elementu <img id="Game3robot">
    var imgElement = document.createElement("img");
    imgElement.id = "Game3robot";
    imgElement.src = "../../pictures/data_storage/rob03.png";
    imgElement.alt = "Robot3";

    // Vložení elementů do <div id="Game3">
    Game3Div.appendChild(Game3TextDiv);
    Game3Div.appendChild(imgElement);    
  }

</script>

<style type="text/css">
#Game3 {  
  display:grid;
  grid-template-columns: 60% 10% 30%;
  grid-template-areas: "text . robot";
  margin: auto;
}

#Game3Bubble { 
  background: #A7C7E7;
  border-radius: 50px;
  text-align:center;
  padding: 1px 25px 1px 10px;
  font-size: 18px;
}

#Game3Bubble:before {
  content:"";
  float:right;
  width: 0;
  height: 0;
  border-top: 13px solid transparent;
  border-left: 140px solid #A7C7E7;
  border-bottom: 13px solid transparent;
  margin: 80px -130px 50px 0px;
}

#Game3text {
  grid-area:text;
}

#Game3robot {
  grid-area:robot;
  width: 270px;
}

#PexesoTable {
  margin: 20px auto;
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

#StartGameBtn, #OtherGamesBtn {
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

#StartGameBtn:hover, #OtherGamesBtn:hover {
  border: 2px solid navy;
}

#BackToTheory {
  color: rgb(27, 54, 143);
}

</style>

<div id="Game3">
  <div id="Game3text">
    <h4><a id="BackToTheory" href="ukladani-dat">Zpět na teorii</a></h4>
    <div id="Game3Bubble">
      <h4>Orientuješ se ve vnějších pamětích?</h4>
      <p>V následujícím cvičení tě čeká Pexeso na téma pamětí.
      Tvým úkolem bude ke každému popisu vybrat správný obrázek.</p> 
    </div>
    <button id="StartGameBtn" onclick="startGame()">Začni hru</button>
  </div>
  <img id="Game3robot" src="../../pictures/data_storage/rob03.png" alt="Robot3">
</div>