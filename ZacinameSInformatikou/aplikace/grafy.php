<style>
    #menu {
        border: 5px solid indigo;
    }

    #grafy {
        display:grid;
        grid-template-columns: 65% auto;
        grid-template-areas: 
            "text robot"
            "definice definice"
            "linkHra linkHra";
        margin: auto;
        width: 90%;
    }

    #textGrafy {
        grid-area: text;
    }

    #robGrafy {
        grid-area: robot;
        margin: 20px auto;
        width: 250px;
    }

    #definice {
        grid-area: definice;
        margin: 10px;
    }

    #bubbleGrafy { 
        background: #e3ccfc;
        padding: 10px 20px;
        border-radius: 50px;
        text-align:center;
    }

    #bubbleGrafy:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 80px solid #e3ccfc;
        border-bottom: 20px solid transparent;
        margin: 75px -90px 40px 0px;
    }

    #linkHra {
        grid-area: linkHra;
        text-align: center;
        font-size:  20px;
        font-weight: bold;
    }

    #linkHra:hover {
        background: #e3ccfc;
        color: black;
    }
</style>    

<div id="grafy">
    <div id="textGrafy">
        <h2>Grafy</h2>

        <div id="bubbleGrafy">
            <p><strong>Zdravím!</strong> Dnes si spolu ukážeme, co znamenájí v informatice grafy. </p>
            <p>
                Slovo <strong>graf</strong> má totiž více významů, např. grafy funkcí, sloupcové grafy pro
                zobrazování dat a ty, co nás budou zajímat - <strong>grafy reprezentující vztahy mezi objekty.</strong>
            </p>
        </div>
    </div>
    <img id="robGrafy" src="../../pictures/graphs/rob01.png" alt="Robot1">
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
    </div>
    <a id="linkHra" href="hra1">Vyzkoušej svojí představivost a zahraj si hru!</a>
</div>