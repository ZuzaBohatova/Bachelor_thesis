<script>
  document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";

  let kolo;
  let chyby = 0;
  let otazky = ["Používám magnetický zápis. Jsem ideální pro archivaci velkého množství dat, ale pomalu už se blížím do důchodu. Kdo jsem a jak asi vypadám?",
    "Můžeš mě použít k přehrání hudby a data se na mě zapisují pomocí laserového paprsku. A říkají mi:",
    "Pravděpodobně mě najdeš uvnitř svého notebooku. Jsem tižší a rychlejší než můj předchůdce, proto si za mě taky musíš připlatit.",
    "Jsem uložen uvnitř počítače. Skládám se z několika kotoučů, zapisuju data pomocí magnetického pole.Poslední dobou se mě snaží nahradit, ale pořád jsem ta nejlevnější varianta.",
    "Data se na mě ukládají pomocí elektrických obvodů. Myslím, že už jsme se spolu nejspíš setkali. Určitě víš, že mi říkají:"  
  ];

  let happy = "../../pictures/rob02.png";
  let sad = "../../pictures/rob01.png"
  let normal = "../../pictures/rob03.png";

  function checkAns() {
    let correctAns = ["magPaska","cd", "ssd","hdd","usb"];
    for(let i = 0; i < correctAns.length; i++){
      if(kolo == i){
        document.getElementById(correctAns[i]).onclick = function(){
          document.getElementById("hra3robot").src = happy;
          document.getElementById(correctAns[i]).style.border = "3px solid green";
        }
        document.getElementById(correctAns[i]+"Obr").onclick = function(){
          document.getElementById(correctAns[i]+"Obr").style.border = "3px solid green";
          document.getElementById("hra3robot").src = happy;
        }
      }
      else {
        document.getElementById(correctAns[i]).onclick = function(){
          document.getElementById(correctAns[i]).style.border = "3px solid red";
          ++chyby;
          document.getElementById("hra3robot").src = sad;
        }
        document.getElementById(correctAns[i]+"Obr").onclick = function(){
          document.getElementById(correctAns[i]+"Obr").style.border = "3px solid red";
          ++chyby;
          document.getElementById("hra3robot").src = sad;
        }
      }
    }
  }

  function resetAns(){
    let correctAns = ["magPaska","cd", "ssd","hdd","usb"];
    document.getElementById("hra3robot").src = normal;
    for(let i = 0; i < correctAns.length; i++){
      document.getElementById(correctAns[i]).style.border = "";
      document.getElementById(correctAns[i]+"Obr").style.border = "";   
    }
  }

  function zacniHru(){
    kolo = 0;
    document.getElementById("hra3").style.gridTemplateColumns = "auto 38%";
    document.getElementById("hra3bubbleUvod").remove();
    document.getElementById("zacniHru").remove();
    hra3text.innerHTML += `<h2>Orientuješ se ve vnějších pamětích?</h2><p id="ot">`
      +otazky[kolo]+`</p>
      <p class="ans">
      <button id="usb">USB flash disk</button>
      <button id="cd">CD</button>
      <button id="ssd">SSD disk</button>
      <button id="hdd">Pevný disk (HDD)</button>
      <button id="magPaska">Magnetická páska</button>    
      </p><div class="hra3obr">
      <input type="image" id="magPaskaObr" src="../../pictures/magPaska.png" alt="Magnetická páska">
      <input type="image" id="cdObr" src="../../pictures/cd.png" alt="CD">
      <input type="image" id="usbObr" src="../../pictures/usb.png" alt="USB flash disk">
      <input type="image" id="ssdObr" src="../../pictures/ssd.jpg" alt="SSD">
      <input type="image" id="hddObr" src="../../pictures/hdd.png" alt="Pevný disk"></div>`;
    dalsi.innerHTML = `<button id="dalsiBut" onclick="dalsiOt()">Další</button>`;
    checkAns();
  }

  function dalsiOt() {
    ++kolo;
    ot.innerHTML = otazky[kolo]; 
    resetAns();
    checkAns();
    
    if(kolo == 4){
      dalsi.innerHTML = `<button id="vyhodnotitBut" onclick="vyhodnotit()">Vyhodnotit</button>`;
    }
  }

  function vyhodnotit() {
    var hodnoceniText = ["To bylo bez chybičky! Jen tak dál", "Chybička se vloudila, zkus to znovu!", "Jej, to se nepovedlo. Pročti si znovu teorii a zkus to ještě jednou!"];
    hra3.innerHTML = `
    <div><div id="hra3bubbleZaver">
    <p id="hodnoceni"></p>
    </div><div class="hra3kamDal">
    <button id="hra3zpet" onclick="location.href='ukladani-dat'">Zpět na teorii</button>
    <button id="hra3reset" onclick="location.href='hra3'">Začít znovu</button>
    <button id="dalsiHry" onclick="location.href='hry'">Další hry</button>
    </div></div>
    <img id="hra3robotZaver" src="../../pictures/rob03.png" alt="Robot3" width="350">
    
    `;
    switch (chyby) {
      case 0:
        hodnoceni.innerHTML = hodnoceniText[0];
        document.getElementById("hra3robotZaver").src = happy;
        break;
      case(chyby < 2):
        hodnoceni.innerHTML = hodnoceniText[1];
        document.getElementById("hra3robotZaver").src = normal;
        break;
      default:
        hodnoceni.innerHTML = hodnoceniText[2];
        document.getElementById("hra3robotZaver").src = sad;
    }

    document.getElementById("hra3").style.gridTemplateColumns = "60% auto";
    document.getElementById("hra3robotZaver").style.float = "left";


    



    

  }

</script>
<div id="hra3">
<div id="hra3text">
<h4><a id="zpetUD" href="ukladani-dat">Zpět na teorii</a></h4>
<div id="hra3bubbleUvod">
<h3>Orientuješ se ve vnějších pamětích?</h3>
<p>V následujícím cvičení tě čeká několik popisů jednotlivých pamětí. <br>
Tvým úkolem bude ke každému popisu přiřadit správný název a obrázek. 
<br><i><strong>Rada:</strong> pokud si s nějakou otázkou nebudeš vědět rady, pokračuj na další. 
Vylučovací metodou se určitě dostaneš ke správné odpovědi. 
<br>Každá otázka má jen jednu odpověď a každá odpověď je použita jen jednou. </i></p></div>
<button id="zacniHru" onclick="zacniHru()">Začni hru</button>
</div>
<div id="hra3sidebar"><img id="hra3robot" src="../../pictures/rob03.png" alt="Robot3" width="270">
<div id="dalsi"></div>
</div>

</div>

