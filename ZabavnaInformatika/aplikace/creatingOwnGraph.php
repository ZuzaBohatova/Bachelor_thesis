<script>
    document.getElementById("menu").style.border = "5px solid indigo";
    
    function validateForm() {
        var countVert = parseInt(document.getElementById('countVert').value);
        var start = parseInt(document.getElementById('start').value);
        var end = parseInt(document.getElementById('end').value);

        if (start > countVert || end > countVert) {
            alert('Počáteční a konečný vrchol nemůžou mít větší číslo než je počet vrcholů!');
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
<style type="text/css">
    #creatingOwnGraph
    {
        display: grid;
        grid-template-columns: 60% auto;
        grid-template-areas: 
            "text sidebar";
        font-size: 18px;
        margin-left: 10px;
        margin-top: 10px;
    }
    
    #infoText {
        grid-area: text;
    }

    #sidebar {
        grid-area: sidebar;
        margin-top: 20px;
    }

    #zpetHra {
        color: indigo;
        font-weight: bold;
    } 


    button {
        background-color: #e3ccfc ;
        border: 2px solid #e3ccfc ;
        border-radius:15px;
        color: indigo;
        font-size: 16px;
        font-weight: bold;
        padding: 10px 10px;
    }
    
    button:hover {
        border: 2px solid indigo;
    }

    fieldset {
        border-width: 3px; 
        border-color: indigo; 
    }

    legend {
        color: indigo;
    }

    input {
        float: right;
        width: 40%;
    }

    form {
        width: 90%;
        margin: auto;
    }

    #generujSablonu {
        width: 100%;
    }
</style>

<div id="creatingOwnGraph">
<div id="infoText">
<h4><a id="zpetHra" href="hra1">Zpět na hru</a></h4>
<h3>Vytvořte si vlastní graf</h3>
<h4>Jak na to?</h4>
<p>Graf nahráváme ve formátu <strong>.json</strong>. Vzorový .json obsahuje:
    <ul>
        <li>countEdges - počet hran od každého vrcholu</li>
        <li>countVert - počet vrcholů grafu</li>
        <li>start - vrchol, kde v grafu začínáme</li>
        <li>end - vrchol, do kterého se chceme dostat</li>
        <li>jednotlivé vrcholy očíslované od 1 do n, obsahující jméno vrcholu a cesty z vrcholu značené A, B, C,...</li>
    </ul>
</p>
<p>JSON soubor si spolu předgenerujeme, a vy si do něj poté doplníte jména vrcholů a cesty, které z nich vedou.</p>
<form action="hra1-napis-json" method="post" onsubmit="return validateForm()">
    <fieldset>
        <legend><strong>Vygeneruj si šablonu</strong></legend>
        <p>
        <label for="countVert">Počet vrcholů:</label>
        <input type="number" id="countVert" name="countVert" min="2" required>
        </p>
        <p>
        <label for="countEdges">Cest z vrcholu:</label>
        <input type="number" id="countEdges" name="countEdges" min="1" required>
        </p>
        <label for="start">Počáteční vrchol:</label>
        <input type="number" id="start" name="start" min="1" required>
        <p>
        <label for="end">Konečný vrchol:</label>
        <input type="number" id="end" name="end" min="1" max=required>
        </p>
        <button id="generujSablonu" name="submitBtn" type="submit">Vygeneruj šablonu</button>
    </fieldset>
</form>

</div>
<div id="sidebar"><img id="jsonExample" src="../../pictures/json-example.png" alt="Příklad JSON" width="300"></div>
</div>