---
title: "Kmom06"
...
Kmom06
=========================


## Har du någon erfarenhet av automatiserade testar och CI sedan tidigare?

Om jag inte missminner mig så var det en föreläsning på Grillcon angående Jenkins.
Det är nog min första introduktion till begreppet **Continuous Integration**. Det
var intressant att se hur ett företag arbetar, att dessa begrepp faktiskt är viktiga
att förstå och kunna.

Hursomhelst så har jag personligen ingen erfarenhet av automatiserade tester. Men jag gillar idén med att
det kan spara tid och energi. Om enhetstester tar upp mycket tid för ett team så
kan automatiserade tester vara en bra idé. Det är alltså motsatsen till *manuell testing*
som utförs av en människa som sitter framför datorn som kör alla tester i olika steg.


## Hur ser du på begreppen, bra, onödigt, nödvändigt, tidskrävande?

Som jag tidigare skrev så är alltså *manuell testing* motsatsen. Att utföra alla
sina tester stegvis själv, kan vara tidskrävande och meningslöst om en dator kan göra
det. Datorer gör som de blir tillsagda, de kan göra samma sak flera gånger, medan en
människa är dömd att göra ett misstag tillslut, så varför inte låta en dator göra
våra testerna med *automatiserade tester* eller *kodanalys*?

Utöver det, så får vi en bra översikt av våra tester. Vårt team kan gå in och se
vilken bugg Jennifer rättade igår, eller vilken bugg Nicklas försöker lägga in i koden.

Givetvis så kan det vara jobbigt att få igång allt, men när man väl gjort det så flyter det på bra.
Det tog energi att få ihop alla externa tjänster för detta moment, men när jag var klar, så löser allt
av sig själv vid en `git push`. Så jag har definitivt en positiv inställning mot begreppen.


## Hur stor kodtäckning lyckades du uppnå i din modul?

Min kodtäckning blev 76%. Jag vill börja med att skriva om utmaningen jag mötte
på min väg, angående `sqlite`. Jag ville att vem som helst ska kunna ladda ner modulen
och göra en `make install test`, för att komma igång direkt. I mitt fall så behövdes
en `sqlite::memory: database`. Det tog ett tag att få till det, men jag och Anders satt
i hangout och listade ut att man kan lägga in en setup-kod i min `di-container`. Så det
var trevligt och känns riktigt bra att ha ett test som fungerar för andra användare.

Hursomhelst så är det inte anledningen varför jag inte har 100% kodtäckning. Det var
mer att det kändes lite märkligt att försöka mocka alla mina funktioner i min klass enbart för att de använde sig av `pageRender()`, jag har lärt mig en stor läxa, som är att
jag bör skapa enhettester medan jag bygger koden, detta var rätt så jobbigt att försöka enhettstesta. Mina kontrollers som använder
`pageRender()`, kallar även en annan funktion innan de startar `pageRender()`, så det är något
som jag kan behöva fixa, så att det blir lättare att testa olika funktioner. Inte för att lägga
all skuld på `pageRender()`, men att den använder sig av en `exit()` gör allt svårare än vad som behövs,
första steget hade varit att fixa den, men det jag personligen kan göra är att göra om strukturen på
hur mina kontrollers kallar `pageRender()`. Just nu kör jag endast dessa funktioner längst ner i testet `Test/src/Comment/AdminControllerTest`,
däremot så kör jag endast funktionerna, men de testar egentligen ingenting, så jag behöver göra om grunden av kodstrukturen för att
kunna göra det i framtiden.

## Berätta hur det gick att integrera mot de olika externa tjänsterna?

Det flöt på bra, givetvis så tog det energi och tid, men ingenting strulade. Det var egentligen endast
att förstå UI:n på hemsidorna och sedan koppla ihop tjänsten med sitt GitHub-konto och sedan repot.

Jag integrerade alla tjänster som artikeln gick igenom. Det enda som strulade var nog att jag behövde
en `sqlite::memory: database`, men det löste ju sig tillslut. Jag fixade några minor severity som jag fick,
av **SensioLabsInsight** så gick jag från 55 till 61, sedan ner till 54 när jag introducerade en `PageRenderMock`,
så det var roligt att faktiskt prova dessa verktyg på "riktigt".


## Vilken extern tjänst uppskattade du mest, eller har du förslag på ytterligare externa tjänster att använda?

Alla är bra, men jag gillar **Scrutinizer** mest. Jag gillar den mest för att har en lättläst logg, där jag kan se hur många
fel jag rättat, eller hur många fel jag introducerat i koden. Sedan så kan jag gå in på dessa fel och se vart de ligger och
vad jag bör göra. Så kodanalysen **Scrutinizer** ger mig uppskattar jag. **SensioLabsInsight** fungerar också bra, men **Scrutinizer**
kändes mer användarvänligt.
