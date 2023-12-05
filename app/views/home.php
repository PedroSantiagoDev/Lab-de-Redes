<section style="padding-top: 8rem">
    <header class="d-flex justify-content-between">
        <h2>Salas Reservadas</h2>
        <a href="/reserve" class="btn btn-primary btn-lg p-4">Reserva Sala</a>
    </header>

    <div class="container text-center">
        <table class="table" style="margin-top: 3rem">
            <thead>
            <tr>
                <th>Sala</th>
                <th>Email</th>
                <th>Data</th>
                <th>Hora</th>
                <th colspan="2">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <th><?php echo $reservation->name_room; ?></th>
                    <th><?php echo $reservation->email_user; ?></th>
                    <th><?php echo $reservation->date; ?></th>
                    <th><?php echo $reservation->time; ?></th>
                    <th><a class="btn btn-success" href="/reserve/edit/<?php echo $reservation->id?>">Editar</a></th>
                    <th><a class="btn btn-danger" href="/reserve/destroy/<?php echo $reservation->id?>">Excluir</a></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
