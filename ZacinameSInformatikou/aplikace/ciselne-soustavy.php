<link rel="stylesheet" type="text/css" href="../../css-files/ciselne-soustavy.css">

<div id="ciselneSoustavy">
<div id="textCisS">

<h2>Číselné soustavy</h2>
<div id="bubbleCisS">
    <p><strong>Ahooj!</strong> Jistě znáš čísla v desítkové soustavě - 3, 42, 907 ... 
Ale ve světě počítačů hraje prim dvojková soustava, tedy čísla z 0 a 1.</p>
<p><strong>Ale proč? </strong>Abychom data mohli přenášet a ukládat, musí jim rozumět přenosová media - kabely, elektrické obvody. 
Kdybychom převáděli do elektrické podoby čísla 0-9, naše systémy by byly pomalé a poruchové. 
Proto používáme jen 0 a 1, elektrickým obvodům stačí rozeznávat dva stavy, např. vypnuto/zapnuto.</p>
</div>

</div>
<img id="robCisS" src="../../pictures/rob02.png" alt="Robot2" width="290">

<div id="prevodDo2">
<h3>Jak převádět čísla do dvojkové soustavy? </h3>
<p>Jak vidíte na obrázku, číslo v desítkové soustavě <strong>dělíme 2</strong>, dokud to jde. Vedle si <strong>zapisujeme zbytek</strong> po dělení, který je vždy 1 nebo 0. 
Zbytky seřadíme od posledního k prvnímu a tak dostaneme naše číslo ve dvojkové soustavě.</p>
<p><strong>45 zapíšeme ve dvojkové soustavě jako 101101</strong></p><br>

</div>
<div id="prevod10">
<h3>A teď zpátky do desítkové!</h3>
<p>Tady to bude o něco těžší. Důležité je znát <strong>mocniny dvojky</strong>. </p>
<p>Vezmeme číslo ve dvojkové soustavě a očíslujeme ho odzadu a začneme číslovat od nuly. Každé číslo reprezentuje danou mocninu dvojku.
    Pro nulu máme 2 na 0, pro jedničku 2 na 1 a tak dále. Vezmeme poslední číslici a vynásobíme ji její přiřazenou mocninou dvojky. 
    To samé postupně provedeme se každou číslicí našeho čísla. Všechny násobky poté sečteme. </p>
<p><strong>Hurá máme zpátky naše číslo 45. </strong></p>
<h3><a href="hra4">Zkus si pár příkladů sám</a><h3>
</div>


<img id="prevod2Obr" src="../../pictures/prevod2zel.svg" alt="Převod do dvojkové soustavy">
<img id="mocniny2" src="../../pictures/mocniny2.png" alt="Mocniny dvou">
</div>
