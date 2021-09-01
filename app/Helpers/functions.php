<?php

if(!function_exists('getTimeDiff')){
    // Função para calcular diferença entre as horas.
    function getTimeDiff($dtime,$atime){
        // $since_start->days.' days total<br>';
        // $since_start->y.' years<br>';
        // $since_start->m.' months<br>';
        // $since_start->d.' days<br>';
        // $since_start->h.' hours<br>';
        // $since_start->i.' minutes<br>';
        // $since_start->s.' seconds<br>';

        $start_date = new DateTime(date('Y-m-d H:i:s', strtotime($dtime)));
        $since_start = $start_date->diff(new DateTime(date('Y-m-d H:i:s', strtotime($atime))));

        return $since_start;
    }
}