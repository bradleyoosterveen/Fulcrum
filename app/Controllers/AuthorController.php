<?php


    namespace Controllers;


    class AuthorController
    {

        /**
         * @return array
         */
        public static function index()
        {
            return [
                [
                    'name' => 'Dakpaneel',
                    'role' => 'Lead Developer'
                ]
            ];
        }
    }