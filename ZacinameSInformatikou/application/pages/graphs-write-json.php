<link rel="stylesheet" href="../css-files/graphs.css" type="text/css">
<script src="../js-files/graphs-create-own-graph.js"></script>
<div id="writeJSON" class="mainPage">
    <div id="infoJSON">
        <h4><a id="backGame" href="grafy-hra">Zpět na hru</a></h4>
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
                <p>
                    Zde vidíte svůj předgenerovaný JSON soubor. 
                    Za <i>"zde zadejte .."</i> vyplňte požadovanou hodnotu - bez uvozovek, např. <i>"A": 5,</i>.
                </p>
                <p>
                    Až budete mít soubor kompletní, kliknětě na "Uložit". Pokud je váš soubor validní, tak se vám vygeneruje odkaz, který vás pokaždé přesměruje přímo na hru s vaším konkrétním grafem. Tento odkaz si uložte, můžete ho používat
                    opakovaně, případně sdílet s dalšími uživateli.
                </p>
            </div>
            <form id="jsonForm">
                <p><textarea id="jsonInput" rows="30" cols="60"><?php echo $json_data; ?></textarea></p>
            </form>
            <button id="saveButton" onclick="viewGraphLink(createJSONLink())">Uložit</button>
            <br />
        </div>
    </div>
</div>