# M07_login

## Sign Up 
### A través d’un formulari en php (amb totes les etiquetes html en format DOCTYPE) afegir les dades d’usuaris (alumnat i professorat) utilitzant el mètode procedimental.

#### A phpmyadmin, crear una BBDD de nom Users i la taula de nom user.
#### A la taula user, afegir dades d’alumnat i professorat des d’un programa en php connectant-se a la BBDD Users.

#### Captures que s'han demanat en l'enunciat:
![fitxers en execució Harpreet](ficherosEjHar.jpg)
![Abans de fer la conexió a BD Harpreet](beforeHar.jpg)
![Després de fer la conexió a BD Harpreet](afterHar.jpg)

c

### Es crea un formulari amb HTML per fer el Login. 
* Serà un formulari amb el mail i el password. 
* Ha de tenir un checkbox “Remember me”
* El formulari haurà de fer servir el mètode POST.
* La pàgina tindrà un enllaç per poder crear un usuari (pàgina de la pràctica anterior)
* Totes les pàgines de la pràctica anterior hauran de tenir un enllaç per anar a login.html

### Per mostrar les dades s'ha de tener en compte el rol de l'usuari. 
### Si el rol és alumnat, es mostra el seu nom, cognom i correo.Si es el rol és professorat es mostren tots els usuari de la base de dades. 

### Captures de panatalla: 

* EL formulari Login: 
![El formulari Login](formLoginHar.jpg)
* Usuari professorat: 
![El resulatat del rol professorat](roleProfeHar.jpg)
* Usuari alumnat:
![El resulatat del rol alumnat](roleAlumneHar.jpg)
* Dades no correctes: 
![Error al introduir dades incorrectes](loginError.jpg)


## Práctica6: Refactorització del codi

### Refactoritzar el fitxer de la validar.php.

### Crear una pàgina d’inici de l’aplicació (index.php).
* Mostrarem amb una etiqueta H2.
* En el cas de ser un professor, s’haurà de fer una consulta per mostrar tots els usuaris de la BBDD (igualment que a la pràctica anterior però l’haurem de fer en la pàgina d’inici), en aquest cas es mostrarà a través d’una taula.
* Afegirem dos enllaços a la pàgina: Mostrar informació detallada de l’usuari, Desconnectar.


