<?php

namespace FRD\DB;

abstract class DbConnection
{
    private $dns;
    private $user;
    private $key;
    private $options;

    abstract public function __construct($setup);
    abstract public function connectDb();

} 