<?php
  
namespace App\Imports;
  
use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class QuestionImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Question([
            'question'     => $row['question'],
            'category_id'    => $row['category_id'], 
            'sub_category_id'    => $row['sub_category_id'], 
            'sub_sub_category_id'    => $row['sub_sub_category_id'], 
            'status'    => $row['status'], 
            'reversely_coded'    => $row['reversely_coded'], 
         ]);
    }
}