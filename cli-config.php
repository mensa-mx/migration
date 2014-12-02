<?php
/**
 * @author: Alberto Maturano <alberto@maturano.mx>
 */

require 'bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
