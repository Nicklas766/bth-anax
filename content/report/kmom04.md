---
title: "Kmom04"
...
Kmom04
=========================

## Hur gick det att integrera formulärhantering och databashantering i ditt kommentarssystem?

Det var förvånansvärt enkelt, men det blev mycket kod. Varför tycker jag att det var enkelt?
Jo innan jag använde **HTMLform** och **Active Record** som tillvägagångssätt, så hade jag många
klasser i service containern, det var formulär i vyer, det var många routes, det var lite
huller om buller helt enkelt.

Så det fick bli en hel refactor för mitt kommentarssystem enligt active record och med hjälp av **HTMLform**.
All ny kod ligger i `src/comment2` istället för `src/comment`. Jag började alltså om från början med min kommentarsmodul, som var
helt okej, då jag fick en mycket bättre struktur.


## Berätta om din syn på Active record och liknande upplägg, ser du fördelar och nackdelar?

Personligen så tycker jag att det blir väldigt tydligt vad som händer i koden. Om jag lägger till
en mejladress till en användare så behöver jag oftast göra något i denna stil `$user->email = "nicklas766@live.se"`.
Det blir väldigt tydligt var som händer, istället för att kalla en funktion på detta sätt `addUser($params)`.

Däremot så kan det bli fler rader kod, men detta är något jag antar, inte något jag av erfarenhet upplevt. Min idé bakom varför
jag tror att det kan bli fler rader kod, är just på grund av alla `$user->attribut` man måste ha på varje rad. Däremot
så går det nog att fixa via en konstruktor, för snabbt kunna skapa nya användare.

Men jag gillar att jobba med klasser, så det är nog därför jag gillar **Active Record**. Så jag har definitivt en positiv
syn på detta mönster.


## Utveckla din syn på koden du nu har i ramverket och din kommentars- och användarkod. Hur känns det?

Det känns riktigt bra. Det jag gillar mest av just detta kursmoment är **HTMLform**, men även att kombinera det med
**Active Record**, som gjorde allt så "smooth".

För att kunna titta på min kod som jag har nu, så behöver jag reflektera hur det såg ut innan. Om man tittar i
`config/route/comment` och `config/route/comment2`, så kan man se en markant skillnad i hur många routes jag
använder nu. Jag använder ungefär hälften av alla routes, så det är riktigt skönt. Det är en riktigt förbättring
för att jag slipper springa runt i koden så fort jag gör en ändring. Nu har jag istället koden för formuläret och
några if-statser i HTMLform, sedan några controllers som ser till så allt blir rätt, därefter **Active Record** modellerna
som har all data.

Denna gången så har jag skapat en `class FrontController`, alla andra controllers extendas till denna. Detta gör så jag
endast behöver lägga in den en gång i `config/di.php`. Sedan så har jag kod i formulärerna som jag skrev, if-satser som t.ex
ser till så man inte kan redigera någon annans kommentar. Men jag vill fortfarande inte att man ska kunna komma in på sidan
om man inte ska kunna göra det. Därav så ser min commentController till så man redirectas om t.ex "comment/edit/2" inte är din kommentar.
Sedan så har min `class AdminController` en funktion som kontrollerar på alla `/admin` routes om man är admin eller ej.


Sammanfattningsvis så har jag gjort en hel refactor enligt Active Record och med hjälp av HTMLform. Jag har varit väldigt mån
om säkerheten, men för att texten inte ska bli allt för lång så skippar jag att skriva om allt jag gjorde där. Men jag är väldigt nöjd med min nya
kod.


## Om du vill, och har kunskap om, kan du även berätta om din syn på ORM och designmönstret Data Mapper som är närbesläktade med Active Record. Du kanske har erfarenhet av likande upplägg i andra sammanhang?

Jag ska vara helt ärligt och säga att jag inte har så mycket kunskap om detta. Däremot så använde jag **SQLAlchemy** i OOPython-kursen, som är en verktyg för SQL som använder ORM.
Jag känner verkligen igen mig i hur koden är uppbyggd i detta kursmoment, om man jämför med hur jag gjorde i mitt OOPython-projekt. Med **SQLAlchemy** så fick man skapa klasser, ändra dem för att
sedan spara dem i databasen. Skillnaden jag märkte i detta kursmoment är nog att med **SQLAlchemy** behövde ange i konstruktorn vilka data typer attributen skulle ha.

## Vad tror du om begreppet scaffolding, kan det vara något att kika mer på?

Det är ett riktigt bra sätt att snabbt starta ett nytt anax-projekt. Det är iallafall smidigt och lätt att hänga med i artiklarna
tycker jag. Jag är inte 100% säker, men jag tror att det finns en vanlig scaffold till ett nytt "vanligt" anax-projekt. Jag kommer nog
scaffolda en grund för mitt projekt hos kursen indproj. Kanske bäst att kolla med mos hur jag ska gå tillväga där. Men kortfattat, så
tycker jag att det är ett snabbt och smidigt sätt att komma igång med något.

PS: Jag gjorde make test, det validerade, sedan dbwebb publish, då klagade den på 4 rader, sedan blir det tvärtom om jag fixar, så
därav har jag ett fel i make test.
