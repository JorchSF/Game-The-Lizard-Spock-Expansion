<?php
class Rules {
    
    // Resultados
    const WIN       = 'Ganaste';
    const LOSE      = 'Perdiste';
    const TIE       = 'Empate';
    
    // Elementos
    const LAGARTO   = 'Lagarto';
    const PAPEL     = 'Papel';
    const PIEDRA    = 'Piedra';
    const SPOCK     = 'Spock';
    const TIJERA    = 'Tijeras';
    
    // Acciones
    const APLASTA   = 'aplasta';
    const COME      = 'come';
    const CORTA     = 'corta';
    const CUBRE     = 'cubre';
    const DECAPITA  = 'decapita';
    const DESTROZA  = 'destroza';
    const DESCUBRE  = 'descubre';
    const ENVENENA  = 'envenena';
    const GOLPEA    = 'golpea';
    const VAPORIZA  = 'vaporiza';
    
    public static $TYPE_ELEMENTS = array(
        self::LAGARTO,  
        self::PAPEL,
        self::PIEDRA,
        self::SPOCK,
        self::TIJERA        
    );
    
    public static $TYPE_ELEMENT = array(
        self::PIEDRA,
        self::PAPEL,
        self::TIJERA,
        self::LAGARTO,
        self::SPOCK

    );
    
    public static $TYPE_ELEMENT_WIN = array(
        self::PIEDRA	=> array(self::TIJERA,  self::LAGARTO),
        self::PAPEL	    => array(self::SPOCK,   self::PIEDRA),
        self::TIJERA	=> array(self::LAGARTO, self::PAPEL),
        self::LAGARTO	=> array(self::SPOCK,   self::PAPEL),
        self::SPOCK	    => array(self::TIJERA,  self::PIEDRA)
    );
        
    public static function TYPE_ELEMENT_ACTION ($user, $pc){   
        
        $result = self::CHECK_WIN_LOSE_ACTION($user, $pc);
        
        if($result != self::TIE){
            switch(true)
            {              
                case ($user == self::PIEDRA and $pc == self::PAPEL):
                case ($user == self::PAPEL and $pc == self::PIEDRA):
                    return $result.' '.self::PAPEL.' '.self::CUBRE.' '.self::PIEDRA;
                    break;
                case ($user == self::PIEDRA and $pc == self::LAGARTO):
                case ($user == self::LAGARTO and $pc == self::PIEDRA):
                    return $result.' '.self::PAPEL.' '.self::APLASTA.' '.self::PIEDRA;
                    break;
                case ($user == self::PIEDRA and $pc == self::SPOCK):
                case ($user == self::SPOCK and $pc == self::PIEDRA):
                    return $result.' '.self::SPOCK.' '.self::VAPORIZA.' '.self::PIEDRA;
                    break;
                case ($user == self::PIEDRA and $pc == self::TIJERA):
                case ($user == self::TIJERA and $pc == self::PIEDRA):
                    return $result.' '.self::PIEDRA.' '.self::APLASTA.' '.self::TIJERA;
                    break;                
                case ($user == self::PAPEL and $pc == self::SPOCK):
                case ($user == self::SPOCK and $pc == self::PAPEL):
                    return $result.' '.self::PAPEL.' '.self::DESCUBRE.' '.self::SPOCK;
                    break;
                case ($user == self::TIJERA and $pc == self::PAPEL):
                case ($user == self::PAPEL and $pc == self::TIJERA):
                    return $result.' '.self::TIJERA.' '.self::CORTA.' '.self::PAPEL;
                    break;
                case ($user == self::TIJERA and $pc == self::LAGARTO):
                case ($user == self::LAGARTO and $pc == self::TIJERA):
                    return $result.' '.self::TIJERA.' '.self::DECAPITA.' '.self::LAGARTO;
                    break;
                case ($user == self::LAGARTO and $pc == self::SPOCK):
                case ($user == self::SPOCK and $pc == self::LAGARTO):
                    return $result.' '.self::LAGARTO.' '.self::ENVENENA.' '.self::SPOCK;
                    break;
                case ($user == self::LAGARTO and $pc == self::PAPEL):
                case ($user == self::PAPEL and $pc == self::LAGARTO):
                    return $result.' '.self::LAGARTO.' '.self::COME.' '.self::PAPEL;
                    break;
                case ($user == self::SPOCK and $pc == self::TIJERA):
                case ($user == self::TIJERA and $pc == self::SPOCK):
                    return $result.' '.self::SPOCK.' '.self::GOLPEA.' '.self::TIJERA;
                    break;
            }
        }else{
            return self::TIE;
        }
    }    
    
    private static function CHECK_WIN_LOSE_ACTION($user, $pc){
        if (in_array($pc, self::$TYPE_ELEMENT_WIN[$user])) {
            return self::WIN;
        }else if (in_array($user, self::$TYPE_ELEMENT_WIN[$pc])) {
            return self::LOSE;
        }else{
            return self::TIE;
        }
    }

}