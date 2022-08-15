<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use LaravelViews\Views\TableView;
use LaravelViews\Facades\Header;

class SubscribersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Subscriber::class;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('Name')->sortBy('name'),
            Header::title('Email')->sortBy('email_address'),
            'Phone Number',
            'Desired Budget',
            'Message',
            'Created',
            'Updated'
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Subscriber model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->email_address,
            $model->phone_number,
            $model->desired_budget,
            $model->message,
            $model->created_at,
            $model->updated_at
        ];
    }
}
