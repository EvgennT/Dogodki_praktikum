
## O projektu
 Projket za ustvarjanja spletne aplikacije za pregled, prijavljanje, spremljanja dogodkov.
Spletna aplikacija zajema fukcionalnosti:
1. registracija, prijava, odjava
2. dva tipa uporabnikov: organizator, uporabnik
3. dodajanje slik, urejanje dogodka, lo�evanje med prihajajo�imi in poteklimi dogodki
4. ocenjevanje dogodkov, preverjanje prisotnosti
5. sporo�anje po e-po�ti
 Spletna aplikacija omogo�a uporabnikom pregled preteklih in prihajajo�ih dogodkov. Uporabnikom omogo�a, da se registrirajo na stran in se s svojim profilom tudi prijavljajo, odjavljajo na dogodke in jih, v primeru da so bili prisotni, tudi ocenijo.
 
	
 
 ## Kompatibilnost
 |    CodeIgniter    | PHP	 |		Apache	|		WAMP	 |
| ----------------- |------|------|------|
|    3.1.9         | 5.6.35 |	2.4.33		|	3.0.6		 |


 ## Izdelano s pomo�jo
 * [Eclipse](https://www.eclipse.org) - Razvojno okolje.
* [WAMP](http://www.wampserver.com/en/#download-wrapper) - Lokalni server za delo z MySQL bazo in PHP.
* [phpMyAdmin](https://www.phpmyadmin.net) - Urejevalnik podatkovne baze.


 ## In�talacija in uporaba
 1. Instalirajte WAMP in ga za�enite.
3. Po�enite Eclipse in odprite perspektivo GIT (Window>Open perspective>Other...>GIT)
4. Na GitHub repozitoriju kopirajte naslov povezave (clone & download) 
5. V Eclipsu izberete Clone a Git repository in v primeru, da se okna ne izpolnijo, vnesite prej kopiramo povezavo  v polje URI. Next.
5. Obklukate vse prikazane dokumente in izberite next.
6. V polju Directory izberete browse in izberete datoteko www na lokaciji, kamor ste namestili wamp (privzeta lokacija: C:\wamp\www).
7. Da preverite, �e so prisotne vse datoteke, stisnete z desnim gumbom mi�ke na prikazano ime projekta in nato opcijo Pull. Prikazano okno zaprete.
8. Ob zagonu wamp se mora v orodni vrstici spodaj desno prikazati zelena ikona. Na njo stisnete z desnim gumbom mi�ke in izberete opcijo Refresh.
9. Nato ponovno stisnete na zeleno ikono programa wamp z levo tipko mi�ke in izberete opcijo Localhost.
10. Odpre se vam urejevalna stran , v kateri v spodnjem levem kotu izberete opcijo phpmyadmin (za prijavo in uporabo podatkovne baze) in se prijavite z uporabni�kim imenom root, geslo pa pustite prazno.
11. Za vzpostavitev podatkovne baze phpMyAdmin, sledite slede�im navodilom.
12. Spletna stran je na voljo pod povezavo: http://localhost/Dogodki_praktikum/


 ## Vzpostavitev podatkovne baze.
Za vzpostavitev podatkovne baze phpMyAdmin, sledite tem navodilom.
 1. Ko ste pognali WAMP stisnite z levo tipko mi�ke na ikono in na vrhu izberete Localhost.
2. V odprtem oknu, spodaj levo, poi��ete povezavo phpMyAdmin.
3. Prijavite se z uporabni�kim imenom "root".
4. Na levi strani kliknete "Novo", da ustvarite novo bazo. Poimenujete jo praktikum.
5. Kliknete na novo ustvarjeno bazo, v zgornji vrstivi izberete SQL in v polje prekopirate celotno vsebino datoteke "SQLstavki". Za potrditev izberite Izvedi. 
6. Po dokon�anih korakih ponovno po�enete WAMP in odprete spletno stran. Dostop je ustvarjen preko e-maila: admin@admin.com in gesla: admin.
7. Zaradi varnosti je omogo�eno dodajanje novih organizatorjev direktno v podatkovno bazo. To izvedete tako, v isto polje kot prej vsedete naslednji ukaz:

```
INSERT INTO `uporabniki` (`id`, `ime`, `priimek`, `email`, `geslo`, `tip`) VALUES ( '�tevilka organizatorja', 'Ime organizatorja', 'Priimek organizatorja', 'E-po�ta organizatorja', 'Geslo ogranizatorja', 1)
```


 ## Za spreminjanje kode
1. Po kloniranju projekta odperete perspektivo PHP.
2. V eclipse marketplace nalo�ite zadnjo verzijo PHP development tools.
3. file>import>PHP> existing composer project>next> v 2. vrstici poi��ete lokacijo kloniranega projekta (privzeta lokacija: C:\wamp\www)>finish
4. Sprmembe potrdite z desnim klikom na projekt>team>commit>izberete vse spremembe s gumbom dveh plus (+) simboli> dodate komentar> commit&push


 ## Funkcionalnosti
1. Registracija,
2. prijava, 
3. odjava,
4. dva tipa uporabnikov: organizator, uporabnik,
5. dodajanje slik,
6. urejanje dogodka, 
7. lo�evanje med prihajajo�imi in poteklimi dogodki,
8. ocenjevanje dogodkov, 
9. preverjanje prisotnosti,
10. sporo�anje po e-po�ti


 ## Podatkovna baza
 | Prvotna struktura | Kon�na struktura|
| -------- |------|
| <img alt="Prvi ER" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/E-R%20diagram-prvi.png" width="117">|<img alt="Kon�ni ER" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/er_model_koncni.jpg" width="117"> |


 ## Potek dela
 |    Verzija    | Opis	 |
| -------- |------|
|      1  | 	Povezava projekta z GitHUb-om. |
|     2   | 	Ustvarjena podatkovna baza. |
|      3  | 	Prijava, vnos dogodka. |
|     4   | Spremembe v bazi.	 |
|    5    | 	Prijava in odjava z dogodka. |
|    6    | Vpogled v dogodek, pregled prijavlenih (organizator).	 |
|    7    | Spremembe v bazi (tip datuma, termin, min udele�encev, max udele�encev).	 |
|   8     | 	Dojava s strani. |
|   9     | Lo�evanje med preteklimi in prihajajo�i dogodki.	 |
|   10     | 	Urejanje, brisanje dogodka (organizator). |
|     11   | 	Potrjevanje prisotnosti. |
|     12   | Mail.	 |
|    13    | Registracija uporabnika.	 |
|    14    | Podajanje ocen prisotnih oseb.	Prikaz ocene na glavni strani. |
|     15   | 	Nalaganje slik. |
|      16  | Popravljanje hro��ev.	 |
|     17   | Vizualno urejanje.	 |


## Razporeditev dela

Evgen Tu�ek: Back end, SQL povpra�evanja, Front End (View)
Marko Pavi�evi�: SQL povpra�evanja, Front End (View), Poro�ila, Dokumentacija
Toni �unec: Back End, SQL povpra�evanja, Front End (View)

## Prototip in kon�na verzija

 |    Prototip    | Kon�na verzija	 |	
| ----------------- |------|
| <img alt="Dodajanje dogodka" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/DodajanjePC.jpg" width="117">     | <img alt="Dodajanje dogodka" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/dodajKonc.png" width="117">  |		
|<img alt="Podrobno dogodek" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/DogodekPodrobnoPC.jpg" width="117">|<img alt="Podrobno dogodek" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/infoKonc.png" width="117"> |	
|<img alt="Prijava" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/PrijavaPC.jpg" width="117">|<img alt="Prijava" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/prijavaKonec.png" width="117"> |
|<img alt="Registracija" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/RegistracijaPC.jpg" width="117">|<img alt="Registracija" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/registerKonc.png" width="117"> |
|<img alt="Pregled" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/IndexPC.jpg" width="117">|<img alt="Pregled" src="https://github.com/EvgennT/Dogodki_praktikum/blob/master/slike/pregledKonc.png" width="117"> |

 ## Avtorji
[<img alt="Evgen Tu�ek" src="https://avatars2.githubusercontent.com/u/39327068?s=460&v=4" width="117">](https://github.com/EvgennT)|[<img alt="Marko Pavi�evi�" src="https://avatars2.githubusercontent.com/u/33724686?s=460&v=4" width="117">](https://github.com/PavicevicMarko)|[<img alt="Toni �unec" src="https://avatars1.githubusercontent.com/u/33753063?s=460&v=4" width="117">](https://github.com/ZunecToni)|
:---: |:---: |:---: |
[Evgen Tu�ek](https://github.com/EvgennT) |[Marko Pavi�evi�](https://github.com/PavicevicMarko) |[Toni �unec](https://github.com/ZunecToni) |
