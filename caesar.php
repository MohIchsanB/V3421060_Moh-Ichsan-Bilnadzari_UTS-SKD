<?php
//proses enkripsi atau dekripsi
function geser_teks($string, $key) {
    return implode('', array_map(function ($char) use ($key) { //menggeser huruf dengan array map
        return geser_karakter($char, $key); //2. memanggil fungsi 
    }, str_split($string))); //1. memisahkan tiap huruf
}

function geser_karakter($char, $shift) {
    $shift = $shift % 25;
    //merubah huruf ke ascii
    $ascii = ord($char);
    $shifted = $ascii + $shift;

    //jika uppercase
    if ($ascii >= 65 && $ascii <= 90) {
        return chr(geser_huruf_besar($shifted));
    }
    //jika lowercase
    if ($ascii >= 97 && $ascii <= 122) {
        return chr(geser_huruf_kecil($shifted));
    }
    //jika angka
    if ($ascii >= 33 && $ascii <= 58) {
        return chr(geser_angka($shifted));
    }

    return chr($ascii);
}

function geser_angka($ascii) {
    if ($ascii < 33) {
        $ascii = 59 - (33 - $ascii);
    }

    if ($ascii > 58) {
        $ascii = ($ascii - 58) + 32;
    }
    return $ascii;
}

function geser_huruf_besar($ascii) {
    if ($ascii < 65) {
        $ascii = 91 - (65 - $ascii);
    }

    if ($ascii > 90) {
        $ascii = ($ascii - 90) + 64;
    }

    return $ascii;
}

function geser_huruf_kecil($ascii) {
    if ($ascii < 97) {
        $ascii = 123 - (97 - $ascii);
    }

    if ($ascii > 122) {
        $ascii = ($ascii - 122) + 96;
    }

    return $ascii;
}

//text dan key dari inputan form dimasukkan dalam parameter fungsi geser_teks
function enkripsi($text, $key = 3) {
    return geser_teks($text, $key);
}

function dekripsi($ciphertext, $key = -3) {
    return geser_teks($ciphertext, -$key);
}