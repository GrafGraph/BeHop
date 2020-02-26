<link rel="stylesheet" type="text/css" href="assets/css/documentation.css">
<h1 class="headline form-background">Projektdokumentation</h1>
<section class="center form-background">
    <section class="docu-wrap">
    <div >
        <p>
            Erstellt von Anton Bespalov und Michael Hopp im Rahmen des Website-Projekts in GWP und DWP an der 
            Fachhochschule Erfurt.
        </p>
        <p>
            Prüfer: Prof. R. Kruse und K. Friess
        </p>
    </div>

        <a href="WEB-WS1920-Projektaufgabe-1.pdf" title="Aufgaben"><h2>Aufgabe</h2></a>
        <h2>Arbeitsteilung und Gesamtaufwand</h2>
        <h3>Gemeinsam</h3>
        <ul>
            <li>
                Gemeinsam
                <ul>
                    <li>Produkte einpflegen</li>
                    <li>Datenbank Konzept</li>
                    <li>Nav-Desktop</li>
                    <li>Projektdokumentation</li>
                    <li>Account</li>
                </ul>
            </li>
        </ul>
        <div class="flex-docu">
            <div class="flex-docu-item">
                <h3>Michael (250+ Stunden)</h3>
                <ul>
                    <li>
                        Logik und Design
                        <ul>
                            <li>Products</li>
                            <li>showProduct (Detailansicht)</li>
                            <li>Shopping Cart</li>
                            <li>Checkout</li>
                            <li>Login</li>
                            <li>About Us</li>
                            <li>Nav-Products Dropdown</li>
                            <li>Legal Details</li>
                            <li>Landing/Starting Page</li>
                            <li>Banner, Icons, Startseiten Kachel</li>
                            <li>Lektorat und Feinschliff der Projektdokumentation</li>
                            <li>AJAX für Remove from Shopping Cart</li>
                            <li>Produkt-Vorrats-Mechanik</li>
                            <li>Shoppingcart-Counter</li>
                        </ul>
                    </li>

                    <li>
                        Logik
                        <ul>
                            <li>Search</li>
                            <li>Functions</li>
                            <li>Spezialisierte Basemodel-Methoden</li>
                            <li>Shoppingcart-Merge zwischen Session und User</li>
                        </ul>
                    </li>

                    <li>
                        Design
                        <ul>
                            <li>Logo</li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="flex-docu-item">
                <h3>Anton (200+ Stunden)</h3>
                <ul>
                    <li>
                        Logik und Design
                        <ul>
                            <li>Sign Up</li>
                            <li>Nav Tablet- und Mobile-Screen</li>
                            <li>Errors bei Login und Registrierung</li>
                            <li>Layout</li>
                            <li>Change Password</li>
                            <li>Projektdokumentation: Inhalt(Rohfassung) und Bilder</li>
                            <li>...</li>
                        </ul>
                    </li>

                    <li>
                        Logik
                        <ul>
                            <li>Datenbankanbindung</li>
                            <li>Basemodel Primitives</li>
                            <li>Login (Fehlermeldungen)</li>
                            <li>Validierungs-Methoden für Klassen Address und User</li>
                            <li>Validierungs-Methoden für Klassen Address und User (mit JS)</li>
                            <li>My Account</li>
                            <li>...</li>
                        </ul>
                    </li>

                    <li>
                        Design
                        <ul>
                            <li>Search</li>
                            <li>About Us</li>
                            <li>...</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div >
            <h2>Inhalt</h2>
            <br>
                <h3>Fiktiver Kunde</h3>
                    <p>
                        Der Kunde für dieses Produkt wäre ein Händler oder ein Laden, der Hip-Hop-Kleidung verkauft.
                        Mit der Website soll die Möglichkeit geboten werden, dass die Artikel von dem Kunden online veröffentlicht werden 
                        und durch die Website auch verkauft werden können. Der Website-name entstand aus der Kombination der Nachnamen beider Entwickler:
                        Anton <strong>Be</strong>spalov und Michael <strong>Hop</strong>p.  
                    </p>
                <h3>Die endgültigen Website-nutzer</h3>
                <p>
                    Die endgültigen Website-nutzer sind an HipHop-Fashion interessierte Verbraucher, die online Kleidung bestellen wollen.
                </p>
        </div>
        <div >
            <h3>Ergebnis der Recherchen</h3>
                    <p>
                        Unser Design lehnt an ein gängiges Design von beliebten Onlineshops in der Street-Fashion-Branche an: Hier dominiert ein weißer Hintergrund und ein 
                        minimalistisches, oftmals in Grautönen gehaltenes Design 
                        (siehe zum Beispiel <a href="https://www.asos.com/">asos.com</a> oder <a href="https://www.def-shop.com/">def-shop.com</a>).
                        Die Landingpage ist von <a href="https://www.def-shop.com/">def-shop.com</a> inspiriert, die mit ihrer Modernität und gleichzeitigen Schlichheit überzeugt.
                        Darüber hinaus waren wir vom minimalistischen Menü von <a href="https://www.def-shop.com/">def-shop.com</a> sehr angetan. 
                        Ebenso entwickelten wir ein eigenes Logo, das als Homebutton in jeder Ansicht und auf jeder Seite verwendet wird 
                        (orientiert sich an <a href="https://www.asos.com/">asos.com</a> und <a href="https://www.def-shop.com/">def-shop.com</a>).
                        Weiterhin haben wir die Produktdarstellung an <a href="https://www.snipes.com/">snipes.com</a> angelehnt.
                        Login und Registrierung wurden auf unserer Website schlicht gehalten, ähnlich zu <a href="https://www.def-shop.com/">def-shop.com</a>.
                    </p>
                    <br>
        </div>
        <div>
            <h2>Sitemap</h2>
            <br>
            <img src="assets/images/documentation/Sitemap.png">
        </div>
        <div >
            <h2>Design</h2>
            <br>
                <h3>Layouts</h3>
                    <p>
                        Bei den Layouts wurde sich sehr stark an den Layouts von <a href="https://www.asos.com/">asos.com</a>, <a href="https://www.def-shop.com/">def-shop.com</a>
                        und <a href="https://www.snipes.com/">snipes.com</a> orientiert, weil das die erfolgreichen Seiten in dieser Branche sind.
                    </p>
                <h3>Farben</h3>
                    <p>
                        Da unsere Website den Hip-hop-Lifestyle widerspiegeln soll,
                        haben wir uns bei vielen Elementen für einen dunklen Grauton entschieden. Dieser hat eine sehr große Ähnlichkeit 
                        mit der Farbe von As­phalt und das ist ein klassisches Element der Hip-Hop-Szene. Zudem ist der Farbton nicht zu aufdringlich, sodass der Fokus auf dem Rot der Sales 
                        und den Produkten an sich liegt. Aus diesem Grund heraus wählten wir auch ein helles Grau als Schriftfarbe.
                        Die Farben der Schrift und "Styleelemente", unter anderem auf der Startseite, sind in einem Orange-Rot gehalten, da diese einen sehr
                        angenehmen Kontrast mit den Grautönen bilden und zugleich auffällig sind.
                        Darüber hinaus sind die Bilder der Startseite graustufig dargestellt, da diese zum einen die Coolness des HipHop-Lifestyles widerspiegeln und darüber hinaus sehr 
                        gut mit dem restlichen Erscheinungsbild der Seite harmonieren.
                    </p>
                    <h3>Schriften</h3>
                    <p>
                        Die Schriftart OpenSans, die wir für Texte verwendet haben, wirkt zugleich modern und zeitlos. In unseren Bildern verwenden wir die Schriftart Edo, die den 
                        ungezwungenen, freien Lifestyle von HipHop resembliert.
                    </p>
                    <br>
        </div>
        <div >
                <h2>Funktionalitäten</h2>
                <br>
                <h3>Navigationsleiste nicht eingeloggt</h3>
        </div>
        <div >
                <P>
                    Diese Navigationsleiste ist der Standard für Bildschirme, die eine Breite von mindestens 1124 Pixeln 
                    aufweisen. Am linken Seitenrand ist das Logo von BeHop zu sehen - Wird auf dieses geklickt, so wird der User auf die Startseite
                    weitergeleitet.
                </P>
        </div>
                <img src="assets/images/documentation/navigationList.png">
                <br>
        <div>
                <p>
                        Wird "Products" gedrückt, dann zeigt die Seite alle unsere Produkte an. Mithilfe eines Dropdownmenüs
                        können diese direkt über Kategorien selektiert werden. 
                </p>
        </div>
        <br>
        <img src="assets/images/documentation/navigationListProductsDropdownJSfocusin.png">
        <br>
        <div>
                <P>
                    Über den Link "About Us" wird der User entsprechend auf die "About Us"-Seite von BeHop weitergeleitet: Hier finden User die Firmenphilosophie.
                </P>
        </div>
        <div class="flex-docu-item">
                <br>
                <img src="assets/images/documentation/aboutUs.png">
                <br>
        </div>
        <div >
                <p>
                    Bei Auswahl des Suchfeldes wird der Rest der Website verschwommen angezeigt. Bilder können währenddessen nicht angeklickt werden. 
                    Diese Anzeige stellt sich beim Klicken außerhalb der Suchleiste zurück. 
                    Dieser Effekt funktioniert auf jeder Seite.
                </p>
        <div class="flex-docu-item">
            <br>
            <img src="assets/images/documentation/navigationListSaerchJSfocusin.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Über das Icon mit dem "Nutzerprofil" wird der User auf die Login-Seite weitergeleitet. 
            </p>
        <div class ="flex-docu-item">
            <br>
                <img src="assets/images/documentation/login.png">
            <br>
        </div>
        </div>
        <div>
            <p>
            Über Icon mit dem Einkaufswagen wird der Nutzer auf seine Einkaufswagenliste weitergeleitet. 
                Momentan ist sie leer.
            </p>
            <div class="flex-docu-item">
                <br>
                    <img src="assets/images/documentation/shoppingCartNotLoggedIn.png">
                <br>
            </div>
        </div>    
        <div>
            <p>
                Diese Navigationsleiste ist für Bildschirme einer Breite von 521 Pixeln bis 1123 Pixeln (Tablets).
                Das Logo, das "Nutzerprofil"-Icon und der Einkaufswagen haben die gleichen Funktionen wie in der Desktopansicht. 
                Wird das Lupen-Icon gedrückt, dann werden alle Icons in der Navigationsleiste ausgeblendet und es erscheint ein
                Eingabefeld zur Produktsuche.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListTablet.png">
            <br>
        </div>
        </div>        
        <div>
            <p>
                In dem Eingabefeld kann der Nutzer über das Lupen-Icon nach Produkten suchen.
                Um aus der Suchleiste rauszukommen, muss das "X"-Icon gedrückt werden.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListTabletSaerchJS.png">
            <br>
        </div>     
        </div>
        <div>
            <p>
                Über das rechte Icon erscheint ein Dropdownmenü, mit dem die restlichen Seiten
                erreicht werden können.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListTabletDropdown.png">
            <br>
        </div>  
        </div>
        <div>
            <p>
                Diese Navigationsleiste ist die Ansicht für Bildschirme für eine Breite bis 520 Pixel (Smartphones).
                Das Logo und die Lupe haben dieselben Funktionen wie bei der Tabletansicht. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListSmartPhone.png">
            <br>
        </div>
        </div>        
        <div>
            <p>
                Über Klick auf das rechte Icon erscheint ein Dropdownmenü, mit dem die restlichen Seiten
                erreicht werden können. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListSmartPhoneSaerchJS.png">
            <br>
        </div>    
        </div>   
        <div>
            <p>
                Die Funktion, dass alles außer der Navigationsleiste verschwommen wird, sobald die Suchleiste angeklickt wird,
                funktioniert in der Tabletansicht und Smartphoneansicht auch.  
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/navigationListSmartPhoneDropdown.png">
            <br>
        </div>
        </div> 
        <h3>Login and Registration</h3>
        <div>
            <p>
                Auf der "Login"-Seite sind zwei Eingabefelder: Eines für die Email und das andere für das dazugehörige Passwort.
                Wenn eine nicht-korrekte Email eingetippt wird, so wird eine Fehlermeldung angezeigt, dass die Email nicht korrekt ist. 
                Werden eine korrekte Emailadresse und das passende Passwort eingegeben sowie der "Login now!"-Button gedrückt,
                dann wir der Nutzer eingeloggt. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/login.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Sind die Eingaben nicht korrekt, so wird eine Fehlermeldung ausgegeben. 
                Falls noch kein Account vorhanden ist, dann kann der Nutzer auf den "Create Account"-Button klicken und sich registrieren.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/loginError.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Für die Registrierung müssen die angeforderten persönlichen Daten eingegeben werden.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/registration.png">
            <br>
        </div>        
        </div>   
        <div>
            <p>
                Wenn falsche Daten eingegeben werden, so färben sich die Eingabefelder rot und ein Hinweis wird gegeben, wie die
                Eingabedaten sein müssen.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/registrationRedWithJS.png">
            <br>
        </div>
        </div>   
        <div>
            <p>
                Wenn die Daten richtig eingegeben werden, dann erscheinen die Eingabefelder grün. Zum Registrieren muss der "Register"-Button gedrückt werden. Wenn der Accunt erstellt wurde, wird die "Login"-Seite
                automatisch angezeigt.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/registrationGreenWithJS.png">
            <br>
        </div>
        </div>          
    <h3>Navigationsleiste eingeloggt</h3>   
        <div>
            <p>
                Wenn sich der Nutzer eingeloggt hat, dann verändert sich die Navigationsleiste und er hat ein Feld mehr auf der Navigationsleiste
                "Logout". Wird hier drauf geklickt, so wird er aus dem Account ausgeloggt. 
            </p>
        </div>   
            <br>
                <img src="assets/images/documentation/navigationListLoggedIn.png">
            <br>
            <div>
            <p>
                Über das Symbol mit dem "Nutzerprofil" wird man nun auf die "My Account"-Seite weitergeleitet.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/account.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Die Navigationsleisten haben sich in der Tablet- und Smartphone-Ansicht nicht geändert, jedoch kommen in den Dropdownmenüs 
                noch ein Button für den Loggout dazu. 
            </p>
        <div class="flex-docu-item">
            <br>
                    <img src="assets/images/documentation/navigationListSmartPhoneDropDownLoggedIn.png">
            <br>
        </div>    
        </div>     
    <h3>Products</h3>
        <div>
            <p>
                Hier werden die Produkte angezeigt. Ganz oben ist eine Leiste zum Filtern der Artikel. Hier können Wunschkriterien ausgewählt werden.  
                Über den "Filter Now!"-Button werden die ausgewählten Filter anschließend angewandt. Zum Zurücksetzen der Filter fungiert der "Reset Filters"-Button.
            </p>
            <div class="flex-docu-item">
                <br>
                    <img src="assets/images/documentation/productsAnzeigeKomplett.png">
                <br>
            </div>      
        </div>
    <h3>About Us</h3>
        <div>
            <p>
                Auf der "About Us"-Seite finden User die Firmenphilosphie von BeHop.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/aboutUs.png">
            <br>
        </div>      
        </div>
    <h3> My Account</h3>
        <div>
            <p>
                Auf der "My Account"-Seite werden die Daten des zurzeit eingeloggten Nutzers angezeigt. 
                In den Felder, die mit den persönlichen Daten ausgefüllt sind, können neue Daten eingetragen werden geändert werden, 
                wenn diese korrekt sind. Über den "Save"-Button werden diese gespeichert. Der "Reset-Changes"-Button setzt die 
                temporären Änderungen zurück. Ganz unten auf der Seite ist noch ein "Change Password"-Button, durch den das
                "Change-Password"-Formular geladen wird.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/account.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Auf dieser Seite kann das Passwort geändert werden. Hierfür muss das aktuelle Passwort sowie zweimal das neue Passwort eingegeben werden.
                Mit dem "Change Passwort"-Button wird das neue Passwort gespeichert.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/changePassword.png">
            <br>
        </div>
        </div>
    <h3>Produkte kaufen</h3>
        <div>
            <p>
                Wird ein Produkt in der Produktansicht angegklickt, so wird der User auf die entsprechene Detailansicht des Produktes weitergeleitet. 
                Hier werden dem User weitere Informationen zum Produkt offeriert.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/productsAnzeige.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Ein Produkt wird über Anklicken des "Add to Cart"-Buttons in den Einkaufswagen gelegt. Wurde das Produkt zur Shopping Cart hinzugefügt,
                so wird eine Bestätigung mit der Anzahl angezeigt.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/addProductToShoppingCart.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Es ist nicht möglich, das Produkt in den Einkaufswagen zu legen, wenn die maximale Anzahl der Vorräte erreicht wurde. In diesem Fall wird eine
                Fehlermeldung angezeigt. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/addedProductToShoppingCart.png">
            <br>
        </div>
        </div>
        <div>
            <p>
                Möchte der User die - dem Warenkorb hinzugefügten - Produkte bestellen, 
                so muss dieser zunächst das Einkaufswagen-Icon anwählen. Hier werden alle Produkte aufgezeigt, die in den Einkaufswagen gelegt 
                wurden.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/addProductsMaxInStock.png">
            <br>
        </div>
        </div>  
        <div>
            <p>
                Es besteht die Möglichkeit, die Anzahl der zu bestellenden Produkte im Warenkorb zu ändern. In dem Eingabefeld
                kann die gewünschte Anzahl eingetragen und mit dem "Save"-Button gespeichert werden. 
                Über den "X"-Button können Artikel im Warenkorb auch wieder gelöscht werden. Zum Vollenden der Bestellung wird bei einem eingeloggten User
                der "Proceed to Checkout"-Button gedrückt. Sollte der Nutzer noch nicht eingeloggt sein, so erscheint statt des "Proceed to Checkout"-Buttons 
                hier der "Log In"-Button, der ihn zum Log In weiterführt. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/shoppingCartWithProducts.png">
            <br>
        </div>
        </div>  
        <div>
            <p> 
                Hier werden die persönlichen Daten zur Bestätigung noch einmal angezeigt. Sind die Daten korrekt und wird der "Continue"-Button gedrückt, 
                so wird eine Seite aufgerufen, auf der die Bezahlmethode ausgewählt werden kann. Sind die Daten nicht korrekt oder aktuell, 
                dann kann der "Change Information"-Button gedrückt werden und es wird die "My Account"-Seite aufgerufen.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/checkout.png">
            <br>
        </div>
        </div>    
        <div>
            <p>
                Zur Zeit ist nur die Bezahlmethode "Paypal" möglich. 
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/checkoutPaymentMethod.png">
            <br>
            <br>
                <img src="assets/images/documentation/checkoutPaymentMethodPaypal.png">
            <br>
        </div>
        </div>    
        <div>
            <p>
                Bei Beendigung der Bezahlung wird eine Bestätigung darüber angezeigt.
            </p>
        <div class="flex-docu-item">
            <br>
                <img src="assets/images/documentation/checkoutComplete.png">
            <br>
        </div>
        </div>   
    <h3>ER-Modell</h3>
            <br>
                <img src="assets/images/documentation/ER-Modell.png">
            <br>
    <h3>Rollenmodell</h3>
            <p>
                In unserem Projekt haben beide Entwickler die Rolle des Designers und Entwicklers übernommen, alle Designentscheidungen wurden
                gemeinsam getroffen. Ebenso arbeiteten beide Entwickler an verschiedenen Bereichen des gesamten Systems. 
            </p>
    <h3>Flussbilddiagramme</h3>
            <br>
                <img src="assets/images/documentation/flowChartBestellung.png">
            <br>
            <br>
                <img src="assets/images/documentation/FulssdiagrammRegistrierung.png">
            <br>
    <h3>Herausforderungen und Lösungen</h3>
            <div >
                <p>
                    Eine Herausforderung war, dass wir uns in neue Programmiersprachen einarbeiten mussten. Hier hat die Seite <a href="https://stackoverflow.com/">stackoverflow.com</a> 
                    bei viele Problemen geholfen. 
                    Ungenügend ist zudem, dass das responsive Design der Navigationsleiste nicht mit CSS gemacht wurde. Die Navigationsleiste
                    wird zur Zeit über das Ein- und Ausblenden verschiedener Naviagtionsleisten realisiert. Dadurch sind ca. 150 Zeilen Code im Layout
                    redundant. Das hätte mithilfe von CSS realisiert werden müssen, konnte durch Zeitdruck aber nicht realisiert werden. 
                    Insgesamt wurde das Projekt zu einer ungeahnten Herausforderung, da nicht nur die Komplexität des Projektes zu Beginn, sondern auch das Zeitmanagement im Allgemeinen 
                    neue Aspekte in unserer Arbeit darstellten. Auch viele Best-practices waren uns während einiger Problemstellungen noch unbekannt. 
                </p>
            </div>
    <h3>Besonderheiten</h3>
            <div >
                <ul>
                    <li>ER-Modell: Shoppingcart wird bei User ausgehangen. Wenn er bestellt, wird die Shoppingcart in Order eingehangen. 
                        Der Nutzer bekommt dann einen neuen Shoppingcart, während der alte in Order bestehen bleibt.</li>
                    <li>Images können zu Produkten oder Sales gehören</li>
                    <li>Checkout ist unser mehrseitiges Formular</li>
                    <li>Der Shop und der Code sind auf Englisch, jedoch ist die Dokumentation auf Deutsch und der Shop liefert nur nach Deutschland</li>
                    <li>Das Land in der Datenbank ist immer auf Deutschland</li> 
                    <li>Es gibt keine Trennung der Geschlechter, somit sind alle Artikel unisex.</li>
                    <li>Es können noch keine Größen gewählt werden.</li>
                    <li>Momentan gibt es pro Produkt nur ein Bild.</li>
                </ul>
            
    <h3>Besondere Features</h3>
            <ul>
                <li>Wenn das Suchfeld angeklickt wird, dann erscheint alles außer der Suchleiste verschwommen.</li>
                <li>Validierung der Registrierung mit JS, entweder die Eingabefelder werden rot und es erscheint eine Nachricht, die Hinweise gibt, oder die Eingabefelder werden grün.</li>
                <li>Shoppingcart-Counter neben dem dazugehörigen Icon zeigt an, wie viele Produkte sich im Einkaufswagen befinden.</li>
                <li>Bilder auf der Startseite leiten den Nutzer zu Sales und Produkten mit angewandten Filtern weiter.</li>
                <li>Vorratsmechanik: Wenn ein Produkt nicht mehr auf Vorrat ist, kann es nicht mehr in den Einkaufswagen gelegt werden. Die vorrätige Anzahl eines Produktes kann
                    beim Kauf nicht überschritten werden.</li>
                <li>Das Entfernen von Gegenständen aus dem Warenkorb erfolgt über AJAX ohne Nachladen der kompletten Seite. Dabei wird auch der Shoppingcart-Counter sowie der Gesamtpreis
                    aktualisiert.
                </li>
                <li>Filteroptionen für Produkte werden dynamisch aus der Datenbank generiert</li>
                <li>Die Session kann wesentliche Informationen für eine Shopping-Cart speichern, ohne dass der Nutzer eingeloggt sein 
                    muss. Beim Login werden die Inhalte aus Session und Datenbank vereint.
                </li>
            </ul>
            </div>

    <h3>Ideen der Weiterführung</h3>
            <ul>
                <li>Verschiedene Größen für Produkte anbieten. (Aktuell müssten die selben Produkte mehrmals mit 
                    verschiedenen Größenangaben <strong>im Namen</strong> versehen werden...)
                </li>
                <li>Mehr Bilder zu den Produkten darstellen.</li>
                <li>Weitere Zahlungsmethoden implementieren (richtige API für Paypal einbauen).</li>
                <li>Responisve-Nav mithilfe von CSS realisieren.</li>
                <li>AJAX zum Nachladen der Produktliste beim Scrollen.</li>
                <li>AJAX für das Anpassen der Quantity im Shopping Cart (Bereits JS-seitig angefangen).</li>
                <li>User unterstützen indem MaxPrice geringer als MinPrice (und umgekehrt) in Products-Filtern abgefangen wird.</li>
                <li>In Products die Sortierung als Buttons mit auf- und ab-Pfeilen realisieren.</li>
                <li>Einen "Add to Cart"-Button in der Produktliste zur Verfügung stellen, sodass nicht immer die Detailansicht aufgerufen werden muss. 
                    Alternativ die Detailansicht als leichtgewichtiges Pop-Up realisieren.
                </li>
                <li>In der Detailansicht der Produkte unterhalb noch ähnliche/verwandte Produkte anzeigen.</li>
                <li>Sortierung des Preises so umsetzen, dass Sales berücksichtigt werden.</li>
                <li>Empfindliche Informationen nicht in der Session, sondern der Datenbank speichern. In Session nurnoch die ID des Datensatzes hinterlegen. 
                    -> Betrifft Gesamtpreis beim Checkout und Boolean Logged-In</li>
                <li>Eine weitere Unterseite für einen Wunschzettel bzw. eine Merkliste des Users einführen.</li>
                <li>Transitions zwischen den Seiten einführen</li>
            </ul>

    <h3>Was haben wir zur ursprünglichen Idee geändert?</h3>
            <ul>
                <li>Keine Slider, weil die unruhig wirken -> Accessability</li>
                <li>Keine Geschlechtertrennung, weil es ein veraltetes Konzept ist -> Abheben von Konkurrenz + Eigene progressive Marke</li>
                <li>Mehr Inspiration bei anderen Mode-Genres als HipHop gesucht -> Asos, Zalando</li>
                <li>HipHop vom Klischee entfernt und eher an dessen Grundprinzipien orientiert</li>
            </ul>

        <h3>Genutzte Technologien</h3>
        <ul>
            <li>Optimiert für Chrome</li>
            <li>HTML5, CSS3</li>
            <li>XAMPP 1.8.3, Apache Server 2.4.9, MySQL 5.6.16, PHP 5.4.22</li>
        </ul>   
    </section>
    <br>
</section>