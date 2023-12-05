<?php

namespace app\controllers;

use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\activerecord\FindAll;
use app\models\activerecord\FindBy;
use app\models\activerecord\Insert;
use app\models\activerecord\Update;
use app\models\Room;
use app\models\Reserve as Reserves;

class Reserve implements ControllerInterface
{
    public array $data = [];
    public string $view;

    public function index(array $args)
    {
        $rooms = (new Room)->execute(new FindAll());
        $reservations = (new \app\models\Reserve)->execute(new FindAll(fields: "name_room"));

        $this->view = "create.php";
        $this->data = [
            "title" => "Criação das Reservas",
            "reservations" => $reservations,
            "rooms" => $rooms
        ];
    }

    public function edit(array $args)
    {
        $reservations = (new Reserves)->execute(new FindBy(field: "id", value: $args[0]));
        $rooms = (new Room)->execute(new FindAll());

        $this->view = "edit.php";
        $this->data = [
            "title" => "Edição da Reserva",
            "reservations" => $reservations,
            "rooms" => $rooms
        ];
    }

    public function show(array $args)
    {
        // TODO: Implement show() method.
    }

    public function update(array $args)
    {
        $reservations = new Reserves;

        $reservations->name_room = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->email_user = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->date = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->time = filter_input(INPUT_POST, "horario", FILTER_SANITIZE_SPECIAL_CHARS);

        $reservations->execute(new Update(field: "id", value: $args[0]));

        return redirect("/");
    }

    public function store()
    {
        $reservations = new Reserves;

        $reservations->name_room = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->email_user = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->date = filter_input(INPUT_POST, "data", FILTER_SANITIZE_SPECIAL_CHARS);
        $reservations->time = filter_input(INPUT_POST, "horario", FILTER_SANITIZE_SPECIAL_CHARS);

        $reservations->execute(new Insert);

        return redirect("/");
    }

    public function destroy(array $args)
    {
        $reservation = new Reserves;

        $reservation->execute(new Delete(field: "id", value: $args[0]));
        return redirect("/");
    }
}
