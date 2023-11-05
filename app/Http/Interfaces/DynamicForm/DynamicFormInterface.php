<?php

namespace App\Http\Interfaces\DynamicForm;


interface DynamicFormInterface{
   public function index();
    public function create();
    public function store($request);
    public function show($id);
    public function edit(string $id);
    public function update($request, string $id);
    public function destroy(string $id);
}