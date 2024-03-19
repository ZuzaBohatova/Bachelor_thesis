<style>
    #menu {
        border: 5px solid #138808
    }

    #ciselneSoustavy {
        display:grid;
        grid-template-columns: 70% auto;
        grid-template-areas: 
            "text robot"
            "animace prevod"
            "desitka mocniny"
            "linkHra linkHra";
        margin: auto;
        width: 90%;
    }

    #textCisS {
        grid-area: text;
    }

    #robot {
        grid-area: robot;
        width: 290px;
        margin: auto;
    }

    #bubbleCisS { 
        background: lightgreen;
        padding: 10px 20px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #bubbleCisS:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid lightgreen;
        border-bottom: 13px solid transparent;
        margin: 70px -100px 25px 0px;
    }

    #prevodDo2 {
        grid-area:animace;
        font-size: 18px;
        padding-right: 20px;
    }

    #prevod2Obr {
        grid-area: prevod;
        width: 270px;
        margin: 40px auto;
    }

    #mocniny2 {
        grid-area:mocniny;
        width: 100px;
        margin:auto;
    }

    #prevod10 {
        grid-area:desitka;
    }

    #linkHra {
        grid-area: linkHra;
        margin-top: 20px;
        text-align: center;
        font-size:20px;
        font-weight: bold;
    }

    #linkHra:hover {
        background: lightgreen;
        color: black;
    }

    h3 {
        background: lightgreen;
        text-align: center;
    }
</style>

<div id="ciselneSoustavy">
    <div id="textCisS">
        <h2>Číselné soustavy</h2>
        <div id="bubbleCisS">
            <p>
                <strong>Ahooj!</strong> Jistě znáš čísla v desítkové soustavě - 3, 42, 907 ... 
                Ale ve světě počítačů hraje prim dvojková soustava, tedy čísla z 0 a 1.
            </p>
            <p>
                <strong>Ale proč? </strong>Abychom data mohli přenášet a ukládat, musí jim rozumět přenosová media - kabely, elektrické obvody. 
                Kdybychom převáděli do elektrické podoby čísla 0-9, naše systémy by byly pomalé a poruchové. 
                Proto používáme jen 0 a 1, elektrickým obvodům stačí rozeznávat dva stavy, např. vypnuto/zapnuto.
            </p>
        </div>
    </div>
    <img id="robot" src="../../pictures/number_systems/rob02.png" alt="Robot2">

    <div id="prevodDo2">
        <h3>Jak převádět čísla do dvojkové soustavy? </h3>
        <p>
            Jak vidíte na obrázku, číslo v desítkové soustavě <strong>dělíme 2</strong>, dokud to jde. Vedle si <strong>zapisujeme zbytek</strong> po dělení, který je vždy 1 nebo 0. 
            Zbytky seřadíme od posledního k prvnímu a tak dostaneme naše číslo ve dvojkové soustavě.</p>
        <p><strong>45 zapíšeme ve dvojkové soustavě jako 101101</strong></p><br>
    </div>
    <img id="prevod2Obr" src="../../pictures/number_systems/prevod2zel.png" alt="Převod do dvojkové soustavy">

    <div id="prevod10">
        <h3>A teď zpátky do desítkové!</h3>
        <p>Tady to bude o něco těžší. Důležité je znát <strong>mocniny dvojky</strong>. </p>
        <p>
            Vezmeme číslo ve dvojkové soustavě a očíslujeme ho odzadu a začneme číslovat od nuly. Každé číslo reprezentuje danou mocninu dvojku.
            Pro nulu máme 2 na 0, pro jedničku 2 na 1 a tak dále. Vezmeme poslední číslici a vynásobíme ji její přiřazenou mocninou dvojky. 
            To samé postupně provedeme se každou číslicí našeho čísla. Všechny násobky poté sečteme. 
        </p>
        <p><strong>Hurá máme zpátky naše číslo 45. </strong></p>
    </div>
    <img id="mocniny2" src="../../pictures/number_systems/mocniny2.png" alt="Mocniny dvou">
    <a id="linkHra" href="hra4">Zkus si pár příkladů sám</a>
</div>