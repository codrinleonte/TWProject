# JFK - Just For Kids  Game

  JFK este un joc Web care ofera copiilor mijloace amuzante de invatare si testare interactiva 
a cunostintelor generale dintr-un domeniu ales dintr-o lista editabila (exemple tipice: matematica,
literatura, geografie, istorie, muzica).Rezultatele testelor realizate vor putea fi raportate parintilor,
rudelor sau tutorilor legali via e-mail si fluxuri de stiri Atom. 
Se vor oferi mai multe niveluri de dificultate in functie de varsta copiilor (EASY - prescolari,
MEDIUM - scolari mici,HARD - elevi de gimnaziu etc. )
Parintii/tutorii vor avea posibilitatea monitorizarii progresului inregistrat si a gestionarii testelor si cunostintelor 
folosite pentru instruire.
Bonus: partajarea celor mai bune rezultate obtinute de copii pe minim 2 retele sociale (e.g., Facebook si Twitter).

Tehnologii : HTML5, CSS3, JavaScript, PHP, Oracle PL/SQL.

Server : Apache24.

Adress : localhost:8181/tw

Pentru Implementarea acestui Proiect am folosit o arhitectura  de tip "Onion Layer", si ca urmare fisierele au fost impartite astfel : 
 * BLL (Business Logic Layer ) - contine interfetele si clasele  care implementateaza logica aplicatiei  
    
 * DAL (Data Acces Layer) - interfetele si clasele de tip Repository care implementeaza metode de acces al Bazei de Date
     
 * PL  (Presentation Layer) - puntea de legatura intre BackEnd si FrontEnd.
       
 * public - contine implementarea partii de Design a proiectului 
       
