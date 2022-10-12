<script>
    document.getElementById("menu").style.border = "5px solid darkgreen";
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    async function hra4animace() {
        hra4bubbleUvod.innerHTML = `<p id="hra4robotText">Základní krok převodu do dvojkové soustavy je <strong>dělení dvěma</strong> a zapisování
         <strong>zbytku po dělení</strong>.</p>`;
        hra4buttons.innerHTML = "";
        document.getElementById("hra4robot").width = "250";
        document.getElementById("hra4bubbleUvod").style.height = "120px";
        document.getElementById("hra4bubbleUvod").className = "second";
        await sleep(2000);
        hra4bubbleUvod.innerHTML += `<p>My budeme do dvojkové soustavy převádět číslo <strong><a href="https://cs.wikipedia.org/wiki/42_(odpov%C4%9B%C4%8F)" target="_blank">42</a></strong>`;
        await sleep(5000)
        hra4bubbleUvod.innerHTML = "42 vydělíme 2"
        hra4animaceVypoctu.innerHTML = "42 : 2 ="
        await sleep(1000);
        hra4animaceVypoctu += "21"
        
    }


</script>
<style type="text/css">
    #hra4 {
        display:grid;
        grid-template-columns: 60%  auto;
        grid-template-areas: 
            "text robot";
        font-size: 18px;
        margin: 0px 10px;

    }

    #hra4text {
        grid-area: text;
    }

    #hra4robot {
        grid-area: robot;
        margin:auto;
    }

    #hra4bubbleUvod { 
        -moz-border-radius: 10px; 
        -webkit-border-radius: 10px; 
        background: lightgreen;
        border-radius: 50px;
        font-size: 18px;
        padding: 25px;
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
        margin: 120px -90px 25px 0px;

    }

    #hra4bubbleUvod.second:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 16px solid transparent;
        border-left: 120px solid lightgreen;
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

</style>
<div id="hra4">
<div id="hra4text">
<h4><a id="zpetCS" href="ciselne-soustavy">Zpět na teorii</a></h4>
<div id="hra4bubbleUvod">
<h3>Zvládáš převody mezi dvojkovou a desítkovou soustavou?</h3>
<p id="hra4robotText"><strong>Myslíš si, že už se vyznáš v jedničkách a nulách? </strong>
    Tak můžeš rovnou vykoušet hru, která ti ukáže, jak na tom doopravdy jsi.</p> 
<p><strong>Pořád si nejsi převody jistý?</strong> Koukni se na animaci, která ti ukáže, jak na to!</p></div>
<div id="hra4buttons"><button id="hra4zacniHru" onclick="zacniHru4()">Začni hru</button>
<button id="hra4animace" onclick="hra4animace()">Animace</button></div>
<div id="hra4animaceVypoctu"></div>
</div>
<img id="hra4robot" src="../../pictures/rob02.png" alt="Robot2" width="300">
</div>

