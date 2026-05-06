<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DataCenterService
{
    public function create(?int $id = null): array
    {
        $dataCenter = $id
            ? DB::table('data_centers')->where('id', $id)->first()
            : null;

        if ($id && !$dataCenter) {
            return ['error' => 'Data Center not found'];
        }

        // Property Type values
        $propertyTypes = DB::table('inv_catg')
            ->select('type')
            ->distinct()
            ->orderBy('type')
            ->get();

        // Property Category records
        $propertyCategories = DB::table('inv_catg')
            ->select('id', 'type', 'name')
            ->orderBy('type')
            ->get();

        // Sub Category records
        $subCategories = DB::table('inv_subcatg')
            ->select('id', 'catg_id', 'name')
            ->get();

        $propertyCategoryMap = [];
        $allPropertyCategories = [];
        foreach ($propertyCategories as $item) {
            $propertyCategoryMap[$item->type][] = ['id' => $item->id, 'name' => $item->name];
            $allPropertyCategories[] = ['id' => $item->id, 'name' => $item->name];
        }

        $propertySubCategoryMap = [];
        foreach ($subCategories as $subCategory) {
            $propertySubCategoryMap[$subCategory->catg_id][] = ['id' => $subCategory->id, 'name' => $subCategory->name];
        }

        // Other data
        $states = DB::table('state_district')
            ->select('state')
            ->distinct()
            ->get();

        $cities = DB::table('state_district')
            ->select('District as city')
            ->get();

        $sources = DB::table('sources')->get();
        $projects = DB::table('projects')->get();

        return [
            'dataCenter' => $dataCenter,

            'propertyTypes' => $propertyTypes,
            'propertyCategories' => $propertyCategories,
            'propertyCategoryMap' => $propertyCategoryMap,
            'allPropertyCategories' => $allPropertyCategories,
            'subCategories' => $subCategories,
            'propertySubCategoryMap' => $propertySubCategoryMap,

            'states' => $states,
            'cities' => $cities,
            'sources' => $sources,
            'projects' => $projects,
        ];
    }
}
