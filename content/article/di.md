---
title: "MVC"
header: "Dependency Injection (DI)"
author: "Nicklas Envall"
...
# The dependent, served and lazy patterns.

Det finns otroligt många principer och metoder för programmering. Men denna artikeln kommer gå in på **Dependency Injection**, **Service Locator** och **Lazy Loading**.
Vad har alla dessa tre gemensamt? Jo alla är "[designmönster](https://en.wikipedia.org/wiki/Software_design_pattern)",
som betyder att man kodar enligt en viss arkitektur. Artikeln kommer gå igenom en i taget.

## Dependency Injection

Innan vi börjar, så kan vi fråga oss själva, vad är en "dependency"? Kortfattat så är det
ett objekt som behöver ett annat objekt för att fungera. Ett bra exempel skulle vara att
vi har en klass som hämtar något från en databas-klass, det betyder alltså att klassen
är beroende av den databas-klassen.

Men vad är "dependency injection"? Det är i grund och botten att istället för att hårdkoda
något i klassen, så stoppar man in något i klassen. Enligt [wikipedias artikel](https://en.wikipedia.org/wiki/Dependency_injection)
så finns det tre vanliga sätt att göra detta, som är via konstruktorn, "setters" eller interface.


## Service Locator

När vi stoppar in en klass i en annan, vi säger att vi stoppar in B-klass i A-klass, så har vi en direkt koppling till A-klassen därifrån
vi la in den. Detta betyder att vi behöver skapa kod i A-klassen för att se till så vi mottar B-klassen rätt, sedan kanske vi behöver
en C-klass, sedan bygger det på och blir jättestort.

Men om vi vill undvika hårdkodningen/logiken för att lokalisera eller underhålla beroenden, vad gör vi då?
Jo då kan vi använda en "locator", den ställer sig emellan A-klassen och våra beroenden, sedan kan vi hämta
dem vart vi vill i A-klassen via "service locator:n". Jag har bifogat två bra bilder från microsoft [artikel](https://msdn.microsoft.com/en-us/library/ff648968.aspx) som visar hur
det kan se ut.

**Utan en service locator**

<img style="height:150px;" src="https://i-msdn.sec.s-msft.com/dynimg/IC340134.png">

**Med en service locator**

<img style="height:150px;" src="https://i-msdn.sec.s-msft.com/dynimg/IC340135.png">


## Lazy Loading

Kortfattat så innebär detta designmönstret att man avvaktar med att skapa objektet innan det behövs. Det
kan bidra till effektiviteten i programmet om man gör det på rätt sätt.

Det kan vara klokt att använda "Lazy Loading" om man har många olika klasser i en stor applikation och vill
göra något mer effektivt. Detta är för att klasserna laddas när de behövs, som skapar ett bra flöde i programmet.
Motsatsen är "eager loading", där laddar man allt på en gång, även fast man inte behöver klassen/klasserna.


## Sammanfattning

Om vi ska knyta ihop säcken så kan vi skriva att det finns fördelar med alla tre. Med "Dependency Injection (DI)" så kan
vi testa våra beroenden utanför klassen, då vi injectar dem istället för att ha logiken i klassen. Det finns nackdelar däremot,
en är att desto mer klasser som skapas, desto mer bli ansvaret fördelat, som kan komplicera saker i slutändan.

Sedan angående "service locator" så är det ett bra sätt att struktera beroenden och lokalisera dem. En negativ aspekt kan vara att man inte ser direkt
vilka beroenden en klass har, då de ligger i "service locatorn". Sist men inte minst, så har vi sparat "lazy loading" till sist, väldigt
passande då "lazy loading" skjuter upp allt så mycket som möjligt till framtiden.


### Källförteckning
1. [https://en.wikipedia.org/wiki/Dependency_injection](https://en.wikipedia.org/wiki/Dependency_injection)
2. [https://www.youtube.com/watch?v=IKD2-MAkXyQ](https://www.youtube.com/watch?v=IKD2-MAkXyQ)
3. [https://en.wikipedia.org/wiki/Service_locator_pattern](https://en.wikipedia.org/wiki/Service_locator_pattern)
4. [https://msdn.microsoft.com/en-us/library/ff648968.aspx](https://msdn.microsoft.com/en-us/library/ff648968.aspx)
5. [https://en.wikipedia.org/wiki/Lazy_loading](https://en.wikipedia.org/wiki/Lazy_loading)

av Nicklas Envall
