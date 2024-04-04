# Programátorská dokumentace
Celá aplikace je rozčleněna na sedm kapitol: 
- úvod (prologue)
- grafy (graphs)
- číselné soustavy (number systems)
- ukládání dat (data storage)
- hardware (hardware)
- informační systémy (information systems)
- hry (games)

Kapitoly Úvod a Hry jsou pouze statické, a skládají se tak pouze z HTML stránky (v ./ZacinameSInformatikou/application/pages/) a styl u nich upravuje společná šablona main.css (naleznete v ./ZacinameSInformatikou/application/css-files/).
Kapitola Úvod obsahuje seznámení s aplikací, její účel a další dodatečné informace.
Kapitola Hry obsahuje přímé odkazy na všechny vytvořené hry v rámci aplikace.

Hlavní část tvoří zbylých pět kapitol, tedy grafy, číselné soustavy, ukládání dat, hardware a informační systémy.
Zde se každá kapitola skládá ze dvou částí: teorie a hry, pro obě tyto části je společný .css soubor.
Teorie je vytvořena pomocí statické HTML stránky a nalinkovaného .css souboru.
Hra se skládá ze své vlastní HTML šablony, s kterou ovšem manipulujeme pomocí .js souboru (naleznete v v ./ZacinameSInformatikou/application/js-files/). Hra sdílí .css soubor spolu s teorií.

Každá kapitola obsahuje nespočet obrázků. Ty nalezenete uloženy ve složce pictures, která je dále rozdělena na jednotlivé kapitoly odpovídající tématům.

## Architektura
Samotný program se skládá z několika do sebe zanořených adresářů, základní struktura vypadá takto:
- ZacinameSInformatikou
    - application
        - css-files - pro každou kapitolu aplikace jeden styl, a jeden obecný styl pro všechny
        - js-files - js soubory obsahující funkce pro jednotlivé hry aplikace
        - pages - html a php stránky, hlavní kostra aplikace
        - index.php
        - router.php
    - csv-files - uložené tabulky
    - json-files - json soubory reprezentující jednotlivé grafy pro kapitolu s grafy
    - pictures
        - data_storage
        - graphs
        - hardware
        - information_systems
        - number_systems

Stránku spustíme pomocí odkazu: https://www.ms.mff.cuni.cz/~bohatovz/bohatova/ZacinameSInformatikou/application/ , která nás přesměruje na soubor index.php . Ten složí výslednou podobu aplikace - hlavičku (header), tělo (body) a patičku (footer).
Tělo vygenerujeme pomocí funkce main() ze souboru router.php, který podle url rozděluje, na kterou stránku budeme přesměrováni.

