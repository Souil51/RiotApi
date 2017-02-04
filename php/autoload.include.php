<?php

/** 
 * Inclusion automatique des classes PHP si la classe se trouve dans la racine ou dans le dossier php/
 *
 * @param string $className nom de classe à inclure
 *
 * @return true si la classe est trouvée, flase sinon
 */
function __autoload($className) {
      if (file_exists($className . '.php')) {
          require_once $className . '.php';
          return true;
      }else if (file_exists("php/" . $filename)){
      		(file_exists("php/" . $filename));
      		return true;
      }
      return false;
}

