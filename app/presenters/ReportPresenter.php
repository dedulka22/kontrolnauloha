<?php
/**
 * Created by PhpStorm.
 * User: deanamarekova
 * Date: 15.8.17
 * Time: 22:32
 */

namespace App\Presenters;
use App\Model;


class ReportPresenter extends BasePresenter
{
    /** @var Model\ReportModel @inject */
    public $model;

    public function renderReport() {
        $this->template->pocetZakaznikov = $this->model->countCustomers();
        $this->template->pocetKariet = $this->model->countCards();
        $this->template->top = $this->model->top10Customers();

    }


}