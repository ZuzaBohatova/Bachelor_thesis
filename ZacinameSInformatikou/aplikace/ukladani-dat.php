<style>
    #menu {
        border: 5px solid rgb(27, 54, 143);
    }

    #dataStorage {  
        display:grid;
        grid-template-columns: 70% auto;
        grid-template-areas:
            "info robot" 
            "text text"
            "HDD HDDImg"
            "SSD SSDImg"
            "CD CDImg"
            "MagPaska MagPaskaImg"
            "USB USBImg"
            "SDCard SDCardImg"
            "linkGame linkGame";
        margin
        width: 90%;
    }

    #bubbleDataStorage { 
        background: #A7C7E7;
        border-radius: 50px;
        text-align: center;
        padding: 10px 20px;
    }

    #bubbleDataStorage:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #A7C7E7;
        border-bottom: 13px solid transparent;
        margin: 90px -100px 50px 0px;
    }

    #infoDataStorage {
        grid-area:info;
    }

    #robotDataStorage {
        grid-area:robot;
        width: 250px;
        margin: auto;
    }

    #textDataStorage {
        grid-area: text;
    }

    #hdd {
        grid-area: HDD;
    }

    #hddImg {
        grid-area: HDDImg;
    }

    #ssd {
        grid-area: SSD;
    }

    #ssdImg {
        grid-area: SSDImg;
    }

    #cd {
        grid-area: CD;
    }

    #cdImg {
        grid-area: CDImg;
    }

    #magPaska {
        grid-area: MagPaska;
    }

    #magPaskaImg {
        grid-area: MagPaskaImg;
    }

    #usb {
        grid-area: USB;
    }

    #usbImg {
        grid-area: USBImg;
    }

    #linkGame {
        grid-area: linkGame;
        text-align: center;
        font-size:20px;
        font-weight: bold;
    }

    #linkGame:hover {
        background-color: #A7C7E7;
        color: black;
    }

    h4 {
        background-color: #A7C7E7;
        text-align: center;
    }

    img {
        margin: 20px;
    }
</style>

<div id="dataStorage">
    <div id="infoDataStorage">
        <h2>Ukládání dat</h2>
        <div id="bubbleDataStorage">
            <h3>Kam se ukládají naše data?</h3>
            <p>
                Každý na svém počítači pracujeme s velkým množstvím souborů, ať už jsou to fotky, hudba nebo různé dokumenty. 
                Abychom o tyto data nepřišli, potřebujeme je někam ukládat. A k tomu nám slouží <strong> vnější paměti</strong>.
            </p>
        </div>
    </div>
    <img id="robotDataStorage" src="../../pictures/data_storage/rob03.png" alt="Robot3"/>
    <div id="textDataStorage">
        <h3>Vnější paměti</h3>
        <p>Vnější paměti máme pro dlouhodobější ukládání dat. Liší se velikostí a také způsobem, jak na ně data zapisujeme:</p>
        <ul>
            <li><strong>magneticky</strong>: pomocí magnetického pole - <strong> pevné disky (HDD), magnetická páska </strong></li>
            <li><strong>opticky</strong>: pomocí různých vlnových délek světla - <strong> CD, DVD, Blu-ray </strong></li>
            <li><strong>elektricky</strong>: obsahují elektrické obvody - <strong>USB flash disky, SSD, karty </strong></li>
        </ul>
    </div>
    <div id="hdd">
        <h4>Pevný disk (Hard Drive Disk)</h4>
        <p> 
            Pevný disk se používá k ukládání většího množství dat. Skládá se z několika kotoučů, které se při zápisu a čtení dat točí.
            Tato technologie využívá magnetické záznamy k ukládání a čtení dat. HDD má velkou kapacitu za relativně nízkou cenu. 
            Ale oproti SSD má pomalejší přístupovou rychlost a může být náchylnější k mechanickému poškození kvůli pohyblivým součástem.
        </p>
    </div>
    <img id="hddImg" src="../../pictures/data_storage/hdd.jpg" alt="Pevný disk" width="270"/>
    <div id="ssd">
        <h4>SSD (Solid state drive)</h4>
        <p>
            SSD se jako pevný disk používá k ukládání většího množství dat. 
            Narozdíl od pevného disku neobsahuje pohyblivé části a zápis je elektonický. 
            Je rychlejší, ale má menší kapacitu. Používá se často u notebooků.
        </p>
    </div>
    <img id="ssdImg" src="../../pictures/data_storage/ssd.jpg" alt="SSD" width="270"/>
    <div id="cd">
        <h4>CD (Compact disk)</h4>
        <p>
            CD je optický disk, data jsou uložena na spirále začínající ve středu. Může obsahovat zvukovou nahrávku nebo data (CD-ROM).
        </p> 
    </div>
    <img id="cdImg" src="../../pictures/data_storage/cd.png" alt="CD" width="180"/>
    <div id="magPaska">
        <h4>Magnetická páska</h4>
        <p>
            Magnetická páska je předchůdce pevných disků. V dnešní době se používá maximálně k archivaci a zálohování velkého množství dat. Je velmi pomalá.
        </p>
    </div> 
    <img id="magPaskaImg" src="../../pictures/data_storage/magPaska.png" alt="Magnetická páska" width="250"/>  
    <div id="usb">   
        <h4>USB flash disk</h4>
        <p>
            USB flash disk je malé datové úložiště určené pro přenos dat mezi počítači. Je nástupcem CD. Zapisujeme na něj elektronicky.
        </p>
    </div>
    <img id="usbImg" src="../../pictures/data_storage/usb.jpg" alt="USB flash disk" width="250"/>
    <div id="sdCard">   
        <h4>SD Karta (Secure Digital Card) </h4>
        <p>
            SD karta je typ paměťové karty používané k ukládání dat v různých elektronických zařízeních, jako jsou digitální fotoaparáty, mobilní telefony, 
            tablety, herní konzole a další zařízení. Funkce SD karty je založena na integrovaném flash paměťovém čipu a řadiči, 
            který řídí přístup k datům na této paměťové části.  
        </p>
    </div>
    <img id="sdCardImg" src="../../pictures/data_storage/sdCard.png" alt="SD karta" width="250"/>
    <a id="linkGame" href="hra3">Ověřte si svoje znalosti ve hře!</a>      
</div>