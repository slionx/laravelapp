<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class SystemSetRepository extends BaseRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return "App\\Http\\Model\\SystemSet";
	}

    public function saveSetting($name, $value)
    {
        $SystemSet = $this->firstOrNew([
            'name' => $name,
        ]);
        $SystemSet->value = $value;
        $result = $SystemSet->save();
        return $result;
    }

    public function saveSettings(array $inputs)
    {
        foreach ($inputs as $key => $value) {
            $this->saveSetting($key, $value);
        }
    }
}
