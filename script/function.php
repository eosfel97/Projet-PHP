<?php
function getAlphabetVigenere(): array
{
    $carat = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $caratab = str_split($carat);
    return $caratab;
}
function sizeAlphabetVigenere(): int
{
    $caratab = getAlphabetVigenere();
    $size = count($caratab);
    return $size;
}
function createVigenereT(): array
{
    $caratab = getAlphabetVigenere();
    $doublecarat = array_merge($caratab, $caratab);
    $sizecaratab = count($caratab);
    for ($i = 0; $i < $sizecaratab; $i++) {
        for ($j = 0; $j < $sizecaratab; $j++) {
            $line = $caratab[$i];
            $column = $caratab[$j];
            $vigenere[$line][$column] = $doublecarat[$i + $j];
        }
    }
    return $vigenere;
}

function codeVigenere(string $message, string $key): string
{
    $vigenere = createVigenereT();
    $messagetab = str_split($message);
    $keytab = str_split($key);
    $keysize = count($keytab);
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    $keycounter = 0;
    foreach ($messagetab as $pointer => $letterToEncode) {
        $positionKeyLetter = $keycounter % $keysize;
        $keyLetter = $keytab[$positionKeyLetter];
        if ($letterToEncode != " ") {
            $encodedMessage[] = $vigenere[$letterToEncode][$keyLetter];
        } else {
            $encodedMessage[] = " ";
        }
        $keycounter++;
    }
    $cryptedMessage = implode($encodedMessage);
    return $cryptedMessage;
}

function uncodeVigenere(string $encodeMessage, string $key): string
{
    $vigenere = createVigenereT();
    $sizecaratab = sizeAlphabetVigenere();
    $caratab = getAlphabetVigenere();
    ///////////decode message
    $encodedMessagetab = str_split($encodeMessage);
    $keyTab = str_split($key);
    $keySize = count($keyTab);
    $keycounter = 0;
    foreach ($encodedMessagetab as $pointer => $letterTodecode) {
        $positionKeyLetter = $keycounter % $keySize;
        $keyLetter = $keyTab[$positionKeyLetter];
        if ($letterTodecode != " ") {
            for ($i = 0; $i < $sizecaratab; $i++) {
                $lineTOdecode = $caratab[$i];
                if ($vigenere[$lineTOdecode][$keyLetter] == $letterTodecode) {
                    $decryptedMessage[] = $lineTOdecode;
                }
            }
        } else {
            $decryptedMessage[] = " ";
        }
        $keycounter++;

    }
    $decodedMessage = implode($decryptedMessage);
    return $decodedMessage;
}
