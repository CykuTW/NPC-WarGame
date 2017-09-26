<?php

class MyHashMap {

    const MAX_COLLISION_SIZE = 255;
    const MAX_SIZE = 65536;

    private $array;
    
    function __construct() {
        $this->array = new SplFixedArray(self::MAX_SIZE);
        /*for ($i = 0; $i < $this->array->getSize(); $i++)
            $this->array[$i] = new SplFixedArray(self::MAX_COLLISION_SIZE);*/
    }

    public function get($key) {
        if (!self::is_valid_key($key))
            return NULL;
        
        $hash = self::djbx33a($key);
        $current = $this->array[$hash];
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
        if (is_null($this->array[$hash]))
            $this->array[$hash] = self::new_node($key, $value);
        else {
            $current = $this->array[$hash];
            $counter = 1;
            while ($current->key !== $key && !is_null($current->next)) {
                $current = $current->next;
                $counter++;
            }
            
            if ($counter > self::MAX_SIZE)
                throw new OverflowException("Oops! MyHashMap was full :(");

            if ($current->key === $key)
                $current->value = $value;
            else
                $current->next = self::new_node($key, $value);
        }
    }

    public function remove($key) {
        if (!self::is_valid_key($key))
            return;
        
        $hash = self::djbx33a($key);
        $current = $this->array[$hash];
        if (!is_null($current) && $current->key === $key) {
            $temp = $current;
            $this->array[$hash] = $current->next;
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
        return true;
    }

    private static function djbx33a($string) {
        $hash = 5381;
        for ($i = 0; $i < strlen($string); $i++) {
            $hash = ((($hash << 5) + $hash) + ord($string[$i])) % self::MAX_SIZE;
        }
        return $hash;
    }
}

$map = new MyHashMap();
$map->put('test', 123);
$map->put('asd', 456);
$map->remove('test');
var_dump($map->get('test'));
var_dump($map);

?>