<script>
    document.getElementById("menu").style.border = "5px solid indigo";

    function createJSONLink() {
        // Získáme obsah JSON z textarea
        var jsonString = document.getElementById("jsonInput").value;
        try {
            // Zakódování řetězce do URL-safe formátu
            var encodedData = jsonValidation(jsonString);
            // Vytvoření URL
            var url = "https://www.ms.mff.cuni.cz/~bohatovz/bohatova/ZacinameSInformatikou/aplikace/index.php/hra1?json=" + encodedData;
            if(url.length > 2000){
                throw new Error(`Váš graf je bohužel příliš veliký, nezvládneme ho zpracovat`);
            }
            return url;
        } catch (error) {
            // Pokud parsování selže, JSON není platný
            alert("Chyba při zpracování JSON: " + error.message);
        }
        return null;
    }

    function viewGraphLink(url){
        if(url){
            var infoText = document.getElementById("infoText");
            infoText.innerHTML = "";

            // Vytvoření prvního <p> elementu
            var paragraph1 = document.createElement('p');
            paragraph1.textContent = 'Odkaz na váš graf: ';

            // Vytvoření druhého <p> elementu pro URL
            var paragraph2 = document.createElement('p');
            paragraph2.id = "url";
            paragraph2.style.overflowWrap = "break-word";
            paragraph2.textContent = url; // Předpokládám, že 'url' je proměnná, která obsahuje URL

            // Vložení vytvořených elementů do kontejneru
            infoText.appendChild(paragraph1);
            infoText.appendChild(paragraph2);
            document.getElementById("jsonForm").remove();

            var button = document.getElementById("ulozitBtn");
            button.textContent = "Hrát";
            button.addEventListener('click', function() {
                window.location.href = url; 
            });

        }
    }

    function jsonValidation(jsonString){
        // Zkusíme zparsovat JSON
        var jsonData = JSON.parse(jsonString);
        // Další kontroly
        if (typeof jsonData.countVert !== 'number' || typeof jsonData.countEdges !== 'number' || typeof jsonData.start !== 'number' || typeof jsonData.end !== 'number') {
            throw new Error("Některé hodnoty nejsou čísla.");
        }

        if (jsonData.countVert <= 0 || jsonData.countEdges <= 0 || jsonData.start <= 0 || jsonData.end <= 0) {
            throw new Error("Všechny hodnoty musí být kladná čísla.");
        }

        if (jsonData.start > jsonData.countVert || jsonData.end > jsonData.countVert) {
            throw new Error("Hodnoty 'start' a 'end' nesmí být větší než 'countVert'.");
        }

        for (var i = 1; i <= jsonData.countVert; i++) {
            var vertex = jsonData[i];
            if (!vertex){
                throw new Error("Chybně zadaný počet vrcholů.");
            }
            if( typeof vertex.name !== 'string') {
                throw new Error("Každý vrchol musí mít vlastnost 'name' typu string.");
            }

            for (var j = 0; j < jsonData.countEdges; j++) {
                var edgeKey = String.fromCharCode('A'.charCodeAt(0) + j);
                if (!vertex.hasOwnProperty(edgeKey) || typeof vertex[edgeKey] !== 'number') {
                    throw new Error(`Vrchol ${i} musí mít vlastnost '${edgeKey}' typu number.`);
                }
            }
        }

        console.log("JSON je platný:", jsonData);
        var jsonString = JSON.stringify(jsonData);

        // Zakódování řetězce do URL-safe formátu
        var encodedData = btoa(unescape(encodeURIComponent(jsonString)));;
        return encodedData;
    }


</script>
<style type="text/css">
    #writeJSON
    {
        font-size: 18px;
        margin-left: 10px;
        margin-top: 10px;
    }
    

    #zpetHra {
        color: indigo;
        font-weight: bold;
    } 

    #ulozitBtn {
        float: right;
        width: 200px;
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

    textarea {
        font-size: 15px;
        width: 80%;
    }

    .kurziva {
        font-style: italic;
    }

    form {
        text-align: center;
    }


</style>

<div id="writeJSON">
<div id="infoJSON">
<h4><a id="zpetHra" href="hra1">Zpět na hru</a></h4>
<?php  
    if (isset($_POST["submitBtn"])) { 
        $countVert = intval($_POST["countVert"]);
        $countEdges = intval($_POST["countEdges"]);
        $start = intval($_POST["start"]);
        $end = intval($_POST["end"]);
        $alphabet = implode('', range('A', 'Z'));
    
        // Přidání hodnot před cyklem
        $json_file = array("countVert" => $countVert, "countEdges" => $countEdges, "start" => $start, "end" => $end);
    
        // Přidání členů podle vzorce
        for ($i = 1; $i <= $countVert; $i++) {
            $vertex = array("name" => "zde zadejte jmeno"); // Nastavte jméno podle potřeby
            
            for ($j = 0; $j < $countEdges; $j++) {
                $vertex[$alphabet[$j]] = "zde zadejte vrchol, do ktereho vede cesta"; // Nastavte hodnotu cesty podle potřeby
            }
            
            $json_file[$i] = $vertex;
        }
        
        // Převod na JSON
        $json_data = json_encode($json_file, JSON_PRETTY_PRINT);
        $divStyle = "display: block;";
        
    } else {
        $divStyle = "display: none;";
        echo "Chyba ve formuláři, vraťte se zpět a vyplňte formulář znovu";
    }
?> 
<div id="jsonEditor" style="<?php echo $divStyle; ?>">
<h3>JSON Editor</h3>
<div id="infoText">
<p>Zde vidíte svůj předgenerovaný JSON soubor. Za <span class="kurziva">"zde zadejte .."</span> vyplňte požadovanou hodnotu - bez uvozovek, 
např. <span class="kurziva">"A": 5,</span>.</p>
<p>Až budete mít soubor kompletní, kliknětě na "Uložit". Pokud je váš soubor validní, tak se vám vygeneruje odkaz, který vás pokaždé přesměruje 
přímo na hru s vaším konkrétním grafem. Tento odkaz si uložte, můžete ho používat opakovaně, případně sdílet s dalšími uživateli.</p>
</div>
<form id="jsonForm">
    <p><textarea id="jsonInput" rows="30" cols="60"><?php echo $json_data; ?></textarea></p>
</form>
<button id="ulozitBtn" onclick="viewGraphLink(createJSONLink())">Uložit</button>
<br>
</div>
</div>