<?php
/*-------- CREACIÓN DE LA CONEXIÓN DE LA DB Y TOKENS DE SEGURIDAD ------*/

// Conexión al servidor
// const SERVER = "localhost";
// const DB = "vjgsyizffsuv_forge";
// const USER = "vjgsyizffsuv_noah_client";
// const PASS = "PepiJona1122";

// Conexión Local
const SERVER = "localhost";
const DB = "vjgsyizffsuv_forge";
const USER = "root";
const PASS = "";

const SGBD = "mysql:host=" . SERVER . ";dbname=" . DB;

const METHOD = "AES-256-CBC";
const SECRET_KEY = '$NoahPets@2022';
const SECRET_IV = '037970';
