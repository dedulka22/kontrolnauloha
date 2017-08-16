<?php

namespace App\Presenters;

use App\Model;
use Ublaboo\DataGrid\DataGrid;

class HomepagePresenter extends BasePresenter
{
    /** @var Model\HomepageModel @inject */
    public $model;

    public function renderDefault() {
        $this->template->zakaznik = $this->model->getAllCustomer();
    }

    protected function createComponentSearchGrid($name) {
        /**
         * @var Ublaboo\DataGrid\DataGrid
         */
        $grid = new DataGrid($this, $name);
        $grid->setPrimaryKey('id_zakaznik');
        $grid->setDataSource($this->model->getAllCustomer());


        $grid->addColumnText('id_zakaznik', 'ID')
            ->setSortable()->setRenderer(function($item) {
                return ($item->id_zakaznik);
            });

        $grid->addColumnText('meno', 'Meno')
            ->setSortable()->setRenderer(function($item) {
                return ($item->meno);
            });

        $grid->addColumnText('priezvisko', 'Priezvisko')
            ->setSortable()->setRenderer(function($item) {
                return ($item->priezvisko);
            });

        $grid->addColumnText('adresa', 'Adresa')
            ->setSortable()->setRenderer(function($item) {
                return ($item->adresa);
            });

        $grid->addColumnText('email', 'Email')
            ->setSortable()->setRenderer(function($item) {
                return ($item->email);
            });

        $grid->addColumnText('telefon', 'Telefon')
            ->setSortable()->setRenderer(function($item) {
                return ($item->telefon);
            });

        $grid->addColumnText('datum_registrace', 'Datum registracie')
            ->setSortable()->setRenderer(function($item) {
                return ($item->datum_registrace);
            });

        $grid->addColumnText('id_karta', 'ID Karty')
            ->setSortable()->setRenderer(function($item) {
                return ($item->id_karta);
            });

        $grid->addColumnText('cislo_karty', 'Cislo karty')
            ->setSortable()->setRenderer(function($item) {
                return ($item->cislo_karty);
            });

        $grid->addColumnText('typ_karty', 'Typ karty')
            ->setSortable()->setRenderer(function($item) {
                return ($item->typ_karty);
            });

        $grid->addFilterText('id_zakaznik', 'Search', ['meno', 'priezvisko', 'cislo_karty'])->setPlaceholder('Hladat');

        $grid->setRememberState(FALSE);
        $grid->setRowCallback(function($item, $tr) {
            $tr->addClass('back-default');
        });
        return $grid;
    }

}
