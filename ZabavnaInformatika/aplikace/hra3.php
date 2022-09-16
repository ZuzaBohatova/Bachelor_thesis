<script>
  function check(){
    output.innerHTML = "Ahoj" ;  
  }
</script>
<h2>Přiřazovačka</h2>
<img id="hra3robot" src="../../pictures/rob03.svg" alt="Robot3" width="200">
<div class="speech bubble left">
<h3>Orientuješ se ve vnějších pamětích?</h3>
<p>V následujícím cvičení tě čeká několik popisů jednotlivých pamětí a tvým úkolem bude ke každému popisu přiřadit správný název a správný obrázek. 
<br><i><strong>Rada:</strong> pokud si s nějakou otázkou nebudeš vědět rady, pokračuj na další. 
Vylučovací metodou se určitě dostaneš ke správné odpovědi i bez použití nápovědy. 
<br>Každá otázka má jen jednu odpověď a každá odpověď je použita jen jednou. </i></p>
</div>

<div id="hra3">
<form id="formHra3" action="hra3" method="post">
  <label for="pamet1">1. Používám magnetický zápis. Jsem ideální pro archivaci velkého množství dat, ale pomalu už se blížím do důchodu. Kdo jsem?</label>
  <select id="pamet1" name="pamet1">
    <option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="dvd">DVD</option>
    <option value="cd">CD</option>
  </select><br>
  <label for="ansObr1">Obrázek číslo:</label>
  <input type="number" id="ansObr1" name="ansObr1" min="1" max="5" required><br><br>
  <label for="pamet2">2. Můžeš mě použít k přehrání hudby a data se na mě zapisují pomocí laserového paprsku. A říkají mi:</label>
  <select id="pamet2" name="pamet2">
    <option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="dvd">DVD</option>
    <option value="cd">CD</option>
  </select><br>
  <label for="ansObr1">Obrázek číslo:</label>
  <input type="number" id="ansObr2" name="ansObr2" min="1" max="5" required><br><br>
  <label for="pamet3">3. Pravděpodobně mě najdeš uvnitř svého notebooku. Jsem tižší a rychlejší než můj předchůdce, proto si za mě taky musíš připlatit. </label>
  <select id="pamet3" name="pamet3">
    <option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="dvd">DVD</option>
    <option value="cd">CD</option>
  </select><br>
  <label for="ansObr3">Obrázek číslo:</label>
  <input type="number" id="ansObr3" name="ansObr3" min="1" max="5" required><br><br>
  <label for="pamet4">4. Jsem uložen uvnitř počítače. Skládám se z několika kotoučů, zapisuju data pomocí magnetického pole. 
    Poslední dobou se mě snaží nahradit, ale pořád jsem ta nejlevnější varianta. </label>
  <select id="pamet4" name="pamet4">
    <option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="dvd">DVD</option>
    <option value="cd">CD</option>
  </select><br>
  <label for="ansObr4">Obrázek číslo:</label>
  <input type="number" id="ansObr4" name="ansObr4" min="1" max="5" required><br><br>
  <label for="pamet5">4. Data se na mě ukládají pomocí elektrických obvodů. Myslím, že už jsme se spolu nejspíš setkali. Určitě víš, že mi říkají:  </label>
  <select id="pamet5" name="pamet5">
    <option value="free"></option>
    <option value="hdd">Pevný disk (HDD)</option>
    <option value="usb">USB flash disk</option>
    <option value="ssd">SSD</option>
    <option value="magPaska">Magnetická páska</option>
    <option value="dvd">DVD</option>
    <option value="cd">CD</option>
  </select><br>
  <label for="ansObr5">Obrázek číslo:</label>
  <input type="number" id="ansObr5" name="ansObr4" min="1" max="5" required><br><br>
  <input type="reset" id="formReset">
  <input type="button" id="kontrola" onclick="check()" value="Kontrola">
</form>
</div>

<div id="hra3Obr">
<ol>
<li><img src="../../pictures/hdd.png" alt="Pevný disk" width="120"></li>
<li><img src="../../pictures/magPaska.png" alt="Magnetická páska" width="120"></li>
<li><img src="../../pictures/cd.png" alt="CD" width="120"></li>
<li><img src="../../pictures/ssd.jpg" alt="SSD" width="120"></li>
<li><img src="../../pictures/usb.png" alt="USB flash disk" width="120"></li>
</ol>
</div>
<span id="output"></span>



