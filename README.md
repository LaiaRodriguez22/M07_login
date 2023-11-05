# M07_login

## SIGN UP
### A través d’un formulari en php (amb totes les etiquetes html en format DOCTYPE) afegir les dades d’usuaris (alumnat i professorat) utilitzant el mètode procedimental.

#### A phpmyadmin, crear una BBDD de nom Users i la taula de nom user.
#### A la taula user, afegir dades d’alumnat i professorat des d’un programa en php connectant-se a la BBDD Users.

#### Captures que s'han demanat en l'enunciat:
![fitxers en execució Harpreet](/imatgesHar/ficherosEjHar.jpg)
![Abans de fer la conexió a BD Harpreet](/imatgesHar/beforeHar.jpg)
![Després de fer la conexió a BD Harpreet](/imatgesHar/afterHar.jpg)


## LOGIN
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
![El formulari Login](/imatgesHar/formLoginHar.jpg)
* Usuari professorat: 
![El resulatat del rol professorat](/imatgesHar/roleProfeHar.jpg)
* Usuari alumnat:
![El resulatat del rol alumnat](/imatgesHar/roleAlumne.jpg)
* Dades no correctes: 
![Error al introduir dades incorrectes](/imatgesHar/loginError.jpg)


## PRÁCTICA6: REFACTORITZACIÓ DEL CODI

### Refactoritzar el fitxer de la validar.php.

### Crear una pàgina d’inici de l’aplicació (index.php).
* Mostrarem amb una etiqueta H2.
* En el cas de ser un professor, s’haurà de fer una consulta per mostrar tots els usuaris de la BBDD (igualment que a la pràctica anterior però l’haurem de fer en la pàgina d’inici), en aquest cas es mostrarà a través d’una taula.
* Afegirem dos enllaços a la pàgina: Mostrar informació detallada de l’usuari, Desconnectar.

## PRÁCTICA7: LOGIN AMB COOKIES

### Consisteix en traduir tota la informació en un llenguatge seleccionat per l'usuari. 
### L'Usuari té 3 opcions: Anglés, català i castellà.
### El valor de la cookie es passa amb el get.En el fitxer idioma.phP es guarda el valor i després es redirecciona a l'index.php. 
### Opció eliminar, en per destruir la cookie i que la página testigui en el lleguatge per defecte. 

### Captures de panatalla: 

* Pàgina principal, rol professor: 
![Després de fer el login, rol professor](/imatgesHar/mainProfe.jpg)

* Pàgina principal, rol alumne: 
![Després de fer el login, rol alumne](/imatgesHar/mainAlumne.jpg)

* Informació detallada català:
![Informació detalla en català de l'usuari que ha iniciat ha sessió](/imatgesHar/masInfoCat.jpg)
* Informació detallada castellà: 
![Informació detalla en castellà de l'usuari que ha iniciat ha sessió](/imatgesHar/masInfoEs.jpg)
* Informació detallada anglés:
![Informació detalla en anglés de l'usuari que ha iniciat ha sessió](/imatgesHar/masInfoEn.jpg)
* Inspeccionar, valor de la cookie:
![El valor de la cookie que se ha passat amb el get](/imatgesHar/inspecCookie.jpg)