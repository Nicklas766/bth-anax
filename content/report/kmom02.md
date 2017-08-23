---
title: "Kmom02"
...
Kmom02
=========================

## Vilka tidigare erfarenheter har du av MVC? Gick arbetet bra med artikeln om MVC?

Till min kännedom så har jag inga erfarenheter av MVC. Jag kan ha arbetat i ett ramverk utan att ha tänkt på det.
Hursomhelst så gick det bra med artikeln, allt kändes logisk och det är ju meningen med detta "arkitekturmönstret”.

Det tog ett tag att förstå flödet, hur jag själv skulle gå tillväga. Men i grund och botten så är det kontrollerns uppgift
är att hantera data som användaren ger oss via inputs eller submits, därefter skicka vidare datan till modellen som vyn får/hämtar och visar.
Det är ett bra sätt att dela upp frontend, middleware och backend på detta sätt då man kan fördela arbetet per kompetens, som artikeln påpekar.

Artikeln förklarar att det inte finns ett "sant" sätt att använda MVC, därav så finns det artiklar som säger det ena och sedan en annan som påstår
något helt annat. Det upptäckte jag även när jag sökte på nätet för mer information. Men jag känner att min förklaring ovan och artikel på min me-sida,
förklarar hur grunden för MVC fungerar.

Övrigt så känns det bra att jag lyckas få "dumma vyer", äntligen, som vi pratade om i OOPHP-kursen. Min kontroller hanterar
användarinteraktioner, modellen har min data och logik medan vyn är en template för datan som jag visar för användaren.


## Kom du fram till vad begreppet SOLID innebar och vilka källor använde du? Kan du förklara SOLID på ett par rader med dina egna ord?

Bryggde en kopp kaffe och tittade på videon i 8min, sedan valde jag att kika på wikipedia, därefter tillbaka till videon igen. Så källorna blev
videon och wikipedia.

**SOLID** består av fem objekt orienterade design principer och är ett akronym för följande,

1. *S* ingle responsibility principle. (SRP)
2. *O* pen/closed principle. (OCP)
3. *L* iskov substitution principle (LSP)
4. *I* nterface segregation principle (ISP)
5. *D* ependency inversion principle (DIP)

Det är alltså fem principer så för att inte skriva alltför mycket, så skriver jag nedan kort vad de i grund och botten betyder.

Enligt **Single responsibility** principen så ska en klass endast ha ett skäl att ändras, det betyder ungefär att en klass endast ska ha ett jobb att utföra.
Enligt **LSP** så ska objekt vara öppna för ”extensions”, men stängda för modifiering. Så det betyder att objektet tillåter sitt beteende att förlängas utan att ändra källkoden.
Sedan enligt **Liskovs** principen så ska objekt i ett program ersättas med förekomster av deras subtyper utan att ändra programmets korrekthet.
**ISP** innebär att det ska finnas många och simpla gränssnitt, ej få och stora. Ett program ska inte vara beroende av metoder som den inte använder.
**DIP** innebär att abstrakta gränsnitt ska användas istället för att klasser är beroende av varandra.



## Gick arbetet med REM servern bra och du lyckades integrera den i din me-sida?

Artikeln/uppgiften var riktigt bra då den fick mig igång med hur en kontroller och modell kan se ut. Arbetet flöt på bra och det var i stortsett endast
att läsa artikeln, följa instruktionerna och sedan var man klar. Under uppgiften gång så fick jag även se hur jag kan göra med Anax-router, detta gjorde det
lättare att sätta upp min kommentarskontroller som jag kommer gå in på senare.

Sedan så tog jag tillfället i akt och tog bort onödiga routes för mina /about och /aboutPage sidor som endast var markdown. Jag studerade flat-file-content.php istället
och märkte att jag kan skapa en egen renderpage där för att se till så jag får de vyer jag vill ha. Så då slapp jag skapa massor av onödiga routes i routern. Sedan så städade
jag upp min /report route, där har jag en möjlighet att skapa en modell och kontroller, men det får bli i nästa kmom03 isåfall, då jag vet att router uppsättningen kommer ändras.


## Berätta om arbetet med din kommentarsmodul, hur långt har du kommit och hur tänker du?

Jag gjorde alla kraven, det är även minimal kod i routerna. För att kontrollern ska fungera så används routerna för att skicka
iväg ansvaret till den rätta funktionen, som sedan tar POSTS/GETS och skickar denna informationen till modellen som sedan kan uppdatera, radera eller skapa data.

I min modell så kopplas man upp mot en MySQL-databas, så man måste ange vilken databas och vilket table man vill använda. Den fungerar så
att bordet ska ha tre rows, som är "comment, email, id", id är "AUTO_INCREMENT". Hursomhelst så får den data från kontrollern och gör det den ska med datan
i databasen. Sedan så har den "`getComments()`" och "`getComment($id)`" för att returnera datan, som vyn behöver. Sedan så valde jag att injecta `$app->textfilter`
i min modell, så detta blev en dependency för att den ska ska kunna returnera markdown data, utan att behöva spara den i html-format i databasen. Min logik
för att se till så man får en gravatar har jag även i modellen i "getComments()".

Sedan så har jag gjort två routes där jag hämtar informationen från modellen och visar med mina vyer. Detta skapar ett bra MVC flöde, då alla användarinteraktioner går via
kontrollern, medan vyn alltid använder aktuella datan från modellen. Jag kunde gjort så vyerna hade data på följande sätt, `$app->comment->data`, men jag tyckte det var smidigare att
använda Anax-router och hämta informationen från domänlagret till vyn med `$app->comment-getComments()`. Jag grubblade länge för mig själv om det var en okej lösning att använda anax-router
för att göra `$app->renderpage` för båda vyerna. Men jag beslöt mig tillslut att det var en okej lösning, då det följde MVC mönstret och kändes smidigare att använda anax-router för att se till
så rätt vy visades i rätt route. Sedan berättade Anders vad som skulle ske i kmom03 (Refactor) och då kändes det som ett bra beslut att gå vidare.

Sammanfattningsvis så sköter kontrollern användarinteraktionerna, sedan har vi en vy som alltid använder aktuella datan från modellen.
