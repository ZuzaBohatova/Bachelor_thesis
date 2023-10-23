<script>
    document.getElementById("menu").style.border = "5px solid indigo";
    function vyberObtiznost(){
        // Vytvoření nadpisu h3
        var heading = document.createElement("h3");
        heading.textContent = "Vyber si obtížnost!";

        // Vytvoření odstavce
        var paragraph = document.createElement("p");
        paragraph.textContent = "Mám tu pro tebe na výběr několik obtížností, pokud se s grafy vídíš prvně, ideální bude začít od nejlehčí.";

        // Získání cílového elementu
        var bubbleGrafyHra = document.getElementById("bubbleGrafyHra");
        bubbleGrafyHra.innerHTML = "";

        // Přidání vytvořených elementů do cílového elementu
        bubbleGrafyHra.appendChild(heading);
        bubbleGrafyHra.appendChild(paragraph);
        document.getElementById("hra1vyberObtiznost").remove();
        
    }
</script>
<style type="text/css">
    #grafyHra
    {
        display:grid;
        grid-template-columns: 60% 5% auto;
        grid-template-areas: 
            "text . sidebar ";
        font-size: 18px;
        margin-left: 10px;
    }

    #textGrafyHra {
        grid-area: text;
    }

    #sidebar {
        grid-area: sidebar;
        margin-top: 20px;
    }

    #bubbleGrafyHra { 
        background: #e3ccfc ;
        padding: 15px 25px 15px 25px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #bubbleGrafyHra:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #e3ccfc ;
        border-bottom: 13px solid transparent;
        margin: 55px -100px 25px 0px;
    }

    #zpetGrafy {
        color: indigo;
        font-weight: bold;
        margin-top: 10px;
    } 

    #hra1vyberObtiznost {
        background-color: #e3ccfc ;
        border: 2px solid #e3ccfc ;
        border-radius:20px;
        color: indigo;
        float: right;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }


    #hra1vyberObtiznost:hover{
        border: 2px solid indigo;
    }

    

</style>

<div id="grafyHra">
<div id="textGrafyHra">
<h4><a id="zpetGrafy" href="grafy">Zpět na teorii</a></h4>
<div id="bubbleGrafyHra">
    <h3>Dokážeš najít cestu k cíly?</h3>
    <p>Spolu si dnes vyzkoušíme vizualizaci grafů. Budeš potřebovat tužku a papír.</p>
    <p>Hru si můžeš si to představit jako <strong>cestu městem</strong>, kdy se chceme dostat třeba domova do cukrárny. 
        Z každého místa vede několik cest, ty je budeš postupně procházet 
        a vznikající graf si zakreslovat na papír.</p>
    <p><strong>Jsem zvědavý, jak rychle se dostaneš do cíle!</strong></p>
</div>
<button id="hra1vyberObtiznost" onclick="vyberObtiznost()">Vyber obtížnost</button>
</div>
<div id="sidebar">
<img id="robGrafy" src="../../pictures/rob01.png" alt="Robot1" width="270">
</div>
</div>