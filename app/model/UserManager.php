<?php

namespace App\Model;

use Nette;
use Nette\Database\Table\ActiveRow;


/**
 * Users management.
 */
class UserManager
{
    use Nette\SmartObject;

    const
        TABLE_NAME = 'zakaznik',
        COLUMN_MENO = 'meno',
        COLUMN_PRIEZVISKO = 'priezvisko',
        COLUMN_ADRESA = 'adresa',
        COLUMN_TELEFON = 'telefon',
        COLUMN_EMAIL = 'email',
        COLUMN_KARTA = 'id_karta',
        TABLE_VK = 'vernostne_karty',
        COLUMN_ID_KARTA = 'id';


    /** @var Nette\Database\Context */
    private $database;


    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }

    public function getAllCards() {
        $result = [];
        foreach ($this->database->table(self::TABLE_VK)->fetchAll() as $row) {
            $result[$row->id] = $row->id;
        }

        return $result;
    }

    public function getCard($id) {
        return $this->database->table(self::TABLE_VK)->get($id);
    }
    /**
     * Add customer for admin.
     * @param $meno
     * @param $priezvisko
     * @param $email
     * @param $adresa
     * @param $tel
     * @param $karta
     * @return Nette\Security\Identity
     */

    public function add($meno, $priezvisko, $email, $adresa, $tel, $karta)
    {
        $this->database->table(self::TABLE_NAME)->insert([
            self::COLUMN_MENO => $meno,
            self::COLUMN_PRIEZVISKO => $priezvisko,
            self::COLUMN_ADRESA => $adresa,
            self::COLUMN_TELEFON => $tel,
            self::COLUMN_EMAIL => $email,
            self::COLUMN_KARTA => $this->getCard($karta)
        ]);

    }
}

