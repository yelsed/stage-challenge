<?php

namespace App\Http\Controllers;

class ChallengeController extends Controller
{
    public function index()
    {
        $names = ["Arne", "Reinier", "Kylian", "Huub", "Mick", "Brenda", "Ruben", "Desley", "Carly", "Esther"];
        sort($names);

        foreach ($names as $index => $name) {
            $index = $index + 1;
            $split_name = str_split($name);
            $pointsArray = [];
            foreach ($split_name as $character) {
                array_push($pointsArray, $character, $this->valueCharacter(strtolower($character), $index));
            }
            $namePointsArr[$name] = array_sum($pointsArray);
        }
        $total = array_sum($namePointsArr);
        return view('welcome', compact('total', 'namePointsArr'));
    }


    public function valueCharacter($character, $index)
    {
        $alphabet = ["a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5, "f" => 6, "g" => 7, "h" => 8, "i" => 9, "j" => 10, "k" => 11, "l" => 12, "m" => 13, "n" => 14, "o" => 15, "p" => 16, "q" => 17, "r" => 18, "s" => 19, "t" => 20, "u" => 21, "v" => 22, "w" => 23, "x" => 24, "y" => 25, "z" => 26];
        foreach ($alphabet as $letter => $value) {
            if ($character == $letter) {
                return $value * $index;
            }
        }
    }
}
