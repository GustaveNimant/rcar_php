<?php

/* Décompression de la base */

/* echo "Décompression de la base .....<br>"; */
/* system ("gunzip base.sql.gz"); */

/* Restauration de la base */

echo "Base en cours de restauration .....<br>";
system("cat wikiosp_database.sql | mysql --host=willforgosp.mysql.db --user=willforgosp --password=Ala1Fra2Yve3 willforgosp");

?>