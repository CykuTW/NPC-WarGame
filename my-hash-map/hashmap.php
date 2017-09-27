<?php

class MyHashMap {

    const MAX_COLLISION_SIZE = 5;
    const MAX_SIZE = 65536;

    private $map;
    
    function __construct() {
        $this->map = new SplFixedArray(self::MAX_SIZE);
        /*for ($i = 0; $i < $this->map->getSize(); $i++)
            $this->map[$i] = new SplFixedArray(self::MAX_COLLISION_SIZE);*/
    }

    public function get($key) {
        if (!self::is_valid_key($key))
            return NULL;
        
        $hash = self::djbx33a($key);
        $current = $this->map[$hash];
        $result = NULL;
        while (!is_null($current)) {
            if ($current->key === $key)
                $result = $current->value;
            $current = $current->next;
        }
        return $result;
    }

    public function put($key, $value) {
        if (!self::is_valid_key($key))
            return;

        $hash = self::djbx33a($key);
        if (is_null($this->map[$hash]))
            $this->map[$hash] = self::new_node($key, $value);
        else {
            $current = $this->map[$hash];
            $counter = 1;
            while ($current->key !== $key && !is_null($current->next)) {
                $current = $current->next;
                $counter++;
            }

            if ($counter >= self::MAX_COLLISION_SIZE)
                throw new OverflowException("Oops! MyHashMap was full :(");

            if ($current->key === $key)
                $current->value = $value;
            else
                $current->next = self::new_node($key, $value);
        }
    }

    public function dump() {
        $result = '';
        for ($i = 0; $i < self::MAX_SIZE; $i++) {
            $current = $this->map[$i];
            if (!is_null($current)) {
                $result .= (string) $i;
                while (!is_null($current)) {
                    $result .= sprintf(" -> [%s]=%s", $current->key, var_export($current->value, true));
                    $current = $current->next;
                }
                $result .= "\n";
            }
        }
        return $result;
    }

    public function remove($key) {
        if (!self::is_valid_key($key))
            return;
        
        $hash = self::djbx33a($key);
        $current = $this->map[$hash];
        if (!is_null($current) && $current->key === $key) {
            $temp = $current;
            $this->map[$hash] = $current->next;
            unset($temp);
        } else {
            while (!is_null($current->next)) {
                if ($current->next->key === $key) {
                    $temp = $current->next;
                    $current->next = $current->next->next;
                    unset($temp);
                    break;
                }
                $current = $current->next;
            }
        }
    }

    private static function new_node($key, $value) {
        return new class ($key, $value) {
            public $next;
            public $key;
            public $value;

            function __construct($key, $value) {
                $this->next = NULL;
                $this->key = $key;
                $this->value = $value;
            }
        };
    }

    private static function is_valid_key($key) {
        return is_string($key);
    }

    private static function djbx33a($string) {
        $hash = 5381;
        for ($i = 0; $i < strlen($string); $i++) {
            $hash = ((($hash << 5) + $hash) + ord($string[$i])) % self::MAX_SIZE;
        }
        return $hash;
    }
}

?>