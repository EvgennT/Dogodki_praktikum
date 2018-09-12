







## O projektu

Projket za ustvarjanja spletne aplikacije za pregled, prijavljanje, spremljanja dogodkov.
Spletna aplikacija zajema fukcionalnosti:
1. registracija, prijava, odjava
2. dva tipa uporabnikov: organizator, uporabnik
3. dodajanje slik, urejanje dogodka, ločevanje med prihajajočimi in poteklimi dogodki
4. ocenjevanje dogodkov, preverjanje prisotnosti
5. sporočanje po e-pošti

Spletna aplikacija omogoča uporabnikom pregled preteklih in prihajajočih dogodkov. Uporabnikom omogoča, da se registrirajo na stran in se s svojim profilom tudi prijavljajo, odjavljajo na dogodke in jih, v primeru da so bili prisotni, tudi ocenijo.




## Kompatibilnost

|    CodeIgniter    | PHP	 |		Apache	|		WAMP	 |
| ----------------- |------|------|------|
|    3.1.9         | 5.6.35 |	2.4.33		|	3.0.6		 |



## Izdelano s pomočjo

* [Eclipse](https://www.eclipse.org) - Razvojno okolje.
* [WAMP](http://www.wampserver.com/en/#download-wrapper) - Lokalni server za delo z MySQL bazo in PHP.
* [phpMyAdmin](https://www.phpmyadmin.net) - Urejevalnik podatkovne baze.




## Inštalacija in uporaba

1. Instalirajte WAMP in ga zaženite.
3. Poženite Eclipse in odprite perspektivo GIT (Window>Open perspective>Other...>GIT)
4. Na GitHub repozitoriju kopirajte naslov povezave (clone & download) 
5. V Eclipsu izberete Clone a Git repository in v primeru, da se okna ne izpolnijo, vnesite prej kopiramo povezavo  v polje URI. Next.
5. Obklukate vse prikazane dokumente in izberite next.
6. V polju Directory izberete browse in izberete datoteko www na lokaciji, kamor ste namestili wamp (privzeta lokacija: C:\wamp\www).
7. Da preverite, če so prisotne vse datoteke, stisnete z desnim gumbom miške na prikazano ime projekta in nato opcijo Pull. Prikazano okno zaprete.
8. Ob zagonu wamp se mora v orodni vrstici spodaj desno prikazati zelena ikona. Na njo stisnete z desnim gumbom miške in izberete opcijo Refresh.
9. Nato ponovno stisnete na zeleno ikono programa wamp z levo tipko miške in izberete opcijo Localhost.
10. Odpre se vam urejevalna stran , v kateri v spodnjem levem kotu izberete opcijo phpmyadmin (za prijavo in uporabo podatkovne baze) in se prijavite z uporabniškim imenom root, geslo pa pustite prazno.
11. Za vzpostavitev podatkovne baze phpMyAdmin, sledite sledečim navodilom.
12. Spletna stran je na voljo pod povezavo: http://localhost/Dogodki_praktikum/

## Vzpostavitev podatkovne baze.
Za vzpostavitev podatkovne baze phpMyAdmin, sledite tem navodilom.

1. Ko ste pognali WAMP stisnite z levo tipko miške na ikono in na vrhu izberete Localhost.
2. V odprtem oknu, spodaj levo, poiščete povezavo phpMyAdmin.
3. Prijavite se z uporabniškim imenom "root".
4. Na levi strani kliknete "Novo", da ustvarite novo bazo. Poimenujete jo praktikum.
5. Kliknete na novo ustvarjeno bazo, v zgornji vrstivi izberete SQL in v polje prekopirate celotno vsebino datoteke XXX. Za potrditev izberite Izvedi. 
6. Po dokončanih korakih ponovno poženete WAMP in odprete spletno stran.



## Za spreminjanje kode
1. Po kloniranju projekta odperete perspektivo PHP.
2. V eclipse marketplace naložite zadnjo verzijo PHP development tools.
3. file>import>PHP> existing composer project>next> v 2. vrstici poiščete lokacijo kloniranega projekta (privzeta lokacija: C:\wamp\www)>finish
4. Sprmembe potrdite z desnim klikom na projekt>team>commit>izberete vse spremembe s gumbom dveh plus (+) simboli> dodate komentar> commit&push




## Funkcionalnosti

1. registracija,
2. prijava, 
3. odjava
4. dva tipa uporabnikov: organizator, uporabnik
5. dodajanje slik,
6. urejanje dogodka, 
7. ločevanje med prihajajočimi in poteklimi dogodki
8. ocenjevanje dogodkov, 
9. preverjanje prisotnosti
10. sporočanje po e-pošti






## Podatkovna baza

| Prvotna struktura | Končna struktura|
| -------- |------|
<img alt="Prvi ER" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/Slike/E-R%20diagram-prvi.png" width="117">| |

## Potek dela


|    Verzija    | Opis	 |
| -------- |------|
|      1  | 	Povezava projekta z GitHUb-om. |
|     2   | 	Ustvarjena podatkovna baza. |
|      3  | 	Prijava, vnos dogodka. |
|     4   | Spremembe v bazi.	 |
|    5    | 	Prijava in odjava z dogodka. |
|    6    | Vpogled v dogodek, pregled prijavlenih (organizator).	 |
|    7    | Spremembe v bazi (tip datuma, termin, min udeležencev, max udeležencev).	 |
|   8     | 	Dojava s strani. |
|   9     | Ločevanje med preteklimi in prihajajoči dogodki.	 |
|   10     | 	Urejanje, brisanje dogodka (organizator). |
|     11   | 	Potrjevanje prisotnosti. |
|     12   | Mail.	 |
|    13    | Registracija uporabnika.	 |
|    14    | Podajanje ocen prisotnih oseb.	Prikaz ocene na glavni strani. |
|     15   | 	Nalaganje slik. |
|      16  | Verzija	 |
|     17   | Verzija	 |
|     18   | 	Verzija |



## Avtorji
[<img alt="Evgen Tušek" src="https://avatars2.githubusercontent.com/u/39327068?s=460&v=4" width="117">](https://github.com/EvgennT)|[<img alt="Marko Pavičević" src="https://avatars2.githubusercontent.com/u/33724686?s=460&v=4" width="117">](https://github.com/PavicevicMarko)|[<img alt="Toni Žunec" src="https://avatars1.githubusercontent.com/u/33753063?s=460&v=4" width="117">](https://github.com/ZunecToni)|
:---: |:---: |:---: |
[Evgen Tušek](https://github.com/EvgennT) |[Marko Pavičević](https://github.com/PavicevicMarko) |[Toni Žunec](https://github.com/ZunecToni) |







