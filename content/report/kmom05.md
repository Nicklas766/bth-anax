---
title: "Kmom05"
...
Kmom05
=========================

Här kommer innehållet till kmom05


Jag fick uppdatera alla mina $app->link i vyerna till $this->url




## Hur väl lyckas du enhetstesta din modul och hur mycket kodtäckning fick du med?

Jag tycker att jag gjorde ett bra jobb. Istället för att börja skriva tester direkt,
så fräschade jag upp minnet genom att gå tillbaka till OOPHP-kursen. Sedan skapade jag
en ny config fil för min `$di`, som blev "testDI.php", då nästan varje funktion i min modul är beroende av DI-containern.

Därefter så tittade jag på en riktigt bra guide på youtube om `phpunit`. Så jag nådde XX
i kodtäckning, men jag tycker att testerna fick en bra "kvalité", då jag tänkte igenom testerna istället
för att försöka nå en hög kodtäckning.

Jag använder funktioner som `setUp()` som fungerar ungefär som en constructor. Den såg till så man slipper
skapa en ny klass för varje test, den skapar om allt inför varje test. Sedan så använde jag `tearDown()` för att eventuellt
ta bort saker jag gjort i en databas t.ex. Så om jag med `setUp()` skapar och sparar en användare, så tar jag sedan bort den med
`tearDown()`.


En stor del av min modul använder sig av "renderPage", detta gör det svårare att enhetstesta då den
använder `exit()`.

Lustigt nog så var enhetstester roligare än vad jag minns från OOPHP, troligtvis för att.....

Mycket av kodtäcknignen kommer ifrån mina HTMLForm-klasser, men det är endast konstruktorn på vissa av dessa. De mer detaljerade
testerna är för mina modeller och alla "edit HTMLForms".
