CREATE TABLE IF NOT EXISTS emailtype (
emailtypeid TINYINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
emailtype VARCHAR(50) NOT NULL UNIQUE KEY, 
active TINYINT(1) UNSIGNED DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;



CREATE TABLE IF NOT EXISTS email (
emailid INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY, 
email VARCHAR(255) NOT NULL UNIQUE KEY,
emailtypeid TINYINT UNSIGNED DEFAULT NULL,
FOREIGN KEY (emailtypeid) REFERENCES emailtype(emailtypeid),
logged DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
lastupdated DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
active tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;
