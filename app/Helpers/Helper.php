<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Helper{

    static public function dateFormat($data, $retorna = "data_br"){
        date_default_timezone_set('America/Sao_Paulo');
        $MesExtenso = "Janeiro";

        if ($data != ""){
            // Checar se tem hora informada
            $dataH = explode(" ", $data);
            if (count($dataH) == 1){
                $data = implode("-",array_reverse(explode("/", $data)));
            } else {
                $data = implode("-",array_reverse(explode("/", $dataH[0]))) . " " . $dataH[1];
            }
            $date = date_create($data);
        } else {
            $date = date_create(date("Y-m-d H:i:s"));
        }

        $Mes = date_format($date, 'N');
        switch ($Mes){
            case 1:
                $SemanaExtenso = "Segunda-feira";
                $SemanaEng1 = "mon";
                break;
            case 2:
                $SemanaExtenso = "Terça-feira";
                $SemanaEng1 = "tues";
                break;
            case 3:
                $SemanaExtenso = "Quarta-feira";
                $SemanaEng1 = "wednes";
                break;
            case 4:
                $SemanaExtenso = "Quinta-feira";
                $SemanaEng1 = "thurs";
                break;
            case 5:
                $SemanaExtenso = "Sexta-feira";
                $SemanaEng1 = "fri";
                break;
            case 6:
                $SemanaExtenso = "Sábado";
                $SemanaEng1 = "satur";
                break;
            case 7:
                $SemanaExtenso = "Domingo";
                $SemanaEng1 = "sun";
                break;
        }

        $Mes = date_format($date, 'n');
        switch ($Mes){
            case 1:
                $MesExtensoAno = "Jan / " . date_format($date, 'Y');
                $MesExtenso = "Janeiro";
                break;
            case 2:
                $MesExtensoAno = "Fev / " . date_format($date, 'Y');
                $MesExtenso = "Fevereiro";
                break;
            case 3:
                $MesExtensoAno = "Mar / " . date_format($date, 'Y');
                $MesExtenso = "Março";
                break;
            case 4:
                $MesExtensoAno = "Abr / " . date_format($date, 'Y');
                $MesExtenso = "Abril";
                break;
            case 5:
                $MesExtensoAno = "Mai / " . date_format($date, 'Y');
                $MesExtenso = "Maio";
                break;
            case 6:
                $MesExtensoAno = "Jun / " . date_format($date, 'Y');
                $MesExtenso = "Junho";
                break;
            case 7:
                $MesExtensoAno = "Jul / " . date_format($date, 'Y');
                $MesExtenso = "Julho";
                break;
            case 8:
                $MesExtensoAno = "Ago / " . date_format($date, 'Y');
                $MesExtenso = "Agosto";
                break;
            case 9:
                $MesExtensoAno = "Set / " . date_format($date, 'Y');
                $MesExtenso = "Setembro";
                break;
            case 10:
                $MesExtensoAno = "Out / " . date_format($date, 'Y');
                $MesExtenso = "Outubro";
                break;
            case 11:
                $MesExtensoAno = "Nov / " . date_format($date, 'Y');
                $MesExtenso = "Novembro";
                break;
            case 12:
                $MesExtensoAno = "Dez / " . date_format($date, 'Y');
                $MesExtenso = "Dezembro";
                break;
        }

        switch ($retorna) {
            case "data_br":
                return date_format($date, 'd/m/Y');
            case "mes_dia_ano":
                return date_format($date, 'm/d/Y');
            case "mes_dia_ano":
                return date_format($date, 'm/d/Y');
            case "ym":
                return date_format($date, 'm/Y');
            case "datahora_br":
                return date_format($date, 'd/m/Y H:i');
            case "datahoraseconds_br":
                return date_format($date, 'd/m/Y H:i:s');
            case "data_as_hora_br":
                return date_format($date, 'd/m/Y') . " às " . date_format($date, 'H:i');
            case 'bd':
                return date_format($date, 'Y-m-d H:i:s');
            case 'gn':
                return date_format($date, 'Y-m-d');
            case 'ym_bd':
                return date_format($date, 'Y-m');
            case 'bd_begin':
                return date_format($date, 'Y-m-d 00:00:00');
            case 'bd_end':
                return date_format($date, 'Y-m-d 23:59:59');
            case 'data_sql':
                return date_format($date, 'Y-m-d');
            case 'data_sql_a':
                return date_format($date, 'm/d/Y');
            case 'd':
                return date_format($date, 'd');
            case "Y":
                return date_format($date, 'Y');
            case 'm':
                return date_format($date, 'm');
            case 't':
                return date_format($date, 't'); //último dia do mÊs
            case 8:
                return date_format($date, 'Y/m/d');
            case "md":
                return date_format($date, 'm/d');
            case "dm":
                return date_format($date, 'd/m');
            case "hm":
                return date_format($date, 'H:i');
            case "hmsA":
                return date_format($date, 'H:i:s A');
            case "hmi":
                return date_format($date, 'H:i:s');
            case "A":
                return date_format($date, 'A');
            case 'mx':
                return $MesExtenso;
            case 'mxy':
                return $MesExtensoAno;
            case 'sx':
                return $SemanaExtenso;
            case 'sx1':
                return $SemanaEng1;
            case 'sm':
                return date_format($date, 'N');
            case 't':
                return date_format($date, 't');
            case 'completo':
                return $SemanaExtenso . ', ' . date_format($date, 'd') . ' de ' . $MesExtenso . ' de ' . date_format($date, 'Y') . ' às ' . date_format($date, 'H:i') . 'h';
            case 'firstDayCompleteBD':
                return date_format($date, 'Y-m-01 00:00:00');
            case 'lastDayCompleteBD':
                return date_format($date, "Y-m-" . date_format($date, "t") . " 23:59:59");

        }
    }

    static public function moneyFormat($val, $exibirCIF = false, $decimal = 2, $cif='R$ ') {
        if ($val == 0){
            if ($exibirCIF == false){
                return "0,00";
            } else {
                return $cif . '0,00';
            }
        } else {
            if ($exibirCIF == false){
                return number_format($val, $decimal, ',', '.');
            } else {
                return $cif . ' ' . number_format($val, $decimal, ',', '.');
            }
        }
    }

    static public function clearString($string, $separator = "") {
        if($string !== mb_convert_encoding(mb_convert_encoding($string, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32'))
            $string = mb_convert_encoding($string, 'UTF-8', mb_detect_encoding($string));
        $string = htmlentities($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $string);
        $string = html_entity_decode($string, ENT_NOQUOTES, 'UTF-8');
        $string = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), ' ', $string);
        $string = preg_replace('/( ){2,}/', '$1', $string);
        $string = str_replace(" ", "$separator", $string);
        $string = trim($string);
        return $string;
    }

    static public function mask($val, $format){
        switch ($format) {
            case 'cep':
                $mask = "##.###-###";
                break;
            case 'phone':
                $mask = "(##) #####-####";
                break;
            default:
                $mask = "(##) #####-###";
                break;
        }

        $maskared = '';
        $k = 0;
        for($i = 0; $i<=strlen($mask)-1; $i++) {
        if($mask[$i] == '#') {
            if(isset($val[$k]))
            $maskared .= $val[$k++];
            } else {
            if(isset($mask[$i]))
                $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }

    static public function checkStatus($table, $status, $id){
        $table = strval($table);

        if ($status){
            $badge = '<a href="javascript:void(0);" onclick="changeStatus(' . "'" . $table . "'" . ', ' . $id . ')" class="btn-change-status" id="btn-change-' . $id . '"><span class="badge rounded-pill bg-success">Ativo</span></a>';

        } else {
            $badge = '<a href="javascript:void(0);" onclick="changeStatus(' . "'" . $table . "'" . ', ' . $id . ')" class="btn-change-status" id="btn-change-' . $id . '"><span class="badge rounded-pill bg-danger">Inativo</span></a>';
        }
        return $badge;
    }

    static public function changeStatus($table, $id){

        $check = DB::table($table)->where('id', $id)->first();

        if ($check->active){
            DB::table($table)->where('id', $id)->update(['active' => false]);
            $return = 'deactivated';
        } else {
            DB::table($table)->where('id', $id)->update(['active' => true]);
            $return = 'activated';
        }

        return response()->json($return);
    }

    static public function deleteSwal($table, $id){
        DB::table($table)->where('id', $id)->update(['deleted_at' => date("Y-m-d H:i:s")]);

        return response()->json(["success" => true], 200);
    }
}