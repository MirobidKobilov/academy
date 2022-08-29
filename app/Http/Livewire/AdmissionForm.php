<?php

namespace App\Http\Livewire;

use App\Mail\InviteStudent;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Livewire\Component;

class AdmissionForm extends Component
{

    public ?string $name = null;
    public ?string $phone = null;
    public ?string $email = null;

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'min:10', 'unique:users'],
        'email' => ['required', 'email', 'unique:users']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function invite()
    {
        $this->validate();

        $user = User::firstOrCreate(
            ['email' => $this->email],
            [
                'phone' => $this->phone,
                'name' => $this->name,
                'password' => Hash::make(Str::random())
            ]
        );
        $user->assignRole(['incoming']);

        $url = URL::temporarySignedRoute(
            'sign-in',
            now()->addMinutes(60),
            ['user' => $user->id]
        );

        // send the email
        Mail::send(new InviteStudent($user, $url));
        // inform the user
        return redirect()->to('success-register');
    }

    public function render()
    {
        return view('livewire.admission-form');
    }
}
