<?php
declare(strict_types=1);

namespace Team13CD\app\models\repositories;

use PDO;
use Team13CD\app\models\User;
use Team13CD\framework\App;
use Team13CD\framework\routing\View;

final class UserRepository extends User
{
    /**
     * Insert a user into the database
     *
     * @param int $rolesId
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $password
     * @param null|string $mobile
     * @param null|string $dateOfBirth
     * @param null|string $nickname
     * @param null|string $reason
     * @param null|string $uploadedPictureTempLocation
     * @param null|string $mimeContentType
     * @throws \Exception
     */
    public static function store(
        int $rolesId,
        string $firstName,
        string $lastName,
        string $email,
        string $password,
        ?string $mobile,
        ?string $dateOfBirth,
        ?string $nickname,
        ?string $reason,
        ?string $uploadedPictureTempLocation,
        ?string $mimeContentType
    )
    {
        App::get('database')->insert('users', [
            'roles_id' => $rolesId,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'mobile' => $mobile,
            'date_of_birth' => $dateOfBirth,
            'nickname' => $nickname,
            'reason' => $reason
        ]);

        if (!is_null($uploadedPictureTempLocation)) {
            $pictureStream = fopen($uploadedPictureTempLocation, "rb");
            $queryBuilder = App::get('database');

            $statement = $queryBuilder->getPdo()->prepare("UPDATE users SET picture = :picture, mime_content_type = :mime_content_type WHERE id = :user_id");
            $statement->bindParam(':picture', $pictureStream, PDO::PARAM_LOB);
            $statement->bindParam(':mime_content_type', $mimeContentType);
            $statement->bindParam(':user_id', App::get('database')->getPdo()->lastInsertId());

            $statement->execute();
        }
    }

    /**
     * Retrieve all users from the database in an array of User objects
     *
     * @return array
     * @throws \Exception
     */
    public static function getAllActiveUsers(): array
    {
        return App::get('database')->selectAll('users', 'User',
            [
                [
                    'column' => 'is_deleted',
                    'condition' => '=',
                    'value' => false,
                ]
            ]
        );
    }

    /**
     * Get a User object by the user id
     *
     * @param int $userId
     * @return mixed
     * @throws \Exception
     */
    public static function getUser(int $userId): User
    {
        return App::get('database')->selectAll(
            'users',
            'User',
            [
                [
                    'column' => 'id',
                    'condition' => '=',
                    'value' => $userId,
                ]
            ]
        )[0]; //returns an array with ONE object, by "[0]" I get the first (and only) object from the array
    }

    /**
     * Foreach parameter, update the value for a user
     *
     * @param int $userId
     * @param array $parameters
     * @throws \Exception
     */
    public static function updateById(int $userId, array $parameters)
    {
        foreach ($parameters as $key => $value) {
            if (!is_null($key) && $key === 'picture' && !is_null($value)) {
                $pictureStream = fopen($value, "rb");
                $queryBuilder = App::get('database');

                $mimeContentType = mime_content_type($_FILES['uploadedPicture']['tmp_name']);

                $statement = $queryBuilder->getPdo()->prepare("UPDATE users SET picture = :picture, mime_content_type = :mime_content_type WHERE id = :user_id");
                $statement->bindParam(':picture', $pictureStream, PDO::PARAM_LOB);
                $statement->bindParam(':mime_content_type', $mimeContentType);
                $statement->bindParam(':user_id', $userId);

                $statement->execute();
            } else {
                App::get('database')->update('users', $key, $value, [
                    [
                        'column' => 'id',
                        'condition' => '=',
                        'value' => $userId
                    ]
                ]);
            }
        }
    }

    /**
     * Set the is_deleted value in the database to true
     *
     * @param int $userId
     * @throws \Exception
     */
    public static function destroy(int $userId)
    {
        App::get('database')->update('users', 'is_deleted', true, [
            [
                'column' => 'id',
                'condition' => '=',
                'value' => $userId
            ]
        ]);
    }
}
