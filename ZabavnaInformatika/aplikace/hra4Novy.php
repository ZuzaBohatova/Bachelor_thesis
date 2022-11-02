<script>
    document.getElementById("menu").style.border = "5px solid darkgreen";
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    function getRandomInt(min, max) {
        min = Math.ceil(min);
        max = Math.floor(max);
        return Math.floor(Math.random() * (max - min) + min); // The maximum is exclusive and the minimum is inclusive
    }

    function zmenParametryDeleni(args) {
        args[0]=args[2];
        args[3]=args[0]%args[1];
        args[2]=(args[0]-args[3])/args[1];
        console.log(args[0],args[1],args[2],args[3]);
        return args;
    }

    function pridejRadekTabulky(deleni) {
        hra4tab.innerHTML += "<tr><td>"+deleni[0]+" : "+deleni[1]+` = </td>
            <td>`+deleni[2]+`</td> 
            <td></td>
            <td>Zbytek</td>
            <td class="zbytky">`+deleni[3]+`</td></tr>`;
    }

    async function hra4vypocet(deleni) {
        await sleep(4000);
        document.getElementById("hra4bubbleUvod").style.height = "70px";
        hra4bubbleUvod.innerHTML = "<strong>"+deleni[0]+"</strong> dělíme <strong>"+deleni[1]+"</strong>";  
        await sleep(2500); //1500
        hra4bubbleUvod.innerHTML += `<p>Dostaneme <strong>`+deleni[2]+"</strong> a <strong>zbytek "+deleni[3]+"</strong></p>";
        await sleep(1000); //1000
        pridejRadekTabulky(deleni,0);
    }

    var mistakes = 0;
    var lastEx = 0;

    function trest(){
        hra4text.innerHTML =`<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4>
        <div id="hra4bubbleUvod"><strong>To je škoda!</strong><br>Protože jsi v převodech nadělal moc chyb a nakonec mě úplně vymazal,
         tak se musíš kouknout za trest znovu na animaci.<br> Příště ti to jistě půjde lépe!</div>
        <table id="hra4tab"></table>
        <div id="hra4buttons"></div>`;
        hra4butZacniHru.innerHTML = `<button id="hra4animace" onclick="hra4animace10to2()">Animace</button>`;
        
        document.getElementById("hra4bubbleUvod").className = "second";
        
        document.getElementById("hra4robot").src = "../../pictures/rob02.png";
        document.getElementById("hra4robot").width = "250";
    }

    async function hra4animace10to2() {
        mistakes = 0;
        hra4butZacniHru.innerHTML ="";
        document.getElementById("hra4bubbleUvod").className = "";
        hra4bubbleUvod.innerHTML = `<p id="hra4robotText">Základní krok převodu do dvojkové soustavy je <strong>dělení dvěma</strong> a zapisování
        <span class="strong">zbytku po dělení</span>.</p>`;
        document.getElementById("hra4buttons").remove();
        var deleni = [42,2,(42/2),(42%2)];
        document.getElementById("hra4robot").width = "250";
        document.getElementById("hra4robot").src = "../../pictures/rob02.png";
        document.getElementById("hra4bubbleUvod").className = "second";
        hra4bubbleUvod.innerHTML += `<p>My budeme do dvojkové soustavy převádět číslo <strong><a href="https://cs.wikipedia.org/wiki/42_(odpov%C4%9B%C4%8F)" target="_blank">`+deleni[0]+"</a></strong>";
        await hra4vypocet(deleni);
        while(deleni[2] > 0) {
            deleni = await zmenParametryDeleni(deleni);
            await hra4vypocet(deleni);
        }
        await sleep(3000);
        document.getElementById("hra4bubbleUvod").style.padding = "15px";
        document.getElementById("hra4bubbleUvod").style.height = "80px";
        hra4bubbleUvod.innerHTML = "<p>Když už nemáme kam dál dělit, podíváme se na zbytky, co jsme dostali</p>";
        await sleep(2000);
        document.getElementById("hra4bubbleUvod").style.height = "110px";
        hra4bubbleUvod.innerHTML += `<p><span class="strong">010101</span></p>`;
        await sleep(3);
        document.getElementById("hra4bubbleUvod").style.height = "170px";
        hra4bubbleUvod.innerHTML += `<p>Zbytky přečtu odzadu a dostávám výsledek: </p>`;
        await sleep(2);        
        document.getElementById("hra4bubbleUvod").style.height = "210px";
        hra4bubbleUvod.innerHTML += `<p><span class="strong">101010</span></p>`;
        await sleep(6);
        document.getElementById("hra4bubbleUvod").style.height = "100px";
        hra4bubbleUvod.innerHTML = `<p><span class="strong"><a href="https://cs.wikipedia.org/wiki/42_(odpov%C4%9B%C4%8F)" target="_blank">42</a></span> ve <span class="strong">dvojkové soustavě</span> se rovná <span class="strong">101010</span></p>`;        
        hra4bubbleUvod.innerHTML += "<p>A hurá na hru!</p>";
        await sleep(1000);
        mistakes = 0;
        switch(lastEx){
            case 1:
                hra4butZacniHru.innerHTML = `<button id="hra4zacni" onclick="hra4();">Vrať se hru</button>`;
                break;
            case 2:
                hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="vratSeNaHru();hra4prevod2(0)">Vrať se hru</button>`;  
                break;
            case 3:
                hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="vratSeNaHru();hra4prevod3(0)">Vrať se hru</button>`;  
                break;
            case 4:
                hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="vratSeNaHru();hra4narozeniny(0)">Vrať se hru</button>`;  
                break;
            case 0: default:    
                hra4butZacniHru.innerHTML = `<button id="hra4zacniHru" onclick="hra4zacniHru()">Začni hru</button>`;
           
        }
    }

    function vratSeNaHru(){
        document.getElementById("hra4tab").remove();
        console.log("tadyy");
        hra4text.innerHTML = `<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4>
            <h3> Zvládáš převody mezi soustavami?</h3>
            <p id="hra4ot"></p>
            <p id="hra4prav"></p>`;
        hra4text.innerHTML += `<p id="hint"></p>`;
        hra4text.innerHTML += `<p id="hra4chyba"></p>`;
    }

    function hra4zacniHru(){
        document.getElementById("hra4bubbleUvod").style.height = "120px";
        document.getElementById("hra4bubbleUvod").className = "second";
        document.getElementById("hra4robot").width = "250";
        document.getElementById("hra4robot").src = "../../pictures/rob02.png";
        hra4bubbleUvod.innerHTML = `<p>Pravidla jsou jednoduchá. Dám ti číslo, které máš převést do dvojkové soustavy. <br>
        A postupně ho převedeš, číslici po číslici</p>`;
        document.getElementById("hra4tab").remove();
        var elementExists = document.getElementById("hra4buttons");
        if(elementExists != null){
            document.getElementById("hra4buttons").remove();
        }
        hra4butZacniHru.innerHTML = `<button id="hra4zacni" onclick="hra4()">Hrát</button>`;
    }

    function hra4(){
        var num = getRandomInt(16, 31);
        var rest = num % 2;
        var result = (num - rest)/2;
        hra4text.innerHTML = `<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4>
            <h3> Zvládáš převody mezi soustavami?</h3>
            <p id="hra4ot">Převod čísla <span class="strong">`+num+`</span> do <span class="strong">dvojkové soustavy</span></p>
            <p id="hra4prav">Postupně vyplň všechna políčka buď jedničkou nebo nulou.
            <br>Pokud zezelenají, odpověděl jsi správně, naopak červená znamená chybu.</p>`;
        hra4text.innerHTML += `<p id="hint"><i>Hint: děl dvojkou a zbytky doplňuj odzadu - `+num+` : 2 = `+result+` a zbytek je `+rest+`</i></p>`;
        var rigthAns = string2list(dec2bin(num));
        var id = "hra4prevod"+num.toString();
        hra4text.innerHTML += hra4addPrevod(5,rigthAns,id);
        document.getElementById(id+"5").placeholder = rest;
        hra4text.innerHTML += `<p id="hra4chyba"></p>`;
        lastEx = 1;
        hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="hra4prevod2(`+num+`)">Pokračuj dál</button>`;        
    }

    function hra4addPrevod(count, rightAns, id){
        var prevod = `<form id=`+id+` class="hra4prevod">`;
        for(let i = 1; i <= count; i++){
            var idAns = id+i;
            prevod += `<input type="text" id=`+idAns+` onkeyup="hra4check(`+rightAns[i-1]+`,'`+idAns+`')">`;
        }
        prevod += "</form>";
        return prevod;
    }

    function hra4check(rightAns, id) {
        let value = document.getElementById(id).value;
        
        if(value == rightAns) {
            document.getElementById(id).style.border = "2px solid green";
            document.getElementById(id).style.fontWeight = "bold";
            document.getElementById(id).style.color = "rgb(27, 77, 62)";
        }
        else {
            document.getElementById(id).style.border = "2px solid red";
            document.getElementById(id).style.color = "darkred";
            document.getElementById(id).style.fontWeight = "bold";
            ++mistakes;
            if(mistakes <= 7){
                document.getElementById("hra4robot").src = "../../pictures/rob02"+mistakes+".png";
                document.getElementById("hra4robot").width = "305";
            }
            else {
                trest();
            }
            

        }
    }

    function hra4muzuDal(id, count){
        var ans = true;
        for(let i = 1; i<=count; i++){
            console.log(id+i);
            if(document.getElementById(id+i).style.color != "rgb(27, 77, 62)") {
                ans = false;
            }
        }
        return ans;
    }
    
     
    function hra4prevod2(lastNum) {
        var ans = true;
        if(lastNum != "0"){
            var ans = hra4muzuDal("hra4prevod"+lastNum, 5);
        }
        if(!ans) {
            hra4chyba.innerHTML = "Někde máš chybku, oprav jí a až pak pokračuj";
        }
        else{
            hra4chyba.innerHTML = "";            
            hra4ot.innerHTML = "Nyní tě čekají těžší převody.";
            lastEx = 2;
            var num = getRandomInt(64, 127);
            var rigthAns = string2list(dec2bin(num));
            var id = "hra4prevod"+num.toString();
            hra4prav.innerHTML = `<br><p><span class="strong">Převeď `+num+` do dvojkové soustavy</span></p>`
            +hra4addPrevod(7,rigthAns,id);+`</div>`;
            var elementExists = document.getElementById("hra4prevod"+lastNum);
            if(elementExists != null){
            document.getElementById("hra4prevod"+lastNum).remove();
            }
            document.getElementById("hint").remove();
            hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="hra4prevod3(`+num+`)">Pokračuj dál</button>`;        
        }
        
    }

    function hra4prevod3(lastNum) {
        var ans = true;
        if(lastNum != "0"){
            var ans = hra4muzuDal("hra4prevod"+lastNum, 7);
            
        }
        if(!ans) {
            hra4chyba.innerHTML = "Někde máš chybku, oprav jí a až pak pokračuj";
        }
        else{
            hra4chyba.innerHTML = "";            
            hra4ot.innerHTML = "Tak teď se ukáže, zda opravdu všemu rozumíš. Tento převod už je opravdu těžký!";
            lastEx = 3;
            var num = getRandomInt(128,255);
            var rigthAns = string2list(dec2bin(num));
            var id = "hra4prevod"+num.toString();
            hra4prav.innerHTML = `<br><p><span class="strong">Převeď `+num+` do dvojkové soustavy</span></p>`
            +hra4addPrevod(8,rigthAns,id);+`</div>`;
            hra4butZacniHru.innerHTML = `<button id="hra4pokracuj" onclick="hra4narozeniny(`+num+`)">Pokračuj dál</button>`;        
        }
        
    }

    function hra4narozeniny(lastNum){
        var ans = true;
        if(lastNum != "0"){
            var ans = hra4muzuDal("hra4prevod"+lastNum, 8);
            
        }
        if(!ans) {
            hra4chyba.innerHTML = "Někde máš chybku, oprav jí a až pak pokračuj";
        }
        else{
            lastEx = 4;
            hra4chyba.innerHTML = "";
            hra4ot.innerHTML = "To nejtěžší máš za sebou, teď si spolu spočítám, jak vypadají tvé narozeniny ve dvojkové soustavě.";
            hra4prav.innerHTML = `<form id="hra4nar"><input type="number" id="narDen" min="1" max="31" placeholder="den" required>.
                <input type="number" id="narMesic" min="1" max="12" placeholder="měsíc" required>. zapíšeš ve dvojkové soustavě jako: </p>
                <input type="text" id="den" placeholder="den" pattern="[0-1]+" required>.
                <input type="text" id="mesic" placeholder="měsíc" pattern="[0-1]+" required>.</form>`;
            hra4butZacniHru.innerHTML = `<button id="checkNar" onclick="hra4narCheck()">Zkontroluj</button>`;  
        }
    }

    function dec2bin(dec) {
        return (dec >>> 0).toString(2);
    }

    function string2list(str){
        return Array.from(str);
    }

    function hra4narCheck(){
        var den = dec2bin(document.getElementById("narDen").value);
        var mesic = dec2bin(document.getElementById("narMesic").value);
        var right = true;
        if(document.getElementById("den").value == den){
            document.getElementById("den").style.border = "2px solid darkgreen";
        }
        else {
            document.getElementById("den").style.border = "2px solid red";
            right = false;
        }
        if(document.getElementById("mesic").value == mesic){
            document.getElementById("mesic").style.border = "2px solid darkgreen";
        }
        else {
            document.getElementById("mesic").style.border = "2px solid red";
            right = false;
        }
        if(right) {
            hra4text.innerHTML = `<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4><div id="hra4bubbleUvod"></div>`;
            document.getElementById("hra4bubbleUvod").style.height = "120px";
            document.getElementById("hra4bubbleUvod").className = "second";
            document.getElementById("hra4robot").width = "250";
            hra4bubbleUvod.innerHTML = `<p><span class="strong">Výborně! </span><br> Prošel jsi všemi úkoly na převody do dvojkové soustavy. <br> Vzhůru na další téma.</p>`;
            document.getElementById("hra4butZacniHru").remove();
            hra4text.innerHTML += `<div class="hra3kamDal">
                <button id="hra4reset" onclick="location.href='hra4'">Začít znovu</button>
                <button id="hra4dalsiHry" onclick="location.href='hry'">Další hry</button>
                </div>`
        }
        else {
            hra4chyba.innerHTML = "Někde máš chybu, zkus ji opravit";
        }
    
    }

</script>
<style type="text/css">
    #hra4prav {
        font-size: 18px;
    }

    #hra4text i {
        font-size:14px;
    }

    #hra4chyba {
        margin: 20px 5px;
        color:darkred;
    }

    #hra4nar input[type="number"] {
        border: 1px solid black;
        width: 50px;
        height: 40px;
        text-align: center;
        font-size:18px;
        margin-left:5px;
    }

    #hra4nar input[type="text"] {
        border: 1px solid black;
        width: 80px;
        height: 40px;
        text-align: center;
        font-size:18px;
        margin-left:5px;
    }

    .hra4prevod input {
        border: 2px solid black;
        width: 45px;
        height: 45px;
        text-align: center;
        font-size:18px;
        margin:2px;
    }

    .strong {
        font-weight:bold;
        color:rgb(27, 77, 62);
    }

    #hra4 {
        display:grid;
        grid-template-columns: 60%  auto;
        grid-template-rows: auto 20%;
        grid-template-areas: 
            "text robot"
            "text button";

        font-size: 18px;
        margin: 0px 10px;

    }

    #hra4text {
        grid-area: text;
    }

    #hra4robot {
        grid-area: robot;
        margin:0 auto;
        float:right;
    }

    #hra4robot.second {
        grid-area: robot;
        margin:0 auto;
        float:right;
    }

    #hra4bubbleUvod { 
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        background: lightgreen;
        border-radius: 50px;
        font-size: 18px;
        padding: 20px;
        text-align:center;
        
    }

    #hra4bubbleUvod:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 75px solid lightgreen;
        border-bottom: 13px solid transparent;
        margin: 125px -90px 25px 0px;
    }

    #hra4bubbleUvod.second:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 16px solid transparent;
        border-left: 110px solid lightgreen;
        border-bottom: 16px solid transparent;
        margin: 55px -98px 25px 0px;
    }

    #zpetCS {
        color: darkgreen;
        font-weight: bold;
        margin-top: 10px;
    } 

    #hra4zacniHru, #hra4animace, #hra4zacni, #hra4pokracuj, #checkNar, #hra4reset, #hra4dalsiHry{
        background-color: lightgreen;
        border: 2px solid lightgreen;
        border-radius:20px;
        color: darkgreen;
        font-size: 16px;
        font-weight: bold;
        float: right;
        margin: 15px 5px 0px 5px;
        padding: 15px 25px;
        text-align: center;
        width: 180px;
    }

    #hra4zacniHru:hover, #hra4animace:hover, #hra4zacni:hover, #hra4pokracuj:hover, #checkNar:hover, #hra4reset:hover, #hra4dalsiHry:hover {
        border: 2px solid darkgreen;
    }

    #hra4animaceVypoctu {
        margin-top: 20px;
        text-align: center;
    }

    #hra4tab td,tr {
        border: 1px solid transparent;
        border-collapse:collapse;
        text-align:center;
    }

    #hra4tab td {
        min-width: 50px;
    }
    
    #hra4tab {
        margin:20px auto;
    }

    #hra4vysledek {
        font-weight: bold;
        margin: auto;   
    }

    .zbytky {
        font-weight: bold;
        color: darkgreen;

    }

    #hra4butZacniHru {
        grid-area:button;
    }

</style>
<div id="hra4">
<div id="hra4text">
<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4>
<div id="hra4bubbleUvod">
<h3>Zvládáš převody mezi dvojkovou a desítkovou soustavou?</h3>
<p><strong>Myslíš si, že už se vyznáš v jedničkách a nulách? </strong>
    Tak můžeš rovnou vykoušet hru, která ti ukáže, jak na tom doopravdy jsi.</p> 
<p><strong>Pořád si nejsi převody jistý?</strong> Koukni se na animaci, která ti ukáže, jak na to!</p></div>
<table id="hra4tab"></table>
<div id="hra4buttons"><button id="hra4zacniHru" onclick="hra4zacniHru()">Začni hru</button>
<button id="hra4animace" onclick="hra4animace10to2()">Animace</button></div>
</div>
<img id="hra4robot" src="../../pictures/rob02.png" alt="Robot2" width="300">
<div id="hra4butZacniHru"></div>
</div>

