<script>
    document.getElementById("menu").style.border = "5px solid darkgreen";
</script>
<style type="text/css">
    #ciselneSoustavy {
        display:grid;
        grid-template-columns: 65% 5% 30%;
        grid-template-rows: 35% auto;
        grid-template-areas: 
            "text text robot"
            "animace animace robot";
    }

    #textCisS {
        grid-area: text;
    }

    #robCisS {
        grid-area: robot;
    }

    #bubbleCisS { 
        background: lightgreen;
        padding: 10px 25px 3px 10px;
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
        border-left: 55px solid lightgreen;
        border-bottom: 13px solid transparent;
        margin: 120px -74px 25px 0px;

    }

    #prevodDo2 {
        grid-area:animace;
    }


</style>

<div id="ciselneSoustavy">
<div id="textCisS">
<h1>Číselné soustavy</h1>
<div id="bubbleCisS">
    <p><strong>Ahooj!</strong> Určitě znáš čísla v desítkové soustavě - 3, 42, 907 ... 
Ale ve světě počítačů hraje prim dvojková soustava, tedy čísla z 0 a 1.<br>
<strong>Ale proč? </strong>Abychom data mohli přenášet a ukládat, musí jim rozumět přenosová media - kabely a různé elektrické obvody. 
Kdybychom měli převádět čísla 0-9 do elektrické podoby, naše systémy by byly složité, pomalé a hlavně poruchové. 
Proto používáme jen 0 a 1, elektrickým obvodům pak stačí rozeznávat jen dva stavy, např. vypnuto/zapnuto.</p>
</div>

</div>
<img id="robCisS" src="../../pictures/rob02.svg" alt="Robot2" width="300">

<div id="prevodDo2">
<h2>Jak převádět čísla do desítkové soustavy? </h2>
<p>Princip je jednoduchý. Číslo dělíme 2, dokud je to možné. Zapisujeme si zbytek po dělení, který je vždy 1 nebo 0. 
Tato řada 1 a 0 s posledním zbytkem na začátku je naše původní číslo ve dvojkové soustavě. </p>
<img id="prevod2" src="../../pictures/prevod2zel.svg" alt="Převod do dvojkové soustavy" width="300">
</div>
