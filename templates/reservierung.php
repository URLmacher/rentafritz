<div class="reservierung__wrapper">
    <div class="reservierung__page reserv-form " id="reservieren">
        <div class="reserv-title">
            <h1>RESERVIERUNG</h1>
        </div>
        <form id="reservierung">
            <div class="form-inhalt ">
                <div class="auswahl xtraspace">
                    <p class="erklaerung">Was möchten sie mieten?</p>
                    <select style="width:100%;" id="standard-dropdown" name="standard-dropdown">
                        <option value="49" class="test-class-1">Übersiedlungsservice</option>
                        <option value="65" class="test-class-1">Ford Transit</option>
                        <option value="45" class="test-class-1">Planen Anhänger</option>
                        <option value="9" class="test-class-2">Elektroheizgerät GÜDE GH9e</option>
                        <option value="20" class="test-class-3">Luftentfeuchter TTK 170 ECO</option>
                        <option value="28" class="test-class-4">Holzspalter Zipper HS 8 PT</option>
                        <option value="29" class="test-class-5">Vertikutierer Brill</option>
                        <option value="7" class="test-class-6">Temperaturmessgerät Voltcraft</option>
                        <option value="7" class="test-class-7">Feuchtemessgerät Brennenstuhl</option>
                        <option value="7" class="test-class-8">Laserentfernungsmesser Stabila</option>
                        <option value="7" class="test-class-9">Helligkeitsmessgerät Voltcraft</option>
                        <option value="10" class="test-class-10">Palettenhubwagen</option>
                        <option value="12" class="test-class-10">Schmutzwasserpumpe</option>
                    </select>
                </div>
                <div id="e">
                    <div class="auswahl xtraspace">
                        <p class="erklaerung">Von: (Datum/Uhrzeit)</p>
                        <input type="text" id="date-start" class="date start " />
                        <div class="calendar"></div>
                    </div>
                    <div class="auswahl" id="testi">
                        <input type="text" id="time-start" class="time start " />
                        <div class="watch"></div>
                    </div>
                    <div class="auswahl xtraspace">
                        <p class="erklaerung">Bis: (Datum/Uhrzeit)</p>
                        <input type="text" id="date-end" class="date end" />
                        <div class="calendar"></div>
                    </div>
                    <div class="auswahl">
                        <input type="text" id="time-end" class="time end" />
                        <div class="watch"></div>
                    </div>
                </div>
            </div>
            <div id="feld-leer" class="xtraspace hide">
                <h3>Bitte füllen Sie alle Felder aus</h3>
            </div>
            <div id="vergangenheit" class="xtraspace hide">
                <h3>Bitte überprüfen Sie die Eingaben</h3>
            </div>
            <div class="submit">
                <input type="submit" value="WEITER" id="button" class="button-style" />
            </div>
        </form>
        <div class="kauf-info hide">
            <h3>OBJEKT:</h3>
            <p class="objekt">Objekttexthier</p>
            <h3>LEIHDAUER:</h3>
            <p id="leihdauer"></p>
            <h3>PREIS:</h3>
            <p id="kosten"><span>€</span></p>
            <p>Zahlbar in bar vor Ort</p>
            <p>Alle Preise inkl. 20% Mehrwertsteuer</p>
            <div id="back-button">
                <h3>AUSWAHL ÄNDERN</h3>
            </div>
        </div>
        <div id="note"></div>
        <div id="fields">
            <form id="ajax-contact-form" class="hide" action="">
                <div class="form-inhalt">
                    <div class="einwahl">
                        <input type="text" placeholder="Name" name="name" value="" />
                        <div class="user"></div>
                    </div>
                    <div class="einwahl">
                        <input type="text" placeholder="Email" name="email" value="" />
                        <div class="mail"></div>
                    </div>
                    <div class="einwahl">
                        <input type="text" min="1" max="40" placeholder="Telefonnummer" name="phone_number" value="" />
                        <div class="phone"></div>
                    </div>
                    <div class="einwahl">
                        <input type="checkbox" name="agb" id="agb" />
                        <label for="agb">Ich habe die <a id="agb-link" href="agb.html">AGB</a> gelesen und bin einverstanden.</label>
                    </div>
                    <input type="hidden" id="objekt" value="" name="objekt" />
                    <input type="hidden" id="zeit-beginn" value="" name="zeit-beginn" />
                    <input type="hidden" id="datum-beginn" value="" name="datum-beginn" />
                    <input type="hidden" id="zeit-ende" value="" name="zeit-ende" />
                    <input type="hidden" id="datum-ende" value="" name="datum-ende" />
                    <input type="hidden" id="rate" value="" name="rate" />
                    <input type="hidden" id="bepreisung" value="" name="bepreisung" />
                </div>
                <div class="submit">
                    <div class="load hide">
                        <img src="img/bx_loader.gif" />
                    </div>
                    <input class=" button-style " id="button-weg" type="submit" name="submit" value="Abschicken" />
                </div>
            </form>
        </div>
    </div>
</div>