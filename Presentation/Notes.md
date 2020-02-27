# Notes

## Gliederung
1. Einleitung
2. Besonderheiten
3. Eigenarten
4. Tour

## Inhalt
### 1. Einleitung
  - (Vorstellung)
  - Projektthema: HipHop - Online Shop. Philosophie orientiert an den Grundprinzipien des HipHops
  - Design orientiert an der direkten Konkurrenz sowie anderen beliebten Online-Shops.
  - MVC von Herrn Friess erweitert
  - DB simpel gehalten. Logik außer Constraints auf server-/JS-Ebene realisiert

### 2. Besonderheiten(Nicht in der Tour)
  - Der Shop ist auf Englisch.
  - Nirgends auf der Seite nur Dummy-Texte (Kein Lorem Ipsum)
  - Responsive Design für Desktop über Tablet bis zu aktuellen Smartphones.
  - Bei Login Merge des Warenkorbs aus Session und Datenbank
  - Vorratsmechanik beachten -> Wenn ein Produkt nicht mehr auf Vorrat ist, kann es nicht mehr in den Einkaufswagen gelegt werden (Sold Out). Die vorrätige Anzahl eines Produktes kann beim Kauf nicht überschritten werden (auch nicht durch HTML Manipulation, da Serverseitig abgesichert).

### 3. Eigenarten
   - Wir liefern aktuell nur nach Deutschland (Keinen Internationalen ZIP-Code integriert).
   - Keine verschiedenen Größen und Bilder zu den Produkten.
   - Es gibt keine Trennung der Geschlechter, somit sind alle Artikel unisex. -> Progressiv.

### 4. Tour(Fokus auf Funktionalitäten!)
  - Startseite 
    - ansehen und auf eine Kachel klicken -> Bilder auf der Startseite leiten den Nutzer zu Sales und Produkten **mit angewandten Filtern** weiter.
  - Products
    - Produkt auswählen und in Warenkorb legen
    - Über Nav mit Products-Dropdown zu einer Kategorie navigieren (Hinweis darauf, dass die Möglichkeiten **dynamisch** aus der Datenbank abgerufen werden).
    - Weiteres Produkt durch Filtern finden und in den Warenkorb legen (Hinweis darauf, dass auch die Filteroptionen aus der Datenbank generiert werden -> Color, Brand, Sale).
    - Reset Filters lädt Seite ohne Filter neu
    - Letztes Produkt durch **Suchleiste** finden und in den Warenkorb legen (Hinweis auf JS Blur-Effekt)
    - Hinweis auf Shoppingcart-Counter Anzahl **(Zahl merken)**
    - Zum Login gehen
  - Login
    - Hinweis auf Validierung der Registrierung mit PHP und Javascript
    - Anmelden ->   email:admin@fh-erfurt.de
                    pw:root
    - zum Account gehen
  - Account
    - Felder können direkt bearbeitet werden
    - Change password extern
    - Zum Warenkorb gehen (Hinweis auf Shoppingcart-Counter Anzahl -> selbe wie zuvor: **Shoppingcart aus Session wird beim Login berücksichtigt!**)
  - Shopping Cart
    - Wenn genug Produkte zum Scrollen vorliegen, durch Scrollen Zeigen, dass Total Sticky ist. (Kruse freut sich) 
    - Änderungen tätigen:
      - Quantity ändern und kurzen Hinweis auf Shoppingcart-Counter und Total geben
      - **AJAX** ankündigen -> Produkt (ggfs. mehrere) entfernen. Seite lädt nicht neu und Counter, sowie Total werden angepasst!
    - Proceed to Checkout (Falls der Nutzer nicht eingeloggt ist, verweist der Button auf den Login).
  - Checkout 
    - Mehrseitiges Formular
    - Kontrolle der Nutzer-Informationen -> Link zurück auf Account.
    - Bezahlmethoden: Aktuell nur Paypal
    - PayPal API angedeutet
    - Complete: Zufällig wechselnde Bilder (Reloads zur Verdeutlichung)
    - Zurück zu Account und Last Order Zeit zeigen (Mit aktueller abgleichen -> passt!).
    - zu About Us gehen
  - About Us
    - Hier steht die Firmenphilosophie
    - kurz drüberscrollen
    - Hinweis auf Link zu Legal Details im **Footer** (gilt für jede Seite)
    - Ende hier oder auf Startseite...
    
### 5. Zusatz
  - *Wenn die Zeit es hergibt: Registrierung mit Validierung zeigen*
  - Ergänzung zu Herausforderungen: Reworks und Refactoring naiver Lösungen -> Bsp. Shopping Cart 3 mal umgebaut...
