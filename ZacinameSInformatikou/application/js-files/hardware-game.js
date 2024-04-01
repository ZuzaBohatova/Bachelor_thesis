let lastClick = null;
let lastIsLabel = false;
let answers = [];

let colors = ["blue", "green", "red", "black", "dodgerblue", "yellow", "mediumvioletred"]; 

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

function createImage(id, src, alt){
    var image = document.createElement('img');
    image.id = id;
    image.src = src;
    image.alt = alt;
    return image;
}

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

    // Přidání postranního panelu
    document.getElementById('sidebar').appendChild(sidebar);

    // Vytvoření tlačítka pro kontrolu
    var checkButton = document.createElement('button');
    checkButton.id = 'checkGame';
    checkButton.textContent = 'Zkontroluj';
    checkButton.setAttribute('onclick', 'check()');
    document.getElementById('sidebar').appendChild(checkButton);

    document.getElementById("sidebar").style.margin = "50px 20px 0px 0px ";
}

function generateLabelButtons(){
    var buttons = "";
    for(let i = 1; i < 8; i++){
        buttons += `<button id="hra4`+i+`" onclick="choose(`+i+`)">`+i+`</buttons>`;
    }
    return buttons;
}

function createItemButton(i){
    var buttonIds = [70, 10, 20, 50, 60, 40, 30];
    var buttonNames = ['Ethernet, USB, ...', 'Síťové, zvukové, grafické karty', 'Procesor (CPU)', 'North-South bridge chipset', 'RAM', 'HDD nebo SSD', 'Bios'];
    var button = document.createElement('button');
    button.id = "hra4"+buttonIds[i];
    button.textContent = buttonNames[i];
    button.setAttribute('onclick', 'choose(' + buttonIds[i] + ')');
    return button;
}

function choose(choice){
    if(lastClick == null){
        if(choice < 10){
            if(answers[choice] == null){
                lastIsLabel = true;
                document.getElementById("hra4"+choice).style.border = "3px solid #FFCC99"; //click
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
                document.getElementById("hra4"+choice).style.border = "3px solid #FF4F00"; //click
            }
        }
    }
    else{
        if(lastIsLabel){
            if(choice < 10){
                removeColor(choice);
                removeColor(lastClick);
                document.getElementById("hra4"+choice).style.border = "3px solid #FFCC99"; //click
                lastClick = choice;
            }
            else {
                removeColor(choice);
                removeColor(lastClick);
                answers[lastClick] = choice;
                checkColors();
                lastIsLabel = false;
                lastClick = null;
            }
        }
        else {
            if(choice < 10){
                removeColor(choice);
                removeColor(lastClick);
                answers[choice] = lastClick;
                checkColors();
                lastIsLabel = false;
                lastClick = null;
            }
            else{
                removeColor(choice);
                removeColor(lastClick);
                document.getElementById("hra4"+choice).style.border = "3px solid #FF4F00";  //click
                lastClick = choice;
                lastIsLabel = false;
            }
        }
    }     
}

function checkColors(){
    for(let i = 1; i < answers.length; i++){
        if(answers[i] != null){
            document.getElementById("hra4"+i).style.border = "2px solid "+colors[i-1];
            document.getElementById("hra4"+answers[i]).style.border = "2px solid "+colors[i-1];
            document.getElementById("hra4"+answers[i]).style.color = colors[i-1];
        }
    }

}

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

function check(){
    var right = true;
    for(let i = 1; i < 8; ++i){
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

function createLocationButton(id,text,location){
    var locationButton = document.createElement('button');
    locationButton.id = id;
    locationButton.textContent = text;
    locationButton.addEventListener('click', function() {
        window.location.href = location;
    });
    return locationButton;
}