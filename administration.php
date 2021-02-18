<?php 

//github repo: https://github.com/dlanaras/cinema
include_once("./customer.class.php");
include_once("./fs-crud.class.php");

echo "
**********************************************
**********************************************
*** Wilkommen zur Kino-Verwaltungsprogramm ***
**********************************************
**********************************************";

echo "
__________________________________________
|1: Kunde registrieren                   |
|2: Buchung erstellen                    |
|3: Buchungen auflisten                  |
|4: Frei Plätze berechnen                |
|5: Film-Plan erstellen oder erweitern   |
|6: Listungen in Film-Plan auflisten     |
|7: Listung aus Film-Plan löschen        |
|8: Listung auf Film-Plan ersetzen       |
|________________________________________|
\n\n";

$userInput = readline("Wählen Sie eine Zahl: ");

switch($userInput)
{
case(1):
    $register = new Customer("", "", "", "", "", "");
    $register->register_customer();
break;
case(2):
    $book = new Customer("", "", "", "", "", "");
    $book->create_booking();
break;
case(3):
    $showCustomer = new Customer("","","","","","");
    $showCustomer->show_booked_customers();
//instancing -> call show bookings method
break;
case(4):
    $freeSeats = new Customer("","","","","","");
    $freeSeats->same_bookings();
//instancing -> call free seats method
break;
case(5):
    $FScreate = new FS_CRUD("", "", "", "", "", "");
    $FScreate->create_FS();
//instancing -> call create/append method
break;
case(6):
    $FSshow = new FS_CRUD("","","","","","");
    $FSshow->show_FS();
//instancing -> call show method
break;
case(7):
    $FSRemove = new FS_CRUD("","","","","","");
    $FSRemove->remove_From_FS();
//instancing -> call delete method
break;
case(8):
    $FSRemove = new FS_CRUD("","","","","","");
    $FSRemove->remove_From_FS();
    $FScreate = new FS_CRUD("", "", "", "", "", "");
    $FScreate->create_FS();
//instancing -> call delete method -> readlines -> call create/append method
break;
default:
echo "Bitte geben Sie eine gültige Eingabe ein.";
}
