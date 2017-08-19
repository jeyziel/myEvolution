<?php

namespace App\Services;

class ListaPosts
{
    public function eBusca()
    {
        if (isset($_GET['s'])) {
            return true;
        }
        return false;
    }

    public function listaPost($model)
    {
        if($this->eBusca())
        {
            return $model->selected('*')
                ->search(['nome','s'])
                ->orSearch(['email','s'])
                ->paginate([2])
                ->get();
        }
        return $model->selected(['*']) 
               ->paginate([2])
               ->get();

    }

}