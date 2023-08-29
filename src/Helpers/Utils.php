<?php

namespace App\Helpers;

use Amp\Pipeline\Queue;
use App\Repository\AccountRepository;
use function Amp\async;
use function Amp\delay;

class Utils
{
    private static AccountRepository $accountRepo;

    public function __construct(AccountRepository $accountRepo)
    {
        $this->accountRepo = $accountRepo;
    }

    public static function quickRandom($length = 16)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    public static function loopIterator($data)
    {
        $queue = new Queue();
        $start = \microtime(true);
        $elapsed = fn () => \microtime(true) - $start;

        async(function () use ($queue, $elapsed): void {

            printf("Starting production loop at %.3fs\n", $elapsed());

            foreach (range(1, 100) as $value) {
                delay(0.1); // Production of a value takes between 100ms

                // if ($accountResult == null) {
                //     $accountResult = new CarTemp();
                //     $this->em->persist($accountResult);
                //     $this->em->flush();
                // }

                $queue->push($value);
            }

            printf("Completing production loop at %.3fs\n", $elapsed());

            // Queue must be completed, otherwise foreach loop below will never exit!
            $queue->complete();
        });
    }

    public static function getUserByEmail($email)
    {
        $account = self::$accountRepo->findOneBy(["email" => $email]);
        return $account;
    }

    public static function getUserByPhone($phone)
    {
        $account = self::$accountRepo->findOneBy(["phone" => $phone]);
        return $account;
    }
}
