<script>
    document.getElementById("menu").style.border = "5px solid darkgreen";
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
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
        //await sleep(4000);
        document.getElementById("hra4bubbleUvod").style.height = "70px";
        hra4bubbleUvod.innerHTML = "<strong>"+deleni[0]+"</strong> dělíme <strong>"+deleni[1]+"</strong>";  
        //await sleep(2500); //1500
        hra4bubbleUvod.innerHTML += "<p>Dostaneme <strong>"+deleni[2]+"</strong> a <strong>zbytek "+deleni[3]+"</strong></p>"
        //await sleep(1000); //1000
        pridejRadekTabulky(deleni,0);
    }


    async function hra4animace10to2() {
        hra4bubbleUvod.innerHTML = `<p id="hra4robotText">Základní krok převodu do dvojkové soustavy je <strong>dělení dvěma</strong> a zapisování
            <strong>zbytku po dělení</strong>.</p>`;
        document.getElementById("hra4buttons").remove();
        var deleni = [42,2,(42/2),(42%2)];
        document.getElementById("hra4robot").width = "250";
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
        //await sleep(2000);
        document.getElementById("hra4bubbleUvod").style.height = "110px";
        hra4bubbleUvod.innerHTML += `<p><strong>010101</strong></p>`;
        //await sleep(3000);
        document.getElementById("hra4bubbleUvod").style.height = "170px";
        hra4bubbleUvod.innerHTML += `<p>Zbytky přečtu odzadu a dostávám výsledek: </p>`;
        //await sleep(2000);        
        document.getElementById("hra4bubbleUvod").style.height = "210px";
        hra4bubbleUvod.innerHTML += `<p><strong>101010</strong></p>`;
        //await sleep(6000);
        document.getElementById("hra4bubbleUvod").style.height = "100px";
        hra4bubbleUvod.innerHTML = `<p><strong><a href="https://cs.wikipedia.org/wiki/42_(odpov%C4%9B%C4%8F)" target="_blank">42</a></strong> ve <strong>dvojkové soustavě</strong> se rovná <strong>101010</strong></p>`;        
        hra4bubbleUvod.innerHTML += "<p>A hurá na hru!</p>";
        await sleep(1000);
        hra4butZacniHru.innerHTML = `<button id="hra4zacniHru" onclick="hra4zacniHru()">Začni hru</button>`;
    }

    function hra4zacniHru(){
        document.getElementById("hra4bubbleUvod").style.height = "120px";
        hra4bubbleUvod.innerHTML = `<p>Pravidla jsou jednoduchá. Dám ti číslo, které máš převést do dvojkové soustavy. <br>
        A postupně ho převedeš, číslici po číslici</p>`;
        document.getElementById("hra4tab").remove();
    }

</script>
<style type="text/css">
    strong {
        font-weight:bold;
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

    #hra4zacniHru, #hra4animace {
        background-color: lightgreen;
        border: 2px solid lightgreen;
        border-radius:20px;
        color: darkgreen;
        font-size: 18px;
        font-weight: bold;
        float: right;
        margin: 15px 5px 0px 5px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #hra4zacniHru:hover, #hra4animace:hover {
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
<div id="hra4buttons"><button id="hra4zacniHru" onclick="zacniHru4()">Začni hru</button>
<button id="hra4animace" onclick="hra4animace10to2()">Animace</button></div>
</div>
<img id="hra4robot" src="../../pictures/rob02.png" alt="Robot2" width="300">
<div id="hra4butZacniHru"></div>
</div>

