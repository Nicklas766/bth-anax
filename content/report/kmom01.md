---
title: "Kmom01"
...
Kmom01
=========================



## 1. Gör din egen kunskapsinventering baserat på PHP The Right Way, berätta om dina styrkor och svagheter som du vill förstärka under det kommande året.

  Jag läste igenom hela artikeln och den var väldigt givande. Den var givande för att
  texten gick igenom begrepp och gav länkar. Jag fann att jag började läsa artikeln och
  fick en länk som gjorde så jag började studera begreppet mer detaljerat.

  Jag tycker att jag är hyfsat bra på PHP men det finns rätt så mycket att hålla koll på.
  Målet och viljan är alltid att bli en bättre programmerare. För att bli det så behöver jag
  bli bättre på begrepp och namn på olika saker inom språket. Kortfattat så vill jag inte bara kunna
  göra något, jag vill kunna förklara hur och vad jag gjort.

  Det jag skrivit hittills är rätt så brett, så jag börjar nu med att skriva lite om
  några saker jag kan/ska fokusera på, efter jag läst texten. Så nedan så finns det en lista
  som är uppdelad i följande ordning, delar jag kan, vilka delar jag behöver bli bättre på
  och vilka delar har jag ännu inte koll på.

  1. "Basen" och databas med MySQL.
  2. "Namespaces", "Dependency Management", "Templates", "Errors and Exceptions", Säkerheten, Testing", dokumentation av kod.
  3. "Dependency Injection", "Virtualization", "Caching", "Servers and Deployment".

### Mina styrkor

  En av mina styrkor skulle jag säga är att jag kan basen bra. Ett exempel är, om jag
  har en funktion med en if-sats, så behöver jag oftast inte en "else" för att returnera
  sant eller falskt. I bästa fall så kan jag returnera en jämförelse istället. Return (x == 1)
  är ju bättre än en IF och en ELSE. Sedan kan jag "Ternary operators" som har hjälpt mig att göra
  min kod mer lättläst för mig själv.

  När det kommer till databas med MySQL, speciellt med PDO så känner jag mig rätt så bekväm. Jag gjorde ett hobbyprojekt under sommaren, där jag skapade ett RESTful API med PHP. Man kopplar upp sin MySQL databas som gör så man kan "CRUD" (GET, POST, PUT, DELETE),
  alla svar är i JSON. Under projektet så lärde mig hur jag kan undvika "SQL injection attacks" med "PDO statements and bound parameters". Jag är bekväm, men vill gärna bli bättre på att skriva mer säker och renare kod.

### Delar jag behöver bli bättre på

  I OOPHP så använde vi "Namespaces". Så det har jag lite koll på, däremot så hade
  jag inte tänkt så mycket att när man har olika "libraries" så kan det krocka om
  man inte har "Namespaces". Så under kursens gång så vill jag bli bättre på att kunna
  göra så mina klasser enkelt kan integreras på olika ställen. Många utvecklare skapar
  kod och delar med sig och jag vill bli en del av det samhället, men då måste jag leverera på denna front.

  Sedan så vill jag även bli bättre på "Dependency Management". Ett bra exempel är just anax,
  där använder vi olika beroenden. Anledningen till varför jag vill bli bättre på detta är för att
  om man arbetar med en grupp, så är det ett bra sätt att se till så alla är på samma bana.
  Ett steg i denna riktning är att bli mer bekväm med "dependency managers". Vi har använt
  Composer hittills, målet får bli att bli mer bekväm med den, eller vad kursen kommer använda.

  Angående "Templates" så känner jag mig rätt så bekväm, med Anax iallafall. I Anax så fick
  använda "anax/view", jag har även kodat lite i React.js. Men jag skulle gärna vilja bli bättre på att separera logik och vyer på
  ett bra sätt.

  När det kommer till "Errors and Exceptions" så har jag gjort exceptions, men jag vill gärna dyka djupare på detta ämne.
  Sedan så har gjort några unit-tests i OOPHP-kursen, men "Testing" känns fortfarande främmande. Jag vill gärna
  bli bättre på det.

  För säkerheten så har jag arbetat med htmlentites och förstår att man alltid bör vara vaksam med "foreign inputs".
  Däremot så har jag inte haft tid i kurserna att gå djupare på detta. Det är något jag vill bli bättre på,
  hoppas att kursen kommer röra på det lite.

  Sist men inte minst, så har jag dokumenterat min kod i mina PHP-klasser. Men jag vill lära mig
  att göra det med standarden "PHPDoc".


