<style type="text/css">
    #menu {
        border: 5px solid #008b8b;
    }

    #game5 {  
        display:grid;
        grid-template-columns: 70% auto;
        grid-template-areas: "text robot";
        font-size: 18px;
        margin-left: 10px;
    }

    #game5Bubble { 
        background: #96ded1;
        border-radius: 50px;
        text-align:center;
        padding: 1px 25px 1px 10px;
        font-size: 18px;
    }

    #game5Bubble:before {
        content:"";
        float:right;
        width: 0;
        height: 0;
        border-top: 13px solid transparent;
        border-left: 120px solid #96ded1;
        border-bottom: 13px solid transparent;
        margin: 50px -120px 50px 0px;
    }

    #game5text {
        grid-area:text;
    }

    #game5robot {
        grid-area:robot;
        width: 280px;
        margin: auto;
    }

    #startGameBtn, #otherGamesBtn {
        background-color: #96ded1;
        border: 2px solid #96ded1;
        border-radius: 20px;
        color: #008b8b;
        float: right;
        font-size: 18px;
        font-weight: bold;
        margin-top: 20px;
        padding: 15px 25px;
        text-align: center;
        width: 200px;
    }

    #startGameBtn:hover, #otherGamesBtn:hover {
        border: 2px solid #008b8b;
    }

    #backToTheory {
        color: #008b8b;
    }

    
</style>

<div id="game5">
    <div id="game5text">
        <h4><a id="backToTheory" href="site">Zpět na teorii</a></h4>
        <div id="game5Bubble">
            <h4>Vyznáš se v cestách Internetem?</h4>
            <p>
                Dnes tě čeká malý experiment. Zkusíš si sestavit cestu, kterou se k tobě dostane tato stránka.
            </p> 
        </div>
        <button id="startGameBtn" onclick="startGame()">Začni hru</button>
    </div>
    <img id="game5robot" src="../../pictures/networks/rob05.png" alt="Robot5">
</div>