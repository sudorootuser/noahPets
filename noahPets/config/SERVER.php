<?php
/*-------- CREACIÓN DE LA CONEXIÓN DE LA DB Y TOKENS DE SEGURIDAD ------*/

const SERVER = "localhost";
const DB = "forge";
const USER = "root";
const PASS = "";

const SGBD = "mysqli:host" . SERVER . ";dbname=" . DB;

const METHOD = "AES-256-CBC";
const SECRET_KEY = '$NoahPets@2022';
const SECRET_IV = '037970';
