<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnicalSeeder extends Seeder
{
    private array $orderNumbersUsed = [];
    private array $dispatchIdsUsed = [];

    /** @throws Exception */
    public function run(): void
    {
        $this->createOnRentHeaders();
;    }

    /** @throws Exception */
    private function createOnRentHeaders() : void
    {
        for($i = 0; $i < 30; $i++)
        {
            $contracts = random_int(100, 200);
            $headerId  = DB::table('on_rent')->insertGetId($this->generateHeaderData($i, $contracts));

            $this->insertOnRentLines($headerId, $contracts);
        }
    }

    /** @throws Exception */
    private function insertOnRentLines(int $headerId, int $contracts) : void
    {
        for($i = 0; $i < $contracts; $i++)
        {
            DB::table('on_rent_lines')->insert($this->generateLineData($headerId, $i));
        }
    }

    /** @throws Exception */
    private function generateLineData(int $headerId, int $index) : array
    {
        return [
            'header_id'     => $headerId,
            'account'       => $this->generateAccountCode(),
            'order_number'  => $this->generateOrderNumber(),
            'rental_start'  => now()->subDays(random_int(1,60)),
            'dispatch_id'   => $this->generateDispatchId(),
            'order_value'   => $this->randomDecimal(100, 700)
        ];
    }

    /** @throws Exception */
    private function generateAccountCode() : string
    {
        $code = substr(str_shuffle(str_repeat("ABCDEFGHIJKLMN0PQRSTUVWXYZ", 4)), 0, 4);
        $num  = random_int(1,10);

        return $code.$num;
    }

    /** @throws Exception */
    private function generateOrderNumber()
    {
        $orderNumber = random_int(100000, 100400);

        return in_array($orderNumber, $this->orderNumbersUsed, true)
            ? $this->generateOrderNumber()
            : $orderNumber;
    }

    /** @throws Exception */
    private function generateDispatchId()
    {
        $dispatchId = random_int(200400, 200800);

        return in_array($dispatchId, $this->dispatchIdsUsed, true)
            ? $this->generateDispatchId()
            : $dispatchId;
    }

    /** @throws Exception */
    private function generateHeaderData(int $index, int $totalContracts) : array
    {
        return [
            'gen_date'     => ($index === 0 ? now() : now()->subDays($index)),
            'contracts'    => $totalContracts,
            'quotes'       => random_int(10, 25),
            'weekly_value' => $this->randomDecimal(30000, 35000)
        ];
    }

    /** @throws Exception */
    private function randomDecimal(int $from, int $to) : float
    {
        $small = random_int(1, 99);
        $small = $small < 10 ? '0'.$small : $small;

        return (float) random_int($from, $to).'.'.$small;
    }
}
