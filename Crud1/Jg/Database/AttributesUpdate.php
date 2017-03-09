<?php 

namespace Jg\Database;

class AttributesUpdate
{
    public function combineUpdateFields($attributes)
    {
        $keys = array_keys($attributes);
        $separadoPorDoisPontos = ':'.implode('=:',$keys);
        $combine = array_combine($keys,explode('=',$separadoPorDoisPontos));
        //array(nome => :nome)
        return $combine;
    }

    public function updateFields($attributes)
    {
        $combine = $this->combineUpdateFields($attributes);
        $query = null;

        //name=:name,email=:email,senha=:senha
        foreach ($combine as $key => $value)
        {
            $query.=$key . '=' . $value . ','; 
        }

        $novaQuery = rtrim($query,',');   
        return $novaQuery;
        
    }

    public function bindUpdateParameters($attributes)
    {
        $keys = array_keys($attributes);
        $separadoPorDoisPontos = ':' . implode(',:',$keys);//separa os arrays em ,:

        //:nome => 'jeyziel';
        $combineUpdate = array_combine(explode(',',$separadoPorDoisPontos),array_values($attributes));

        //retorna o array 
        return $combineUpdate;
    }




}