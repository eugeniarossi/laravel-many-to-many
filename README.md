# Laravel Boolfolio - Project Technology

Aggiungiamo una nuova entità Technology. Questa entità rappresenta le tecnologie utilizzate ed è in relazione many to many con i progetti.

creare la migration per la tabella technologies
creare il model Technology
creare la migration per la tabella pivot project_technology
aggiungere ai model Technology e Project i metodi per definire la relazione many to many
visualizzare nella pagina di dettaglio di un progetto le tecnologie utilizzate, se presenti
permettere all’utente di associare le tecnologie nella pagina di creazione e modifica di un progetto
gestire il salvataggio dell’associazione progetto-tecnologie con opportune regole di validazione

## Bonus 1:
creare il seeder per il model Technology.

## Bonus 2:
aggiungere le operazioni CRUD per il model Technology, in modo da gestire le tecnologie utilizzate nei progetti direttamente dal pannello di amministrazione.