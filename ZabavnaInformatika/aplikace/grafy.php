<link rel="stylesheet" type="text/css" href="../../css-files/grafy.css">

<div id="grafy">

    <div id="textGrafy">
        <h2>Grafy</h2>

        <div id="bubbleGrafy">
            <p><strong>Zdravím!</strong> Dnes si spolu ukážeme, co znamenájí v informatice grafy. </p>
        <p>Slovo <strong>graf</strong> má totiž více významů, např. grafy funkcí, sloupcové grafy pro
        zobrazování dat a ty, co nás budou zajímat - <strong>grafy reprezentující vztahy mezi objekty.</strong></p>
        </div>
    </div>
    <img id="robGrafy" src="../../pictures/rob01.png" alt="Robot1" width="250">
    <div id="definice">
        <p><strong>Graf</strong> je tvořen <strong>hranami a vrcholy</strong>. Hrana musí být zakončena vrcholy z obou stran. 
            Můžeme si to představit jako puntíky spojené čarami.
        </p>
        <h4><strong>Co můžeme grafy modelovat?</strong></h4>
        <ul>
            <li>Sociální sítě - vrcholy jsou lidé a hrany přátelství mezi nimi</li>
            <li>Města (vrcholy) a silnice (hrany), které je propojují</li>
            <li>Webové stránky - stránky = vrcholy a odkazy = hrany</li>
        </ul>
        <h4><strong>K čemu grafy slouží?</strong></h4>
        <ul>
            <li><strong>Nejkratší cesty</strong> - hledáme nejkratší cestu mezi vrcholy A a B</li>
            <li><strong>Izomorfní grafy</strong> - hledáme grafy, kde mají vrcholy stejná spojení</li>
        </ul>
        <h4><strong>Orientované vs. Neorientované grafy</strong></h4>
        <ol>
            <li><strong>Orientované grafy</strong> - víme, odkud kam hrana vede, jsou to takové jednosměrky</li>
            <li><strong>Neorientované grafy</strong> - můžeme hranou chodit tam i zpět</li>
        </ol>
        <h4><strong>Jaké máme typy grafů?</strong></h4>
        <ol>
            <li><strong>Cesta</strong> - posloupnost vrcholů, kde je jen jeden způsob jako se dostat z vrcholu A do vrcholu B</li>
            <li><strong>Kružnice (cyklus)</strong> - graf se skládá z uzavřené posloupnosti vrcholů </li>
            <li><strong>Strom</strong> - graf bez kružnic, kde mezi každými dvěma vrcholy existuje cesta
                <ul>
                    <li>Stěžejní struktura - reprezentuje např. adresáře</li>
                    <li>Existuje zde jeden kořen - nemá žádného předka a může obsahovat potomky</li>
                    <li>List - poslední vrchol, který nemá žádného potomka</li>
                    <li>Více stromů = les</li>
                </ul>
            </li>            
        </ol>
        <h4><a id="hra1" href="hra1">Vyzkoušej svojí představivost a zahraj si hru!</a></h4>
    </div>
</div>


