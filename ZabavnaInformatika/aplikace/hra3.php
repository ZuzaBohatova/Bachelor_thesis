<script>
    document.getElementById("menu").style.border = "5px solid rgb(27, 54, 143)";
  

  function check(){
    let correctAns = ["magPaska","cd", "ssd","hdd","usb"];
    let correctPic = ["2","3","4","1","5"];
    let ans = ["pamet1", "pamet2", "pamet3", "pamet4", "pamet5"];
    let pic = ["ansObr1", "ansObr2", "ansObr3", "ansObr4", "ansObr5"];
    let missPic = 0;
    let missAns = 0;
    let chybyAns = "Chyboval jsi v otázkách:";
    let chybyPic = "Špatně jsi přiřadil obrázky:";

    for(let i = 0; i < 5; i++){
      if(correctAns[i] != document.getElementById(ans[i]).value){
        chybyAns += " "+(i+1);
        ++missAns; 
      }
      if(correctPic[i] != document.getElementById(pic[i]).value){
        chybyPic += " "+(i+1);
        ++missPic; 
      }

    } 
    if(missAns > 0){
      output.innerHTML = "<br>"+chybyAns;
    }
    if(missPic > 0){
      output.innerHTML += "<br>"+chybyPic;
    }
    if((missPic+missAns) == 0){
      alert("Neudělal jsi jedinou chybu dobrá práce!!!")
      output.innerHTML = "Výborně, jen tak dál"
    }
    else{
      alert("Nějaké chyby tam byly, koukni kde, zkus to znovu!")
    }
    
  }

  function allOptions(){
    var options = `<option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="cd">CD</option>
    </select><br>`;
    document.write(options);
  }
</script>
<style type="text/css">
#prirazovacka {
  display:grid;
  grid-template-columns: 60% 10% 30%;
  grid-template-rows: 38% auto;
  grid-template-areas: 
    "text text robot"
    "kviz sidebar sidebar"


}
#textHra3 {
   grid-area:text;
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
   border-left: 55px solid #A7C7E7;
   border-bottom: 13px solid transparent;
   margin: 90px -80px 25px 0px;
}

#hra3Obr {
  grid-area: sidebar;
  text-align:center; 
}
#hra3robot {
  grid-area: robot;
  padding-right:20%;
}

#hra3 {
    grid-area:kviz;
}

#formReset {
  background-color: yellow;
  border: 1px solid navy;
  border-radius:10px;
  color: navy;
  padding: 15px 32px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
}

#kontrola {
  background-color: #A7C7E7;
  border: 1px solid navy;
  border-radius:10px;
  color: navy;
  padding: 15px 32px;
  text-align: center;
  display: inline-block;
  font-size: 16px;
}

ol {
  display:inline-block;
}

</style>
<div id="prirazovacka">
<div id="textHra3">
  <h1>Přiřazovačka</h1>
<div id="speech-bubble">
<h3>Orientuješ se ve vnějších pamětích?</h3>
<p>V následujícím cvičení tě čeká několik popisů jednotlivých pamětí. <br>
Tvým úkolem bude ke každému popisu přiřadit správný název a obrázek. 
<br><i><strong>Rada:</strong> pokud si s nějakou otázkou nebudeš vědět rady, pokračuj na další. 
Vylučovací metodou se určitě dostaneš ke správné odpovědi. 
<br>Každá otázka má jen jednu odpověď a každá odpověď je použita jen jednou. </i></p></div>

</div>
<div id="hra03robot"><img src="../../pictures/rob03.svg" alt="Robot3" width="250"></div>
<div id="hra3Obr">
<ol>
<li><img src="../../pictures/hdd.png" alt="Pevný disk" width="180"></li>
<li><img src="../../pictures/magPaska.png" alt="Magnetická páska" width="180"></li>
<li><img src="../../pictures/cd.png" alt="CD" width="120"></li>
<li><img src="../../pictures/ssd.jpg" alt="SSD" width="180"></li>
<li><img src="../../pictures/usb.png" alt="USB flash disk" width="150"></li>
<ol>

</div>

<div id="hra3">

<form name="formHra3" action="hra3" method="post">
  <label for="pamet1">1. Používám magnetický zápis. Jsem ideální pro archivaci velkého množství dat, ale pomalu už se blížím do důchodu. Kdo jsem?</label>
  <select id="pamet1" name="pamet1">
    <script>allOptions()</script>
  <label for="ansObr1">Obrázek číslo:</label>
  <input type="number" id="ansObr1" name="ansObr1" min="1" max="5" required><br><br>
  <label for="pamet2">2. Můžeš mě použít k přehrání hudby a data se na mě zapisují pomocí laserového paprsku. A říkají mi:</label>
  <select id="pamet2" name="pamet2">
    <script>allOptions()</script>
  <label for="ansObr2">Obrázek číslo:</label>
  <input type="number" id="ansObr2" name="ansObr2" min="1" max="5" required><br><br>
  <label for="pamet3">3. Pravděpodobně mě najdeš uvnitř svého notebooku. Jsem tižší a rychlejší než můj předchůdce, proto si za mě taky musíš připlatit. </label>
  <select id="pamet3" name="pamet3">
    <script>allOptions()</script>
  <label for="ansObr3">Obrázek číslo:</label>
  <input type="number" id="ansObr3" name="ansObr3" min="1" max="5" required><br><br>
  <label for="pamet4">4. Jsem uložen uvnitř počítače. Skládám se z několika kotoučů, zapisuju data pomocí magnetického pole. 
    Poslední dobou se mě snaží nahradit, ale pořád jsem ta nejlevnější varianta. </label>
  <select id="pamet4" name="pamet4">
    <script>allOptions()</script>
  <label for="ansObr4">Obrázek číslo:</label>
  <input type="number" id="ansObr4" name="ansObr4" min="1" max="5" required><br><br>
  <label for="pamet5">5. Data se na mě ukládají pomocí elektrických obvodů. Myslím, že už jsme se spolu nejspíš setkali. Určitě víš, že mi říkají:  </label>
  <select id="pamet5" name="pamet5">
    <script>allOptions()</script>
  <label for="ansObr5">Obrázek číslo:</label>
  <input type="number" id="ansObr5" name="ansObr5" min="1" max="5" required><br><br>
  <input type="reset" id="formReset" value="Začít znovu">
  <input type="button" id="kontrola" onclick="check()" value="Zkontrolovat">
</form>
<span id="output"></span></div>
</div>


