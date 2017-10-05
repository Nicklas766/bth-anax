---
title: "Kmom05"
...
Kmom05
=========================

## Hur gick arbetet med att lyfta ut koden ur me-sidan och placera i en egen modul?

Det flöt på bra. Det var lite att fixa och trixa, jag gick igenom artikeln några gånger och
följde den medan jag lyfte ut alla nödvändiga filer till en egen modul. Jag gillade verkligen
`anax create dev ramverk1-site-develop`, den scaffolden gav mig en bra bas för att se så allt
fungerade och inget saknades. Så det jag gjorde var att flytta kod till `/dev` och provade
på den. Givetvis så uppskattade jag även `anax create remserver ramverk1-module` som underlättade
processen oerhört mycket, då jag slapp försöka lista ut hur jag ska ha basen.

Under flyttningen så märkte jag att mina vyer fortfarande var beroende av `$app` då vyernas
länkar inte fungerade i `/dev`. Så jag fick uppdatera alla mina `$app->link` i vyerna till `$this->url`.


## Flöt det på bra med GitHub och kopplingen till Packagist?

I början så tyckte jag att det var lite utmanande med just att förstå vad som jag faktiskt gjorde.
Så jag artikeln en gång, sedan raderade jag allt och började om från början med mina nya kunskaper.
Då gick det mycket smidigare, jag förstod att `dev-master` var de senaste ändringarna och man kan
se till så man kan arbeta med den, om man aktivt ställer in det.

Därefter att publicera den på github med taggar var riktigt enkelt, då vi många gånger redan gjort
detta. För att ladda upp på Packagist och koppla ihop den med Github, så var det bara att klicka
på några knappar och följa instruktionerna.

## Hur gick det att åter installera modulen i din me-sida med composer, kunde du följa du din installationsmanual?

Det gick bra med att integrera min egna modul i min me-sida. Jag hade övat några gånger med `/dev` för att skapa en
guide som jag vet fungerar. Så det var i stortsett endast att göra en `composer require nicklas/comment` och sedan
kopiera några filer för config och vyer. Kändes riktigt smidigt, skönt och coolt att ha en egen modul.


## Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?

Jag tycker att jag gjorde ett bra jobb. Istället för att börja skriva tester direkt,
så fräschade jag upp minnet genom att gå tillbaka till OOPHP-kursen. Sedan skapade jag
en ny config fil för min `$di`, som blev "testDI.php", då nästan varje funktion i min modul är beroende av DI-containern.

Därefter så tittade jag på en riktigt bra guide på youtube om `phpunit`. I guiden så skapade
personen enhetstester innan och under utvecklingen av klasser. Det verkade så mycket lättare att
skapa sin kod på detta sätt. Man skapar en klar bild om vad man vill uppnå. Jag ska försöka använda detta tillvägagångsätt i framtiden.

Hursomhelst så nådde jag 41.82% i kodtäckning, men jag tycker att testerna fick en bra "kvalité", då jag tänkte igenom testerna istället
för att försöka nå en hög kodtäckning. Jag använder funktioner som `setUp()` som fungerar ungefär som en constructor. Den såg till så man slipper
skapa en ny klass för varje test, den skapar om allt inför varje test. Sedan så använde jag `tearDown()` för att eventuellt
ta bort saker jag sparat i databasen. Så om jag med `setUp()` skapar och sparar en användare, så tar jag sedan bort den med
`tearDown()`.

Det fanns däremot några motgångar också. Till exempel så använder en stor del av min modul av "renderPage", detta gör det svårare att enhetstesta då den
använder `exit()`. Sedan så kommer mycket av kodtäcknignen ifrån mina HTMLForm-klasser, men det är endast konstruktorn på vissa av dessa. De mer detaljerade
testerna är för mina modeller och alla "edit HTMLForms".

Lustigt nog så var enhetstester roligare än vad jag minns från OOPHP. Jag förstår bättre nu, om varför man använder enhetstester,
ärligt så har jag tidigare inte riktigt förstått idén. Men det känns som jag förstår mycket bättre nu, det jag tar mig
ifrån den här delen av kursmomentet är att enhetstester kan vara ett verktyg för att skapa ny kod, inte enbart testa befintlig.


## Några reflektioner över skillnaden med och utan modul?

Det blir mycket lättare att testa sin modul när den inte ligger i t.ex ett ramverk.
Jag hade givetvis kunnat enhetstesta min modul i ramverket, men om min modul har
ett eget "hem", så kan jag dekorera allt lite mer specifikt. Jag tror även att det
blir lättare att utveckla med modul, varför? Jo för att man vet vad vilka dependecies man
har till just den delen. Om koden ligger i en stort ramverk som har många dependecies, så
blir det så mycket svårare att komma ihåg sina beroenden till just den delen av koden.

En grov, men rolig jämförelse hade kunnat varit följande, vill du ha pasta, ris och havregryn
i separata burkar eller allt i samma? En överdriven metafor, men den stämmer hyfsat bra.
