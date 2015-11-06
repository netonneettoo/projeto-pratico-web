<?php namespace App\Services;

use App\User;

class UserService extends AbstractService
{
    public static function model() {
        return new User();
    }

    public static function store($data) {

        try {
            $validation = self::model()->validate($data);
            if ($validation->fails()) {
                throw new \Exception($validation->messages()->first(), self::ERROR_CODE);
            }
            $data = self::model()->store($data);

            $user = self::model()->where('email', $data->email)->first();
            if ($user != null) {
                throw new \Exception('email já existe', self::ERROR_CODE);
            }

            if (! $data->save()) {
                throw new \Exception('erro ao cadastrar o usuario', self::ERROR_CODE);
            }
            return self::jsonReturn(200, 'sucesso', $data);
        } catch (\Exception $e) {
            return self::jsonReturn($e->getCode(), $e->getMessage());
        }
    }
}