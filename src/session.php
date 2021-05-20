<?php
/*
declare(strict_types=1);

namespace App;



session_set_save_handler('_open', '_close', '_read', '_write', '_destroy', '_clean');

function _open() {      // Otwieranie danych sesji. Tutaj łączymy się standardowo z bazą danych.
    global $_sess_db;
    $db_user = 'root';
    $db_pass = '';
    $db_host = 'localhost';
    $db_name = 'testowanie';

    if ($_sess_db = mysqli_connect($db_host, $db_user, $db_pass)){
        return mysqli_select_db($_sess_db, $db_name);
    }
    return FALSE;
}

function _close(){ //Zamykanie, czyli standardowe zwolnienie połączenia z bazą danych za pomocą mysqli_close.
    global $_sess_db;
    return mysqli_close($_sess_db);
}

function _read($id){ //Czytanie danych zapisanych w sesji (do funkcji jest przekazywany argument z id sesji). Funkcja session_set_save_handler() sama go tam umieści:
    global $_sess_db;
    $id = mysqli_real_escape_string($_sess_db, $id);
    $sql = "SELECT data FROM sessions WHERE id = '$id'";
    if ($result = mysqli_query($_sess_db, $sql)){
        if (mysqli_num_rows($result)) {
           $record = mysqli_fetch_assoc($result);
           return $record['data'];
       }
    }
    return '';
}

function _write($id, $data, $_sess_db=""){ //Zapis danych (REPLACE INTO to równoważnik DELETE i INSERT rekordu o tym samym ID):
    global $_sess_db;
    $access = time();
    $id = mysqli_real_escape_string($_sess_db, $id);
    $access = mysqli_real_escape_string($_sess_db, $access);
    $data = mysqli_real_escape_string($_sess_db, $data);
    $sql = "REPLACE  INTO sessions  VALUES ('$id', '$access', '$data')";
    return mysqli_query($_sess_db, $sql);
}

function _destroy($id){ //Tutaj funkcja aby programista PHP mógł zniszczyć sesję, np. w razie chęci wylogowania użytkownika:
    global $_sess_db;
    $id = mysqli_real_escape_string($_sess_db, $id);
    $sql = "DELETE FROM sessions WHERE id = '$id'";
    return mysqli_query($_sess_db, $sql);
}

function _clean($max) { //Czyszczenie sesji następuje w przypadku przeterminowania:
    global $_sess_db;
    $old = time() - $max;
    $old = mysqli_real_escape_string($_sess_db, $old);
    $sql = "DELETE FROM sessions WHERE access < '$old'";
    return mysqli_query($_sess_db, $sql);
}

register_shutdown_function('session_write_close');

*/