# TODO

* Ich möchte für jedes App Item ein <a href=„url_to_app“ target=„blank“> statt dem aktuellen iframe.

## View (Template)

### Apps

#### Nur noch folgende Apps:
* Weiterhin Provise verlinken
  * Dies wird nicht direkt vom Dashboard unterstützt, soll aber als link erhalten bleiben.
* Visio behalten
* Präsentation: strut.io hinzufügen
* Prototyping: Marvel
* Zeichnen: Summo( Save to Cloud -> Edit link Speicher)
  * Wenn nicht mit electron geöffnet, nach Wiederkehr fragen ob ein link gespeichert werden kann?

### Dateien
* weiteres felder
  * app_name
  * geändert/erstellt Datum
* Dateien können Sortiert werden
* Default sortierung: Nach Applikation, Name, Datum
* Es soll einen Link für die Datei geben
  * Pro App verschiedene Aktion
  * Natürlich für die Link Datei, den entsprechenden Link


## Schnittstelle

### Datei
* uploadFile(appname,url,gruppen_id=null): Datei upload, rückgabe (daisy-url)
  * url=der link zur Datei
  * gruppen_id kann null sein und gibt ggf. eine gruppe an in der die Datei hinzugefügt wird.
  * return: daisy-url
* uploadLink(url): Link Upload, rückgabe (daisy-url) - Kann auch einfach nur ein link auf eine Datei sein!
  * url=der Link
  * return: daisy-url

### Gruppen
* getMyGroups():
  * return: alle meine Gruppen in Array
* createGroup(name): erstellt gruppe mit gruppen name
  * name: der name der Gruppe
