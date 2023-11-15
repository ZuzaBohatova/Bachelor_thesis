<script>
    document.getElementById("menu").style.border = "5px solid indigo";
    
    function generateAlphabet() {
        var alphabet = '';
        for (var i = 65; i <= 90; i++) {
            alphabet += String.fromCharCode(i);
        }
        return alphabet;
    }

    function updateJson() {
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
            $vertex = array("name" => "zde zadej jmeno"); // Nastavte jméno podle potřeby
            
            for ($j = 0; $j < $countEdges; $j++) {
                $vertex[$alphabet[$j]] = "zde zadej cestu"; // Nastavte hodnotu cesty podle potřeby
            }
            
            $json_file[$i] = $vertex;
        }
        
        // Převod na JSON
        $json_data = json_encode($json_file, JSON_PRETTY_PRINT);
        echo '<form id="jsonForm">
            <p><label for="jsonInput">Vložte JSON:</label></p>
            <p><textarea id="jsonInput" rows="40" cols="50"></textarea></p>
            <p><button type="button" onclick="updateJson()">Aktualizovat JSON</button></p>
        </form>';
    } else {
            echo "Chyba ve formuláři, vraťte se zpět a vyplňte formulář znovu";
    }
?> 
<script>
    var jsonData = <?php echo $json_data; ?>;
    document.getElementById('jsonInput').value = JSON.stringify(jsonData, null, 4);
</script>
</div>