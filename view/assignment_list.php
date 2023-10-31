<?php include('view/header.php'); ?>

<section id='list' class='list'>
    <header class='list__row list__header'>
        <h1>Compiti</h1>
        <form action="." method='get' id='list__header_select' class='list__header_select'>
            <input type="hidden" name="action" value="list_assignments">
            <select name="course_id" required>
                <option value="0">Vedi tutti</option>
                <?php foreach ($courses as $course) : ?>
                    <?php if ($course_id == $course['courseID']) { ?>
                        <option value="<?= $course['courseID'] ?>" selected>
                    <?php } else { ?>
                <option value="<?= $course['courseID'] ?>">
                    <?php } ?>
                    <?= $course['courseName'] ?>
                </option>
                <?php endforeach; ?>
            </select>   
            <button class='add-button bold'>Vai</button>
        </form>
    </header>
    <?php if($assignments) { ?>
        <?php foreach ($assignments as $assignment) : ?>
            <div class="list__row">
                <div class="list__item">
                    <p class="bold"><?= $assignment['courseName'] ?></p>
                    <p><?= $assignment['Description'] ?></p>
                </div>
                <div class="list__removeItem">
                    <form action="." method="post">
                        <input type="hidden" name="action" value="delete_assignment">
                        <input type="hidden" name="assignment_id" value="<?= $assignment['ID'] ?>">
                        <button class="remove-button">x</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        <?php } else { ?>
        <br>
        <?php if ($course_id) { ?>
            <p>Nessun compito per questo corso ancora...</p>
        <?php } else { ?>
            <p>Nessun compito esistente per ora...</p>
        <?php } ?>
        <br>
        <?php } ?>

</section>

<section id="add" class="add">
    <h2>Aggiungi compito</h2>
    <form action="." method="post" id="add__form" class="add__form">
        <input type="hidden" name="action" value="add_assignment">
        <div class="add__inputs">
            <label>Corso:</label>
            <select name="course_id" required>
                <option value="">Per favore seleziona</option>
                <?php foreach ($courses as $course) : ?>
                    <option value="<?= $course['courseID']; ?>">
                        <?= $course['courseName']; ?>
                    </option>
                    <?php endforeach; ?>
            </select>
            <label>Descrizione:</label>
            <input type="text" name="description" maxlength="120" placeholder="Descrizione" required>
        </div>
        <div class="add__addItem">
            <button class="add-button bold">Aggiungi</button>
        </div>
    </form>
</section>
<br>
<p><a href=".?action=list_courses">Vedi/Modifica Corso</a></p>
<?php include('view/footer.php'); ?>