### Delar har jag ännu inte koll på än.

  I OOPHP så fick vi lära oss mycket om PHP-klasser, däremot inte så mycket vad just "Dependency Injection" är,
  vad jag minns. Det jag tog ifrån mig av texten är att det kortfattat gör så blir det mindre hårdkodade beroenden.
  Så detta är verkligen något som jag kan arbeta med under kursen gång. Jag har sett en video på dbwebb-forum,
  så det verkar som vi kommer röra på detta lite.

  För Virtualization så har jag använt VirtualBox förut för att arbeta i Windows och skicka över det
  till Linux. Men då använde jag Node.js, så har aldrig gjort detta med PHP. Sedan angående caching så vet jag vad det är, men inte hur jag själv kan tillföra detta i min kod. Så det vill jag gärna bli bättre på.

  Servers and Deployment med PHP är något jag aldrig gjort. Så det skulle vara nyttigt att lära sig.


## 2. Vilket blev resultatet från din mini-undersökning om vilka ramverk som för närvarande är mest populära inom PHP (ange källa var du fann informationen)?

  Jag började min undersökning med en klassisk google sökning. Sökningen blev "popular php frameworks 2017". Jag läste artiklarna som dök upp, och alla skrev att Laravel var det kändaste ramverket. Jag ville gärna hitta någon källa från artiklarna på vart de fick informationen ifrån, men ingen angav källförteckning. Det verkar finnas dåligt med källor som man kan lita på, wikipedia har t.ex inte ett diagram på populariteten. Så jag använde [https://trends.google.se](https://trends.google.se) för att söka på "php frameworks" och det kom upp att Laravel var mest populär på "relaterade frågor".


  Hursomhelst enligt artiklarna så ser top 5 ungefär ut såhär, år 2017. Laravel, Zend, Codeigniter, Symfony, Cakephp. Den första artikeln gav en intressant [länk](https://trends.google.com/trends/explore?q=laravel,Symfony,%2Fm%2F02qgdkj,CakePHP,Zend). I länken så kan vi se att enligt "Google Trends" så är
  Laravel betydligt större än de andra. Sedan så kan vi se att de nordiska länderna endast verkar vara intresserade av Laravel.

  Det verkar även finnas ett intresse för ramverket "Phalcon", då jag läste i kommentarsfälten och där skrev personer oftast "where's Phalcon?", om den inte nämndes i artikeln.

  Sammanfattningsvis så skulle jag skriva att, Laravel är utan tvekan fortfarande det största ramverket i 2017. Efter Laravel så föredrar PHP-communityn Zend, Codeigniter, Symfony och Cakephp.
  Det finns även dåligt med information där ute, mer data behövs för att kunna sjunka djupare i detta. Vi skulle behöva fler små surveys (eller stora) för att få ett hum vad folk föredrar utöver Laravel.
  Däremot så verkar "Google Trends" fungera bra för undersökningar som vi kan göra i 2017.

### Källförteckning:

  1. https://trends.google.se
  2. https://coderseye.com/best-php-frameworks-for-web-developers/
  3. https://www.techjunkie.com/popular-php-frameworks/
  4. https://www.sitepoint.com/the-state-of-php-mvc-frameworks-in-2017/

## 3. Berätta om din syn/erfarenhet generellt kring communities och specifikt communities inom opensource och programmeringsdomänen.

  Jag har en positiv syn på communities. Mitt bästa exempel angående en "programmerings community" måste
  vara dbwebb. Jag började på BTH för ett år sedan, väldigt ny till programmering. Jag minns att starten
  var tuff, så jag ställde olika frågor på forumet. Det slutar med att jag blir bemött med kärlek och folk som är villiga att
  hjälpa en. En riktig bra känsla. Nu när jag känner mig mycket mer bekväm som programmerare, så försöker jag ge tillbaka
  till dbwebb forum.

  Det jag har märkt är att en stor del av "software-samhället" gärna hjälper varandra. Att sprida kunskap till den som är villig
  att lära sig, kommer i slutändan gynna samhället. Det är roligt att gå in på stackoverflow och se hur olika programmerare
  tänker. Det jag verkligen gillar är att man inte ger svaret direkt, utan man försöker se till så personen som ber om hjälp
  förstår hur den ska tänka. Folket i "software-samhället" tar sin tid att förklara, det är guldvärt. Det skapar en viss
  vilja inuti mig att ge tillbaka. Jag vill helt enkelt bli jättebra på programmering, jag vill vara den killen som folk ber om hjälp.

  Det finns givetvis negativa aspekter till allt. En sak som kan dyka upp i communities är "jag är bättre än dig" tänket.
  Självklart så finns det folk som är bättre än andra på något. Men det viktiga är att man har en god ton och behandlar
  alla med respekt och kommer ihåg att det är en community och alla försöker göra sitt för att bidra. Sedan om någon skulle
  säga något som är helt fel, så ska man inte förolämpa personen, utan man ska istället förklara varför det är fel (enligt
  videon så är detta vanligt i reddit).

  Sedan så är PHP ett Open-source program. Alla kan göra en ändring i PHP är demokratiska. Så genom att använda PHP så är jag
  med i det samhället, antar jag. Annars är det väl Anax ett open-source projekt, så den skulle jag vilja påstå att jag bidragit
  genom att använda det och ställa frågor om det.

## 4. Vad tror du om begreppet “en ramverkslös värld” som framfördes i videon?

Det handlar i grund och botten om att inte begränsa sig själv känner jag. En module bör leva i sin egna värld och inte
vara beroende av andra saker. Det blir lättare att veta vad man gör och hur man kan utveckla modulen. Men givetvis så kanske
man behöver skicka in saker till modulen för att den ska utföra något. Det ska inte vara så att du laddat ner en module, sedan
så vill modulen ha en module för att fungera, som sedan vill ha en annan module osv.

Sedan att en app inte fungerar för att den är beroende av alla moduler tillsammans är inte så bra. T.ex om jag har en view-module
så vill jag att den ska fungera separat från min comment-module. Sedan så klistrar jag ihop dessa någon annanstans. Hur jag
klistrar ihop dessa ska inte spela någon roll. Man ska alltså kunna plocka moduler här och där för att sedan kombinera dem själv
på en spelplan. Anax är ett bra exempel, det kanske är ett ramverk, men vi kan föra in saker i $app och använda egna moduler enkelt
om vi vill.

Det verkar som att det skulle gynna PHP som språk, då fler nya saker skulle dyka upp. Om man kodar enbart inom
ramen för ramverket så kommer ramverket utvecklas men inte språket.

## 5. Hur gick dina förberedelser inför kommentarssystemet?

Nyligen så gjorde jag ett hobbyprojekt, som jag skrev i fråga ett, [MySQL-JSONify](https://github.com/Nicklas766/MySQL-JSONify).
Det är kortfattat ett RESTful API med PHP. Man kopplar upp sin MySQL databas som gör så man kan "CRUD" (GET, POST, PUT, DELETE),
som sedan ger svar i JSON.

Så det känns som jag kan återanvända en del av min kod därifrån, för att kunna en fristående modul för ett kommentarsystem, då jag
har redan gjort ett "CRUD" för den. Detta kommer även ge mig möjligheten att arbeta på att göra den lätt att integrera i andras kod som ska bli jättetrevligt
att lära sig.

Det är bra att man får veta vad som kommer ske. Då en mental förberedelse får hjulet att börja snurra, jag vet att jag kommer jag tänka på lösningar i vardagen.

## Extra
Till min extra tid så la jag ner lite energi på designen och la till lite javascript. Sedan skapade jag klassen, "viewify", som
låter mig skapa vyer på följande sätt,
```
$files = ["hello1", "hello2", "hello3"];
"views" => [
    ["sidebar", $app->viewify->setArray($files, "link"), "sidebar"], // skapar 3 sidebars med ["link" => "value"]
    ["anotherComponent", ["greet" => "hello"], "main"]
],
```
Följande ger mig 5 olika "components/report" komponenter, med if-sats så blir kmom04 röd.
```
$files = ["report/kmom01", "report/kmom02", "report/kmom03", "report/kmom04", "report/kmom05"];
$title = "Mina redovisningar";

$content = array_map(function ($v) use ($app) {
    $v == "report/kmom04") && return ["content" => $app->getMD("$v"), "background" => "red", "color" => "white"];
    return ["content" => $app->getMD("$v"), "background" => "#009CE6", "color" => "white"];
}, $files);

$app->renderPage([
    "views" => [
        ["components/report", $content, "text"],
    ],
```

Sedan så kan jag också skapa flera olika komponenter samtidigt,

```
$app->renderPage([
    "views" => [
        [["page/home/greeting", "page/home/content", "page/home/content2"], [], "main"],
    ],
    "title" => "Home"
]);
```
