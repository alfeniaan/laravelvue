<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SampleData;

class SampleDataController extends Controller
{
    public function index()
    {
        $data = SampleData::get();
        $product_type_name = array_unique(SampleData::pluck('product_type')->toArray());
        $product_type = [];
        foreach($product_type_name as $value){
            $product_type[] = [
                "name" => $value,
                "qty" => $data->where('product_type', $value)->count(),
                "grade" => $data->where('product_type', $value)->pluck('grade')->toArray(),
                "size" => $data->where('product_type', $value)->pluck('size')->toArray(),
                "connection" => $data->where('product_type', $value)->pluck('connection')->toArray(),
            ];
        }
        $grade_name = array_unique(SampleData::pluck('grade')->toArray());
        $grade = [];
        foreach($grade_name as $value){
            $grade[] = [
                "name" => $value,
                "qty" => $data->where('grade', $value)->count(),
                "product_type" => $data->where('grade', $value)->pluck('product_type')->toArray(),
                "size" => $data->where('grade', $value)->pluck('size')->toArray(),
                "connection" => $data->where('grade', $value)->pluck('connection')->toArray(),
            ];
        }
        $size_name = array_unique(SampleData::pluck('size')->toArray());
        $size = [];
        foreach($size_name as $value){
            $size[] = [
                "name" => $value,
                "qty" => $data->where('size', $value)->count(),
                "grade" => $data->where('size', $value)->pluck('grade')->toArray(),
                "product_type" => $data->where('size', $value)->pluck('product_type')->toArray(),
                "connection" => $data->where('size', $value)->pluck('connection')->toArray(),
            ];
        }
        $connection_name = array_unique(SampleData::pluck('connection')->toArray());
        $connection = [];
        foreach($connection_name as $value){
            $connection[] = [
                "name" => $value,
                "qty" => $data->where('connection', $value)->count(),
                "grade" => $data->where('connection', $value)->pluck('grade')->toArray(),
                "size" => $data->where('connection', $value)->pluck('size')->toArray(),
                "product_type" => $data->where('connection', $value)->pluck('product_type')->toArray(),
            ];
        }

        return [
            "data" => $data,
            "product_type" => $product_type,
            "grade" => $grade,
            "size" => $size,
            "connection" => $connection,
        ];
    }
}
