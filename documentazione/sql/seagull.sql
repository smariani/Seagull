CREATE TABLE `fatture` 
(
	`id` integer (10) UNSIGNED  NOT NULL AUTO_INCREMENT , 
	`data` datetime NOT NULL, 
	`importo` double (22,2) NOT NULL, 
	`note` varchar (255), 
	`ordine_id` integer (10) UNSIGNED  NOT NULL,
	PRIMARY KEY (`id`)
); 
CREATE TABLE `ordini` 
(
	`id` integer (10) UNSIGNED  NOT NULL AUTO_INCREMENT , 
	`data` datetime NOT NULL, 
	`note` varchar (255), 
	`stato` varchar (255) NOT NULL,
	PRIMARY KEY (`id`)
); 
CREATE TABLE `prodotti` 
(
	`id` integer (10) UNSIGNED  NOT NULL AUTO_INCREMENT , 
	`nome` varchar (255) NOT NULL, 
	`descrizione` varchar (255) NOT NULL, 
	`prezzo` double (22,2) UNSIGNED  NOT NULL,
	PRIMARY KEY (`id`)
); 
CREATE TABLE `users` 
(
	`id` integer (10) UNSIGNED  NOT NULL AUTO_INCREMENT , 
	`username` varchar (255) NOT NULL, 
	`password` varchar (255) NOT NULL, 
	`role` varchar (255) NOT NULL,
	PRIMARY KEY (`id`)
); 