<script>
    document.getElementById("menu").style.border = "5px solid #008b8b";
</script>
<style>
  #site {
    display:grid;
    grid-template-columns: 65% 5% auto;
    grid-template-areas: 
      "info . robot "
      "text text text";
    font-size: 18px;
    margin-left: 10px;
    width: 90%;
  }

  #infoSite {
    grid-area: info;
  }

  #robSite {
    grid-area: robot;
    margin-top: 20px;
  }

  #textSite {
    grid-area: text;
    font-size: 16px;
  }

  #imagePanel {
    grid-area: image;
  }

  #bubbleSite { 
    background: #96ded1;
    padding: 15px 25px 15px 25px;
    -moz-border-radius: 10px; 
    -webkit-border-radius: 10px; 
    border-radius: 50px;
    text-align:center;
    font-size: 18px;
  }

  #bubbleSite:before {
    content:"";
    float:right;
    width: 0;
    height: 0;
    border-top: 13px solid transparent;
    border-left: 150px solid #96ded1;
    border-bottom: 13px solid transparent;
    margin: 55px -150px 25px 0px;
  }

  h4 {
    background: #96ded1;
    text-align: center;
  }
</style>


<div id="site">
  <div id="infoSite">
    <h2>Sítě</h2>
    <div id="bubbleSite">
      <p><strong>Víš, jak funguje internet?</strong></p>
      <p>Jak se k tobě dostane video z Youtube a co je vlastně Wi-Fi?
        <br> Na to všechno se teď spolu podíváme
      </p>
    </div>
  </div>
  <img id="robSite" src="../../pictures/rob05.png" alt="Robot5" width="300">
  <div id="textSite">
  
  <h4>Co je to internet?</h3>
    <p>Internet je celosvětový systém navzájem propojených počítačových sítí. Každá taková síť se skládá ze zařízení, které spolu neustále komunikují. 
      Zařízení se dělí na dva typy: 
      <ul>
        <li> <strong>klienti</strong> - zařízení, která něco požadují</li>
        <li> <strong>servery</strong> - zařízení, která něco nabízejí</li>
      </ul>
      Např. když si chceme pustit video na youtube - náš počítač je klient, který požaduje dané video, a youtube je server, který toto video nabízí.
    </p>
  <h4>Kde se bere internetové připojení?</h4>
    <p>
      Internetové připojení zprostředkovávají <strong>Internet Service Providers (ISP)</strong>, tedy poskytovatelé internetového připojení.
      Internetového providera si můžeme představit jako most mezi naším počítačem a internetem. 
    </p>
    <p>
      Poskytovatelé internetového připojení mají přístup k tzv. <strong>IXP, Internet Exchange Point – bod výměny Internetu</strong>. 
      Internet Exchange Points jsou místa, kde se různí Internet Service Providers setkávají a vyměňují si datové informace mezi svými sítěmi. 
    </p>
    <h4>Jak se k internetu připojit?</h4>
    <p>Existuje několik způsobů, jak se připojit k internetu:</p>
    <ol>
      <li><strong>Wi-Fi </strong></li>
        <ul>
          <li>Bezdrátové připojení</li>
          <li>Funguje pomocí rádiových vln, které vysílá router</li> 
        </ul>
      <li><strong>Ethernet </strong></li>
        <ul>
          <li>Připojení pomocí kabelu, který propojuje váš počítač přímo s routerem a přenáší mezi nimi data</li>
        </ul>
      <li><strong>Mobilní data </strong></li>
        <ul>
          <li>Fungují prostřednictvím radiového signálu od mobilního operátora, který je přenášen k vašemu telefonu a pomocí něhož přistupujeme k internetu</li>
          <li>Signál vysílají tzv. BTS věže - Base Transceiver Station</li>
        </ul>
    </ol>
  </div>
</div>