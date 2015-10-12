# TODO

NOTHING




# Erledigt

## Aufrufen von Runtergeladenen Dateien
### Bei runtergeladenen Dateien (visio):
* Die URL (Visio) wird aufgerufen
* mit einem Slash (Visio/bla.vsd) dies Zeigt auf den inhalt der Datei
  * Der Inhalt wird erst unter dem Link verfügbar, beim klick.
    * Somit sind doppelte Dateinamen möglich.
* Den rest mache ich

### Bei Sumo Paint
* Die hinterlegte URL wird aufgerufen. - fertig

### Bei Strut
* Kann ich selber Programmieren, ich werde den einfachsten Weg der vorherigen Wege benutzen.

## Anderes
* Der Callback von fileUpload ist ein HTML?
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
* Gruppen können hinzugefügt und geändert werden.

## Schnittstelle
### Datei
* uploadLink(dateiname,appname,url): Link Upload, rückgabe (daisy-url) - Kann auch einfach nur ein link auf eine Datei sein!
  * appname
  * url=der Link
  * return: daisy-url
### Gruppen
Forerst nicht notwendig.
* getMyGroups():
  * return: alle meine Gruppen in Array
* createGroup(name): erstellt gruppe mit gruppen name
  * name: der name der Gruppe
