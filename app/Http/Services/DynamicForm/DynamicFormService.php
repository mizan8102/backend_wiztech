<?php
namespace App\Http\Services\DynamicForm;

use App\DTO\FormStoreDTO;
use App\Http\Interfaces\DynamicForm\DynamicFormInterface;
use App\Http\Resources\FormResource;
use App\Models\Dynamicform;
use App\Models\Formproperty;
use Exception;
use Illuminate\Support\Facades\DB;


class DynamicFormService implements DynamicFormInterface{
/**
    * Summary of index
    * @return void
    */
  public function index(){
    return Dynamicform::orderBy('created_at', 'DESC')->paginate(3);

  }

  public function create(){

  }
public function store($data)
{
    DB::beginTransaction();
    try {
        $formData = new FormStoreDTO($data);
        $dynamicForm = Dynamicform::create($formData->toArray());
        $this->formProperties($data['questions'], $dynamicForm->id);
        
        DB::commit();
        return $dynamicForm;
    } catch (Exception $e) {
        DB::rollBack();
        return $e;
    }
}

  // form properties 
  public function formProperties($child ,$id){
    
    foreach($child as $value){
      Formproperty::create([
        'label' => $value['label'],
        'type' => $value['type'],
        'data'  => json_encode($value['data']) ,
        'dynamicforms_id' => $id
      ]);
    }
    
  }
  public function show($id){
    $data= Dynamicform::with('formproperties')->find($id);
    return new FormResource($data);
  }
  public function edit(string $id){

  }
  public function update($data, string $id){
      DB::beginTransaction();
    try {
        $formData = new FormStoreDTO($data);
        $dynamicForm = Dynamicform::where('id',$id)->update($formData->toArray());
         Formproperty::where('dynamicforms_id', $id)->delete();
        $this->formProperties($data['questions'], $id);
        DB::commit();
        return $dynamicForm;
    } catch (Exception $e) {
        DB::rollBack();
        return $e;
    }
  }
  public function destroy(string $id){
     try {
      DB::beginTransaction();
      Dynamicform::findOrFail($id)->delete();
      Formproperty::where('dynamicforms_id', $id)->delete();
      DB::commit();
      return 'Delete successful';
    } catch (Exception $e) {
      DB::rollBack();
      return $e->getMessage();
    }

  }
}