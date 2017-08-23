---
title: "MVC"
header: "Model, View, Controller (MVC)"
author: "Nicklas Envall"
...
# En artikel om MVC

---

Innan vi kan börja titta på "Model, View, Controller (MVC)" så behöver vi kortfattat veta
vad det är. Enligt wikipedia så är det ett "arkitekturmönster". I detta arkitekturmönster så
har man data i en (model) sedan en (view) där man presenterar datan. Man försöker alltså separera
hanteringen av datan och presentation av datan. Meningen är att det ska bli lättare att göra
ändringar i datan utan att behöva oroa oss över vår (view). Så vyn presenterar datan som är
hämtad från modellen.

<img style="float:right; height:400px;" src="https://upload.wikimedia.org/wikipedia/commons/archive/f/fd/20100511011523%21MVC-Process.png">

Bra, då har vi en vy som vår användare kan titta på, sedan har vi vår data i en model. Men för att
skapa användarinteraktion så använder vi en (Controller). Controllerns uppgift att t.ex se ifall
vår användare Kalle gör en POST på routen "comment", då säger Controllern "en POST, I'm on it, jag
hämtar alla POST's och skickar vidare detta till modellen som fixar datan". Det är ett kort exempel hur
det kan gå till.

Vi tar ett till exempel för att förklara processen. Vi har en klädmodell, en designer och en koordinator.
Vi ska ut på en scen och visa upp kläderna. Koordinatorn säger "nu är det dags för vinterkläderna" till designern,
designer ser till så kläderna är rätt, sedan får klädmodellen de rätta kläderna. Sedan vill publiken se sommarkläder,
då det dags för sommarkläderna säger koordinatorn.

1. Modeller representerar dina datastrukturer, vanligtvis genom att ansluta till databasen
2. Vyer innehåller templates för data som visas för användaren
3. Controllers hanterar sidförfrågningar och binder allt tillsammans


## Vyn, modellens och kontrollerns relation

Många misstar att vyn inte har någon relation med modellen överhuvudtaget, att endast datan från vyn ska komma från
controllern. Men enligt sitepoints [artikel](https://www.sitepoint.com/the-mvc-pattern-and-php-1/), så är detta flöde
fel enligt arkitekturmönstret som vi försöker skapa. Artikeln går in på att vissa utvecklare tror att de följer
MVC när de egentligen inte gör det. Vyn ska **INTE** ta emot data från controllern i ett korrekt MVC mönster, modellen
ska vara emellan vyn och kontrollern.

Kontrollerns uppgift är att hantera data som användaren ger oss via inputs eller submits, därefter skicka vidare
datan till modellen som vyn hämtar/får och visar.

Nedan finns citat tagna från artikeln [views-are-not-templates](https://r.je/views-are-not-templates.html), som förklarar att det
är okej för vyn att ha en relation med modellen.



> The views know of the model and will interact with the model. -Deacon, 2000

.

> ... the view could then request the current state of the string from its model -Burbeck, 1992

.

> ... Views can then inquire of the model about its new state, ...  - Krasner & Pope, 1988

.

> The view renders the contents of a model. It accesses enterprise data through the model and specifies how that data should be presented. -Sun Microsystems, 2000

## Sammanfattning

MVC är ett känt mönster för att bygga sin applikation. Den separerar presentation, datahantering och interaktioner. Vyn ska inte
ta emot data från controllern i ett korrekt MVC mönster, men det verkar vara oklart vad som gäller i PHP-samhället.


<img style="float: right;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b5/ModelViewControllerDiagram2.svg/350px-ModelViewControllerDiagram2.svg.png">

### Källförteckning
1. [https://sv.wikipedia.org/wiki/Model-View-Controller](https://sv.wikipedia.org/wiki/Model-View-Controller)
2. [https://www.sitepoint.com/the-mvc-pattern-and-php-1/](https://www.sitepoint.com/the-mvc-pattern-and-php-1/)
3. [https://www.sitepoint.com/the-mvc-pattern-and-php-2/](https://www.sitepoint.com/the-mvc-pattern-and-php-2/)
4. [https://r.je/views-are-not-templates.html](https://r.je/views-are-not-templates.html)


av Nicklas Envall
