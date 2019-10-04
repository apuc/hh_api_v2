<?php

require 'vendor/autoload.php';

use classes\IUrls;
use classes\VacancyParams;
use classes\Wrapper;


/*Получение первой страницы вакансий для Донецка за последние 30 дней*/
print_r(Wrapper::runFor(IUrls::Vacancies)->get(array(
    VacancyParams::page => '1',
    VacancyParams::per_page => '25',
    VacancyParams::area => 118,
    VacancyParams::period => 30
))->getItemFromJson());


