<?php

namespace App\Breadcrumbs;

use Breadcrumbs;

class BreadcrumbsGenerator
{
    /**
     * Generate the resource breadcrumbs
     *
     * @param string $prefix
     * @param string $modelClass
     * @param string $label
     * @return void
     */
    public static function resource(string $prefix, string $modelClass, $label = 'name')
    {
        $modelName = substr($modelClass, strrpos($modelClass, '\\') + 1);
        $arr = preg_split('/(?=[A-Z])/', $modelName);

        $lowerCaseModelName = null;

        $firstWord = true;
        foreach ($arr as $word) {
            if ($word !== '') {
                $wordToAdd = strtolower($word);
                if (! $firstWord) {
                    $wordToAdd = '_' . $wordToAdd;
                }
                $lowerCaseModelName .= $wordToAdd;
                $firstWord = false;
            }
        }
        
        Breadcrumbs::register("{$prefix}.{$lowerCaseModelName}.index", function ($breadcrumbs) use ($prefix, $lowerCaseModelName) {
            $breadcrumbs->parent("{$prefix}.index");
            $breadcrumbs->push(ucfirst(str_plural($lowerCaseModelName)), route("{$prefix}.{$lowerCaseModelName}.index"));
        });

        Breadcrumbs::register("{$prefix}.{$lowerCaseModelName}.create", function ($breadcrumbs) use ($prefix, $lowerCaseModelName) {
            $breadcrumbs->parent("{$prefix}.{$lowerCaseModelName}.index");
            $breadcrumbs->push("Create", route("{$prefix}.{$lowerCaseModelName}.create"));
        });

        Breadcrumbs::register("{$prefix}.{$lowerCaseModelName}.edit", function ($breadcrumbs, $model) use ($prefix, $lowerCaseModelName, $modelClass, $label) {
            $breadcrumbs->parent("{$prefix}.{$lowerCaseModelName}.index");
            $breadcrumbs->push($model->$label, route("{$prefix}.{$lowerCaseModelName}.edit", $model->id));
        });

        Breadcrumbs::register("{$prefix}.{$lowerCaseModelName}.show", function ($breadcrumbs, $model) use ($prefix, $lowerCaseModelName, $modelClass, $label) {
            $breadcrumbs->parent("{$prefix}.{$lowerCaseModelName}.index");
            $breadcrumbs->push($model->$label, route("{$prefix}.{$lowerCaseModelName}.show", $model->id));
        });
    }
}
