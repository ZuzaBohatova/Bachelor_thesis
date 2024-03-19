<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";
    let lastClick = null;
    let lastIsLabel = false;
    let answers = [];

    let colors = ["blue", "green", "red", "black", "dodgerblue", "yellow", "mediumvioletred"]; 

    function generateLabelButtons(){
        var buttons = "";
        for(let i = 1; i < 8; i++){
            buttons += `<button id="hra2`+i+`" onclick="choose(`+i+`)">`+i+`</buttons>`;
        }
        return buttons;
    }

    function hra2zacni(){
        document.getElementById("bubbleHardw").remove();
        document.getElementById("hra2zacniHru").remove();
        document.getElementById("robHardw").remove();
        textHardw.innerHTML += `<div class="hra2container"><img src="../../pictures/drawing01.png" alt="Motherboard">`+generateLabelButtons()+`</div><div id="mistake"></div>`;
        sidebar.innerHTML = `<div class="components">
            <button id="hra270" onclick="choose(70)">Ethernet, USB, ...</button>
            <button id="hra210" onclick="choose(10)">Síťové, zvukové, grafické karty</button>
            <button id="hra220" onclick="choose(20)">Procesor (CPU)</button>
            <button id="hra250" onclick="choose(50)">North-South bridge chipset</button>
            <button id="hra260" onclick="choose(60)">RAM</button>
            <button id="hra240" onclick="choose(40)">HDD nebo SSD</button>
            <button id="hra230" onclick="choose(30)">Bios</button>
            </div>`;
        sidebar.innerHTML += `<button id="hra2check" onclick="check()">Zkontroluj</div>`;

        document.getElementById("sidebar").style.margin = "50px 20px 0px 0px ";
    }

    function choose(choice){
        if(lastClick == null){
            if(choice < 10){
                if(answers[choice] == null){
                    lastIsLabel = true;
                    document.getElementById("hra2"+choice).style.border = "3px solid #FFCC99"; //click
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
                    document.getElementById("hra2"+choice).style.border = "2px solid #FF4F00"; //click
                }
            }
        }
        else{
            if(lastIsLabel){
                if(choice < 10){
                    removeColor(choice);
                    removeColor(lastClick);
                    document.getElementById("hra2"+choice).style.border = "3px solid #FFCC99"; //click
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
                    document.getElementById("hra2"+choice).style.border = "2px solid #FF4F00";  //click
                    lastClick = choice;
                    lastIsLabel = false;
                }
            }
        }     
    }

    function checkColors(){
        for(let i = 1; i < answers.length; i++){
            if(answers[i] != null){
                document.getElementById("hra2"+i).style.border = "3px solid "+colors[i-1];
                document.getElementById("hra2"+answers[i]).style.border = "3px solid "+colors[i-1];
                document.getElementById("hra2"+answers[i]).style.color = colors[i-1];
            }
        }

    }

    function removeColor(choice){
        if(choice < 10){
            document.getElementById("hra2"+choice).style.border = "none";
            if(answers[choice] != null){
                document.getElementById("hra2"+answers[choice]).style.border = "2px solid #FFCC99";
                document.getElementById("hra2"+answers[choice]).style.color = "#FF4F00";
                answers[choice] = null;
            }
            
        }
        else {
            document.getElementById("hra2"+choice).style.border = "2px solid #FFCC99";
            document.getElementById("hra2"+choice).style.color = "#FF4F00";
            if(answers.includes(choice)){
                document.getElementById("hra2"+answers.indexOf(choice)).style.border = "none";
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
        // Získání reference na element, který chcete vyčistit
        var hardwareContainer = document.getElementById('hardware');

        // Vymazání obsahu
        hardwareContainer.innerHTML = '';

        // Vytvoření kontejneru pro textový obsah
        var textHardwContainer = document.createElement('div');
        textHardwContainer.id = 'textHardw';

        // Vytvoření zpětného odkazu
        var zpetHWLink = document.createElement('a');
        zpetHWLink.id = 'zpetHW';
        zpetHWLink.textContent = 'Zpět na teorii';
        zpetHWLink.href = 'hardware';
        var zpetHWHeading = document.createElement('h4');
        zpetHWHeading.appendChild(zpetHWLink);
        textHardwContainer.appendChild(zpetHWHeading);

        // Vytvoření bubliny s textem
        var bubbleHardwDiv = document.createElement('div');
        bubbleHardwDiv.id = 'bubbleHardw';

        var bubbleHardwHeading = document.createElement('h4');
        bubbleHardwHeading.textContent = 'Výborně!';
        bubbleHardwDiv.appendChild(bubbleHardwHeading);

        var bubbleHardwText = document.createElement('p');
        bubbleHardwText.textContent = 'To se ti povedlo.';
        bubbleHardwDiv.appendChild(bubbleHardwText);

        textHardwContainer.appendChild(bubbleHardwDiv);

        // Vytvoření kontejneru pro další akce
        var hra2kamDalDiv = document.createElement('div');
        hra2kamDalDiv.id = 'hra2kamDal';

        var hra2resetButton = document.createElement('button');
        hra2resetButton.id = 'hra2reset';
        hra2resetButton.textContent = 'Začít znovu';
        hra2resetButton.addEventListener('click', function() {
            location.href = 'hra2';
        });
        hra2kamDalDiv.appendChild(hra2resetButton);

        var hra2dalsiHryButton = document.createElement('button');
        hra2dalsiHryButton.id = 'hra2dalsiHry';
        hra2dalsiHryButton.textContent = 'Další hry';
        hra2dalsiHryButton.addEventListener('click', function() {
            location.href = 'hry';
        });
        hra2kamDalDiv.appendChild(hra2dalsiHryButton);

        textHardwContainer.appendChild(hra2kamDalDiv);

        // Přidání textového obsahu do dokumentu
        hardwareContainer.appendChild(textHardwContainer);

        // Vytvoření kontejneru pro sidebar
        var sidebarDiv = document.createElement('div');
        sidebarDiv.id = 'sidebar';

        var robHardwImg = document.createElement('img');
        robHardwImg.id = 'robHardw';
        robHardwImg.src = '../../pictures/rob04.png';
        robHardwImg.alt = 'Robot4';
        robHardwImg.width = '270';
        sidebarDiv.appendChild(robHardwImg);

        // Přidání sidebaru do dokumentu
        hardwareContainer.appendChild(sidebarDiv);


    }

</script>
<style type="text/css">
    #hra2kamDal button {
        background-color: #FFCC99 ;
        border: 2px solid #FFCC99 ;
        border-radius:20px;
        color: #FF4F00;
        float: right;
        font-size: 18px;
        font-weight: bold;
        margin: 20px 5px 10px 5px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #hra2kamDal button:hover {
        border: 2px solid #FF4F00;
    }

    #hardware {
        display:grid;
        grid-template-columns: 70% 5% auto;
        grid-template-areas: 
            "text . sidebar ";
        margin: auto;
        width: 90%;
    }

    #textHardw {
        grid-area: text;
    }

    #sidebar {
        grid-area: sidebar;
        margin-top: 20px;
    }

    #bubbleHardw { 
        background: #FFCC99 ;
        padding: 15px 25px 15px 25px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #bubbleHardw:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #FFCC99 ;
        border-bottom: 13px solid transparent;
        margin: 55px -100px 25px 0px;
    }

    #zpetHW {
        color: #FF4F00;
    } 

    #hra2zacniHru {
        background-color: #FFCC99 ;
        border: 2px solid #FFCC99 ;
        border-radius:20px;
        color: #FF4F00;
        float: right;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #hra2check{
        background-color: #FF4F00;
        border: 2px solid #FF4F00;
        border-radius:20px;
        color: #FFCC99;
        float: right;
        font-size: 22px;
        font-weight: bold;
        margin-top: 20%;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #hra2check:hover {
        border: 3px solid #FFCC99;
    }

    #hra2zacniHru:hover, .components button:hover{
        border: 2px solid #FF4F00;
    }

    /* Container needed to position the button. Adjust the width as needed */
    .hra2container {
        position: relative;
        grid-area: text;
    }

    /* Make the image responsive */
    .hra2container img {
        width: 100%;
        height: auto;
    }

    /* Style the button and place it in the middle of the hra2container/image */
    .hra2container #hra21 {
        top: 38%;
        left: 30%;
        width:40%;
        height:40%;
    }


    .hra2container #hra22 {
        top: 47.5%;
        left: 79.5%;
        width:15%;
        height:20%;
    }

    .hra2container #hra23 {
        top: 88%;
        left: 20%;
        width:9%;
        height:13%;
    }

    .hra2container #hra24 {
        top: 86%;
        left: 46%;
        width:18%;
        height:20%;
    }

    .hra2container #hra25 {
        top: 50%;
        left: 60.5%;
        width:15%;
        height:20%;
    }  

    .hra2container #hra26 {
        top: 73%;
        left: 70%;
        width:30%;
        height:26%;
    }

    .hra2container #hra27 {
        top: 7%;
        left: 71.5%;
        width:45%;
        height:20%;
    }    

    .hra2container button {
        position: absolute;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: transparent;
        color: #FFF5EE;
        font-size: 32px;
        border:  none;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .hra2container button:hover {
        border: 3px solid #FFCC99;
    }

    .hra2container button.click {
        position: absolute;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: transparent;
        color: #FFF5EE;
        font-size: 32px;
        border:  3px solid #FFCC99;
        border-radius: 10px;
        cursor: pointer;
        font-weight: bold;
    }

    .components {
        margin-top:10%;
    }

    .components button {
        display: block;
        background-color: #FFCC99 ;
        border: 2px solid #FFCC99 ;
        border-radius:10px;
        color: #FF4F00;
        float: right;
        font-size: 16px;
        font-weight: bold;
        margin-top: 10px;
        padding: 5px 5px;
        text-align: center;
        width: 180px;
        cursor: pointer;
    }

</style>

<div id="hardware">
<div id="textHardw">
<h4><a id="zpetHW" href="hardware">Zpět na teorii</a></h4>
<div id="bubbleHardw">
    <h3>Víš kam zapojit jednotlivé komponenty?</h3>
    <p>Nyní tě čeká hra, která ověří tvé znalosti hardwaru.</p>
    <p>Je to jednoduché. Každou komponentu spojíš se správným místem na základní desce. Hurá na to!</p>
</div>
<button id="hra2zacniHru" onclick="hra2zacni()">Začni hru</button>
</div>
<div id="sidebar">
<img id="robHardw" src="../../pictures/rob04.png" alt="Robot4" width="290">
</div>
</div>