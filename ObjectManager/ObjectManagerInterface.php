<?php

namespace ObjectManager;

interface ObjectManagerInterface
{

    public function all();

    public function filter();

    public function get();

    public function update();

    public function delete();


}