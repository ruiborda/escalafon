<?php

namespace Escalafon\Model;

interface CRUD
{
    
    public function create(): bool;
    
    public function read(): object;
    
    public function update(): bool;
    
    public function delete(): bool;
    
    public function read_all();
    
}