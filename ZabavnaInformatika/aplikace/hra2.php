<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";

    function hra2zacni(){
        document.getElementById("bubbleHardw").remove();
        document.getElementById("hra2zacniHru").remove();
        document.getElementById("robHardw").remove();
    }
</script>
<style type="text/css">
    #hardware {
        display:grid;
        grid-template-columns: 70% 5% auto;
        grid-template-areas: 
            "text . robot ";
        font-size: 18px;
        margin-left: 10px;
    }

    #textHardw {
        grid-area: text;
    }

    #robHardw {
        grid-area: robot;
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


    #hra2zacniHru:hover{
        border: 2px solid #FF4F00;
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
<img id="robHardw" src="../../pictures/rob04.png" alt="Robot4" width="290">

</div>