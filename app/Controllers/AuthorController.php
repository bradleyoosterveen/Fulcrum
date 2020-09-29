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
                    'name' => 'Bradley Oosterveen',
                    'role' => 'Lead Developer'
                ]
            ];
        }
    }