<script>
    document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";
</script>
<style type="text/css">
    #ukladaniDat {  
        display:grid;
        grid-template-columns: 50% 20% 30%;
        grid-template-rows: 25% auto;
        grid-template-areas: 
            "text text robot"
            "info info info";
        margin-left: 10px;
    }

    #bubbleUD { 
        background: #A7C7E7;
        border-radius: 50px;
        text-align:center;
        padding: 1px 25px 1px 10px;
        font-size: 18px;

    }

    #bubbleUD:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 55px solid #A7C7E7;
        border-bottom: 13px solid transparent;
        margin: 70px -56px 50px 0px;
    }

    #textUD {
        grid-area:text;
    }

    #robotUD {
        grid-area:robot;
        width: 250px;
    }

    #vnejsiPameti {
        grid-area: info;
    }

    img {
        float:right;
        width: 200px;
    }

    #cdObr, #usbObr {
        width: 150px;
    }

    h4 {
        background-color: #A7C7E7;
        width: 45%;
        text-align: center;
    }

    #udHraj {
        background-color: white;
    }

    #udHraj a:hover{
        color:black;
    }

    #udHraj:hover {
        background-color: #A7C7E7;
    }

</style>
<div id="ukladaniDat">
<div id="textUD">
<h2>Ukládání dat </h2>
<div id="bubbleUD">
<p>Každý na svém počítači pracujeme s velkým množstvím souborů, ať už jsou to fotky, hudba nebo různé dokumenty. 
    Abychom o tyto data nepřišli, potřebujeme je někam ukládat. 
    A k tomu nám slouží <strong> vnější paměti</strong>.
</p>
</div>
</div>
<img id="robotUD" src="../../pictures/rob03.png" alt="Robot3" width="270">
<div id="vnejsiPameti">
<h3>Vnější paměti</h3>
<p>Vnější paměti máme pro dlouhodobější ukládání dat. Liší se velikostí a také způsobem, jak na ně data zapisujeme:</p>
<ul>
    <li> <strong>magneticky</strong>: pomocí magnetického pole - <strong> pevné disky (HDD), magnetická páska </strong></li>
    <li> <strong>opticky</strong>: pomocí různých vlnových délek světla - <strong> CD, DVD, Blu-ray </strong></li>
    <li> <strong>elektricky</strong>: obsahují elektrické obvody - <strong>USB flash disky, SSD, karty </strong></li>
</ul>
<h4>Pevný disk (Hard Drive Disk)</h4>
<p><img id="hddObr" src="../../pictures/hdd.png" alt="Pevný disk">
Pevný disk se používá k ukládání většího množství dat. Skládá se z několika kotoučů, 
    které se při zápisu a čtení dat točí. </p>
<h4>SSD (Solid state drive)</h4>
<p><img id="ssdObr" src="../../pictures/ssd.jpg" alt="SSD">
SSD se jako pevný disk používá k ukládání většího množství dat. Narozdíl od 
    pevného disku neobsahuje pohyblivé části a zápis je elektonický. 
    Je rychlejší, ale má menší kapacitu. Používá se často u notebooků.
</p>
<h4>CD (Compact disk) </h4>

<p>
    <img id="cdObr" src="../../pictures/cd.png" alt="CD">
    CD je optický disk, data jsou uložena na spirále začínající ve středu. 
    Může obsahovat zvukovou nahrávku nebo data (CD-ROM).
</p>
<h4>Magnetická páska</h4>
<p><img id="magPaskaObr" src="../../pictures/magPaska.png" alt="Magnetická páska">
Magnetická páska je předchůdce pevných disků. V dnešní době se
    používá maximálně k archivaci a zálohování velkého množství dat. Je velmi pomalá. 
</p>
<h4>USB flash disk</h4>
<p><img id="usbObr" src="../../pictures/usb.png" alt="USB flash disk">
    USB flash disk je malé datové úložiště určené pro přenos dat mezi počítači. 
    Je nástupcem CD. Zapisujeme na něj elektronicky.
</p>
<h4 id="udHraj">
<a href='hra3'>Ověřte si svoje znalosti ve hře!</a></h4>
</div>
</div>