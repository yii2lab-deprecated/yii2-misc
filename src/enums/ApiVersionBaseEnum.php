<?php

namespace yii2lab\misc\enums;

class ApiVersionBaseEnum extends BaseEnum {

    public static function getApiVersionNumberList()
    {
        $dirList = self::values();
        foreach($dirList as $path) {
            if (preg_match('#v([0-9]+)#i', $path, $matches)) {
                $result[] = $matches[1];
            }
        }
        return $result;
    }

    public static function getApiSubApps()
    {
        $subApps = self::values();
        $result = [];
        foreach($subApps as $app) {
            $result[] = API . '/' . $app;
        }
        return $result;
    }

}
