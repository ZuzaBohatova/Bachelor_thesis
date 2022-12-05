<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";
</script>
<style type="text/css">
    #hardware {
        display:grid;
        grid-template-columns: 55% 5% auto;
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
        background: #FFCC99;
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
        border-left: 100px solid #FFCC99;
        border-bottom: 13px solid transparent;
        margin: 55px -100px 25px 0px;

    }


</style>

<div id="hardware">
<div id="textHardw">

<h2>Hardware</h2>
<div id="bubbleHardw">
    <p><strong>Vítám tě ve světě hardwaru!</strong></p>
<p>Zde si spolu ukážeme z čeho se tvůj počítač skládá, 
    podíváme se na nejdůležitější součástky a vysvětlíme si, jak fungují. </p>
</div>
<p><a href="hra2">Zvládneš správně přiřadit jednotlivé komponenty na základní desku?</a></p>
</div>
<img id="robHardw" src="../../pictures/rob04.png" alt="Robot4" width="290">
