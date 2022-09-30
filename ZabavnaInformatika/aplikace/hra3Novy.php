<script>
  document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";
  let kolo = 1;

  function checkAns() {
    let correctAns = ["magPaska","cd", "ssd","hdd","usb"];
    for(let i = 0; i < correctAns.length; i++){
      if((kolo-1) == i){
        document.getElementById(correctAns[i]).onclick = function(){document.getElementById(id).style.border = "2px solid green";}
      }
      else {
        document.getElementById(correctAns[i]).onclick = function(){document.getElementById(id).style.border = "2px solid red";}
      }
    }
  }

  function allOptions(){
    var options = `<div id="ans"><button id="hdd">Pevný disk (HDD)</button>
      <button id="usb" onclick="checkAns('true', 'usb')">USB flash disk</button>
      <button id="ssd">SSD</button>
      <button id="magPaska">Magnetická páska</button>
      <button id="cd">CD</button></div>`;
    return options;
  }

  function zacniHru(){
    textHra3.innerHTML = `<br><a id="zpetUD" href="ukladani-dat">Zpět na teorii</a><h2>Přiřazovačka</h2><p class="ot" id="ot1">Používám magnetický zápis. 
    Jsem ideální pro archivaci velkého množství dat, ale pomalu už se blížím do důchodu. Kdo jsem a jak asi vypadám?</label>
      </p>`+allOptions()+"<br>";
    dalsiOtazka();
    textHra3.innerHTML += `<div id="hra3Obr"><input type="image" src="../../pictures/hdd.png" alt="Pevný disk" width="180"/>
      <input type="image" src="../../pictures/magPaska.png" alt="Magnetická páska" width="180"/>
      <input type="image" src="../../pictures/cd.png" alt="CD" width="180"/>
      <input type="image" src="../../pictures/ssd.jpg" alt="SSD" width="180"/>
      <input type="image" src="../../pictures/usb.png" alt="USB flash disk" width="180"/></div>`;
    
  }

  function dalsiOtazka(){
    //document.getElementById("formHra3").style.textAlign = "center";
    dalsi.innerHTML += `<button id="dalsiBut"><strong>Další</strong></button>`;
  }

</script>
<style type="text/css">
#prirazovacka {
  display:grid;
  grid-template-columns: auto 30%;
  grid-template-rows: 60% auto;
  grid-template-areas:
    "text robot"
    "obrazky dalsi";

}

.ot {
  font-size: 18px;
}
#textHra3 {
   grid-area:text;

}
#hra3Obr {
  
}

#speech-bubble { 
   background: #A7C7E7;
   border-radius: 50px;
   text-align:center;
   padding: 1px 25px 1px 10px;
   font-size: 18px;

}

#speech-bubble:before {
   content:"";
   float:right;
   width: 0;
   height: 0;
   border-top: 13px solid transparent;
   border-left: 90px solid #A7C7E7;
   border-bottom: 13px solid transparent;
   margin: 80px -100px 30px 0px;
}

#zpetUD {
  color: rgb(27, 54, 143);
}
#hra3robot {
  grid-area: robot;
  padding-right:20%;
}

#dalsiBut {
    justify-items: center;
  background-color: #A7C7E7;
  border: 1px solid #A7C7E7;
  border-radius:20px;
  color: navy;
  padding: 15px 25px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
  float: right;
}

#dalsi {
  grid-area: dalsi;
  place-items: center;
}

#zacniHru {
  background-color: #A7C7E7;
  border: 1px solid #A7C7E7;
  border-radius:20px;
  color: rgb(27, 54, 143);
  padding: 15px 15px;
  text-align: center;
  display: inline-block;
  font-size: 18px;
  float: right;
}


</style>
<div id="prirazovacka">
<div id="textHra3">
<br> 
<a id="zpetUD" href="ukladani-dat"><strong>Zpět na teorii</strong></a>
<h2>Přiřazovačka</h2>
<div id="speech-bubble">
<h3>Orientuješ se ve vnějších pamětích?</h3>
<p>V následujícím cvičení tě čeká několik popisů jednotlivých pamětí. <br>
Tvým úkolem bude ke každému popisu přiřadit správný název a obrázek. 
<br><i><strong>Rada:</strong> pokud si s nějakou otázkou nebudeš vědět rady, pokračuj na další. 
Vylučovací metodou se určitě dostaneš ke správné odpovědi. 
<br>Každá otázka má jen jednu odpověď a každá odpověď je použita jen jednou. </i></p></div>
<br><button id="zacniHru" onclick="zacniHru()"><strong>Začni hru</strong></button>
</div>
<div id="hra3robot">
<img id="hra3robotUvod" src="../../pictures/rob03.png" alt="Robot3" width="300">
</div>
<div id="dalsi"></div>


<!--
<div id="hra3">

<form name="formHra3" action="hra3" method="post">
  <label for="pamet1">1. Používám magnetický zápis. Jsem ideální pro archivaci velkého množství dat, ale pomalu už se blížím do důchodu. Kdo jsem?</label>
  <select id="pamet1" name="pamet1">
    <script>allbuttons()</script>
  <label for="ansObr1">Obrázek číslo:</label>
  <input type="number" id="ansObr1" name="ansObr1" min="1" max="5" required><br><br>
  <label for="pamet2">2. Můžeš mě použít k přehrání hudby a data se na mě zapisují pomocí laserového paprsku. A říkají mi:</label>
  <select id="pamet2" name="pamet2">
    <script>allbuttons()</script>
  <label for="ansObr2">Obrázek číslo:</label>
  <input type="number" id="ansObr2" name="ansObr2" min="1" max="5" required><br><br>
  <label for="pamet3">3. Pravděpodobně mě najdeš uvnitř svého notebooku. Jsem tižší a rychlejší než můj předchůdce, proto si za mě taky musíš připlatit. </label>
  <select id="pamet3" name="pamet3">
    <script>allbuttons()</script>
  <label for="ansObr3">Obrázek číslo:</label>
  <input type="number" id="ansObr3" name="ansObr3" min="1" max="5" required><br><br>
  <label for="pamet4">4. Jsem uložen uvnitř počítače. Skládám se z několika kotoučů, zapisuju data pomocí magnetického pole. 
    Poslední dobou se mě snaží nahradit, ale pořád jsem ta nejlevnější varianta. </label>
  <select id="pamet4" name="pamet4">
    <script>allbuttons()</script>
  <label for="ansObr4">Obrázek číslo:</label>
  <input type="number" id="ansObr4" name="ansObr4" min="1" max="5" required><br><br>
  <label for="pamet5">5. Data se na mě ukládají pomocí elektrických obvodů. Myslím, že už jsme se spolu nejspíš setkali. Určitě víš, že mi říkají:  </label>
  <select id="pamet5" name="pamet5">
    <script>allbuttons()</script>
  <label for="ansObr5">Obrázek číslo:</label>
  <input type="number" id="ansObr5" name="ansObr5" min="1" max="5" required><br><br>
  <input type="reset" id="formReset" value="Začít znovu">
  <input type="button" id="kontrola" onclick="checkHra3()" value="Zkontrolovat">
</form>
<span id="output"></span></div>-->
</div>


