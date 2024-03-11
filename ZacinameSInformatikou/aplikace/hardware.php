<script>
    document.getElementById("menu").style.border = "5px solid #FF4F00";
</script>
<style type="text/css">
    #Hardware {
        display:grid;
        grid-template-columns: 70% auto;
        grid-template-areas: 
            "bubble robot"
            "motherBoard motherBoardImg"
            "procesor procesorImg"
            "chipset chipsetImg"
            "ethernetUSB ethernetImg"
            "karty soundCardImg"
            "RAM RAMImg"
            "HDDaSSD HDDaSSDImg"
            "BIOS BIOSImg"
            "linkGame linkGame";
        font-size: 18px;
        margin-left: 10px;
        width: 90%;
    }

    #InfoHardware {
        grid-area: bubble;
    }

    #RobHardw {
        grid-area: robot;
        margin-top: 20px;
        margin-left: 55px;
    }

    #MotherBoard {
        grid-area: motherBoard;
    }

    #MotherBoardImg {
        grid-area: motherBoardImg;
        margin: 20px;
        width: 100%;
    }

    #Procesor {
        grid-area: procesor;
    }

    #ProcesorImg {
        grid-area: procesorImg;
        margin: 20px;
        width: 80%;
    }

    #Chipset {
        grid-area: chipset;
    }

    #ChipsetImg {
        grid-area: chipsetImg;
        margin: 20px;    
        width: 60%;  
    }

    #EthernetUSB {
        grid-area: ethernetUSB;
    }

    #EthernetImg {
        grid-area: ethernetImg;
        margin: 20px; 
        width: 60%;      
    }

    #Cards {
        grid-area: karty;
    }

    #SoundCardImg {
        grid-area: soundCardImg;
        margin: 20px; 
        width: 90%;  
    }

    #RAM {
        grid-area: RAM;
    }

    #RAMImg {
        grid-area: RAMImg;
        margin: 20px; 
        width: 80%;  
    }

    #HDDaSSD {
        grid-area: HDDaSSD;
    }

    #HDDaSSDImg {
        grid-area: HDDaSSDImg;
        margin: 20px; 
        width: 80%;  
    }

    #BIOS {
        grid-area: BIOS;
    }

    #BIOSImg {
        grid-area: BIOSImg;
        margin: 20px; 
        width: 80%;  
    }

    #LinkGame {
        grid-area: linkGame;
        font-size: 22px;
        font-weight: bold;
        text-align: center;
    }

    #LinkGame:hover {
        background-color: #FFCC99;
        color: black;
    }

    #BubbleHardw { 
        background: #FFCC99;
        padding: 15px 25px 15px 25px;
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        border-radius: 50px;
        text-align:center;
        font-size: 18px;
    }

    #BubbleHardw:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #FFCC99;
        border-bottom: 13px solid transparent;
        margin: 50px -100px 25px 0px;
    }

    h4 {
        background: #FFCC99;
        text-align: center;
        font-size: 18px;
    }

</style>

