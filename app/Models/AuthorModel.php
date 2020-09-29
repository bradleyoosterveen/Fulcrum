<?php


    namespace Models;


    class AuthorModel
    {
        public static function getAuthors()
        {
            return [
                [
                    'name' => 'Bradley Oosterveen',
                    'role' => 'Lead Developer'
                ]
            ];
        }
    }