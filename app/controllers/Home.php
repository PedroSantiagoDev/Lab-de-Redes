<?php

namespace app\controllers;

use app\interfaces\ControllerInterface;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindBy;
use app\models\Reserve;

class Home implements ControllerInterface
{
    public array $data = [];
    public string $view;

    public function index(array $args): void
    {
        $reservations = (new Reserve)->execute(new FindAll(fields: "id, name_room, email_user, date, time"));

        $this->view = "home.php";
        $this->data = [
            "title" => "Relação de Reservas",
            "reservations" => $reservations
        ];
    }

    public function edit(array $args)
    {
        // TODO: Implement edit() method.
    }

    public function show(array $args)
    {
        // TODO: Implement show() method.
    }

    public function update(array $args)
    {
        // TODO: Implement update() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function destroy(array $args)
    {
        // TODO: Implement destroy() method.
    }
}