<div id="Hardware">
    <div id="InfoHardware">
        <h2>Hardware</h2>
        <div id="BubbleHardw">
            <h3>Vítám tě ve světě hardwaru!</h3>
            <p>Zde si spolu ukážeme z čeho se tvůj počítač skládá, podíváme se na nejdůležitější součástky a vysvětlíme si, jak fungují.</p>
        </div>
    </div>
    <div id="MotherBoard">
        <h4>Základní deska (motherboard)</h4>
        <p>
            <strong>Základní deska</strong> je klíčovou součástí počítače, notebooku, jakékoliv elektroniky. Je to velká deska, na které jsou umístěny další důležité součásti počítače a propojovací body. Propojuje všechny hardwarové
            komponenty počítače a zajišťuje, aby spolu navzájem spolupracovali.
        </p>
    </div>
    <img id="MotherBoardImg" src="../../pictures/hardware/motherboard.jpg" alt="Základní deska"/>
    <div id="Procesor">
        <h4>Procesor (CPU, central processing unit)</h4>
        <p>
            <strong>Procesor </strong> je hlavní část počítače, která provádí všechny výpočty a řídí běh programů. CPU zpracovává instrukce a data podle toho, co mu říká operační systém a programy, které používáte. Pomocí různých částí a
            funkcí CPU počítač provádí všechny úkony, které vidíte na obrazovce, jako je spouštění aplikací, prohlížení internetu nebo hraní her.
        </p>
       
    </div> 
    <img id="ProcesorImg" src="../../pictures/hardware/procesor.jpg" alt="Procesor"/>
    <div id="Chipset">
        <h4>Čipová sada (chipset)</h4>
        <p>
            <strong>Čipová sada</strong> řídí základní desku a zajišťuje komunikaci mezi jednotlivými komponentami. 
            Existují dva typy čipové sady - <strong>North-South Bridge Design</strong> a <strong>One Chip Design</strong>. One Chip
            Design se skládá, jak je z názvu jasné, z jednoho čipu a používá se např. v chytrých telefonech.
        </p>
        <p>
            <strong>North-South Bridge Design</strong> najdeme u většiny počítačů, notebooků a serverů. Skládá se ze dvou čipů - North Bridge a South Bridge. 
            North Bridge zajišťuje komunikaci s grafickou kartou, operační pamětí a procesorem. Nachází se blíže k procesoru. 
            South Bridge se stará o komunikaci s ostatními komponentami - s rozšiřujícími kartami, disky, řadiči externích rozhraní a zprostředkovává služny BIOSu. 
            Bývá umístěn blíže slotů pro rozšiřující karty.
        </p>
    </div>
    <img id="ChipsetImg" src="../../pictures/hardware/chipset.jpg" alt="Čipová sada"/>
    <div id="EthernetUSB">
        <h4>Ethernet a USB</h4>
        <p>
            <strong>Ethernet</strong> je port na základní desce, který umožňuje připojení k internetu pomocí kabelu. 
            <strong>USB porty</strong> slouží k připojení různých zařízení, jako jsou myši, klávesnice, tiskárny a USB flash disky.
            Tyto porty bývají umístěny na okraji základní desky, aby byly snadno dostupné.
        </p>
    </div> 
    <img id="EthernetImg" src="../../pictures/hardware/ethernet.jpg" alt="Ethernet konektor"/>
    <div id="Cards">
        <h4>Síťové, zvukové, grafické karty</h4>
        <p><strong>Síťová karta</strong> umožňuje počítači připojit se k síti, jako je internet, buď pomocí ethernetového kabelu nebo bezdrátově pomocí Wi-Fi.</p>
        <p><strong>Zvuková karta</strong> zpracovává zvukové signály a umožňuje poslech zvuku nebo nahrávání zvuku pomocí reproduktorů nebo sluchátek.</p>
        <p><strong>Grafická karta</strong> se stará o zobrazování obrázků na monitoru a umožňuje hraní her nebo sledování videí ve vysokém rozlišení.</p>
        <p>Tyto karty jsou obvykle umístěny do slotů na základní desce, které jsou určeny pro tento účel.</p>
    </div>
    <img id="SoundCardImg" src="../../pictures/hardware/sound_card.jpg" alt="Zvuková karta"/>
    <div id="RAM">
        <h4>RAM (Random Access Memory)</h4>
        <p>
            <strong>RAM</strong> je operační paměť počítače. Ta slouží k dočasnému ukládání dat a instrukcí, se kterými právě počítač pracuje. 
            RAM umožňuje rychlý přístup k těmto datům a instrukcím, což zvyšuje výkon počítače. Když vypnete počítač, data uložená v RAM se ztratí, 
            protože RAM je "volatilní" paměť, což znamená, že je ztracena při vypnutí elektrického napájení. 
            Je umístěna na základní desce v podobě malých modulů, které se zapojují do speciálních slotů
        </p>
    </div> 
    <img id="RAMImg" src="../../pictures/hardware/ram.jpg" alt="RAM"/>
    <div id="HDDaSSD">
        <h4>Pevný disk (HDD, Hard Disk Drive)</h4>
        <p>
            <strong>Pevný disk</strong> <i>(na obrázku nahoře)</i> je typem paměťového zařízení, které ukládá data pomocí rotačních disků a čtecích/zapisovacích hlav. 
            Tato technologie využívá magnetické záznamy k ukládání a čtení dat. HDD nabízí velkou kapacitu za relativně
            nízkou cenu. Avšak oproti SSD má pomalejší přístupovou rychlost a může být náchylnější k mechanickému poškození kvůli pohyblivým součástem.
        </p>
        <h4>SSD (Solid State Disk)</h4>
        <p>
            <strong>SSD</strong> <i>(na obrázku dole)</i> je modernějším typem paměťového zařízení, které používá paměťové čipy pro ukládání dat. 
            Tato technologie umožňuje rychlejší přístup k datům a vyšší přenosové rychlosti než HDD, ale bývá dražší. SSD nemá
            žádné pohyblivé součásti, což znamená nižší spotřebu energie, tišší provoz a vyšší odolnost vůči mechanickým vibracím. 
            Díky těmto vlastnostem se SSD stává ideální volbou pro notebooky.
        </p>
    </div>
    <img id="HDDaSSDImg" src="../../pictures/hardware/hdd_ssd.jpg" alt="SSD a HDD"/>
    <div id="BIOS">
        <h4>BIOS (Basic Input/Output System)</h4>
        <p>
            <strong>BIOS</strong> je software uložený na základní desce, který se spouští při zapnutí počítače. 
            Je to základní systém, který provádí testy hardwaru a inicializuje komponenty počítače, aby byl počítač připraven k použití.
            BIOS může být aktualizován, aby podporoval nové technologie nebo opravoval chyby. Je uložený v čipu na základní desce.
        </p>
        <br>
    </div>
    <img id="BIOSImg" src="../../pictures/hardware/bios.jpg" alt="BIOS čip"/>
    <a id="LinkGame" href="hra2">Zvládneš správně přiřadit jednotlivé komponenty na základní desku?</a>
    <img id="RobHardw" src="../../pictures/rob04.png" alt="Robot4" width="270" />
</div>