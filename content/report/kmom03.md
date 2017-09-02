---
title: "Kmom03"
...
Kmom03
=========================

## Hur känns det att jobba med begreppen kring dependency injection, service locator och lazy loading?

Det känns riktigt bra, det känns som nyttiga begrepp att kunna. Jag skrev även [artikeln](http://www.student.bth.se/~nien16/dbwebb-kurser/ramverk1/me/anax/htdocs/article/di) om alla dessa tre
som var jättebra för mig personligen, så fick jag tid att reflektera och dyka djupare i litteraturen.

Allt känns logiskt och det är ju meningen. Jag gillar att jag lär mig begreppen så jag kan kommunicera med
andra programmerare hur jag tänker eller förstå hur de tänkt. Så det känns jättebra att jobba med dem.

## Hur känns det att återigen göra refaktoring på din me-sida, blir det bättre?
Det känns riktigt bra. Jag gillar den nya konfigurationen för routes, där man kan göra en controller specificerad för vissa routes.
Man kunde göra det innan, men nu importerar vi filerna till `route2.php` och kan därifrån bestämma vad första routen ska vara. Det
gör så att jag kunde skapa klar och tydlig kod för mina controllers med routerna. Detta känns som ett renare sätt än kmom02, för att
jag har en route, en controller och en modell. Allt blir mycket lättare att hålla reda på enligt mig.

Jag märkte inte alltför stor skillnad med en DI-container istället för $app, båda fungerar likt en "Service Container". Däremot
så föredrar jag en DI-container, då man fick "lazy loading" av `anax/di` som kändes bra, så slipper alla klasser laddas på en gång.
Men jag känner mig mycket nöjd då jag lyckades med kursmomentet, då jag fick bort beroendet av `$app` och använder nu `$di`.

## Lyckades du införa begreppen när du vidareutvecklade ditt kommentarssystem?

Enligt mig så lyckades jag riktigt bra med att införa begreppen. Mycket fick man av artikeln från kursmomentet.
DI-containern fungerar ju som en "service container", som betyder att vi håller kopplingen mellan klasserna via kontainern. Sedan
så löser även DI-containern **Lazy loading**, så klasser laddas när de behövs. Om de inte behövs så laddas de inte.

Sedan så fortsätte jag att bygga mitt kommentarssystem. Då kommentarssystemet skulle ha en slags användardel, så såg
jag till att strukturera om min kod. Jag gjorde det enligt MVC, så det blev nya controllers och en ny modell. Då jag
redan kör med en MySQL-databas, så flyttade jag alla `fetch()`, `fetchAll()` och `execute()` till `connect.php`. Sedan
får mina modeller extenda `connect.php` så blir modellerna så fokuserade som möjligt på en sak, t.ex så är `comment.php`
väldigt fokuserad på just kommentarer medan `user.php` är fokuserad på användardelen. Sedan så experimenterade jag lite med
controllers och har några extends som t.ex `UserActionController extends UserController`.

Med hjälp av "`$\Anax\DI\InjectionAwareTrait`" och `use Anax\DI\InjectionAwareTrait` så kunde jag injecta in DI-kontainern som `$this->di`
i de klasser som behövde den. En dependency som mina modules och controllers fick var "**session-klassen**", mest för att kunna skapa
användar-flödet med kommentarer, inlogg och kontroller av behörighet. Sedan så har jag även "**renderPage-klassen**" för att kunna visa de vyer
som jag vill visa.


## Allmänna kommentarer kring din me-sida och REM servern och dess kodstruktur?

Efter jag var klar med refactoringen så började med att ta koden från min Viewify-klass och la in den i `Anax\Page\PageRender klassen`. Detta
gjorde jag för att jag gillar att kunna skicka in vyerna direkt via renderPage. Därefter så ändrade jag
i `FlatFileContentController` så de vyer jag vill ha visas korrekt, sedan passade jag på att göra så att
om `$path == ""` så ska första-sidan renderas. Det började bli mycket kod i `FlatFileContentController` så jag
skapade en `ReportController` för mina redovisningstexter. Med inspiration från mina gamla report routes och
`ErrorController` så kan denna kontrollern hämta alla texter eller endast en, routes ligger i `config/route2/report.php`.

Sedan så har jag gjort mycket med vilka vyer som ska visas. T.ex om man inte är inloggad så uppmannas man att göra det
vid kommentarssidan. Om man har behörighet "admin" så visas en admin-header på profilsidan, med länkar till användarhanteringen.
Sedan så la jag in lite stil bara för att jag tycker det ser så dåligt ut annars. Istället för att göra en kommentarssida för enbart admins
så kan admins redigera precis som användarna kan, bara att de har tillgång till andras.

Jag är väldigt mån om att man inte ska kunna göra något som man inte ska kunna göra. T.ex på kommentarssidan så har jag en div över submit formen om man
inte är inloggad. Men man ska fortfarande t.ex inte kunna göra en POST via "Postman". Så jag har sett till att göra massa "controls" på "path null". Så
mina controllers tittar så allt är bra och grönt innan de går vidare.

Jag har inte så mycket att tillägga om REM servern, då det känns som jag redan gått in på det mesta. Men det är ett bra
sätt att lära sig och sedan refaktorera om sidan. Den visar hur det fungerar med den nya konfigurationen för routes och
även DI-containern. Ett stort men även väldigt lärorikt kursmoment.
