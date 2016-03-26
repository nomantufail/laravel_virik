<?php
/**
 * Created by PhpStorm.
 * User: zeenomlabs
 * Date: 1/27/2016
 * Time: 11:36 AM
 */

namespace AppDB\Traits;


trait ExtendedQueryMakerHelper {

    public function security(){
        $this->timestamps();
        $this->softDeletes();
        $this->integer('created_by')->unsigned();
        $this->integer('updated_by')->unsigned();
        $this->integer('deleted_by')->unsigned();
        $this->foreign('created_by')->references('id')->on('users');
        $this->foreign('updated_by')->references('id')->on('users');
    }
} 