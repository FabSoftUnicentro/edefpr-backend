<?php

namespace App\Utils;

class Brazil
{
    const REGION_NORTH = 'north';
    const REGION_NORTHEAST = 'northeast';
    const REGION_SOUTH = 'south';
    const REGION_SOUTHEAST = 'southeast';
    const REGION_MIDWEST = 'midwest';

    const KIND_INTERIOR = 'interior';
    const KIND_CAPITAL = 'capital';

    /**
     * @return array
     */
    public static function regions()
    {
        return [
            self::REGION_NORTH => ['AC', 'AM', 'AP', 'PA', 'RO', 'RR', 'TO'],
            self::REGION_NORTHEAST => ['AL', 'BA', 'CE', 'MA', 'PB', 'PE', 'PI', 'SE', 'RN'],
            self::REGION_MIDWEST => ['DF', 'GO', 'MS', 'MT'],
            self::REGION_SOUTHEAST => ['ES', 'MG', 'RJ', 'SP'],
            self::REGION_SOUTH => ['PR', 'RS', 'SC']
        ];
    }

    /**
     * @return array
     */
    public static function states()
    {
        $states = [];

        foreach (self::all() as $initials => $state) {
            $states[$initials] = $state->name;
        }

        return $states;
    }

    /**
     * @param $state
     * @return array|null
     */
    public static function cities($state)
    {
        $state = self::state($state);

        if ($state) {
            return array_combine($state->cities, $state->cities);
        }

        return null;
    }

    /**
     * @param $id
     * @return null|object
     */
    public static function state($id)
    {
        $states = self::all();

        foreach ($states as $state) {
            if ($id == $state->initials || $id == $state->name || $state->initials == strtoupper($id)) {
                return $state;
            }
        }

        return null;
    }

    /**
     * @param string $state
     * @return int|null|string
     */
    public static function region(string $state)
    {
        $region = array_filter(self::regions(), function ($states) use ($state) {
            return in_array($state, $states);
        });

        return key($region);
    }

    /**
     * @return mixed
     */
    public static function all()
    {
        return json_decode(self::json());
    }

    /**
     * @return bool|string
     */
    public static function json()
    {
        return file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'brazil.json');
    }
}
