<?php

namespace App\Permissions;

    class Permissions{
        protected $permissions=[
            'User'=>'Users',
            'Blog'=>'Blogs'
        ];
        public function getPermissions(){
            return $this->permissions;
        }
    }

?>