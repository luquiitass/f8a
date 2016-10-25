<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 09/10/16
 * Time: 17:03
 */

namespace App;


trait Funciones
{
    public static function getForSelect($listObject, $mensajeSinDatos='Sin datos', $mensajeDeSeleccion='selecciones una opcion')
    {
        $objects = array();
        if ($listObject->count()==0)
        {
            $objects['seleccionar']= $mensajeSinDatos;

        }else{
            foreach ($listObject as $object)
            {
                $objects[$object->id]= isset($object->name)?$object->name:$object->nombre;
            }
            $objects['seleccionar']= '*'.$mensajeDeSeleccion;
        }

        return array_sort($objects, function ($value) {
            return $value;
        });
    }

}