# LingoLingo-by-Srcici

Grupni projekat na predmetu Principi softverskog inženjerstva na Elektrotehničkom fakultetu u Beogradu.

# Korišćenje projekta
U folderu ***documentation*** nalazi se sva neophodna dokumrntacija ovog projekta po fazama izvođenje.
U folderu ***implementation*** nalazi se projekat. 
Da biste pokrenuli projekat neophodno je skinuti/klonirati isti i u konzoli se pozicionirati unutar folder implementation. Dalja uputstva se nalaze u README.md fajlu unutar pomenutog foldera.


Instalirati :
* WAMP 
* CodeIgniter 4
* Get Composer

Podesavanje baze:
* root password na 'srcici'
* udjes u mySql dir
* mySql.exe -u root -p
* nema password /ENTER
* ALTER USER 'root'@'localhost' IDENTIFIED BY 'scrici';
* FLUSH PRIVILAGES;
* EXIT
* wamp\apps\phpmyadmin5.0.2\config.inc.php
* cfg('Servers') 'port' = 3308
* php.ini my.ini portove na 3308
* udjemo u WAMP www folder composer create-project codeigniter4/appstarter lingolingo

