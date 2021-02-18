<?php 

//github repo: https://github.com/dlanaras/cinema
include_once("./customer.class.php");
include_once("./fs-crud.class.php");
$continue = "ja";

while($continue != "nein")
{
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
|5: Buchung entfernen                    |
|6: Film-Plan erstellen oder erweitern   |
|7: Listungen in Film-Plan auflisten     |
|8: Listung aus Film-Plan löschen        |
|9: Listung auf Film-Plan ersetzen       |
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
break;
case(4):
    $freeSeats = new Customer("","","","","","");
    $freeSeats->same_bookings();
break;
case(5):
    $removeBooking = new Customer("","","","","","");
    $removeBooking->remove_booking();
break;
case(6):
    $FScreate = new FS_CRUD("", "", "", "", "", "");
    $FScreate->create_FS();
break;
case(7):
    $FSshow = new FS_CRUD("","","","","","");
    $FSshow->show_FS();
break;
case(8):
    $FSRemove = new FS_CRUD("","","","","","");
    $FSRemove->remove_From_FS();
break;
case(9):
    $FSRemove = new FS_CRUD("","","","","","");
    $FSRemove->remove_From_FS();
    $FScreate = new FS_CRUD("", "", "", "", "", "");
    $FScreate->create_FS();
break;
default:
echo "Bitte geben Sie eine gültige Eingabe ein.";
}
$continue = readline("Wollen Sie noch Etwas bearbeiten ('nein' eingeben um das Program zu beenden, sont die Enter-Taste drücken): \n");
}

