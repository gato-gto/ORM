<?php
require_once "bootstrap.php";

/** @var EntityManager $entityManager */
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
