<?php

//namespace Database;

class Db
{
    private const USER = 'u43738';
    private const PW = 'YmCUgeK97Yd8';
    private const DB = 'db43738';

    public static function getConnection()
    {
        return new PDO('mysql:host=mysql01.manitu.net;dbname=' . self::DB, self::USER, self::PW);
    }
}