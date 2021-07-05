<?php

namespace App\Http\Controllers\User\Account;

use App\Http\Controllers\Controller;
use App\Helper\MT5Helper;

class GetBalanceByLoginController extends Controller
{

    /**
     * @var mT5Helper
     */
    private $mT5Helper;

    public function __construct(MT5Helper $mT5Helper)
    {
        $this->mT5Helper = $mT5Helper;
    }

    public function main($login)
    {
        $result = $this->mT5Helper->getAccountInfo($login);
        $balance = $result->oInfo->Balance;
        $equity = $result->oAccount->Equity;
        return [$balance, $equity];
    }
}
