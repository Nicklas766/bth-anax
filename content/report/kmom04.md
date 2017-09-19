---
title: "Kmom04"
...
Kmom04
=========================

Här kommer innehållet till kmom04



Jag har kontroller nu i både formuläret och CommentControllern. Så min commentController, ser till så
man redirectas om t.ex "comment/edit/2" inte är din kommentar. Men däremot så kan man ju fortfarande
skicka en POST via t.ex POSTMAN, därav så har jag även kontroller i formuläret. Man kan även inte byta "id value"
via dev-tools och redigera någon annans kommentar på det sättet, formuläret har kontroller.



Jag laddar även kommentaren i konstruktorn så slipper jag hålla på med id.
