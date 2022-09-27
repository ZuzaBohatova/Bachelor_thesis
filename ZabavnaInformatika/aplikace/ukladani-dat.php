<script>
    document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";
</script>
<style type="text/css">
    #ukladaniDat {  
        display:grid;
        grid-template-columns: 50% 20% 30%;
        grid-template-rows: 25% 5% auto;
        grid-template-areas: 
            "text text robot"
            "info info robot"
            "info info obrazky";
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
    }

    #vnejsiPameti {
        grid-area: info;
    }

    #hddUD {
        float:right;
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
<img id="robotUD" src="../../pictures/rob03.svg" alt="Robot3" width="270">
<div id="vnejsiPameti">
<h3>Vnější paměti</h3>
<p>Vnější paměti máme pro dlouhodobější ukládání dat. Liší se velikostí a také způsobem, jak na ně data zapisujeme:</p>
<ul>
    <li> <strong>magneticky</strong>: pomocí magnetického pole - <strong> pevné disky (HDD), magnetická páska </strong></li>
    <li> <strong>opticky</strong>: pomocí různých vlnových délek světla - <strong> CD, DVD, Blu-ray </strong></li>
    <li> <strong>elektricky</strong>: obsahují elektrické obvody - <strong>USB flash disky, SSD, karty </strong></li>
</ul>

<h4>Pevný disk (Hard Drive Disk)</h4>
<img id="hddUD" src="../../pictures/hddPopis.jpg" alt="Pevný disk" width="350">
<p>Pevný disk je uložen uvnitř počítače. Skládá se z několika kotoučů</p>


<a href="hra3">Hra</a>
</div>
</div>