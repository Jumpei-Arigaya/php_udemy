<?php

namespace App\Services;

class CheckFormService
{

    public static function checkGender($contact)
    {
        if ($contact->gender === 0) {
            $gender = '男性';
        } else {
            $gender = '女性';
        }
        return $gender;
    }
    public static function checkAge($contact)
    {
        if ($contact->age === 1) {
            $age = '-19';
        }
        if ($contact->age === 2) {
            $age = '-29';
        }
        if ($contact->age === 3) {
            $age = '-39';
        }
        if ($contact->age === 4) {
            $age = '-49';
        }
        if ($contact->age === 5) {
            $age = '-59';
        }
        if ($contact->age === 6) {
            $age = '69-';
        }
        if ($contact->age === 1) {
            $age = '-19';
        }
        if ($contact->age === 2) {
            $age = '-29';
        }
        if ($contact->age === 3) {
            $age = '-39';
        }
        if ($contact->age === 4) {
            $age = '-49';
        }
        if ($contact->age === 5) {
            $age = '-59';
        }
        if ($contact->age === 6) {
            $age = '69-';
        }
        return $age;
    }
}
