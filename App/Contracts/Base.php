<?php
interface Base
{

    /**
     * get all the records in a model
     */
    function all();

    /**
     * get a specific record by id
     */
    function getById(int $id);

    /**
     * get records based on a where condition
     */
    function getWhere(array $condition = []);

    /**
     * Inserts data into the database
     */
    function save(array $data);
    
}
