<section style="padding-top: 8rem">
    <header class="d-flex justify-content-between">
        <h2>Reserve Sua Sala</h2>
        <button class="btn btn-primary btn-lg p-4" type="submit" form="formCreate">Editar</button>
    </header>

    <div class="container text-center" style="padding-top: 3rem">
        <form class="row g-3" action="/reserve/update/<?php echo $reservations->id;?>" method="post" id="formCreate">
            <div class="col-md-6">
                <div>
                    <label for="name">Sala</label>
                    <select name="name" id="name" class="form-select">
                        <?php foreach ($rooms as $room) : ?>
                            <?php if ($room->name === $reservations->name_room) : ?>
                                <option selected value="<?php echo $room->name; ?>" name="name"
                                        id="name"><?php echo $room->name; ?></option>
                            <?php endif; ?>
                            <option value="<?php echo $room->name; ?>" name="name"
                                    id="name"><?php echo $room->name; ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <label class="form-label" for="email">Email</label>
                <input value="<?php echo $reservations->email_user; ?>" class="form-control" type="text" name="email"
                       id="email" placeholder="Email">
            </div>

            <div class="col-md-6">
                <label class="form-label" for="data">Data</label>
                <input value="<?php echo $reservations->date; ?>" class=" form-control" type="date" name="data"
                       id="data"
                       placeholder="Data">
            </div>

            <div class="col-md-6">
                <label class="form-label" for="horario">Horáário</label>
                <input value="<?php echo $reservations->time; ?>" class="form-control" type="time" name="horario"
                       id="horario" placeholder="Horario">
            </div>
        </form>
    </div>
</section>

