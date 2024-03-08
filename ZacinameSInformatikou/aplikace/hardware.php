<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";
</script>
<style type="text/css">
    #hardware {
        display:grid;
        grid-template-columns: 65% 5% auto;
        grid-template-areas: 
            "info . robot "
            "text text image";
        font-size: 18px;
        margin-left: 10px;
    }

    #infoHardw {
        grid-area: info;
    }

    #robHardw {
        grid-area: robot;
        margin-top: 20px;
    }

    #textHard {
        grid-area: text;
        font-size: 16px;

    }

    #imagePanel {
        grid-area: image;
    }

    #bubbleHardw { 
        background: #FFCC99;
        padding: 15px 25px 15px 25px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #bubbleHardw:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #FFCC99;
        border-bottom: 13px solid transparent;
        margin: 55px -100px 25px 0px;
    }

    h4 {
        background: #FFCC99;
        text-align: center;
        font-size: 18px;
    }

</style>

<div id="hardware">
    <div id="infoHardw">

        <h2>Hardware</h2>
        <div id="bubbleHardw">
            <p><strong>Vítám tě ve světě hardwaru!</strong></p>
            <p>Zde si spolu ukážeme z čeho se tvůj počítač skládá, 
            podíváme se na nejdůležitější součástky a vysvětlíme si, jak fungují. </p>
        </div>
        
    </div>
    <div id="textHard">
        <h4>Základní deska</h4>
        <p>
            Základní deska (v angličtině motherboard) je klíčovou součástí počítače, notebooku, jakékoliv elektroniky. 
            Je to velká deska, na které jsou umístěny další důležité součásti počítače a propojovací body.
            Propojuje všechny hardwarové komponenty počítače a zajišťuje, aby spolu navzájem spolupracovali.
        </p>
        <h4>Procesor (CPU) </h4>
        <p>Procesor (CPU, central processing unit) je hlavní část počítače, která provádí všechny výpočty a řídí běh programů.
            CPU zpracovává instrukce a data podle toho, co mu říká operační systém a programy, které používáte. 
            Pomocí různých částí a funkcí CPU počítač provádí všechny úkony, které vidíte na obrazovce, jako je spouštění aplikací, prohlížení internetu nebo hraní her.
        </p>
        <h4>Čipová sada (chipset)</h4>
        <p>Čipová sada řídí základní desku a zajišťuje komunikaci mezi jednotlivými komponentami. 
            Existují dva typy čipové sady - North-South Bridge Design a One Chip Design. One Chip Design se skládá, 
            jak je z názvu jasné, z jednoho čipu a používá se např. v chytrých telefonech. 
        </p>
        <p>North-South Bridge Design najdeme u většiny počítačů, notebooků a serverů. Skládá se ze dvou čipů - North Bridge a South Bridge.
            North Bridge zajišťuje komunikaci s grafickou kartou, operační pamětí a procesorem. Nachází se blíže k procesoru.
            South Bridge se stará o komunikaci s ostatními komponentami - s rozšiřujícími kartami, disky, řadiči externích rozhraní a zprostředkovává služny BIOSu.
            Bývá umístěn blíže slotů pro rozšiřující karty.
        </p>
        <h4>Ethernet a USB</h4>
        <p>Ethernet je port na základní desce, který umožňuje připojení k internetu pomocí kabelu. 
            USB porty slouží k připojení různých zařízení, jako jsou myši, klávesnice, tiskárny a USB flash disky. 
            Tyto porty bývají umístěny na okraji základní desky, aby byly snadno dostupné.</p>
        <h4>Síťové, zvukové, grafické karty</h4>
        <p>Síťová karta umožňuje počítači připojit se k síti, jako je internet, buď pomocí ethernetového kabelu nebo bezdrátově pomocí Wi-Fi. 
        <p>   Zvuková karta zpracovává zvukové signály a umožňuje poslech zvuku nebo nahrávání zvuku pomocí reproduktorů nebo sluchátek. </p>
        <p>    Grafická karta se stará o zobrazování obrázků na monitoru a umožňuje hraní her nebo sledování videí ve vysokém rozlišení. </p>
            Tyto karty jsou obvykle umístěny do slotů na základní desce, které jsou určeny pro tento účel.</p>
        <h4>RAM (paměť)</h4>
        <p>RAM (Random Access Memory) RAM (Random Access Memory) je operační paměť počítače. 
            Ta slouží k dočasnému ukládání dat a instrukcí, se kterými právě počítač pracuje.
             RAM umožňuje rychlý přístup k těmto datům a instrukcím, což zvyšuje výkon počítače. 
             Když vypnete počítač, data uložená v RAM se ztratí, protože RAM je paměť typu "volatilní", 
             což znamená, že je ztracena při vypnutí elektrického napájení.
             Je umístěna na základní desce v podobě malých modulů, které se zapojují do speciálních slotů</p>
        <h4>HDD nebo SSD</h4>
        <p>HDD (Hard Disk Drive) a SSD (Solid State Drive) jsou paměťová zařízení, která uchovávají data na počítači. 
            HDD používá rotační disky k ukládání a čtení dat, zatímco SSD používá paměťové čipy, což umožňuje rychlejší přístup k datům. 
            Obě tyto zařízení jsou připojena k základní desce pomocí kabelů nebo speciálních konektorů.</p>
        <h4>BIOS</h4>
        <p>BIOS (Basic Input/Output System) je software uložený na základní desce, který se spouští při zapnutí počítače. 
            Je to základní systém, který provádí testy hardwaru a inicializuje komponenty počítače, aby byl počítač připraven k použití. 
            BIOS může být aktualizován, aby podporoval nové technologie nebo opravoval chyby. Je uložený v čipu na základní desce.</p>
        <p><a href="hra2">Zvládneš správně přiřadit jednotlivé komponenty na základní desku?</a></p>
    </div>
<img id="robHardw" src="../../pictures/rob04.png" alt="Robot4" width="250">
</div>
