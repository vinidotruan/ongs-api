<?php


namespace App\Services\Users;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserCreationService {

    private array $data;
    private string $password;

    public function __construct(private readonly User $user)
    {
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {

        $this->password = Hash::make($password);
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * @throws Exception
     */
    public function handle(): User
    {
        return DB::transaction(function() {
            return $this->user->create([...$this->data, "password" => $this->password]);
        });
    }
}
