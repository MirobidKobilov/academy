<?php

namespace App\Filament\Pages;

use App\Models\StudentProfile;
use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * @TODO - fix translations
 * @property \Filament\Forms\ComponentContainer $form
 */
class Profile extends Page
{
    use InteractsWithForms;

    protected static string $view = 'filament-authentication::filament.pages.profile';


    protected static bool $shouldRegisterNavigation = false;

    /**
     * @var array<string, string>
     */
    public array $formData;


    protected function getFormStatePath(): string
    {
        return 'formData';
    }

    protected function getFormModel(): Model
    {
        $user = Auth::user();
        if($user->hasRole(['student'])){
            return $user->studentProfile;
        }
        elseif($user->hasRole(['mentor'])){
            return $user->mentorProfile;
        }
            return $user;
    }

    public function mount(): void
    {
        $user = Auth::user();
        if ($user->hasRole(['student'])) {
            $this->form->fill([
                'user_id' => $this->getFormModel()->user_id,
                'first_name' => $this->getFormModel()->first_name,
                'middle_name' => $this->getFormModel()->middle_name,
                'last_name' => $this->getFormModel()->last_name,
                'date_of_birth' => $this->getFormModel()->date_of_birth,
                'phone' => $this->getFormModel()->phone,
                'city' => $this->getFormModel()->city,
                'address' => $this->getFormModel()->address,
                'TIN' => $this->getFormModel()->TIN,
                'passport_series' => $this->getFormModel()->passport_series,
                'passport_number' => $this->getFormModel()->passport_number,
                'subject' => $this->getFormModel()->subject,
            ]);
        }elseif ($user->hasRole(['admin'])){
            $this->form->fill([
                // @phpstan-ignore-next-line
                'name' => $this->getFormModel()->name,
                // @phpstan-ignore-next-line
                'email' => $this->getFormModel()->email,
            ]);
        }
        elseif ($user->hasRole(['mentor'])){
            $this->form->fill([
            'first_name'=> $this->getFormModel()->first_name,
            'middle_name'=> $this->getFormModel()->middle_name,
            'last_name'=> $this->getFormModel()->last_name,
            'subject'=> $this->getFormModel()->subject,
            'description'=> $this->getFormModel()->description,
            ]);
        }
    }

    public function submit(): void
    {

        $data = $this->form->getState();
        $user = Auth::user();
        if ($user->hasRole(['student'])) {
            $state = array_filter([
                'user_id' => auth()->user()->id,
                'first_name' => Arr::get($data, 'first_name'),
                'middle_name' => Arr::get($data, 'middle_name'),
                'last_name' => Arr::get($data, 'last_name'),
                'date_of_birth' => Arr::get($data, 'date_of_birth'),
                'phone' => Arr::get($data, 'phone'),
                'city' => Arr::get($data, 'city'),
                'address' => Arr::get($data, 'address'),
                'TIN' => Arr::get($data, 'TIN'),
                'passport_series' => Arr::get($data, 'passport_series'),
                'passport_number' => Arr::get($data, 'passport_number'),
                'subject' => Arr::get($data, 'subject'),
            ]);
            $this->getFormModel()->update($state);
        }
        elseif ($user->hasRole(['admin'])) {
            $state = array_filter([
                'first_name' => $data['first_name'],
                'email' => $data['email'],
                'password' => $data['new_password'] ? Hash::make($data['new_password']) : null,
            ]);

            $this->getFormModel()->update($state);

            if ($data['new_password']) {
                // @phpstan-ignore-next-line
                Filament::auth()->login($this->getFormModel(), (bool)$this->getFormModel()->getRememberToken());
            }
        }elseif ($user->hasRole(['mentor'])){
            $state = array_filter([
                'first_name'=> $data['first_name'],
                'middle_name'=> $data['middle_name'],
                'last_name'=> $data['last_name'],
                'subject'=> $data['subject'],
                'description'=> $data['description'],
            ]);
            $this->getFormModel()->update($state);
        }
        $this->notify('success', strval(__('filament::resources/pages/edit-record.messages.saved')));
    }

    public function getCancelButtonUrlProperty(): string
    {
        return static::getUrl();
    }

    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profile',
        ];

    }

    protected function getFormSchema(): array
    {
        $user = Auth::user();
        if ($user->hasRole(['student'])) {
            return [
                      Section::make('Profile')
                          ->columns(2)
                          ->schema([
                              TextInput::make('first_name')->required(),
                              TextInput::make('middle_name')->required(),
                              TextInput::make('last_name')->required(),
                              DatePicker::make('date_of_birth')->required()
                                  ->maxDate(now())->format('Y-m-d'),
                              TextInput::make('phone')->required()->placeholder('+{998}(00) 000-00-00')->mask(fn(TextInput\Mask $mask) => $mask->pattern('+998(00) 000-00-00')),
                              TextInput::make('city')->required(),
                              TextInput::make('address')->required(),
                              TextInput::make('TIN')->required()->length(9)->mask(fn(TextInput\Mask $mask) => $mask->pattern('000000000')),
                              TextInput::make('passport_series')->length(2)->required()->placeholder('AB'),
                              TextInput::make('passport_number')->length(7)->required()->placeholder('1234567')->mask(fn(TextInput\Mask $mask) => $mask->pattern('0000000')),
                              Select::make('subject')
                                  ->options([
                                      '1' => 'PHP',
                                      '2' => 'PYTHON',
                                      '3' => 'JS',
                                  ])->required()->default('1')
                                  ->disablePlaceholderSelection(),
                          ]),
            ];
        }
        elseif ($user->hasRole(['admin'])){
            return [
                Section::make('General')
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email Address')
                            ->required(),
                    ]),
                Section::make('Update Password')
                    ->columns(2)
                    ->schema([
                        TextInput::make('current_password')
                            ->label('Current Password')
                            ->password()
                            ->rules(['required_with:new_password'])
                            ->currentPassword()
                            ->autocomplete('off')
                            ->columnSpan(1),
                        Grid::make()
                            ->schema([
                                TextInput::make('new_password')
                                    ->label('New Password')
                                    ->rules(['confirmed', Password::defaults()])
                                    ->autocomplete('new-password'),
                                TextInput::make('new_password_confirmation')
                                    ->label('Confirm Password')
                                    ->password()
                                    ->rules([
                                        'required_with:new_password',
                                    ])
                                    ->autocomplete('new-password'),
                            ]),
                    ]),
            ];
        } elseif ($user->hasRole(['mentor'])){
            return [
                Section::make('Mentor Profile')
                    ->columns(2)
                    ->schema([
                      TextInput::make('first_name'),
                        TextInput::make('middle_name'),
                        TextInput::make('last_name'),
                        TextInput::make('subject'),
                        Textarea::make('description')
                    ]),
            ];

        }
            return array();
    }

}
