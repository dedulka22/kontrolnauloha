<?php
/**
 * Created by PhpStorm.
 * User: deanamarekova
 * Date: 15.8.17
 * Time: 22:33
 */

namespace App\Model;
use Nette;


class ReportModel extends Nette\Object
{
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

    public function countCustomers() {
        return $this->db->table(self::TABLE_ZAK)->count('*');
    }

    public function countCards() {
        //return $this->db->table(self::TABLE_ZAK)->joinWhere(self::TABLE_VK.id,self::TABLE_ZAK.id_karta)->count('*');
        return $this->db->query(
            'SELECT count(id_karta) from zakaznik left join vernostne_karty on vernostne_karty.id = zakaznik.id_karta'
        )->fetchField(0);
    }

    public function top10Customers() {
        return $this->db->query('
            SELECT (pocet_kusov*cena_za_zbozi) as obrat, pouzitie, zbozi, id_zakaznik, meno, priezvisko, datum_nakupu from nakup left join zakaznik on nakup.zakaznik_id=zakaznik.id_zakaznik WHERE nakup.datum_nakupu BETWEEN NOW() - INTERVAL 1 MONTH AND NOW() order by obrat DESC
        ')->fetchAll();
    }

}