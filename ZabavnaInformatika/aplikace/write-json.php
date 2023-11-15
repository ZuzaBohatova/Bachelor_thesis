<script>
    document.getElementById("menu").style.border = "5px solid indigo";
    
    function generateAlphabet() {
        var alphabet = '';
        for (var i = 65; i <= 90; i++) {
            alphabet += String.fromCharCode(i);
        }
        return alphabet;
    }

    function createJSONLink() {
        var userInput = document.getElementById('jsonInput').value;
        try {
            // Zkusíme přečíst uživatelský vstup jako JSON
            var parsedJson = JSON.parse(userInput);

            // Zde můžete s novým JSON dále pracovat, např. zpracovat, uložit nebo odeslat na server
            console.log(parsedJson);
        } catch (error) {
            // Pokud dojde k chybě při parsování JSON
            console.error("Chyba při parsování JSON:", error.message);
        }
    }

    function createJSON(jsonData){
        document.getElementById('jsonInput').value = JSON.stringify(jsonData, null, 4);
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
        $countVert = $_POST["countVert"];
        $countEdges = $_POST["countEdges"];
        $start = $_POST["start"];
        $end = $_POST["end"];
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
        echo '
        <h3>JSON Editor</h3>
        <p>Zde vidíte svůj předgenerovaný JSON soubor. Za <span class="kurziva">"zde zadejte .."</span> vyplňte mezi uvozovky požadovanou hodnotu.</p>
        <p>Až budete mít soubor kompletní, kliknětě na "Uložit". Pokud je váš soubor validní, tak se vám vygeneruje odkaz, který vás pokaždé přesměruje 
        přímo na hru s vaším konkrétním grafem. Tento odkaz si uložte, můžete ho používat opakovaně, případně sdílet s dalšími uživateli.</p>
        <form id="jsonForm">
            <p><textarea id="jsonInput" rows="30" cols="60"></textarea></p>
            <p><button id="ulozitBtn" type="submit" onclick="createJSONLink()">Uložit</button></p>
        </form>';
    } else {
            echo "Chyba ve formuláři, vraťte se zpět a vyplňte formulář znovu";
    }
?> 
<script>createJSON(<?php echo $json_data; ?>)</script>
</div>