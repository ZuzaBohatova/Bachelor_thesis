<style>
  #menu {
    border: 5px solid #008b8b;
  }

  #informationSystems {
    display:grid;
    grid-template-columns: 65% 5% auto;
    grid-template-areas: 
      "info . robot "
      "text text text"
      "linkGame linkGame linkGame";
    margin: auto;
    width: 90%;
  }

  #infoInformationSystems {
    grid-area: info;
  }

  #robotInformationSystems {
    grid-area: robot;
    margin: 20px auto;
    width: 200px;
  }

  #textInformationSystems {
    grid-area: text;
  }

  #bubbleInformationSystems { 
    background: #96ded1;
    padding: 15px 25px 15px 25px;
    -moz-border-radius: 10px; 
    -webkit-border-radius: 10px; 
    border-radius: 50px;
    text-align:center;
    font-size: 18px;
  }

  #bubbleInformationSystems:before {
    content:"";
    float:right;
    width: 0;
    height: 0;
    border-top: 13px solid transparent;
    border-left: 120px solid #96ded1;
    border-bottom: 13px solid transparent;
    margin: 30px -120px 25px 0px;
  }

  h4 {
    background: #96ded1;
    text-align: center;
  }

  #linkGame {
    margin-top: 20px;
    grid-area: linkGame;
    text-align: center;
    font-size:20px;
    font-weight: bold;
  }

  #linkGame:hover {
    background-color: #96ded1;
    color: black;
  }
</style>

<div id="informationSystems">
  <div id="infoInformationSystems">
    <h2>Informační systémy</h2>
    <div id="bubbleInformationSystems">
      <p>Víš, co je to <strong>informační systém</strong> a kde všude se s ním můžeš setkat?</p>
      <p>
        V obchodě, v knihovně, u lékaře, tam všude informační systémy najdeme. A jak fungují a z čeho se skládají? Pojďme se na to spolu podívat.
      </p>
    </div>
  </div>
  <img id="robotInformationSystems" src="../../pictures/information_systems/rob05_move.png" alt="Robot5">
  <div id="textInformationSystems">
    <h4>Co jsou informační systémy?</h4>
    <ul>
      <li>objednávací systém k lékaři</li>
      <li>systém na výpůjčení knih v knihovně</li>
      <li>internetový vyhledávač</li>
      <li>rozpis služby na tabuli</li>
    </ul>
    <p>
      To vše můžeme nazvat informačními systémy - od těch nejjednodušší, jako třeba rozpis služby na tabuli visící ve třídě, až po ty složíté např. internetový vyhledávač.
    </p>
    <h4>Z čeho se informační systém skládá?</h4>
    <p>U každého informačního systému najdete většinu z těchto prvků:</p>
    <ul>
      <li><strong>Hardwarové prvky</strong>
        <p>
          Součástí informačního systému je vždy nějaký fyzický prvek. 
          Může to být např. rozsáhlý hardware jako počítače, servery a datová úložiště, ale i obyčejný papír s vytištěným rozvrhem.
        </p>
      </li>
      <li><strong>Softwarové prvky</strong>
        <p>
          Jako softwarové prvky si můžeme představit různé aplikace, které s danými daty pracují. 
          Patří sem např. operační systémy nebo databáze, do kterých data ukládáme. 
          U primitivních systémů jako rozpis služby na tabuli, tento prvek nepotřebujeme.
        </p>
      </li> 
      <li><strong>Lidské zdroje</strong>
        <p>
          Každý informační systém se neobejde bez lidí. Mohou to být jeho uživatelé nebo lidé, co se o systém starají. 
          U služby na tabuli je to paní učitelka, která systém spravuje a žáci, kteří ho využívají. 
        </p>
      </li>
      <li><strong>Organizační prvky</strong>
        <p>
          Pod organizačními prvky si můžeme představit pravidla a postupy, které zaručují, aby daný systém fungoval správně. 
          Např. student si v knihovně neůže vypůjčit knihu, kterou už má vypůjčenou někdo jiný. 
          Pepa se nemůže smazat z rozpisu na tabuli a napsat místo sebe Marka, to může jen paní učitelka.
        </p>
      </li>


    </ul>
  </div>
  <a id="linkGame" href="hra5">Zkuste si, jak takový informační systém funguje!</a>      
</div>