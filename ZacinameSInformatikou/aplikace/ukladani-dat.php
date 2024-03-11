<style>
    #menu {
        border: 5px solid rgb(27, 54, 143)
    }

    #DataStorage {  
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
            "LinkHra LinkHra";
        margin-left: 10px;
        font-size: 18px;
        width: 90%;
    }

    #BubbleDataStorage { 
        background: #A7C7E7;
        border-radius: 50px;
        text-align:center;
        padding: 1px 25px 1px 10px;
    }

    #BubbleDataStorage:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 100px solid #A7C7E7;
        border-bottom: 13px solid transparent;
        margin: 90px -100px 50px 0px;
    }

    #InfoDataStorage {
        grid-area:info;
    }

    #RobotDataStorage {
        grid-area:robot;
        width: 240px;
        margin-left: 40px;
    }

    #TextDataStorage {
        grid-area: text;
    }

    #HDD {
        grid-area: HDD;
    }

    #HDDImg {
        grid-area: HDDImg;
    }

    #SSD {
        grid-area: SSD;
    }

    #SSDImg {
        grid-area: SSDImg;
    }

    #CD {
        grid-area: CD;
    }

    #CDImg {
        grid-area: CDImg;
    }

    #MagPaska {
        grid-area: MagPaska;
    }

    #MagPaskaImg {
        grid-area: MagPaskaImg;
    }

    #USB {
        grid-area: USB;
    }

    #USBImg {
        grid-area: USBImg;
    }

    #LinkHra {
        grid-area: LinkHra;
        text-align: center;
        font-size:20px;
        font-weight: bold;
    }

    #LinkHra:hover {
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

<div id="DataStorage">
    <div id="InfoDataStorage">
        <h2>Ukládání dat</h2>
        <div id="BubbleDataStorage">
            <h3>Kam se ukládají naše data?</h3>
            <p>
                Každý na svém počítači pracujeme s velkým množstvím souborů, ať už jsou to fotky, hudba nebo různé dokumenty. 
                Abychom o tyto data nepřišli, potřebujeme je někam ukládat. A k tomu nám slouží <strong> vnější paměti</strong>.
            </p>
        </div>
    </div>
    <img id="RobotDataStorage" src="../../pictures/data_storage/rob03.png" alt="Robot3" width="270" />
    <div id="TextDataStorage">
        <h3>Vnější paměti</h3>
        <p>Vnější paměti máme pro dlouhodobější ukládání dat. Liší se velikostí a také způsobem, jak na ně data zapisujeme:</p>
        <ul>
            <li><strong>magneticky</strong>: pomocí magnetického pole - <strong> pevné disky (HDD), magnetická páska </strong></li>
            <li><strong>opticky</strong>: pomocí různých vlnových délek světla - <strong> CD, DVD, Blu-ray </strong></li>
            <li><strong>elektricky</strong>: obsahují elektrické obvody - <strong>USB flash disky, SSD, karty </strong></li>
        </ul>
    </div>
    <div id="HDD">
        <h4>Pevný disk (Hard Drive Disk)</h4>
        <p> 
            Pevný disk se používá k ukládání většího množství dat. Skládá se z několika kotoučů, které se při zápisu a čtení dat točí.
            Tato technologie využívá magnetické záznamy k ukládání a čtení dat. HDD má velkou kapacitu za relativně nízkou cenu. 
            Ale oproti SSD má pomalejší přístupovou rychlost a může být náchylnější k mechanickému poškození kvůli pohyblivým součástem.
        </p>
    </div>
    <img id="HDDImg" src="../../pictures/data_storage/hdd.jpg" alt="Pevný disk" width="270"/>
    <div id="SSD">
        <h4>SSD (Solid state drive)</h4>
        <p>
            SSD se jako pevný disk používá k ukládání většího množství dat. 
            Narozdíl od pevného disku neobsahuje pohyblivé části a zápis je elektonický. 
            Je rychlejší, ale má menší kapacitu. Používá se často u notebooků.
        </p>
    </div>
    <img id="SSDImg" src="../../pictures/data_storage/ssd.jpg" alt="SSD" width="270"/>
    <div id="CD">
        <h4>CD (Compact disk)</h4>
        <p>
            CD je optický disk, data jsou uložena na spirále začínající ve středu. Může obsahovat zvukovou nahrávku nebo data (CD-ROM).
        </p> 
    </div>
    <img id="CDImg" src="../../pictures/data_storage/cd.png" alt="CD" width="180"/>
    <div id="MagPaska">
        <h4>Magnetická páska</h4>
        <p>
            Magnetická páska je předchůdce pevných disků. V dnešní době se používá maximálně k archivaci a zálohování velkého množství dat. Je velmi pomalá.
        </p>
    </div> 
    <img id="MagPaskaImg" src="../../pictures/data_storage/magPaska.png" alt="Magnetická páska" width="250"/>  
    <div id="USB">   
        <h4>USB flash disk</h4>
        <p>
            USB flash disk je malé datové úložiště určené pro přenos dat mezi počítači. Je nástupcem CD. Zapisujeme na něj elektronicky.
        </p>
    </div>
    <img id="USBImg" src="../../pictures/data_storage/usb.jpg" alt="USB flash disk" width="250"/>
    <div id="SDCard">   
        <h4>SD Karta (Secure Digital Card) </h4>
        <p>
            SD karta je typ paměťové karty používané k ukládání dat v různých elektronických zařízeních, jako jsou digitální fotoaparáty, mobilní telefony, 
            tablety, herní konzole a další zařízení. Funkce SD karty je založena na integrovaném flash paměťovém čipu a řadiči, 
            který řídí přístup k datům na této paměťové části.  
        </p>
    </div>
    <img id="SDCardImg" src="../../pictures/data_storage/sdCard.png" alt="SD karta" width="250"/>
    <a id="LinkHra" href="hra3">Ověřte si svoje znalosti ve hře!</a>      
</div>