<?php

namespace App\Controller;

use App\Entity\Invoice;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Route;

class InvoiceIncrementationController{

    /**
     * @var EntityManagerInterface
     */
    public function __construct(EntityManagerInterface $manager){
        $this->manager = $manager;
    }

    /**
     * les anotations sont dans l'entité invoice, ça fonctionne ici mais ça ne remonte pas dans apiPlatform et les devs qui reprendront le projets risquent d'être perdu
     */
    public function __invoke(Invoice $data) // $data est un nom obligatoire
    {
        $data->setChrono($data->getChrono() + 1);
        $this->manager->flush();
        return($data);
    }
}