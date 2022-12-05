<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";

    function hra2zacni(){
        document.getElementById("bubbleHardw").remove();
        document.getElementById("hra2zacniHru").remove();
        document.getElementById("robHardw").remove();
        textHardw.innerHTML += `<div class="hra2container">
            <img src="../../pictures/drawing01.png" alt="Motherboard">
            <button id="hra2pci">1</button>
            <button id="hra2cpu">2</button>
            <button id="hra2bios">3</button>
            <button id="hra2disk">4</button>
            <button id="hra2chipset">5</button>
            <button id="hra2cards">6</button>
            <button id="hra2inout">7</button>
            <div>`;
        sidebar.innerHTML = `<div class="components"><button>RAM</button>
            <button>Procesor (CPU)</button>
            <button>Bios</button>
            <button>HDD nebo SSD</button>
            <button>North-South bridge chipset</button>
            <button>Síťové, zvukové, grafické karty</button>
            <button>Ethernet, USB, ...</button>
            </div>`;
        document.getElementById("sidebar").style.margin = "50px 20px 0px 0px ";
    }

</script>
<style type="text/css">
    #hardware {
        display:grid;
        grid-template-columns: 70% 5% auto;
        grid-template-areas: 
            "text . sidebar ";
        font-size: 18px;
        margin-left: 10px;
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

    #zpetCS {
        color: #FF4F00;
        font-weight: bold;
        margin-top: 10px;
    } 

    #hra2zacniHru{
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
    .hra2container #hra2pci {
        position: absolute;
        top: 40%;
        left: 30%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: transparent;
        color: white;
        font-size: 25px;
        padding: 5px 50px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }

    .hra2container #pci:hover {
        border: 1px solid #E97451;
        background-color: #FBCEB1
    }

    .har2container

    .components button {
        display: block;
        background-color: #FBCEB1 ;
        border: 2px solid #FBCEB1 ;
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

</style>

<div id="hardware">
<div id="textHardw">
<h4><a id="zpetCS" href="hardware">Zpět na teorii</a></h4>
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