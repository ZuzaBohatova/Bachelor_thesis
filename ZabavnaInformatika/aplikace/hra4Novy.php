<script>
    document.getElementById("menu").style.border = "5px solid darkgreen";

    function checkPr(corrAns, q, check, ans){
        check.innerHTML = "";
        var ele = document.getElementsByName(q);
            for(i = 0; i < ele.length; i++) {
                if(ele[i].checked){
                    if(ele[i].value != corrAns){
                        var hlaska = "<p>Chybička se vloudila, správná odpověď je ";
                        if(corrAns == 62){
                            hlaska +="<strong>62</strong></p>";
                        }
                        else{
                            hlaska +="<strong>1001110</strong></p>";
                        }
                        check.innerHTML = hlaska;
                        document.getElementById(ans).style.color = "darkred";
                    }
                    else {
                        check.innerHTML = "<p><strong>Výborně, jen tak dál</strong></p>";
                        document.getElementById(ans).style.color = "darkgreen";
                    }
                }
            }
    }

    function dec2bin(dec) {
        return (dec >>> 0).toString(2);
    }

    function clearScreen() {
        document.getElementById("result").value = "";
        document.getElementById("zadani").value = "";
    }
    
    function display(value) {
        document.getElementById("zadani").value += value;
    }
    
    function calculate() {
        var p = document.getElementById("zadani").value;
        document.getElementById("result").value = dec2bin(p);
    }
   
</script>
<style type="text/css">
#hra4 {
    margin-left: 10px;
}

.kalkulacka {
    background-color: darkgreen;
    border: 2px solid lightgreen;
    border-radius:10px;
    
}

.kalkulacka td input[type=button]{
    background-color:lightgreen;
    border: 2px solid darkgreen;
    border-radius: 5px;
    font-size:20px;
}

#zpetCS {
    color: darkgreen;
    font-weight: bold;
} 

input[type=button] {
    background-color:lightgreen;
    border: 2px solid darkgreen;
    font-size:16px;
    border-radius: 5px;
    color:darkgreen;
}

#postup {
    background-color:darkgreen;
    color:lightgreen;
}

.display-box {
    background-color: white;
    font-size: 20px;
}
</style>
<br> 
<div id="hra4">
<a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a>
<h2>Převody mezi dvojkovou a desítkovou soustavou</h2>
<p>Vyzkoušej si, jestli zvládneš tyto dva příkladypár příkladů (i s řešením) nebo si vymysli svoje a výsledek si zkontroluj na převodové kalkulačce.</p>


<form name="formHra4" action="hra4" method="post">
    <p id="pr1">1. Číslo 78 v desítkové soustavě zapíšeme ve dvojkové jako: </p>
    <input type="radio" id="68" name="pr1" value="68">
    <label for="68">1000100</label><br>
    <input type="radio" id="79" name="pr1" value="79">
    <label for="79">1001111</label><br>
    <input type="radio" id="78" name="pr1" value="78">
    <label for="78">1001110</label><br><br>
    <input type="button" id="checkPr1" onclick="checkPr('78', 'pr1', check1, 'check1')" value="Zkontrolovat">
    <input type="button" id="postup" onclick="postupPr1()" value="Postup">
    <p id="check1"></p>
    <p id="pr2"><br>2. Kterému číslu v desítkové soustavě se rovná 111110 v dvojkové soustavě? </p>
    <input type="radio" id="62" name="pr2" value="62">
    <label for="62">62</label><br>
    <input type="radio" id="61" name="pr2" value="61">
    <label for="61">61</label><br>
    <input type="radio" id="63" name="pr2" value="63">
    <label for="63">63</label><br><br>
    <input type="button" id="checkPr2" onclick="checkPr(62, 'pr2', check2, 'check2')" value="Zkontrolovat">
    <input type="button" id="postup" onclick="postupPr2()" value="Postup">
    <p id="check2"></p>
</form>
<form name="formNar" action="hra4" method="post">
    <p><br>3. Své narozeniny:
    <!--Type date není použit protože není podporován v Internet Explorer 11 -->
    <input type="number" id="narDen" name="narDen" min="1" max="31" required>.
    <input type="number" id="narMesic" name="narMesic" min="1" max="12" required>. zapíšeš ve dvojkové soustavě jako: </p>
    <input type="text" id="den" placeholder="den" pattern="[0-1]+" required>
    <input type="text" id="měsíc" placeholder="měsíc" pattern="[0-1]+" required>
    <input type="button" id="checkNar" onclick="checkNar()" value="Zkontrolovat">
</form>
<br>
</div>
<h3>Chceš se otestovat sám? </h3>
<p>Vymysli si vlastní příklady a pro kontrolu použij převodovou kalkulačku.</p>
<table class="kalkulacka">
    <tr>
        <td colspan="2"> <input class="display-box" type="text" id="zadani" disabled /> </td>
        <td rowspan="2"> <input type="button" value="C" onclick="clearScreen()" id="btn" /> </td>
    </tr>
    <tr>
        <td colspan="2"> <input class="display-box" type="text" id="result" disabled /> </td>
    </tr>
    <tr>
        <td> <input type="button" value="1" onclick="display('1')" /> </td>
        <td> <input type="button" value="2" onclick="display('2')" /> </td>
        <td> <input type="button" value="3" onclick="display('3')" /> </td>
    </tr>
    <tr>
        <td> <input type="button" value="4" onclick="display('4')" /> </td>
        <td> <input type="button" value="5" onclick="display('5')" /> </td>
        <td> <input type="button" value="6" onclick="display('6')" /> </td>
    </tr>
    <tr>
        <td> <input type="button" value="7" onclick="display('7')" /> </td>
        <td> <input type="button" value="8" onclick="display('8')" /> </td>
        <td> <input type="button" value="9" onclick="display('9')" /> </td>
    </tr>
    <tr>
        <td> <input type="button" value="0" onclick="display('0')" /> </td>
        <td colspan="2"> <input type="button" value="2bin" onclick="calculate()" id="btn" /> </td>
    </tr>
</table>
