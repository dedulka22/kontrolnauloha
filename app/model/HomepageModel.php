<?php
/**
 * Created by PhpStorm.
 * User: deanamarekova
 * Date: 12.8.17
 * Time: 14:56
 */

namespace App\Model;
use Nette;


class HomepageModel extends Nette\Object {

    /** @var Nette\Database\Context $db */
    private $db = null;

    const TABLE_ZAK = 'zakaznik',
          TABLE_VK = 'vernostne_karty';

    /**
     * HomepageModel constructor.
     * @param Nette\Database\Context $db
     */
    public function __construct(Nette\Database\Context $db) {
        $this->db = $db;
    }

    public function getAllCustomer() {
        return $this->db->query(
            'SELECT * FROM `zakaznik` left join `vernostne_karty` on vernostne_karty.id = zakaznik.id_karta'
        )->fetchAll();
    }

}